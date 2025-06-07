<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Keluar</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href='image/jlab.png' rel='shortcut icon'>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" style="background-image:url(image/gudang1.jpg);
                background-size: cover;
                height: 10vh;">>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Jason WareHouse</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <BR>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Admin
                            </a>
                            <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
                            <a class="nav-link" href="logout.php">                            
                                Logout
                            </a>
                        </div>
                    </div>
                    </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Keluar</h1>
                                            
                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                 Tambah Barang Keluar
                            </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Penerima</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
										$ambilsemuadatastock  = mysqli_query($conn, "select * from keluar k, stock s where s.idbarang = k.idbarang");
										while($data=mysqli_fetch_array($ambilsemuadatastock)){
											$idk = $data['idkeluar'];
											$idb = $data['idbarang'];
											$tanggal = $data['tanggal']; 
											$namabarang = $data['namabarang'];
											$qty = $data['qty'];
											$penerima = $data['penerima'];
										
										?>
                                        <tr>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$qty;?></td>
                                            <td><?=$penerima;?></td> 
											<td>
												<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idk;?>">
													Edit
												</button>
												<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idk;?>">
													Delete
												</button>
											</td>
                                        </tr>
										
										<!-- Edit Modal -->
										<div class="modal fade" id="edit<?=$idk;?>">
											<div class="modal-dialog">
											<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Edit Barang</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<form method="post">
											<div class="modal-body">
											<input type="text" name="penerima" value="<?=$penerima;?>" class="form-control" required>
											<br>
											<input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
											<br>
											<input type="hidden" name="idb" value="<?=$idb;?>">
											<input type="hidden" name="idk" value="<?=$idk;?>">
											<button type="submit" class="btn btn-primary" name="updatebarangkeluar">Submit</button>
											</div>
											</form>

											</div>
											</div>
										</div>
										</div>
										
										
										<!-- Delete Modal -->
										<div class="modal fade" id="delete<?=$idk;?>">
											<div class="modal-dialog">
											<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Delete Barang?</h4>
												<button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<form method="post">
											<div class="modal-body">
											Apakah Anda Yakin Ingin Menghapus <?=$namabarang;?>?
											<input type="hidden" name="idb" value="<?=$idb;?>">
											<input type="hidden" name="kty" value="<?=$qty;?>">
											<input type="hidden" name="idk" value="<?=$idk;?>">

											<br>
											<br>
											<button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Delete</button>
											</div>
											</form>

											</div>
											</div>
										</div>
										
										
										<?php
										}
										?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Tambah Barang Keluar</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
        <select name="barangnya" class="form-control">
            <?php
                $ambilsemuadatanya = mysqli_query($conn, "select * from stock");
                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namabarangnya = $fetcharray['namabarang'];
                    $idbarangnya = $fetcharray['idbarang'];
            ?>

            <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>       

            <?php           
                }
            ?>
        </select>
        <br>
        <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
        <br>
        <input type="text" name="penerima" placeholder="Penerima" class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary" name="addbarangkeluar">Submit</button>
        </div>
        </form>

        <!-- Modal footer -->
        </div>
    </div>

</html>
