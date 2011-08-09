<?php print_r($upload_data);?>
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
