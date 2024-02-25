<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data User</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-karyawan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
                    
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Karyawan</button>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
                <tr>
												<th>No</th>
												<th>Bundy</th>
												<th>Nama Karyawan</th>
												
												<th>Opsi</th>
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($koneksi,"SELECT * from karyawan order by nama_karyawan, bundy");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
                                                $idb = $p['idx'];
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['bundy'] ?></td>
													<td><?php echo $p['nama_karyawan'] ?></td>
                                                    <td><button data-toggle="modal" data-target="#edit<?=$idb;?>" class="btn btn-warning">Edit</button> <button data-toggle="modal" data-target="#del<?=$idb;?>" class="btn btn-danger">Hapus</button></td>
												</tr>

                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data Karyawan <?php echo $p['bundy']?> - <?php echo $p['nama_karyawan']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            
                                                            <label for="bundy">Bundy</label>
                                                            <input type="text" id="bundy" name="bundy" class="form-control" value="<?php echo $p['bundy'] ?>">

                                                            <label for="nama_karyawan">Nama Karyawan</label>
                                                            <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" value="<?php echo $p['nama_karyawan'] ?>">
                                                            <input type="hidden" name="idbrg" value="<?=$idb;?>">

                                                            
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name="update">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>



                                                    <!-- The Modal -->
                                                    <div class="modal fade" id="del<?=$idb;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Hapus Data Karyawan <?php echo $p['bundy']?> - <?php echo $p['nama_karyawan']?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            
                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus karyawan ini dari data karyawan?
                                                            <input type="hidden" name="idbrg" value="<?=$idb;?>">
                                                            </div>
                                                            
                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>

					<?php
                                            }

              if(isset($_POST['adminbaru'])){
                $bundy = $_POST['bundy'];
                $nama_karyawan = $_POST['nama_karyawan'];
                
            $query = mysqli_query($koneksi,"insert into karyawan values('','$bundy','$nama_karyawan')");
            if ($query){
            
            echo " <div class='alert alert-success'>
            <strong>Success!</strong> Redirecting you back in 1 seconds.
            </div>
            <meta http-equiv='refresh' content='1; url= ?page=data-karyawan'/>  ";
            } else { echo "<div class='alert alert-warning'>
            <strong>Failed!</strong> Redirecting you back in 1 seconds.
            </div>
            <meta http-equiv='refresh' content='1; url= ?page=data-karyawan'/> ";
            }
            }

            if(isset($_POST['update'])){
                $idx = $_POST['idbrg'];
                $bundy = $_POST['bundy'];
                $nama_karyawan = $_POST['nama_karyawan'];
        
                $updatedata = mysqli_query($koneksi,"update karyawan set bundy='$bundy', nama_karyawan='$nama_karyawan' where idx='$idx'");
           
                //cek apakah berhasil
                if ($updatedata){
        
                    echo " <div class='alert alert-success'>
                        <strong>Success!</strong> Redirecting you back in 1 seconds.
                      </div>
                    <meta http-equiv='refresh' content='1; url= ?page=data-karyawan'/>  ";
                    } else { echo "<div class='alert alert-warning'>
                        <strong>Failed!</strong> Redirecting you back in 1 seconds.
                      </div>
                     <meta http-equiv='refresh' content='1; url= ?page=data-karyawan'/> ";
                    }
            };
            if(isset($_POST['hapus'])){
                $idx = $_POST['idbrg'];
        
                $delete = mysqli_query($koneksi,"delete from karyawan where idx='$idx'");
            };
            ?>
				</tbody>
				</tfoot>
			</table>
            <!-- modal input -->
    <div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Masukkan Data Karyawan</h4>
						</div>
						<div class="modal-body">
							<form method="post">
								<div class="form-group">
									<label>Bundy</label>
									<input name="bundy" type="text" class="form-control" placeholder="Bundy" required>
								</div>
								<div class="form-group">
									<label>Nama Karyawan</label>
									<input name="nama_karyawan" type="text" class="form-control" placeholder="Nama Karyawan" required>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input type="submit" class="btn btn-primary" value="Simpan" name="adminbaru">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.card-body -->