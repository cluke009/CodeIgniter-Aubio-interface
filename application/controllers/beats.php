<?php
class Beats extends CI_Controller {

  public function index()
  {
    // Controller config
    $this->load->library('listfiles', array('mp3'));
    $this->load->helper('date');
    $data['files'] = $this->listfiles->getFiles('uploads/beats');

    // Template Config
    $this->template->set('title', 'Beats');
    $this->template->set('nav', 'Beats');
    $this->template->set('body_class', 'beats');
    $this->template->set('nav_list', array('Beats', 'About', 'Contact'));
    $this->template->load('template/template', 'beats_view', $data);

  }
}
?>
