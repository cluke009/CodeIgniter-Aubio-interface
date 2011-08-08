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
