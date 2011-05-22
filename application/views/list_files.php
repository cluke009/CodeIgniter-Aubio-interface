<?php
// http://www.codingforums.com/archive/index.php/t-169937.html
function wavDur($file) {
  $fp = fopen($file, 'r');
  if (fread($fp,4) == "RIFF") {
    fseek($fp, 20);
    $rawheader = fread($fp, 16);
    $header = unpack('vtype/vchannels/Vsamplerate/Vbytespersec/valignment/vbits',$rawheader);

    $pos = ftell($fp);
    while (fread($fp,4) != "data" && !feof($fp)) {
      $pos++;
      fseek($fp,$pos);
    }
    $rawheader = fread($fp, 4);
    $data = unpack('Vdatasize',$rawheader);
    $sec = $data['datasize']/$header['bytespersec'];
    $minutes = intval(($sec / 60) % 60);
    $seconds = intval($sec % 60);
#    return str_pad($minutes,2,"0", STR_PAD_LEFT).":".str_pad($seconds,2,"0", STR_PAD_LEFT);
    return $seconds;
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title>Beat Slicer Beta</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<!-- SCRIPTS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.js" type="text/javascript"></script>
<script src="./assets/js/jquery.fileinput.min.js" type="text/javascript"></script>
<script src="./assets/js/swfobject.js" type="text/javascript"></script>
<script src="./assets/js/jwplayer.js" type="text/javascript"></script>
<script src="./assets/js/script.js" type="text/javascript"></script>

<!-- STYLES -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/ui-lightness/jquery-ui.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="./assets/css/grid.css"/>
<link rel="stylesheet" type="text/css" href="./assets/css/fileinput.css"/>
<link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
	<style>

	.portlet { margin: 0 1em 1em 0; }
	.portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
	.portlet-header .ui-icon { float: right; }
	.portlet-content { padding: 0.4em; }
	.ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
	.ui-sortable-placeholder * { visibility: hidden; }
	</style>
	<script>
	$(function() {


		$( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header" )
				.addClass( "ui-widget-header ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
				.end()
			.find( ".portlet-content" );

		$( ".portlet-header .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
			$( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
		});

		$( ".column" ).disableSelection();
	});
	</script>

</head>
<body class="upload_form">
<div class="wrapper">
<div class="row">

    <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix header"><h1>BeatSlicer Beta</h1></div>
      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Uploaded Beats</a></li>
        </ul>
        <div id="tabs-1">
        <div id="sortable1" class="ui-sortable">
        <?php foreach ($files as $item => $value):?>
        <?php
            if($item % 2) {
                $class = "even item-" . $item;
            }else{
              $class = "odd item-" . $item;;
            }
            $timestamp = get_file_info($value['file'], 'date');
            $timestamp = $timestamp['date'];
            $format = 'DATE_RFC822';
            $timestamp = standard_date($format, $timestamp);

        ?>
        <div class="list-row portlet <?php echo $class; ?>">
          <div class="portlet-header"><?php echo $value['title'];?> : <?php echo $timestamp ?></div>
          <div class="portlet-content">
            <div id='mediaspace<?=$item?>'>This text will be replaced</div>

            <script type='text/javascript'>
              jwplayer('mediaspace<?=$item?>').setup({
                'flashplayer': '<?=base_url()?>assets/swf/player.swf',
                'file': '<?php echo base_url() . $value['file'];?>',
                'duration': '<?php echo wavDur($value['file']);?>',
                'controlbar': 'bottom',
                'width': '470',
                'height': '24'
              });
            </script>

          </div>


        </div>
        <?php endforeach; ?>
        </div>
        </div> <!-- tabs-1 -->
      </div> <!-- tabs -->

<div class="column grid_12 footer ">
  Made with <a href="http://codeigniter.com/">CodeIgniter</a>
  <a href="http://jqueryui.com/">Jquery UI</a> and
  <a href="http://aubio.org/aubiocut.html">Aubiocut</a>
</div>

</div><!-- row -->
</div><!-- wrapper -->
</body>
</html>

