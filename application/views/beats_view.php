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
      <img src="<?php echo base_url() . str_replace('mp3','png',$value['file']);?>"/>
      <div id='mediaspace<?=$item?>'>This text will be replaced</div>

      <script type='text/javascript'>
        jwplayer('mediaspace<?=$item?>').setup({
          'flashplayer': '<?=base_url()?>assets/swf/player.swf',
          'file': '<?php echo base_url() . $value['file'];?>',
          'controlbar': 'bottom',
          'width': '500',
          'height': '24'
        });
      </script>

    </div>


  </div>
  <?php endforeach; ?>
  </div>
  </div> <!-- tabs-1 -->
</div> <!-- tabs -->
