<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title>Beat Slicer Beta</title>
  <?php include('header.php'); ?>
</head>
<body class="upload_form">
<div class="wrapper">
<div class="row">
  <div class="column grid_12">
    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix header"><h1>BeatSlicer Beta</h1></div>
    <?php echo $error;?>
    <?php echo form_open_multipart('upload/do_upload', array('id' => 'uploadform'));?>
      <input type="hidden" name="UPLOAD_IDENTIFIER" id="progress_key" value="" />
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Basic</a></li>
          <li><a href="#tabs-2">Advanced</a></li>
        </ul>


        <div class="upload-wrapper ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
          <input class="upload" type="file" name="userfile" size="20"/>

          <span class="progressbar" id="uploadprogressbar">0%</span>
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
  <?php include('footer.php'); ?>
</div><!-- row -->
</div><!-- wrapper -->
</body>
</html>

