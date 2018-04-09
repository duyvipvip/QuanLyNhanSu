<!-- dùng để tao đối tượng model, view, template -->
<?php
    class controller{
        protected     $_model;
        protected     $_view;
        protected     $_arrPrams;   // chứa mảng params
        protected     $_template;

        // GET VIEW
        public function getView()
        {
            return $this->_view;
        }
       

        public function __construct($arrPrams)
        {

            $this->setParams($arrPrams);
            $this->creatModel($this->_arrPrams['module'], $this->_arrPrams['controller']);
            $this->creatView( $this->_arrPrams['module'], $arrPrams);
            $this->creatTemplate($this);
        }

        // TẠO MODEL
        public function creatModel($moduleName , $modelName){
            $modelName = $modelName . 'Model';
            
            // /Applications/XAMPP/xamppfiles/htdocs/quanlynhansu/application/module/admin/models/nhanvienModel.php
            $file = MODULE_PATH . $moduleName . DS . 'models' . DS . $modelName .'.php';
            if(file_exists($file)){
                require_once $file;
                $this->_model = new $modelName();
            }
        }

        // TAO ĐỐI TƯỢNG VIEW
        public function creatView($moduleName, $arrPrams){
            $this->_view = new view($moduleName, $arrPrams);
        }

        // //SET PARAMS
        public function setParams($arr){
            $this->_arrPrams = $arr;
        }

        public function creatTemplate($controller){
            $this->_template = new template($controller);
        }
    }
?>