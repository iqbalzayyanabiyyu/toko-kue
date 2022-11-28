<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Style: Start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>" type="text/css">    
    <link rel="icon" type="image/png" sizes="32x32" href=<?= base_url('assets/img/favicon-32x32.png'); ?> >
    <!-- Style: End -->

</head>
<body>

<!-- Navbar: Start -->
<nav class="navbar navbar-expand-lg">

  <div class="container d-flex align-items-center justify-content-between">
    <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>"> 
      <img src="<?= base_url('assets/img/logo_shop.jpg'); ?>" width="75" alt="">
      <h1>Co`Cake</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse c-navbar" id="navbarNav" data-toggle="collapse" data-target=".navbar-collapse" >
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/about'); ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pages/about'); ?>">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/registration'); ?>">Sign up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth'); ?>">
            <i class="fas fa-lg fa-shopping-bag"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
  
</nav>
<!-- Navbar: End -->