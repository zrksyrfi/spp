<?php
@session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin & Petugas</title>
    <link href="assets/dist/css/adminlte.min.css" rel="stylesheet">
    <style>
        .batas{
            padding-top: 200px;
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="login_admpet.php" method="post">
            <div class="batas">
                <div class="card">
                    <div class="card-body login-card-body">
                        <p align="center">Login Admin & Petugas</p>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="tombol" class="btn btn-primary" value="login">
                        </div>
                        <div class="log-12">
                            <hr>
                            <a href="index.php" class="btn btn-primary">Login Siswa</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>