<?php 

require_once 'Model/loggerModel.php'; 
class Products {
    private $logger;
    private $productList = array();
    private $productRow = array();
    private $productId;
    private $productTitle;
    private $productName;
    private $productStock;
    private $productPrice;
    private $productImgUrl;
    private $productKeywords;
    private $productDescription;
    private $productCategory;
    private $category;
    private $keyword;
    private $req;
    private $req1;
    private $query;
    public $total;
    public $limit;
    public $pages;
    public $page;
    public $start;
    public $end;
    public $offset;
    
    public function __construct($category, $keyword) {   
        $this->category = $category;
        $this->keyword = $keyword;
        $this->logger = new Logger();
    }
    
    private function countProducts() {
        try {
            $db = Db::getInstance();
            $this->req1 = $db->prepare('
            SELECT
                COUNT(*)
            FROM
                products
            '
            .(($this->keyword != "") ? "WHERE keywords='$this->keyword'" : "".(($this->category != "") ? "WHERE category='$this->category'" : "")));       
            $this->req1->execute();
            $this->total = $this->req1->fetch()[0];
        } catch (Exception $ex) {
            $this->logger->setMessage("productsModel->countProducts()");
        }
    }

    public function setPaging() {
        try {
            $this->countProducts();
            $this->limit = 8;
            // How many pages will there be
            $this->pages = ceil($this->total / $this->limit);
            // What page are we currently on?
            $this->page = min($this->pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
                'options' => array(
                    'default'   => 1,
                    'min_range' => 1,
                ),
            )));
            // Calculate the offset for the query
            $this->offset = ($this->page - 1)  * $this->limit;
            // Some information to display to the user
            $this->start = $this->offset + 1;
            $this->end = min(($this->offset + $this->limit), $this->total);
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->setPaging()");
        }
    }

    private function setQuery() {
        if($this->keyword != "") {
            $this->query = "SELECT * FROM products 
                            WHERE (keywords LIKE '%".$this->keyword."%')
                            ORDER BY 
                                id 
                            LIMIT
                                :limit
                            OFFSET
                                :offset 
                            ";
        }
        else if ($this->category != "") {
            $this->query = "SELECT * FROM products
                            WHERE category='".$this->category."'
                            ORDER BY 
                                id 
                            LIMIT
                                :limit
                            OFFSET
                                :offset  
                            ";
        }
        else {
            $this->query = "SELECT * FROM products 
                            ORDER BY 
                                id 
                            LIMIT
                                :limit
                            OFFSET
                                :offset ";
        }
    }

    public function setProductList() {
        try {
            $db = Db::getInstance();
            $this->setQuery();
            $this->req = $db->prepare($this->query);
            $this->req->bindParam(':limit', $this->limit, PDO::PARAM_INT);
            $this->req->bindParam(':offset', $this->offset, PDO::PARAM_INT);
            $this->req->execute();
            while($row = $this->req->fetch()) {
                if(isset($row['id'])) { $this->productId = $row['id'];}
                if(isset($row['title'])) { $this->productTitle = $row['title'];}
                if(isset($row['name'])) { $this->productName = $row['name'];}
                if(isset($row['stock'])) { $this->productStock = $row['stock'];}
                if(isset($row['price'])) { $this->productPrice = $row['price'];}
                if(isset($row['imgurl'])) { $this->productImgUrl = $row['imgurl'];}
                if(isset($row['keywords'])) { $this->productKeywords = $row['keywords'];}
                if(isset($row['description'])) { $this->productDescription = $row['description'];}
                if(isset($row['category'])) { $this->productCategory = $row['category'];}
                $this->productRow = array(  "Id" => $this->productId,
                                            "Title" => $this->productTitle,
                                            "Name" => $this->productName, 
                                            "Stock" => $this->productStock,
                                            "Price" => $this->productPrice,
                                            "ImgUrl" => $this->productImgUrl,
                                            "Keywords" => $this->productKeywords,
                                            "Description" => $this->productDescription, 
                                            "Category" => $this->productCategory);
                array_push($this->productList, $this->productRow);
            }
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->setProductList()");
        }
    }

    public function getProductList() {
        return $this->productList;
    }
    
    public function getProduct($id) {
        try {
            $db = Db::getInstance();
            $this->query = "SELECT * FROM products WHERE id='".$id."'";
            $this->req = $db->prepare($this->query);
            $this->req->execute();
            $row = $this->req->fetch();
            if(isset($row['id'])) { $this->productId = $row['id'];}
            if(isset($row['title'])) { $this->productTitle = $row['title'];}
            if(isset($row['name'])) { $this->productName = $row['name'];}
            if(isset($row['stock'])) { $this->productStock = $row['stock'];}
            if(isset($row['price'])) { $this->productPrice = $row['price'];}
            if(isset($row['imgurl'])) { $this->productImgUrl = $row['imgurl'];}
            if(isset($row['keywords'])) { $this->productKeywords = $row['keywords'];}
            if(isset($row['description'])) { $this->productDescription = $row['description'];}
            if(isset($row['category'])) { $this->productCategory = $row['category'];}
            $this->productRow = array( "Id" => $this->productId,
                                       "Title" => $this->productTitle,
                                       "Name" => $this->productName,
                                       "Stock" => $this->productStock,
                                       "Price" => $this->productPrice,
                                       "ImgUrl" => $this->productImgUrl,
                                       "Keywords" => $this->productKeywords,
                                       "Description" => $this->productDescription, 
                                       "Category" => $this->productCategory);
            return $this->productRow;
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->getProduct()");
        }
    }
    
    public function update($productArray) {
        try {
            require_once 'Model/photoModel.php';
            $photoModel = new PhotoModel();
            $photoModel->update($productArray["PhotoList"], $productArray["Id"]);

            $db = Db::getInstance();
            //For setting uploads directory
            $path = '../uploads';
            if ( !is_dir($path)) {
                mkdir($path);
            }
            //Writes the photo to the server
            if(!file_exists($productArray["Target"]))
            {  
                if(move_uploaded_file($productArray["TmpName"], $productArray["Target"])) { 
                    $query = sprintf("UPDATE products SET title='%s', name='%s', stock='%s', price='%s', imgurl='%s', keywords='%s', description='%s', category='%s' WHERE id='%s'",
                                    $productArray['Title'],
                                    $productArray['Name'],
                                    $productArray['Stock'],
                                    $productArray['Price'],
                                    $productArray['ImgUrl'],
                                    $productArray['Keywords'],
                                    $productArray['Description'],
                                    $productArray['Category'],
                                    $productArray['Id']);
                    $this->req = $db->prepare($query);
                    $this->req->execute();
                    //mysql_query($query) or die(mysql_error());
                    echo "The file ". basename( $productArray['Name']). " has been uploaded, and your information has been added to the directory";
                }
                else {
                //Gives and error if its not
                echo "Sorry, there was a problem uploading your file.";
                }
            }
            else {    
                $query = sprintf("UPDATE products SET title='%s', name='%s', stock='%s', price='%s', imgurl='%s', keywords='%s', description='%s', category='%s' WHERE id='%s'",
                                    $productArray['Title'],
                                    $productArray['Name'],
                                    $productArray['Stock'],
                                    $productArray['Price'],
                                    $productArray['ImgUrl'],
                                    $productArray['Keywords'],
                                    $productArray['Description'],
                                    $productArray['Category'],
                                    $productArray['Id']);

                //Writes the information to the database
                $this->req = $db->prepare($query);
                $this->req->execute();
                //mysql_query($query) or die(mysql_error());     
            }
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->update()");
        }
    }
    
    public function delete($id) {
        try {
            require_once 'Model/photoModel.php';
            $photoModel = new PhotoModel();
            $photoModel->delete($id);
            // Connects to your Database
            $db = Db::getInstance();
            $product = $this->getProduct($id);
            //Writes the information to the database
            $query = sprintf("DELETE FROM products WHERE id='%s'", $id);
            $req = $db->prepare($query);
            $req->execute();

            $path = "../uploads/";
            $file = $path.$product['ImgUrl'];
            if (file_exists($file)) {
                unlink($file);
            } 
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->delete()");
        }
    }
    
    public function add($productArray) {
        try {
            // Connects to your Database
            //Writes the information to the database
            $db = Db::getInstance();
            $this->query = "INSERT INTO products (title,name,stock,price,imgurl,keywords,description,category)".
                            "VALUES ('".$productArray['Title']."', '".$productArray['Name']."', '".$productArray['Stock']."', '".$productArray['Price']."', '".$productArray['ImgUrl']."', '".$productArray['Keywords']."', '".$productArray['Description']."', '".$productArray['Category']."')" or die(file_put_contents("log.txt", "in mysql query".mysql_error().PHP_EOL, FILE_APPEND));
            $this->req = $db->prepare($this->query);
            $this->req->execute();

            $last_id = $db->lastInsertId();
            require_once 'Model/photoModel.php';
            $photoModel = new PhotoModel();
            $photoModel->add($productArray["PhotoList"], $last_id);

            //Writes the photo to the server
            if(move_uploaded_file($productArray['TmpName'], $productArray['Target']))
            {
                echo "The file ". basename( $productArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";
            }
            else {
                //Gives and error if its not
                echo "Sorry, there was a problem uploading your file.";
            }
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->add()");
        }
    }
    
    public function randomProductList($number) {
        try {
            $db = Db::getInstance();
            $query = "SELECT * FROM products
                        ORDER BY RAND()
                        LIMIT $number";
            $req = $db->prepare($query);
            $req->execute();  
            $productList = array();
            while($row = $req->fetch()) {
                if(isset($row['id'])) { $this->productId = $row['id'];}
                if(isset($row['title'])) { $this->productTitle = $row['title'];}
                if(isset($row['name'])) { $this->productName = $row['name'];}
                if(isset($row['stock'])) { $this->productStock = $row['stock'];}
                if(isset($row['price'])) { $this->productPrice = $row['price'];}
                if(isset($row['imgurl'])) { $this->productImgUrl = $row['imgurl'];}
                if(isset($row['keywords'])) { $this->productKeywords = $row['keywords'];}
                if(isset($row['description'])) { $this->productDescription = $row['description'];}
                if(isset($row['category'])) { $this->productCategory = $row['category'];}
                $productRow = array("Id" => $this->productId,
                                    "Title" => $this->productTitle,
                                    "Name" => $this->productName, 
                                    "Stock" => $this->productStock,
                                    "Price" => $this->productPrice, 
                                    "ImgUrl" => $this->productImgUrl,
                                    "Keywords" => $this->productKeywords,
                                    "Description" => $this->productDescription, 
                                    "Category" => $this->productCategory);
                array_push($productList, $productRow);
            }   
            return $productList;
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->randomProductList()");
        }
    }
    
    public function preg_trim($string) {
        try {
            $string = str_replace(' ; ', ';', $string);
            $string = str_replace(' ;', ';', $string);
            $string = str_replace('; ', ';', $string);
            return $string;
        } catch (Exception $exc) {
            $this->logger->setMessage("productsModel->preg_trim()");
        }
    }
}