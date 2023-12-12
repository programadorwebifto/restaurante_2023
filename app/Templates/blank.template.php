<!DOCTYPE html>
<html lang="<?=$template['lang']?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$template['title']?></title>
  <?=\Core\Styles::show(['google_fonts','faicons','adminlte','app'])?>
  
</head>
<body class="hold-transition">
    <?= $view ?>
<?=\Core\Scripts::show(['jquery','boostrap','adminlte'])?>
<?php \Components\ToastsAlert::show();?>
</body>
</html>
