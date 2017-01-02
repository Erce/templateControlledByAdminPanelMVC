<?php 

class Products {
    private $productList = array();
    private $productRow = array();
    private $productId;
    private $productTitle;
    private $productName;
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
    }
    
    private function countProducts() {
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
    }

    public function setPaging() {
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
            if(isset($row['imgurl'])) { $this->productImgUrl = $row['imgurl'];}
            if(isset($row['keywords'])) { $this->productKeywords = $row['keywords'];}
            if(isset($row['description'])) { $this->productDescription = $row['description'];}
            if(isset($row['category'])) { $this->productCategory = $row['category'];}
            $this->productRow = array(  "Id" => $this->productId,
                                        "Title" => $this->productTitle,
                                        "Name" => $this->productName, 
                                        "ImgUrl" => $this->productImgUrl,
                                        "Keywords" => $this->productKeywords,
                                        "Description" => $this->productDescription, 
                                        "Category" => $this->productCategory);
            array_push($this->productList, $this->productRow);
        }
    }

    public function getProductList() {
        return $this->productList;
    }
    
    public function getProduct($id) {
        $db = Db::getInstance();
        $this->query = "SELECT * FROM products WHERE id='".$id."'";
        $this->req = $db->prepare($this->query);
        $this->req->execute();
        $row = $this->req->fetch();
        if(isset($row['id'])) { $this->productId = $row['id'];}
        if(isset($row['title'])) { $this->productTitle = $row['title'];}
        if(isset($row['name'])) { $this->productName = $row['name'];}
        if(isset($row['imgurl'])) { $this->productImgUrl = $row['imgurl'];}
        if(isset($row['keywords'])) { $this->productKeywords = $row['keywords'];}
        if(isset($row['description'])) { $this->productDescription = $row['description'];}
        if(isset($row['category'])) { $this->productCategory = $row['category'];}
        $this->productRow = array( "Id" => $this->productId,
                                   "Title" => $this->productTitle,
                                   "Name" => $this->productName, 
                                   "ImgUrl" => $this->productImgUrl,
                                   "Keywords" => $this->productKeywords,
                                   "Description" => $this->productDescription, 
                                   "Category" => $this->productCategory);
        return $this->productRow;
    }
    
    public function update($productArray) {
        $db = Db::getInstance();
        //For setting uploads directory
        $path = 'uploads';
        if ( !is_dir($path)) {
            mkdir($path);
        }
        //Writes the photo to the server
        if(!file_exists($productArray["Target"]))
        {  
            if(move_uploaded_file($productArray["TmpName"], $productArray["Target"])) { 
                file_put_contents("log.txt", "photoModel -> in if move uploaded file".PHP_EOL, FILE_APPEND);
                $query = sprintf("UPDATE products SET title='%s', name='%s', imgurl='%s', keywords='%s', description='%s', category='%s' WHERE id='%s'",
                                mysql_real_escape_string($productArray['Title']),
                                mysql_real_escape_string($productArray['Name']),
                                mysql_real_escape_string($productArray['ImgUrl']),
                                mysql_real_escape_string($productArray['Keywords']),
                                mysql_real_escape_string($productArray['Description']),
                                mysql_real_escape_string($productArray['Category']),
                                mysql_real_escape_string($productArray['Id']));
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
            file_put_contents("log.txt", "elseeeeeeeeeeeeeeeeeeeeeeeeeeeeeee".PHP_EOL, FILE_APPEND);
            $query = sprintf("UPDATE products SET title='%s', name='%s', imgurl='%s', keywords='%s', description='%s', category='%s' WHERE id='%s'",
                                mysql_real_escape_string($productArray['Title']),
                                mysql_real_escape_string($productArray['Name']),
                                mysql_real_escape_string($productArray['ImgUrl']),
                                mysql_real_escape_string($productArray['Keywords']),
                                mysql_real_escape_string($productArray['Description']),
                                mysql_real_escape_string($productArray['Category']),
                                mysql_real_escape_string($productArray['Id']));

            //Writes the information to the database
            $this->req = $db->prepare($query);
            $this->req->execute();
            //mysql_query($query) or die(mysql_error());     
        }
    }
    
    public function delete($id) {
        // Connects to your Database
        $db = Db::getInstance();
        $product = $this->getProduct($id);
        //Writes the information to the database
        $query = sprintf("DELETE FROM products WHERE id='%s'", $id);
        $req = $db->prepare($query);
        $req->execute();
        
        $path = "uploads/";
        $file = $path.$product['ImgUrl'];
        if (file_exists($file)) {
            unlink($file);
        } 
    }
    
    public function add($productArray) {
        // Connects to your Database
        //Writes the information to the database
        $db = Db::getInstance();
        $this->query = "INSERT INTO products (title,name,imgurl,keywords,description,category)".
                        "VALUES ('".$productArray['Title']."', '".$productArray['Name']."', '".$productArray['ImgUrl']."', '".$productArray['Keywords']."', '".$productArray['Description']."', '".$productArray['Category']."')" or die(file_put_contents("log.txt", "in mysql query".mysql_error().PHP_EOL, FILE_APPEND));
        $this->req = $db->prepare($this->query);
        $this->req->execute();
        //Writes the photo to the server
        if(move_uploaded_file($productArray['TmpName'], $productArray['Target']))
        {
            echo "The file ". basename( $productArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";
        }
        else {
            //Gives and error if its not
            echo "Sorry, there was a problem uploading your file.";
        }
    }
    
}