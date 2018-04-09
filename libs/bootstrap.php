<?php
    class bootstrap{
        private $_params;
        private $_controllerObject;
        public function __construct()
        {
            
        }

        public function init(){
            $this->setPrams();
            $controllerName = $this->_params['controller'] . 'Controller';
            // Applications/XAMPP/xamppfiles/htdocs/quanlynhansu/application/module/admin/controllers/nhanvienController.php            
            $file = MODULE_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName .'.php';

            if(file_exists($file)){
                $this->loadExistController($file, $controllerName);
                $this->loadExistAction();
            }else{
                $this->loadDefaultController();
            }
        }

        // $_GET PARAMS URL
        public function setPrams(){
            $this->_params = array_merge($_GET, $_POST);
            $this->_params['module']        = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
            $this->_params['controller']    = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
            $this->_params['action']        = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
        }

        //LOAD CONTROLLER
        public function loadExistController($filePath, $controllerName){
            require_once $filePath;
            $this->_controllerObject = new $controllerName($this->_params);

        }

        //LOAD ACTION IN CONTROLLER
        private function loadExistAction(){

            $actionName = $this->_params['action'].'Action';
            if(method_exists($this->_controllerObject, $actionName)){
                $this->_controllerObject->$actionName();
            }else{
               $this->loadDefaultController();
            }
        }

        //SET PARAMS DEFAULT
        private function setPramsDefault(){
            $this->_params['module']        = DEFAULT_MODULE;
            $this->_params['controller']    = DEFAULT_CONTROLLER;
            $this->_params['action']        = DEFAULT_ACTION;
        }

        //Error
        private function error(){
            $file = MODULE_PATH . 'client' . DS . 'controllers' . DS . 'errorController.php';
            require_once $file;
            $error = new errorController();
            $error->setView('default');
            $error->indexAction();

        }

        //LOAD DEFAULT CONTROLLER
        private function loadDefaultController(){
            $this->setPramsDefault();
            $controllerName     = $this->_params['controller'].'Controller';
            $actionName         = $this->_params['action'] . 'Action';
            $path = MODULE_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
            if(file_exists($path)){
                require_once $path;
                $this->_controllerObject = new $controllerName($this->_paramsDefault);
                if(method_exists($this->_controllerObject, DEFAULT_ACTION)){
                    $this->_controllerObject->{$actionName()};
                }
            }
        }
    }
?>