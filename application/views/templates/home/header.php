<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- css link file  -->
    <link rel="stylesheet" href="<?= base_url('assets/_ref/style.css');?>">
    <!-- bootstrap link  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- logo,font,icon link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- logo icon link -->
    <link rel="icon" type="image/png" sizes="32x32" href=<?= base_url('assets/_ref/img/logo1.png'); ?> >
    <!-- js respon -->
    <script>
        function respon()
        {
            alert("Terimakasih atas Saran dan Komentar Anda :D.")
        }
    </script>
</head>

<body>

    <!-- header start here  -->
    <header class="header">
        <div class="logoContent">
            <a href="<?= base_url(); ?>" class="logo"><img src="<?= base_url('assets/_ref/img/logo1.png'); ?>"></a>
            <h1 class="logoName">Co&Cake</h1>
        </div>

        <div class="icon">
            <i class="fas fa-bars" id="menu-bar"></i>
        </div>

        <nav class="navbar">
            <!-- <a href="#home">Home</a> -->
            <a href="<?= base_url('pages/about'); ?>">Story</a>
            <a href="<?= base_url('#product'); ?>">Products</a>
            <a href="<?= base_url('#review'); ?>">Reviews</a>
            <a href="<?= base_url('pages/contact'); ?>">ContactUs</a>
            <!-- <a href="<?= base_url('auth'); ?>">Login</a> -->
            <a class="nav-link" href="<?= base_url('auth/registration'); ?>">Shop
                <i class="fas fa-lg fa-shopping-bag"></i>
            </a>
        </nav>
    </header>
    <!-- header section end here  -->