<?php

class Cron extends CI_Controller {
  if($_SERVER['SCRIPT_FILENAME'] != 'clean-uploads.php')
    exit;

  function __construct() {
    parent::__construct();
  }

  // http://snippets.dzone.com/posts/show/5004
  function clean_uploads($dir, $DeleteMe) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
      if($obj=='.' || $obj=='..') continue;
      if (!@unlink($dir.'/'.$obj)) clean_uploads($dir.'/'.$obj, true);
    }
    closedir($dh);
    if ($DeleteMe){
      @rmdir($dir);
    }
  }

  // Clean up file system
  $dir =  './uploads/beats';
  $DeleteMe = FALSE;
  clean_uploads($dir, $DeleteMe);

}
?>

