<?php
class Contact extends CI_Controller {

  public function index()
  {
    $this->template->set('title', 'Contact');
    $this->template->set('nav', 'Contact');
    $this->template->set('body_class', 'contact');
    $this->template->set('nav_list', array('Beats', 'About', 'Contact'));
    $this->template->load('template/template', 'contact_view');
  }
}
?>

