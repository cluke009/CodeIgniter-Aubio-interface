<div class="row">
  <div class="column grid_12">
    <ul id="navigation">
      <?php foreach($nav_list  as $i => $nav_item): ?>
        <li class="<?= ($nav == $nav_item ? 'selected' : '')?>"><?= anchor(strtolower($nav_item), $nav_item) ?></li>
      <?php endforeach ?>
    </ul><!-- navigation -->
  </div><!-- column grid_12 -->
</div><!-- row -->

