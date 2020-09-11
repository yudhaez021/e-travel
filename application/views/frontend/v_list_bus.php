<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(https://wallpapercave.com/wp/wp2120656.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<?php $pulang = !empty($_SESSION['choose_bus']['pulang_']) ? $_SESSION['choose_bus']['pulang_'] : ''; ?>
                            <?php if ($pulang) { ?>
                                <h1>From: <?php echo $_SESSION['to_name']; ?><br />To: <?php echo $_SESSION['from_name']; ?></h1>	
                            <?php } else { ?>
                                <h1>From: <?php echo $_SESSION['from_name']; ?><br />To: <?php echo $_SESSION['to_name']; ?></h1>	
                            <?php } ?>
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
					<h2>Enjoy your trip now!</h2>
					<p>List bus trip / route will be showed for you, and best price too!</p>
				</div>
			</div>
            
            <div class="row">
            <!-- <form method="post" action="<?php echo base_url(); ?>index.php/travel/tes"> -->
            <?php foreach ($route_bus as $key => $item) { ?>
                <!-- <?php var_dump($item); ?> -->
				<div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong><?php echo $item['bus_name']; ?></strong><br />
                            From Destination: <?php echo $item['from_terminal']['nama_terminal']; ?><br />
                            Last Destination: <?php echo $item['to_terminal']['nama_terminal']; ?><br /><br />

                            <a data-toggle="modal" data-target="#d-<?php echo $item['id']; ?>" href="#" type="submit" class="btn btn-default btn-block" style="max-width: 50%;">See Details</a>
                        </div>

                        <div class="col-sm-6" style="text-align: right;">
                            <h3 style="color: #09C6AB;">Rp. <?php echo $item['harga']; ?></h3> /kursi
                        </div>
                    </div>
                    
                    <hr />
                </div>

                <div id="d-<?php echo $item['id']; ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo $item['bus_name']; ?></h4>
                            </div>
                            
                            <div class="modal-body">
                                <p>Specifications: </p>
                                <ul>
                                    <li>Brand: <?php echo $item['bus_brand']['bus_brand']; ?></li>
                                    <li>Kelas: <?php echo $item['bus_class']; ?></li>
                                    <li>Titik awal berangkat: <?php echo $item['from_terminal']['nama_terminal']; ?></li>
                                    <li>Tujuan akhir: <?php echo $item['to_terminal']['nama_terminal']; ?></li>
                                    <li>Rute Bis Kota/Provinsi: <?php echo $item['rute_bus']; ?></li>
                                    <li>Rute Terminal: <?php echo $item['rute_bus_terminal']; ?></li>
                                    <li>Jadwal Berangkat: <?php echo $item['jadwal_berangkat']; ?></li>
                                    <li>Total Kursi: <?php echo $item['jumlah_kursi']; ?></li>
                                    <li>Jumlah Kursi Yang Tersedia: <?php echo $item['sisa_kursi']; ?></li>
                                </ul>
                            </div>
                            
                            <div class="modal-footer">
                                <?php if (empty($_SESSION['customer'])) { ?>
                                    <a href="#login_" data-toggle="modal" data-target="#login" class="btn btn-info">Pilih Tempat Duduk</a>
                                    <a href="#login" data-toggle="modal" data-target="#login" class="btn btn-success">Book ticket</a>
                                <?php } else { ?>
                                    <a href="#pilih_kursi" data-toggle="modal" data-target="#pilih_kursi" class="btn btn-info">Pilih Tempat Duduk</a>
                                    <?php if (!empty($_SESSION['choose_bus']['pulang'])) { ?>
                                        <a href="<?php echo base_url(); ?>index.php/travel/choose_bus_pulang?id=<?php echo $item['id']; ?>&from=<?php echo $_SESSION['choose_bus']['from']; ?>&to=<?php echo $_SESSION['choose_bus']['to']; ?>&total_kursi=<?php echo $_SESSION['choose_bus']['jumlah_kursi']; ?>&pulang=<?php echo $_SESSION['choose_bus']['pergi']; ?>" type="submit" class="btn btn-success">Book ticket</a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(); ?>index.php/travel/choose_route?id=<?php echo $item['id']; ?>&from=<?php echo $_SESSION['choose_bus']['from']; ?>&to=<?php echo $_SESSION['choose_bus']['to']; ?>&total_kursi=<?php echo $_SESSION['choose_bus']['jumlah_kursi']; ?>&pergi=<?php echo $_SESSION['choose_bus']['pergi']; ?>" type="submit" class="btn btn-success">Book ticket</a>
                                    <?php } ?>
                                <?php } ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- </form> -->

			</div>
		</div>
	</div>