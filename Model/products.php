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
            $this->productRow = array($row['id'], $row['title'], $row['name'], $row['imgurl'], $row['keywords'], $row['description'], $row['category']);
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
        array_push($this->productList, $this->productRow);
        return $this->productList;
    }
    
}