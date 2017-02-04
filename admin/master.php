
<?php
session_start();
error_reporting(1);
include 'fungsi/fungsi_indotgl.php';
include 'fungsi/class_paging.php';
include '../koneksi.php';


if (empty($_SESSION[username]) AND empty($_SESSION[password])){
    echo "<center>Untuk mengakses Halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else{
    if(time()<$_SESSION['timeout'])
    {
    
?>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Pemilu</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/sb-admin.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
   
    
    <body>
        <div class="modal fade" id="gantipass">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div  class="form-horizontal">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <div class="modal-title">
                                <h4>Ganti Password</h4>

                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="lama" class="col-sm-4 control-label">Password Lama</label>
                                <div class="col-sm-4">
                                    <input type="password" name="pass_lama" id="pass_lama" class="form-control" onmouseout="cekpasslama()">
                                </div> 
                                <div class="col-sm-4" id="validasi">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lama" class="col-sm-4 control-label">Password Baru</label>
                                <div class="col-sm-4">
                                    <input type="password" name="pass_baru" class="form-control" id="pass_baru" onmouseout="konfirmasi()">
                                </div>
                                <div class="col-sm-4" id="validasi3">
                                    
                                </div>
                                
                            </div>
                            <div class="form-group">
                                 <label for="lama" class="col-sm-4 control-label">Konfirmasi Pass Baru</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control"  id="konpassbaru" onmouseout="konfirmasi()">
                                </div>
                                <div class="col-sm-4" id="validasi2">
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" onclick="kosongkan()"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                            <button class="btn btn-primary" onclick="gantipass()"><i class="glyphicon glyphicon-ok"></i> Ganti</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="master.php">Menu Admin</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Akun Saya <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#gantipass" data-toggle="modal"><i class="fa fa-fw fa-gear"></i> Password</a>
                                
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="<?php if($_GET['module']=='home'){echo'active';} ?>" >
                            <a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                        <li class="<?php if($_GET['module']=='user'){echo'active';} ?>">
                            <a href="?module=user"><i class="glyphicon glyphicon-user"></i> Kelola User</a>
                        </li>
                        <li class="<?php if($_GET['module']=='calon'){echo'active';} ?>">
                            <a href="?module=calon"><i class="glyphicon glyphicon-list"></i> Kelola Calon</a>
                        </li>
                        <li class="<?php if($_GET['module']=='pemilih'){echo'active';} ?>">
                            <a href="?module=pemilih"><i class="glyphicon glyphicon-book"></i> Kelola Pemilih </a>
                        </li>
                        <li class="<?php if($_GET['module']=='pertanyaan'){echo'active';} ?>">
                            <a href="?module=pertanyaan"><i class="glyphicon glyphicon-question-sign"></i> Kelola Pertanyaan </a>
                        </li>
                        <li class="<?php if($_GET['module']=='hasil'){echo'active';} ?>">
                            <a href="?module=hasil&sub=all"><i class="glyphicon glyphicon-new-window"></i> Hasil Pemilu</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">

                <?php include "konten.php"; ?>

                </div>
            </div>
        </div>
        <script src="../js/jquery.1.11.3.min.js"></script>
        <script src="../js/skrip.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
    }
    else
    {
        session_destroy();
        echo" Sesi anda sudah habis, Silahkan <a href='../index.php'>Login</a> kembali";

    }
}
