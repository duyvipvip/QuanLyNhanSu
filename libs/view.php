<?php
    class view{
        public  $_moduleName;
        public  $_arrParams;
        public  $_arrFileCss;
        public  $_arrFileJs;
        public  $_arrMetaHTTP;
        public  $_arrMetaName;
        public  $_folderImage;
        public  $_contentPage;

        public function __construct($moduleName,  $arrParams)
        {
            $this->_moduleName  = $moduleName;
            $this->_arrParams  = $arrParams;
        }

        // KÉO GIAO DIỆN VÀO
         public function render($fileInclude, $loadFul = true){
            if($loadFul == false){
                if(file_exists($this->_templatePath)){
                    require_once $this->_templatePath;
                };
            }else{
                $path = MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $fileInclude . '.php';
                if(file_exists($path)){
                    if(file_exists($this->_templatePath)){
                        $this->_contentPage = $path;
                        require_once $this->_templatePath;
                    };

                }else{
                    echo __METHOD__. ': error';
                }
            }
            

        }
    }
?>