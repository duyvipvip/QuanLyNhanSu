<?php 
class template{
    private $_controllerObject;
    private $_fileTemplate;
    private $_folderTemplate;
    private $_configTemplate;

    public function __construct($controller)
    {

        $this->_controllerObject = $controller;

    }

    public function load(){

        $fileConfig         = $this->getConfigTemplate();
        $fileTemplate       = $this->getFileTemplate();
        $folderTemplate     = $this->getFolderTemplate();

        // Applications/XAMPP/xamppfiles/htdocs/quanlynhansu/public/template/admin/main/template.ini
        $pathFileConfig = TEMPLATE_PATH . $folderTemplate . $fileConfig;
        
        if(file_exists($pathFileConfig)){

            $arrConfig = parse_ini_file($pathFileConfig);
            $view = $this->_controllerObject->getView();

            $view->_arrFileCss = $this->css($arrConfig['dirCss'], $arrConfig['fileCss'], "css");
            $view->_arrFileJs  = $this->css($arrConfig['dirJs'], $arrConfig['fileJs'], "js");

            $view->_arrMetaHTTP = $this->createMeta($arrConfig["metaHTTP"], "http-equiv");
            $view->_arrMetaName = $this->createMeta($arrConfig["metaName"], "name");

            $view->_folderImage = TEMPLATE_URL . $this->_folderTemplate . "assets/images" . DS;

        }
        // ĐƯỜNG DẪN ĐẾN FILE TEMPLATE
        $view->_templatePath = TEMPLATE_PATH . $folderTemplate . $fileTemplate;
    }

    // SET FILE TEMPLATE "default: index.php"
    public function setFileTemplate($fileTemplate = "index.php"){

        $this->_fileTemplate = $fileTemplate;

    }

    // SET FOLDER TEMPLATE "default: client/main"
    public function setFolderTemplate($folderTemplate ="admin/main/"){
        
        $this->_folderTemplate = $folderTemplate;

    }

    // SET FILE CONFIG TEMPLATE "default: template.ini"
    public function setConfigTemplate($configTemplate = "template.ini"){
        
        $this->_configTemplate = $configTemplate;

    }

    public function css($dirFolder, $array, $type = "css"){

        $xhtml = "";
        $path = TEMPLATE_URL . $this->_folderTemplate . $dirFolder. DS;
        if(!empty($array)){
            foreach ($array as $item){
                if($type=="css"){
                    $xhtml .= '<link href="'.$path.$item.'" rel="stylesheet">';
                }else if($type ==  "js"){

                    $xhtml .=  '<script src="'.$path.$item.'"></script>';
                }

            }
            return $xhtml;
        }

    }

    //CREATE META example:meta name,content
    public function createMeta($arrMeta, $name){

        $xhtml ='';
        if(!empty($arrMeta)){
            foreach ($arrMeta as $meta){
                $temp = explode('|', $meta);
                $xhtml .= '<meta '.$name.'="'.$temp[0].'" content="'.$temp[1].'" />';
            }
        }
        return $xhtml;

    }
    public function getFileTemplate(){ return $this->_fileTemplate; }

    public function getFolderTemplate(){ return $this->_folderTemplate; }

    public function getConfigTemplate(){ return $this->_configTemplate; }
}
?>