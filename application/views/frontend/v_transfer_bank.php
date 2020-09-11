<!-- <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_6.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Choose Payment</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header> -->
	
    <style>
    .gtco-nav {
        display: none;
    }

    #gtco-footer {
        display: none;
    }
    </style>

	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Almost Done!</h2>
				</div>
			</div>
            
            <div class="row">
				<div class="col-sm-12">
					<h2 style="color: #09C6AB; text-align: center;">Silahkan Transfer Ke Bank kami sebesar Rp <?php echo $total_harga; ?></h2>
				</div>

				<div class="col-sm-12" style="text-align: center;">
					<h2>Daftar Bank Kami</h2>

					<div class="row">
                        <?php foreach ($bank_info as $key => $b) { ?>
                            <div class="col-sm-4">
                                <br />
                                <div class="form-group">
                                    <img src="<?php echo $b['image']; ?>" width="150px" height="50px" />
                                    <hr />
                                </div>
                                <strong>No Rekening</strong>: <?php echo $b['no_rekening']; ?><br />
                                <strong>Nama Rekening</strong>: <?php echo $b['nama_rekening']; ?>
                            </div>
                        <?php } ?>
                    </div>

                    <br />
					<span class="small">Catatan: <br />
                    <font color="red">*</font> Pastikan anda mentransfer ke bank kami sampai 3 digit terakhir.<br />
                    <font color="red">**</font> Apabila sudah mentransfer silahkan gunakan form konfirmasi pembayaran, agar kami bisa cepat memprosesnya (optional).</span>

					<br /><br />
                    <?php $total_qty = !empty($_SESSION['choose_bus']['pulang_']) ? $_SESSION['choose_bus']['jumlah_kursi'] * 2 : $_SESSION['choose_bus']['jumlah_kursi']; ?>

                    <input type="hidden" name="bus_total_qty" value="<?php echo $total_qty; ?>" />
                    <input type="hidden" name="total_harga" value="<?php echo $total_harga + $company_info['company_admin_charge'] + $_SESSION['unique_code']; ?>" />
					<center><a href="<?php echo base_url(); ?>" class="btn btn-primary" />Return to Merchant</a></center>
				</div>
			</div>
		</div>
		</form>
    </div>