<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(https://wallpapercave.com/wp/wp2120656.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Planing Trip To Anywhere in The World?</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap" style="margin-top: -75px;">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Book Your Trip</h3>
											<form action="<?php echo base_url(); ?>index.php/travel/choose_bus/" method="post">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="activities">From</label>
														<select name="data[from]" class="form-control js-select-from">
                                                            <option value="">Choose your from destination</option>

                                                            <?php foreach ($terminal_list as $t) { ?>
                                                            <option value="<?php echo $t['id']; ?>"><?php echo $t['nama_terminal']; ?></option>
                                                            <?php } ?>
														</select>
													</div>
												</div>
												<div class="row form-group">
													<div class="col-md-12">
														<label for="destination">To Destination</label>
														<select name="data[to]" class="form-control js-select-to">
                                                            <option value="">Choose your to destination</option>

                                                            <?php foreach ($terminal_list as $t) { ?>
                                                            <option value="<?php echo $t['id']; ?>"><?php echo $t['nama_terminal']; ?></option>
                                                            <?php } ?>
														</select>
													</div>
												</div>
                                                
                                                <div class="row form-group">
													<div class="col-md-12">
														<label for="date-start">Pergi</label>
														<input type="text" name="data[pergi]" id="date-end" class="form-control">
													</div>
												</div>


												<div class="row form-group pulang" style="display: none;">
													<div class="col-md-12">
														<label for="date-start">Pulang</label>
														<input type="text" name="data[pulang]" id="date-start" class="form-control">
													</div>
												</div>
												
												<div class="row form-group">
													<div class="col-md-12">
														<label for="jumlah">Jumlah Kursi</label>
														<input type="number" id="jumlah" name="data[jumlah_kursi]" class="form-control" placeholder="Ex: 2">
													</div>
												</div>

												<label for="pp">
													<input type="checkbox" id="pp" />
													&nbsp;&nbsp;Pulang Pergi?
												</label>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary btn-block" value="Submit">
													</div>
												</div>
											</form>	
										</div>

										
									</div>
								</div>
							</div>
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
					<h2>Most Popular Destination</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">

                <?php foreach ($top_6 as $item) { ?>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="<?php echo $item['image']; ?>" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="<?php echo $item['image']; ?>" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2><?php echo $item['name']; ?></h2>
							<p><?php echo $item['description']; ?></p>
							<p><span class="btn btn-primary">Book a trip</span></p>
						</div>
					</a>
				</div>
                
                <?php } ?>

			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>How It Works</h2>
					<p>Beginilah cara bekerja aplikasi ini</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>1</i>
						</span>
						<h3>Menentukan Tempat</h3>
						<p>Anda menentukan tujuan, tanggal, dan anda akan kemana.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>2</i>
						</span>
						<h3>Melakukan Pendaftaran</h3>
						<p>Setelah itu anda akan mendaftar akun di CI-Travel</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>3</i>
						</span>
						<h3>Mendapatkan Bis Dengan Mudah</h3>
						<p>Setelah 2 step tersebut, disini anda bisa mendapat tiket bis dengan mudah</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>