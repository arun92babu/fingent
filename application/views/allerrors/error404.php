<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
<!--   <link rel="shortcut icon" href="images/favicon.png" type="image/png">
 -->
  <title>Wallet|PAGE NOT FOUND</title>

  <link href="<?=base_url()?>assets/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="notfound" onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">

<section>
  
  <div class="notfoundpanel">
    <h1>404!</h1>
    <h2>Wallet</h2>
    <h3>The page you are looking for has not been found!</h3>
    <h4>The page you are looking for might have been removed, had its name changed, or unavailable. <br />You should go back to home page:</h4>
    <a href="<?=base_url()?>" class="btn btn-success">Home</a>
  </div><!-- notfoundpanel -->
  
</section>


<script src="<?=base_url()?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/custom.js"></script>
<SCRIPT type="text/javascript">
  window.history.forward();
  function noBack() { window.history.forward(); }
</SCRIPT>
</body>
</html>
