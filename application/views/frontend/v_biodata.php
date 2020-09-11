<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(https://wallpapercave.com/wp/wp2120656.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Fill Biodata</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Let's trip with us!</h2>
					<p>Just fill a short biodata, and... go!</p>
				</div>
			</div>
            
            <div class="row">
				<div class="col-sm-5">
					<form method="get" action="<?php echo base_url(); ?>index.php/travel/choose_payment/">
					<h2 style="color: #09C6AB;">Customer Information</h2>
					<a data-toggle="modal" data-target="#pilih_kursi" href="#" type="submit" class="btn btn-default">Show My List Biodata</a>

					<br /><br />
					<h4>Or Put New Biodata</h4>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" class="btn btn-primary" style="color: white;" data-parent="#accordion" href="#collapse1">
								Pergi</a>
							</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse in">
								<div class="panel-body">
									<?php for ($i=0; $i < $_SESSION['choose_bus']['jumlah_kursi'] ; $i++) { ?>
										<div class="content-bootstrap">
											<div class="form-group">
												<label>Nama Depan <font color="red">*</font></label>
												<input type="text" class="form-control" placeholder="Ex: Yudha" name="biodata_pergi[<?php echo $i; ?>][nama_depan]" required />
											</div>
											
											<div class="form-group">
												<label>Nama Belakang</label>
												<input type="text" class="form-control" placeholder="optional" name="biodata_pergi[<?php echo $i; ?>][nama_belakang]" required />
											</div>

											<div class="form-group">
												<label>No Handphone <font color="red">*</font></label>
												<input type="text" class="form-control" placeholder="Ex: 082246710200" name="biodata_pergi[<?php echo $i; ?>][no_handphone]" required />
											</div>

											<div class="form-group">
												<label>Nomor Identitas (KTP / Passsport / Kartu Keluarga)<font color="red">*</font></label>
												<input type="text" class="form-control" name="biodata_pergi[<?php echo $i; ?>][no_identitas]" required />
											</div>
										</div>

										<hr />
									<?php } ?>
								</div>
							</div>
						</div>
						
						<?php if ($_SESSION['choose_bus']['pulang_']) { ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" class="btn btn-primary" style="color: white;" data-parent="#accordion" href="#collapse2">Pulang</a>
								</h4>
							</div>
							
							<div id="collapse2" class="panel-collapse collapse">
								<div class="panel-body">
									<?php for ($i=0; $i < $_SESSION['choose_bus']['jumlah_kursi'] ; $i++) { ?>
										<div class="content-bootstrap">
											<div class="form-group">
												<label>Nama Depan <font color="red">*</font></label>
												<input type="text" class="form-control" placeholder="Ex: Yudha" name="biodata_pulang[<?php echo $i; ?>][nama_depan]" required />
											</div>
											
											<div class="form-group">
												<label>Nama Belakang</label>
												<input type="text" class="form-control" placeholder="optional" name="biodata_pulang[<?php echo $i; ?>][nama_belakang]" required />
											</div>

											<div class="form-group">
												<label>No Handphone <font color="red">*</font></label>
												<input type="text" class="form-control" placeholder="Ex: 082246710200" name="biodata_pulang[<?php echo $i; ?>][no_handphone]" required />
											</div>

											<div class="form-group">
												<label>Nomor Identitas (KTP / Passsport / Kartu Keluarga)<font color="red">*</font></label>
												<input type="text" class="form-control" name="biodata_pulang[<?php echo $i; ?>][no_identitas]" required />
											</div>
										</div>

										<hr />
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>

				<div class="col-sm-1" style="color: white;">. <!-- clearfix --> </div>

				<div class="col-sm-6">
				<!-- <?php var_dump($_SESSION); ?> -->

					<h2 style="color: #09C6AB;">Bus Information</h2>

					<?php if ($_SESSION['choose_bus']['pulang_']) { ?>
						<h4>Status Perjalanan: Pulang Pergi</h4>
					<?php } else { ?>
						<h4>Status Perjalanan: Hanya Pergi</h4>
					<?php } ?>
					
					<!-- TEMP SOLUTION -->
					<?php foreach ($_SESSION['selected_bus'] as $key => $item) { ?>
						<?php if ($_SESSION['choose_bus']['pulang_']) { ?>
							<?php if ($key != 0) { ?>
								<input type="hidden" name="harga[]" value="<?php echo $item['harga']; ?>" />

								<strong><?php echo $item['bus_name']; ?></strong> (<?php if ($key == 1) { echo 'Pulang'; } else { echo 'Pergi'; } ?>) <br />
								<font color="#09C6AB">Rp. <?php echo $item['harga']; ?></font> /- kursi
								<ul>
									<li>Brand: <?php echo $item['bus_brand']['bus_brand']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_status_perjalanan]" value="<?php if ($key == 1) { echo 'Pulang'; } else { echo 'Pergi'; } ?>" />
									<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_brand]" value="<?php echo $item['bus_brand']['bus_brand']; ?>" />
									
									<li>Kelas: <?php echo $item['bus_class']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_class]" value="<?php echo $item['bus_class']; ?>" />
									
									<li>Titik awal berangkat: <?php echo $item['from_terminal']['nama_terminal']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][titik_awal]" value="<?php echo $item['from_terminal']['nama_terminal']; ?>" />

									<li>Tujuan akhir: <?php echo $item['to_terminal']['nama_terminal']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][tujuan_akhir]" value="<?php echo $item['to_terminal']['nama_terminal']; ?>" />

									<li>Rute Bis Kota/Provinsi: <?php echo $item['rute_bus']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][rute_bus]" value="<?php echo $item['rute_bus']; ?>" />
									
									<li>Rute Terminal: <?php echo $item['rute_bus_terminal']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][rute_bus_terminal]" value="<?php echo $item['rute_bus_terminal']; ?>" />

									<li>Jadwal Berangkat: <?php echo $item['jadwal_berangkat']; ?></li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][jadwal_berangkat]" value="<?php echo $item['jadwal_berangkat']; ?>" />

									<li>Jumlah Kursi Yang Dipesan: <?php echo $_REQUEST['total_kursi']; ?> kursi</li>
									<input type="hidden" name="bis_data[<?php echo $key; ?>][total_kursi]" value="<?php echo $_REQUEST['total_kursi']; ?>" />

									<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_name]" value="<?php echo $item['bus_name']; ?>" />
									<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_price]" value="<?php echo $item['harga']; ?>" />
								</ul>
							<?php } ?>
						
						<?php } else { ?>
							<input type="hidden" name="harga[]" value="<?php echo $item['harga']; ?>" />

							<strong><?php echo $item['bus_name']; ?></strong> <br />
							<font color="#09C6AB">Rp. <?php echo $item['harga']; ?></font> /- kursi
							<ul>
								<li>Brand: <?php echo $item['bus_brand']['bus_brand']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_brand]" value="<?php echo $item['bus_brand']['bus_brand']; ?>" />
								
								<li>Kelas: <?php echo $item['bus_class']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_class]" value="<?php echo $item['bus_class']; ?>" />
								
								<li>Titik awal berangkat: <?php echo $item['from_terminal']['nama_terminal']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][titik_awal]" value="<?php echo $item['from_terminal']['nama_terminal']; ?>" />

								<li>Tujuan akhir: <?php echo $item['to_terminal']['nama_terminal']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][tujuan_akhir]" value="<?php echo $item['to_terminal']['nama_terminal']; ?>" />

								<li>Rute Bis Kota/Provinsi: <?php echo $item['rute_bus']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][rute_bus]" value="<?php echo $item['rute_bus']; ?>" />
								
								<li>Rute Terminal: <?php echo $item['rute_bus_terminal']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][rute_bus_terminal]" value="<?php echo $item['rute_bus_terminal']; ?>" />

								<li>Jadwal Berangkat: <?php echo $item['jadwal_berangkat']; ?></li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][jadwal_berangkat]" value="<?php echo $item['jadwal_berangkat']; ?>" />

								<li>Jumlah Kursi Yang Dipesan: <?php echo $_REQUEST['total_kursi']; ?> kursi</li>
								<input type="hidden" name="bis_data[<?php echo $key; ?>][total_kursi]" value="<?php echo $_REQUEST['total_kursi']; ?>" />

								<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_name]" value="<?php echo $item['bus_name']; ?>" />
								<input type="hidden" name="bis_data[<?php echo $key; ?>][bus_price]" value="<?php echo $item['harga']; ?>" />
							</ul>
						<?php } ?>
					<?php } ?>

					<span class="small">Catatan <font color="red">*</font> Apabila lokasi keberangkatan anda, berbeda dengan titik awal berangkat, silahkan untuk menghubungi customer service untuk mengkonfirmasi estimasi keberangkatan anda.</span>

					<br /><br />
					<center><input type="submit" class="btn btn-primary" value="Proceed to payment" /></center>
				</div>
			</div>
		</div>
		</form>
    </div>
    

    <div id="list_bio" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">My Biodata</h4>
                </div>
                            
                <div class="modal-body">
                    <p>Specifications: </p>
                </div>
                            
                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>index.php/travel/choose_route?id=<?php echo $item['id']; ?>&from=<?php echo $_SESSION['choose_bus']['from']; ?>&to=<?php echo $_SESSION['choose_bus']['to']; ?>" type="submit" class="btn btn-success">Book ticket</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>