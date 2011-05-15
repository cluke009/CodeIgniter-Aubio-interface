<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>Upload Form</title>
  <!-- SCRIPTS -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/jquery.fileinput.min.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/swfobject.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/jwplayer.js" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/js/script.js" type="text/javascript"></script>
  <!-- STYLES -->
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/ui-lightness/jquery-ui.css" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/grid.css"/>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/fileinput.css"/>
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css"/>
</head>
<body class="upload_form">
<div class="wrapper">
<div class="row">
  <div class="column grid_12">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix header"><h1>BeatSlicer Beta</h1></div>
    <div id="tabs">
      <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix header">
        <h3>Your file was successfully uploaded!</h3>
      </div><!-- titlebar -->
      <div class="column grid_11">
        <div class="terminal">
          <strong>Do it yourself</strong>
          <input type="text" value="<?php echo $aubio['settings'] ?>" size="80" />
          <!-- <div class="description">Just punch in this code on at your terminal</div> -->
        </div>
        <div class="ui-widget-header ui-corner-all ui-helper-clearfix gnuplot">
          <img src="<?php echo $upload_data['plot_path']; ?>" />
        </div>

        <div class="column sidebar">
          <?php echo anchor($upload_data['zip_path'], 'Download Beats!', array('class' => 'button')); ?>
          <?php echo anchor('upload', 'Create a new beat', array('class' => 'button')); ?>
        </div><!-- column grid_2 -->
      </div><!-- column grid_11 -->
    </div><!-- tabs -->
  </div><!-- column grid_12 -->
  <div class="column grid_12 footer ">Made with <a href="http://codeigniter.com/">CodeIgniter</a> <a href="http://jqueryui.com/">Jquery UI</a> and <a href="http://aubio.org/aubiocut.html">Aubiocut</a></div>
  <!-- <button id="opener">Open the dialog</button> -->
</div><!-- row -->
</div><!-- wrapper -->


</body>
</html>

