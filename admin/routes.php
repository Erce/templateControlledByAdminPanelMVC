
    <?php
        require_once 'Model/loggerModel.php';
        $logger = new Logger();
        
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
                $this->logger->setMessage("routes->call()");
            }
        }

        try {
            // we're adding an entry for the new controller and its actions
            $controllers = array('pages' => ['home',
                                            'settings',
                                            'applications',
                                            'statistics',
                                            'slider',
                                            'products',
                                            'references',
                                            'announcements',
                                            'error']);

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
            $this->logger->setMessage("routes->()");
        }

    ?>