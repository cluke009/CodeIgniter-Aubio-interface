<?php
class About extends CI_Controller {

  public function index()
  {
    $this->template->set('title', 'About');
    $this->template->set('nav', 'About');
    $this->template->set('body_class', 'about');
    $this->template->set('nav_list', array('Beats', 'About', 'Contact'));
    $this->template->load('template/template', 'about_view');
  }
}
?>

