<!DOCTYPE html>
<html>
    <head>
        <title><?= $judul ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    </head>
    <style>
      .jumbotron{
        background:url('<?= base_url("assets/bg.png") ?>')
      }
    </style>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Kereta API DAOP IV</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url()?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/konfirmasi') ?>">Konfirmasi Pembayaran</a>
      </li>
      
    </ul>
  </div>
</nav>