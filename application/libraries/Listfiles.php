<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Listfiles{
    var $dir= '.';
    var $filter = false;
    var $filetype = array();
    var $files = array();

    function Listfiles($ext=false){
        log_message('debug', 'Listfiles Class Initialized.');
        $args = $ext; //func_get_args();
        $this->filter = (count($args))?true: false;
        if($this->filter){
            foreach($args as $e){
                array_push($this->filetype, $e);
            }
        }
        return($this->filetype);
    }

    function setDir($dir = false){
        $this->dir = trim($dir);
        if(is_dir($this->dir)){
            return true;
        }
        return false;
    }

    function getFiles($dir = false){
        if($this->setDir($dir)){
            $handle = @opendir($this->dir);
            if($handle){
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        if(is_file($this->dir . "/" . $file)){
                            $fileinfo = pathinfo($this->dir . "/" . $file);
                            foreach($this->filetype as $type){
                                if($type == $fileinfo['extension']){
                                    $t['file']= $this->dir . "/" . $file;
                                    list($f,$e) = explode('.', $file);
                                    $t['title']= str_replace('_',' ',ucfirst($f));
                                    array_push($this->files,$t);
                                }
                            }
                        }
                    }
                }
                closedir($handle);
                return($this->files);
            }
        } else {
            log_message('error', 'Listfiles Class -> Not a valid directory resource: ' . $this->dir);
            return (false);
        }
    }
}

