<?php
  include 'admin/backend/conn.php';

  $alink="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <meta name="generator" content=""> -->
<title>Imports.lk</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css?v=0.4" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="css/master.css?v=10.2">
<style media="screen">
.highlight {
background-color: yellow;
}
</style>

<?php if(strpos($alink, 'results') > 0): ?>
  <style media="screen">
    @media screen and (max-width: 480px) {
      body{
        zoom:50%;
      }

}
  </style>
<?php endif; ?>

</head>
<body onload="loadBucket()">
