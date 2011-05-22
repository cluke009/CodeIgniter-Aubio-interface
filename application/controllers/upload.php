<?php

class Upload extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper(array('form', 'url'));
  }

  function index(){
    $this->load->view('upload_form', array('error' => ' ' ));
  }

  function do_upload() {
    $config['upload_path'] = './uploads/beats';
    $config['allowed_types'] = 'wav';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile')) {
      $ui_dialog = '<div id="dialog" title="Error"><p class="ui-state-error">';
      $mime = 'You tried to upload a file with the mime-type "<em>' . $_FILES['userfile']['type'] .'</em>"<br /><br />';
      $error = array('error' => $this->upload->display_errors($ui_dialog . $mime, '</p></div>'));
      $this->load->view('upload_form', $error);
    }
    else {
      $data = array(
        'upload_data' => $this->upload->data(),
        'aubio' => array(
            //Sliders
            'threshold'   => set_value('threshold'),
            'dcthreshold' => set_value('dcthreshold'),
            'silence'     => set_value('silence'),
            'mintol'      => set_value('mintol'),
            'delay'       => set_value('delay'),
            'zerocross'   => set_value('zerocross'),
            'bufsize'     => set_value('bufsize'),
            'hopsize'     => set_value('hopsize'),

            //Radios
            'mode'        => set_value('mode'),
            'beat'        => set_value('beat'),
            'derivate'    => set_value('derivate'),
            'silencecut'  => set_value('silencecut'),
        ),
      );

      // File path info
      $file_path = $data['upload_data']['file_path'];
      $full_path = $data['upload_data']['full_path'];
      $file_name = $data['upload_data']['raw_name'];
      $cut_path  = $file_path . '/' . $file_name;

      // Date info
      $this->load->helper('date');
      $now    = time();
      $human  = unix_to_human($now);
      $unix   = human_to_unix($human);

      // Aubiocut setting
      $absettings = array(
        'abrequired'  => ' -i ' . $full_path . ' -c -L -p -O ../' . $file_name . $unix . '.png',
        'threshold'   => ' -t ' . $data['aubio']['threshold'],
        'dcthreshold' => ' -C ' . $data['aubio']['dcthreshold'],
        'silence'     => ' -s ' . $data['aubio']['silence'],
        'mintol'      => ' -M ' . $data['aubio']['mintol'],
        // Can't figure out default delay value so we hide this for now
        //'delay'       => ' -D ' . $data['aubio']['delay'],
        'zerocross'   => ' -z ' . $data['aubio']['zerocross'],
        'bufsize'     => ' -B ' . $data['aubio']['bufsize'],
        'hopsize'     => ' -H ' . $data['aubio']['hopsize'],
        'mode'        => ' -m ' . $data['aubio']['mode'],
        'beat'        => ' ' . $data['aubio']['beat'],
        'derivate'    => ' ' . $data['aubio']['derivate'],
        'silencecut'  => ' ' . $data['aubio']['silencecut'],
      );
      $absettings = str_replace(',', '', implode(',', $absettings));

      // Slice audio
      mkdir($cut_path);
      chmod($cut_path, 0777);
      exec('cd ' . $cut_path . ' && aubiocut' . escapeshellcmd($absettings) );
      exec('cd ' . $file_path . ' && zip -r ' . $file_name . '-' . $unix . '.zip ' . $file_name);

      // Make paths accessible to view
      $data['upload_data']['zip_path'] = './uploads/beats/' . $file_name . '-' . $unix . '.zip';
      $data['upload_data']['plot_path'] = '/ci/uploads/beats/' . $file_name . $unix . '.png';

      $myvardelete = substr($absettings, 0, (stripos($absettings, $file_name)));
      $absettings = str_replace($myvardelete, '', $absettings);
      $data['aubio']['settings'] = 'aubiocut -i ' . $absettings;

      // Clean up after ourselves
      unlink($full_path);
      //http://php.net/manual/en/function.rmdir.php
      function rrmdir($dir) {
       if (is_dir($dir)) {
         $objects = scandir($dir);
         foreach ($objects as $object) {
           if ($object != "." && $object != "..") {
             if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
           }
         }
         reset($objects);
         rmdir($dir);
       }
      }

      rrmdir($cut_path);

      // Success !!!
      $this->load->view('upload_success', $data);
    }
  }

}
?>

