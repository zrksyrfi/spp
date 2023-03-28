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
    <title>Login Siswa</title>
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
        <form action="login_siswa.php" method="post">
            <div class="batas">
                <div class="card">
                    <div class="card-body login-card-body">
                        <p align="center">Login Siswa</p>
                        <div class="form-group">
                            <input type="text" name="nisn" class="form-control" placeholder="NISN">
                        </div>
                        <div class="form-group">
                            <input type="password" name="nis" class="form-control" placeholder="NIS">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="tombol" class="btn btn-primary" value="login">
                        </div>
                        <div class="log-12">
                            <hr>
                            <a href="login.php" class="btn btn-primary">Login Admin & Petugas</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>