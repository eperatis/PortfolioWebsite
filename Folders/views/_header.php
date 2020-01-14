<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">    
    <title>AirAdmin</title>
    <link rel="stylesheet" href="<?php echo asset("css/app.css"); ?>">
</head>
<body>
    <header>
        <div class="container">
            <a class="logo" href="#">AirAdmin</a>
            <nav>
                <ul>
                    <li>
                        <a <?php echo $page == 'home' ? 'class="active"' : ''; ?> href="<?php echo url(); ?>">Kezdőlap</a>
                    </li>
                    <li>
                        <a <?php echo $page == 'utasok' ? 'class="active"' : ''; ?> href="<?php echo url('utasok'); ?>">
                            Utasok
                        </a>
                    </li>
                    <li><a <?php echo $page == 'utasok' ? 'class="active"' : ''; ?> href="<?php echo url('login'); ?>">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">