<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title><?=$title?></title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <?php include('styles.php'); ?>
</head>
<body class="<?=$body_class?>">
  <div class="wrapper">
    <?php include('navigation.php'); ?>
    <?php include('header.php'); ?>

    <div class="row">
      <div class="column grid_12">
        <div id="contents">
          <?= $contents ?>
        </div>
      </div><!-- column grid_12 -->
    </div><!-- row -->

    <?php include('footer.php'); ?>
    <?php include('scripts.php'); ?>
  </div><!-- wrapper -->
</body>
</html>

