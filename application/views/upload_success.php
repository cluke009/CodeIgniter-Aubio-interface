<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title>Beat Slicer Beta</title>
  <?php include('header.php'); ?>
</head>
<body class="upload_success">
<div class="wrapper">
<div class="row">
  <div class="column grid_12">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix header"><h1>BeatSlicer Beta</h1></div>
    <div id="tabs">
      <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix header">
        <h3>Your file was successfully uploaded!</h3>
      </div><!-- titlebar -->
      <div class="column grid_11 response">
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
  <?php include('footer.php'); ?>
</div><!-- row -->
</div><!-- wrapper -->
</body>
</html>

