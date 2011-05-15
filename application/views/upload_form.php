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
  <script>
$(document).ready(function() {
    $('#file_input').fileUpload({
        'uploader': '<?=base_url()?>assets/jquery.uploadify-v2.1.4/uploader.swf',
        'script': '/svn/handinhand/admin/gallery/upload',
        'folder': '/svn/handinhand/assets/images/galleries',
        'multi': true,
        'auto': true,
        'fileExt': '*.wav',
        'buttonText': 'Browse...',
        'cancelImg': '<?=base_url()?>assets/jquery.uploadify-v2.1.4/cancel.png'
    });
});
  </script>
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
    <?php echo $error;?>
    <?php echo form_open_multipart('upload/do_upload');?>
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Basic</a></li>
          <li><a href="#tabs-2">Advanced</a></li>
        </ul>

        <div class="upload-wrapper ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
          <input class="upload" type="file" name="userfile" size="20"/>
          <input class="submit" type="submit" value="Slice that shit"/>
        </div><!-- upload-wrapper -->

        <div id="tabs-1">
        </div>
        <div id="tabs-2">
          <div class="column grid_9">
            <div class="slider-label">
              <label for="threshold">Threshold:</label>
              <input name="threshold" type="text" id="threshold" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider0"></div>

            <div class="slider-label">
              <label for="dcthreshold">DC Threshold:</label>
              <input name="dcthreshold" type="text" id="dcthreshold" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider1"></div>

            <div class="slider-label">
              <label for="silence">Silence:</label>
              <input name="silence" type="text" id="silence" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider2"></div>

            <div class="slider-label">
              <label for="mintol">Mintol:</label>
              <input name="mintol" type="text" id="mintol" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider3"></div>

            <div class="slider-label">
              <label for="delay">Delay:</label>
              <input name="delay" type="text" id="delay" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider4"></div>

            <div class="slider-label">
              <label for="zerocross">Zerocross:</label>
              <input name="zerocross" type="text" id="zerocross" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider5"></div>

            <div class="slider-label">
              <label for="bufsize">Buffer size:</label>
              <input name="bufsize" type="text" id="bufsize" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider6"></div>

            <div class="slider-label">
              <label for="hopsize">Overlap size:</label>
              <input name="hopsize" type="text" id="hopsize" style="border:0; color:#f6931f; font-weight:bold;"/>
            </div>
            <div id="slider7"></div>
          </div><!-- column grid_9 -->

          <div class="column grid_2">
            <label for="beat">Beat:</label>
            <div id="beat">
              <input type="radio" id="beatYes" name="beat" value="-b"/><label for="beatYes">Yes</label>
              <input type="radio" id="beatNo" name="beat" value="" checked="checked"/><label for="beatNo">No</label>
            </div>

            <label for="derivate">Derivate:</label>
            <div id="derivate">
              <input type="radio" id="derivateYes" name="derivate" value="-d"/><label for="derivateYes">Yes</label>
              <input type="radio" id="derivateNo" name="derivate" value="" checked="checked"/><label for="derivateNo">No</label>
            </div>

            <label for="silencecut">Silencecut:</label>
            <div id="silencecut">
              <input type="radio" id="silencecutYes" name="silencecut" value="-S"/><label for="silencecutYes">Yes</label>
              <input type="radio" id="silencecutNo" name="silencecut" value="" checked="checked"/><label for="silencecutNo">No</label>
            </div>
          </div><!-- column grid_2 -->

          <div class="column grid_11">
            <label for="mode">Mode:</label>
            <div id="mode">
              <input type="radio" id="complexdomain" name="mode" value="complexdomain"/><label for="complexdomain">complexdomain</label>
              <input type="radio" id="hfc" name="mode" value="hfc"/><label for="hfc">hfc</label>
              <input type="radio" id="phase" name="mode" value="phase"/><label for="phase">phase</label>
              <input type="radio" id="specdiff" name="mode" value="specdiff"/><label for="specdiff">specdiff</label>
              <input type="radio" id="energy" name="mode" value="energy"/><label for="energy">energy</label>
              <input type="radio" id="kl" name="mode" value="kl"/><label for="kl">kl</label>
              <input type="radio" id="mkl" name="mode" value="mkl"/><label for="mkl">mkl</label>
              <input type="radio" id="dual" name="mode" value="dual" checked="checked"/><label for="dual">dual</label>
            </div>
          </div><!-- column grid_11 -->
        </div><!-- tabs-2 -->

      </div><!-- tabs -->
    </form>
  </div><!-- column grid_12 -->
  <div class="column grid_12 footer ">Made with <a href="http://codeigniter.com/">CodeIgniter</a> <a href="http://jqueryui.com/">Jquery UI</a> and <a href="http://aubio.org/aubiocut.html">Aubiocut</a></div>
  <!-- <button id="opener">Open the dialog</button> -->
</div><!-- row -->
</div><!-- wrapper -->


</body>
</html>

