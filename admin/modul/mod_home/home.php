
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-home"></i> Home 
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                 <a href="master.php?module=home">Home</a>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
            	<?php
				$tanggal = date('Y-m-d');
				$tanggalFinal = tgl_indo($tanggal);
				$time = date('h:i:s');
				?>
                <h3 class="panel-title" align="right"><i class="glyphicon glyphicon-calendar"></i> <?php echo "<font face='tahoma' size='2'>$tanggalFinal | $time</font>"; ?></h3>
            </div>
            <div class="panel-body">
            	<div class="well">
                    <div class="alert alert-info">
            		<?php if($_SESSION['level']=='Super')
                    {
                        echo "Selamat Datang Petugas Pemilu <strong>".$_SESSION['username']. "</strong> Selamat bertugas !!";
                    }
                    else
                    {
                       echo "Selamat Datang Pemantau <strong>".$_SESSION['username']."</strong> Silahkan untuk melihat data"; 
                    }
                    ?>	
                    </div>	
            	</div>
                <div class="col-sm-12">
                <?php
                $jcalon=mysql_num_rows(mysql_query("SELECT *from calon"));
                $jpemilih=mysql_num_rows(mysql_query("SELECT *from pemilih"));
                $jbelum=mysql_num_rows(mysql_query("SELECT *from pemilih where status_milih='belum'"));
                $jsudah=mysql_num_rows(mysql_query("SELECT *from pemilih where status_milih='sudah'"));
                $jpertanyaan=mysql_num_rows(mysql_query("SELECT *from pertanyaan"));
                $pbelum=mysql_num_rows(mysql_query("SELECT *from pertanyaan where status='belum'"));
                $psudah=mysql_num_rows(mysql_query("SELECT *from pertanyaan where status='sudah'"));

                ?> 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Update Terbaru Saat ini
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-stripped ">
                                <tr>
                                    <td width="200px">Jumlah Calon</td><td width="10px">:</td><td><?php echo $jcalon." Pasangan" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Pemilih</td><td width="10px">:</td><td><?php echo $jpemilih." Orang" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Belum Memilih</td><td width="10px">:</td><td><?php echo $jbelum." Orang" ?></td>
                                </tr>
                                 <tr>
                                    <td width="200px">Jumlah Sudah Memilih</td><td width="10px">:</td><td><?php echo $jsudah." Orang" ?></td>
                                </tr>
                                 <tr>
                                    <td width="200px">Jumlah Pertanyaan Masuk</td><td width="10px">:</td><td><?php echo $jpertanyaan." Pertanyaan" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Pertanyaan Belum dijawab</td><td width="10px">:</td><td><?php echo $pbelum." Pertanyaan" ?></td>
                                </tr>
                                <tr>
                                    <td width="200px">Jumlah Pertanyaan Sudah dijawab</td><td width="10px">:</td><td><?php echo $psudah." Pertanyaan" ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="panel-footer">
            	<center>Created Wahyu Budiman<br> All rights reserved.</center>
            </div>
        </div>
    </div>
</div>
