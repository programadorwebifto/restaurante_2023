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
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
