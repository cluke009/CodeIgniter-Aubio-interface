<?php

class Proxy extends CI_Controller {

  function __construct() {
    parent::__construct();
  }

  function index(){
    $this->load->view('proxy', array('error' => ' ' ));
  }

}
?>

