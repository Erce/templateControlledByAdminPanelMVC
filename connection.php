<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        try {
            if (!isset(self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO('mysql:host=localhost;dbname=users', 'root', '', $pdo_options);
            }
            return self::$instance;
        } catch (Exception $exc) {
            file_put_contents("log.txt", "connection.php->function getInstance->".$exc->getTraceAsString().PHP_EOL, FILE_APPEND);
        }
    }
  }
?>