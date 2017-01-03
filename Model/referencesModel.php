<?php 

class ReferencesModel {
    private $referencesList = array();
    private $referencesRow = array();
    private $referencesId;
    private $referencesTitle;
    private $referencesName;
    private $referencesImgUrl;
    private $referencesKeywords;
    private $referencesDescription;
    private $referencesCategory;
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
    
    private function countReferences() {
        try {
            $db = Db::getInstance();
            $this->req1 = $db->prepare('
            SELECT
                COUNT(*)
            FROM
                reference
            '
            .(($this->keyword != "") ? "WHERE keywords='$this->keyword'" : "".(($this->category != "") ? "WHERE category='$this->category'" : "")));       
            $this->req1->execute();
            $this->total = $this->req1->fetch()[0];   
        } catch (Exception $exc) {
            file_put_contents("log.txt", "references model count references ".$exc.PHP_EOL, FILE_APPEND);
        }
    }

    public function setPaging($limit) {
        $this->countReferences();
        $this->limit = $limit;
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
            $this->query = "SELECT * FROM reference
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
            $this->query = "SELECT * FROM reference
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
            $this->query = "SELECT * FROM reference
                            ORDER BY 
                                id 
                            LIMIT
                                :limit
                            OFFSET
                                :offset ";
        }
    }

    public function setReferencesList() {
        $db = Db::getInstance();
        $this->setQuery();
        $this->req = $db->prepare($this->query);
        $this->req->bindParam(':limit', $this->limit, PDO::PARAM_INT);
        $this->req->bindParam(':offset', $this->offset, PDO::PARAM_INT);
        $this->req->execute();
        while($row = $this->req->fetch()) {
            if(isset($row['id'])) { $this->referencesId = $row['id'];}
            if(isset($row['title'])) { $this->referencesTitle = $row['title'];}
            if(isset($row['name'])) { $this->referencesName = $row['name'];}
            if(isset($row['imgurl'])) { $this->referencesImgUrl = $row['imgurl'];}
            if(isset($row['keywords'])) { $this->referencesKeywords = $row['keywords'];}
            if(isset($row['description'])) { $this->referencesDescription = $row['description'];}
            //if(isset($row['category'])) { $this->productCategory = $row['category'];}
            $this->referencesRow = array(  "Id" => $this->referencesId,
                                        "Title" => $this->referencesTitle,
                                        "Name" => $this->referencesName, 
                                        "ImgUrl" => $this->referencesImgUrl,
                                        "Keywords" => $this->referencesKeywords,
                                        "Description" => $this->referencesDescription); 
                                        //"Category" => $this->productCategory);
            array_push($this->referencesList, $this->referencesRow);
        }
    }

    public function getReferencesList() {
        return $this->referencesList;
    }
    
    public function getReference($id) {
        $db = Db::getInstance();
        $this->query = "SELECT * FROM reference WHERE id='".$id."'";
        $this->req = $db->prepare($this->query);
        $this->req->execute();
        $row = $this->req->fetch();
        if(isset($row['id'])) { $this->referencesId = $row['id'];}
        if(isset($row['title'])) { $this->referencesTitle = $row['title'];}
        if(isset($row['name'])) { $this->referencesName = $row['name'];}
        if(isset($row['imgurl'])) { $this->referencesImgUrl = $row['imgurl'];}
        if(isset($row['keywords'])) { $this->referencesKeywords = $row['keywords'];}
        if(isset($row['description'])) { $this->referencesDescription = $row['description'];}
        //if(isset($row['category'])) { $this->referencesCategory = $row['category'];}
        $this->referencesRow = array( "Id" => $this->referencesId,
                                   "Title" => $this->referencesTitle,
                                   "Name" => $this->referencesName, 
                                   "ImgUrl" => $this->referencesImgUrl,
                                   "Keywords" => $this->referencesKeywords,
                                   "Description" => $this->referencesDescription);
                                   //"Category" => $this->referencesCategory);
        return $this->referencesRow;
    }
    
    public function update($referencesArray) {
        $db = Db::getInstance();
        //For setting uploads directory
        $path = 'uploads';
        if ( !is_dir($path)) {
            mkdir($path);
        }
        //Writes the photo to the server
        if(!file_exists($referencesArray["Target"]))
        {  
            if(move_uploaded_file($referencesArray["TmpName"], $referencesArray["Target"])) { 
                file_put_contents("log.txt", "photoModel -> in if move uploaded file".PHP_EOL, FILE_APPEND);
                $query = sprintf("UPDATE reference SET title='%s', name='%s', imgurl='%s', keywords='%s', description='%s' WHERE id='%s'",
                                $referencesArray['Title'],
                                $referencesArray['Name'],
                                $referencesArray['ImgUrl'],
                                $referencesArray['Keywords'],
                                $referencesArray['Description'],
                                //$referencesArray['Category'],
                                $referencesArray['Id']);
                $this->req = $db->prepare($query);
                $this->req->execute();
                //mysql_query($query) or die(mysql_error());
                echo "The file ". basename( $referencesArray['Name']). " has been uploaded, and your information has been added to the directory";
            }
            else {
            //Gives and error if its not
            echo "Sorry, there was a problem uploading your file.";
            }
        }
        else {    
            file_put_contents("log.txt", "elseeeeeeeeeeeeeeeeeeeeeeeeeeeeeee".PHP_EOL, FILE_APPEND);
            $query = sprintf("UPDATE reference SET title='%s', name='%s', imgurl='%s', keywords='%s', description='%s' WHERE id='%s'",
                                $referencesArray['Title'],
                                $referencesArray['Name'],
                                $referencesArray['ImgUrl'],
                                $referencesArray['Keywords'],
                                $referencesArray['Description'],
                                $referencesArray['Id']);

            //Writes the information to the database
            $this->req = $db->prepare($query);
            $this->req->execute();
            //mysql_query($query) or die(mysql_error());     
        }
    }
    
    public function delete($id) {
        // Connects to your Database
        $db = Db::getInstance();
        $product = $this->getReference($id);
        //Writes the information to the database
        $query = sprintf("DELETE FROM reference WHERE id='%s'", $id);
        $req = $db->prepare($query);
        $req->execute();
        
        $path = "uploads/";
        $file = $path.$product['ImgUrl'];
        if (file_exists($file)) {
            unlink($file);
        } 
    }
    
    public function add($referencesArray) {
        // Connects to your Database
        //Writes the information to the database
        $db = Db::getInstance();
        $this->query = "INSERT INTO reference (title,name,imgurl,keywords,description)".
                        "VALUES ('".$referencesArray['Title']."', '".$referencesArray['Name']."', '".$referencesArray['ImgUrl']."', '".$referencesArray['Keywords']."', '".$referencesArray['Description']."')" or die(file_put_contents("log.txt", "in mysql query".mysql_error().PHP_EOL, FILE_APPEND));
        $this->req = $db->prepare($this->query);
        $this->req->execute();
        //Writes the photo to the server
        if(move_uploaded_file($referencesArray['TmpName'], $referencesArray['Target']))
        {
            echo "The file ". basename( $referencesArray['ImgUrl']). " has been uploaded, and your information has been added to the directory";
        }
        else {
            //Gives and error if its not
            echo "Sorry, there was a problem uploading your file.";
        }
    }
    
}