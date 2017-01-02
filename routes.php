
    <?php
        function call($controller, $action) {
            try {           
                require_once('Controller/' . $controller . 'Controller.php');

                switch($controller) {
                case 'pages':
                  $controller = new PagesController();
                break;
                case 'posts':
                  // we need the model to query the database later in the controller
                  require_once('models/post.php');
                  $controller = new PostsController();
                break;
                }

                $controller->{ $action }();   
            } catch (Exception $exc) {
                file_put_contents("log.txt", "routes.php->function call->".$exc->getTraceAsString().PHP_EOL, FILE_APPEND);
            }
        }

        try {
            // we're adding an entry for the new controller and its actions
            $controllers = array('pages' => ['home', 'about', 'references', 'contact', 'products', 'error'],
                                 'posts' => ['index', 'show']);

            if (array_key_exists($controller, $controllers)) {
              if (in_array($action, $controllers[$controller])) {
                call($controller, $action);
              } else {
                call('pages', 'error');
              }
            } else {
              call('pages', 'error');
            }
        } catch (Exception $exc) {
            file_put_contents("log.txt", "routes.php->".$exc->getTraceAsString().PHP_EOL, FILE_APPEND);
        }

    ?>