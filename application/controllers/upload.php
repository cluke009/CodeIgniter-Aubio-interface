<?php

class Upload extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->helper(array(
      'form'
    ));
    $this->load->library(array(
      'waveform'
    ));

    // Template Config
    $this->template->set('title', 'Open Beat Slicer');
    $this->template->set('nav', '');
    $this->template->set('body_class', 'home');
    $this->template->set('nav_list', array(
      'Beats',
      'About',
      'Contact'
    ));
  }
  function index() {
    $this->template->load('template/template', 'upload_view', array(
      'error' => ' '
    ));
  }
  function do_upload() {
    $config['upload_path'] = './uploads';
    $config['allowed_types'] = 'wav';
    $config['max_size'] = '3072';
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
      $ui_dialog = '<div id="dialog" title="Error"><p class="ui-state-error">';
      $mime = 'You tried to upload a file with the mime-type "<em>' . $_FILES['userfile']['type'] . '</em>"<br /><br />';
      $error = array(
        'error' => $this->upload->display_errors($ui_dialog . $mime, '</p></div>')
      );
      $this->template->load('template/template', 'upload_view', $error);
    } else {
      $data = array(
        'upload_data' => $this->upload->data() ,
        'aubio' => array(

          //Sliders
          'threshold' => set_value('threshold') ,
          'dcthreshold' => set_value('dcthreshold') ,
          'silence' => set_value('silence') ,
          'mintol' => set_value('mintol') ,
          'delay' => set_value('delay') ,
          'zerocross' => set_value('zerocross') ,
          'bufsize' => set_value('bufsize') ,
          'hopsize' => set_value('hopsize') ,

          //Radios
          'mode' => set_value('mode') ,
          'beat' => set_value('beat') ,
          'derivate' => set_value('derivate') ,
          'silencecut' => set_value('silencecut') ,
        ) ,
      );

      // File path info
      $beat_path = $data['upload_data']['file_path'] . '/beats/';
      $mp3_path = $data['upload_data']['file_path'] . '/mp3/';
      $png_path = $data['upload_data']['file_path'] . '/png/';
      $file_path = $data['upload_data']['file_path'];
      $full_path = $data['upload_data']['full_path'];
      $file_name = $data['upload_data']['raw_name'];
      $cut_path = $file_path . $file_name;

      // Aubiocut setting
      $absettings = array(
        'abrequired' => ' -i ' . $full_path . ' -c -L -p -O ' . $file_name . '-plot.png',
        'threshold' => ' -t ' . $data['aubio']['threshold'],
        'dcthreshold' => ' -C ' . $data['aubio']['dcthreshold'],
        'silence' => ' -s ' . $data['aubio']['silence'],
        'mintol' => ' -M ' . $data['aubio']['mintol'],

        // Can't figure out default delay value so we hide this for now
        //'delay'       => ' -D ' . $data['aubio']['delay'],

        'zerocross' => ' -z ' . $data['aubio']['zerocross'],
        'bufsize' => ' -B ' . $data['aubio']['bufsize'],
        'hopsize' => ' -H ' . $data['aubio']['hopsize'],
        'mode' => ' -m ' . $data['aubio']['mode'],
        'beat' => ' ' . $data['aubio']['beat'],
        'derivate' => ' ' . $data['aubio']['derivate'],
        'silencecut' => ' ' . $data['aubio']['silencecut'],
      );
      $absettings = str_replace(',', '', implode(',', $absettings));

      // Process audio file
      mkdir($cut_path);
      chmod($cut_path, 0777);
      exec('cd ' . $cut_path . ' && aubiocut' . escapeshellcmd($absettings));
      exec('cd ' . $file_path . ' && zip -r ' . $file_name . '.zip ' . $file_name);
      exec('cd ' . $file_path . ' && lame ' . $file_name . '.wav -f -m m -b 16 --resample 16 ' . $file_name . '.mp3');
      $this->waveform->test($file_path . $file_name, $file_path);

      // Move files
      rename($cut_path . '.png', $png_path . $file_name . '.png');
      rename($cut_path . '.zip', $beat_path . $file_name . '.zip');
      rename($cut_path . '.mp3', $mp3_path . $file_name . '.mp3');
      rename($file_path . $file_name . '/' . $file_name . '-plot.png', $png_path . $file_name . '-plot.png');
      unlink($full_path);

      //http://www.php.net/manual/en/function.rmdir.php#98622
      function rrmdir($dir) {

        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {

            if ($object != "." && $object != "..") {

              if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object);
              else unlink($dir . "/" . $object);
            }
          }
          reset($objects);
          rmdir($dir);
        }
      }
      rrmdir($cut_path);

      // Make paths accessible to view
      $data['upload_data']['zip_path'] = base_url() . 'uploads/beats/' . $file_name . '.zip';
      $data['upload_data']['plot_path'] = base_url() . 'uploads/png/' . $file_name . '-plot.png';
      $myvardelete = substr($absettings, 0, (stripos($absettings, $file_name)));
      $absettings = str_replace($myvardelete, '', $absettings);
      $data['aubio']['settings'] = 'aubiocut -i ' . $absettings;

      // Success !!!
      $this->template->load('template/template', 'upload_success_view', $data);
    }
  }
}
?>
