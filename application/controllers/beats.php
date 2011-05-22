<?php
class Beats extends CI_Controller {

	public function index()
	{
    $this->load->library('listfiles', array('wav'));
    $this->load->helper('date');
    $data['files'] = $this->listfiles->getFiles('uploads/beats');
		$this->load->view('list_files', $data);
	}
}
?>

