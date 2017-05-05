<?php

    require_once 'Model/loggerModel.php';
    require_once 'Model/databaseModel.php';
    class Db {
      private static $instance = NULL;

      private function __construct() {}

      private function __clone() {}

      public static function getInstance() {
          try {
              if (!isset(self::$instance)) {
                  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $databaseModel = new DatabaseModel();
                  $databaseModel->setDatabaseInfo();
                  $databaseInfo = $databaseModel->getDatabaseInfo();
                  self::$instance = new PDO('mysql:host='.$databaseInfo["DatabaseIp"].';dbname='.$databaseInfo["DatabaseName"].'', $databaseInfo["Username"], $databaseInfo["Password"], $pdo_options);
              }
              return self::$instance;
          } catch (Exception $exc) {
                $logger = new Logger();
                $logger->setMessage("connection->getInstance()");
          }
      }
    }
?>