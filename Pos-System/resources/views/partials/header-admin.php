<?php

use Core\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos - System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<body class="admin-view">

    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="bi bi-house-fill mr-2"></i>Pos - System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-fill w-100 justify-content-end" >
                <li class="nav-item ">
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle profile-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="./resources/views/uploads/<?php echo $_SESSION['img']  ?>" style="width: 50px;height: 50px; border-radius: 30px;" alt="">
                </button>
                <ul class="dropdown-menu">
                <li class="nav-item "><a class="nav-link" href="/" style="color:black ;"><?php
                echo $_SESSION['user']['username'];
                ?></a></li>

                <li class="nav-item "><a class="nav-link" href="/users/Profile?id=<?= $_SESSION['user']['id'] ?>" style="color: black;">Profile</a></li>
                <li class="nav-item "><a class="nav-link" href="/logout" style="color: red;">Logout</a></li>
                </ul>
            </div>
                    </li>
                    
                </ul>
             
            </div>
        </div>
    </nav>

    <div id="admin-area" class="row">
        <div class="col-2 admin-links">
            <ul class="list-group list-group-flush mt-3">
            <?php if (Helper::check_permission(['item:read'])) : ?>
            <li class="list-group-item">
                        <a href="/items"><i class="bi bi-basket" style="display: inline; padding-right: 3px;font-size:20px"></i><h4 style ="display: inline;font-size:18px;">All Items</h4></i></a>
                    </li>

                    <?php endif;

                if (Helper::check_permission(['item:create'])) :

                ?>
                    <li class="list-group-item">
                        <a href="/items/create"><i class="bi bi-basket3" style="display: inline; padding-right: 3px;font-size:20px"></i><h4 style ="display: inline;font-size:18px;">Create Items</h4></a>
                    </li>
                    <?php endif;

                if (Helper::check_permission(['transaction:read'])) :

                ?>
                    <li class="list-group-item">
                        <a href="/AllTransactions"><i class="bi bi-cart-plus-fill" style="display: inline; padding-right: 3px;font-size:20px"></i><h4 style ="display: inline;font-size:18px;">Transaction</h4></a>
                    </li>
                    <?php endif;

                if (Helper::check_permission(['transaction:create'])) :

                ?>
                    <li class="list-group-item">
                        <a href="/transactions"><i class="bi bi-bag-plus" style="display: inline; padding-right: 3px;font-size:20px"></i><h4 style ="display: inline;font-size:18px;">Create Transaction</h4></a>
                    </li>
                    <?php endif;

              

                if (Helper::check_permission(['user:read'])) :

                ?>
                    <li class="list-group-item">
                        <a href="/users"><span class="material-symbols-outlined">person</span><h4 style ="display: inline;font-size:18px;">All Users</h4></a>
                    </li>
                    <?php endif;

                if (Helper::check_permission(['user:create'])) :

                ?>
               
                    <li class="list-group-item">
                        <a href="/users/create"><span class="material-symbols-outlined">person_add</span><h4 style ="display: inline;font-size:18px;">Create User</h4></a>
                    </li>
                    <?php endif?>
            
            </ul>
        </div>
        <div class="col-10 admin-area-content">
            <div class="container my-5">