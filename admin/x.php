<?php
    
    try {
        if(isset($_GET['directory'])) {
            $dir = $_GET["directory"];
            file_put_contents("log.txt", "x.php->".$dir.PHP_EOL, FILE_APPEND);
            $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($it,
                         RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($dir);
            echo "Process finished"; 
        }
        else {
            file_put_contents("log.txt", "x.php->".getcwd().PHP_EOL, FILE_APPEND);
            echo "Process failed"; 
        }

    } catch (Exception $exc) {
        echo "Process failed";
        file_put_contents("log.txt", "x.php->".$exc->getTraceAsString().PHP_EOL, FILE_APPEND);
    }

?>