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

	.gtco-heading {
		margin-bottom: 2em !important;
	}
    </style>

	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Pay Now</h2>
				</div>
			</div>
            
            <div class="row" style="margin-bottom: 40px;">
				<div class="col-sm-12" style="text-align: center;">
					Use your voucher coupon code to get discount! <br />
					<?php
						$err = !empty($_SESSION['notification_temp']) ? $_SESSION['notification_temp'] : '';
						$notif = $_SESSION['voucher_discount'];

						if ($err) {
							echo '<font color="red">'.$err.'</font>';
							unset($_SESSION['notification_temp']);
						}

						else if ($notif) {
							echo '<font color="#09C6AB">You re voucher:'.$notif.' has successfully applied!</font>';
						}
					?>
					<form method="post" action="<?php echo base_url(); ?>index.php/travel/apply_coupon/"><input type="text" style="max-width: 250px; padding: 5px; margin-top: 10px;" <?php if ($_SESSION['voucher_discount']) { ?>value="<?php echo $_SESSION['voucher_discount']; ?>" <?php } ?> name="voucher_discount" placeholder="Voucher Discount"> <input type="submit" class="btn btn-primary" value="Apply" /></form>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-5">
					<form method="post" action="<?php echo base_url(); ?>index.php/travel/place_order/">
					<h2 style="color: #09C6AB;">Order Information</h2>

                    <?php if ($_SESSION['choose_bus']['pulang_']) { ?>
						<h4>Status Perjalanan: Pulang Pergi</h4>
					<?php } else { ?>
						<h4>Status Perjalanan: Hanya Pergi</h4>
					<?php } ?>
					
					<!-- TEMP SOLUTION -->
                    <?php foreach ($_SESSION['selected_bus'] as $key => $item) { ?>
						<?php if ($_SESSION['choose_bus']['pulang_']) { ?>
							<?php if ($key != 0) { ?>
								Bis: <strong><?php echo $item['bus_name']; ?></strong> (<?php echo $item['bus_brand']['bus_brand']; ?>) <br />
								Kelas: <strong><?php echo $item['bus_class']; ?></strong><br />
								Jurusan: <strong><?php echo $item['from_terminal']['nama_terminal']; ?> - <?php echo $item['to_terminal']['nama_terminal']; ?></strong> <br />
								Jadwal Berangkat: <strong><?php echo $item['jadwal_berangkat']; ?></strong><br />
								Jumlah Kursi: <strong><?php echo $_SESSION['choose_bus']['jumlah_kursi']; ?></strong>
								<h3 style="color: #09C6AB; margin-top: 10px;">Rp. <?php echo $item['harga']; ?> <span class="small">/- kursi</span></h3>
								<h3 style="text-align: right;">Rp. <?php echo $item['harga'] * $_SESSION['choose_bus']['jumlah_kursi']; ?></h3>
							<?php } ?>
						<?php } else { ?>
							Bis: <strong><?php echo $item['bus_name']; ?></strong> (<?php echo $item['bus_brand']['bus_brand']; ?>) <br />
							Kelas: <strong><?php echo $item['bus_class']; ?></strong><br />
							Jurusan: <strong><?php echo $item['from_terminal']['nama_terminal']; ?> - <?php echo $item['to_terminal']['nama_terminal']; ?></strong> <br />
							Jadwal Berangkat: <strong><?php echo $item['jadwal_berangkat']; ?></strong><br />
							Jumlah Kursi: <strong><?php echo $_SESSION['choose_bus']['jumlah_kursi']; ?></strong>
							<h3 style="color: #09C6AB; margin-top: 10px;">Rp. <?php echo $item['harga']; ?> <span class="small">/- kursi</span></h3>
							<h3 style="text-align: right;">Rp. <?php echo $item['harga'] * $_SESSION['choose_bus']['jumlah_kursi']; ?></h3>
						<?php } ?>
					<?php } ?>
				</div>

				<div class="col-sm-1" style="color: white;">. <!-- clearfix --> </div>

				<div class="col-sm-6">
				<!-- <?php var_dump($_SESSION); ?> -->

					<h2 style="color: #09C6AB;">Total Order</h2>

					<table width="100%">
                        <tr>
                            <td>Jumlah Biaya</td>
                            <td>Rp <?php echo $total_harga; ?></td>
                        </tr>

                        <tr>
                            <td>Biaya Administrasi</td>
                            <td>Rp <?php echo $company_info['company_admin_charge']; ?></td>
                        </tr>

                        <tr>
                            <td>Kode Unik</td>
                            <td>Rp <?php echo $_SESSION['unique_code']; ?></td>
                        </tr>
						
						<?php if ($notif) { ?>
						<tr>
                            <td style="color: red;">Potongan Diskon</td>
                            <td style="color: red;">- Rp <?php echo $_SESSION['voucher_discount_value']; ?></td>
                        </tr>
						<?php } ?>

                        <tr>
                            <td style="color: white;">.</td>
                            <td style="color: white;">.</td>
                        </tr>

                        <tr>
                            <td><strong>Jumlah yang harus dibayarkan</strong></td>
                            <td><strong>Rp <?php echo $total_harga + $company_info['company_admin_charge'] + $_SESSION['unique_code'] - $_SESSION['voucher_discount_value']; ?></strong></td>
                        </tr>
                    </table>

                    <br />
					<span class="small">Catatan: <br />
                    <font color="red">*</font> Apabila lokasi keberangkatan anda, berbeda dengan titik awal berangkat, silahkan untuk menghubungi customer service untuk mengkonfirmasi estimasi keberangkatan anda.<br />
                    <font color="red">**</font> Pastikan anda mentransfer ke bank kami sampai 3 digit terakhir.</span>

					<br /><br />
                    <?php $total_qty = !empty($_SESSION['choose_bus']['pulang_']) ? $_SESSION['choose_bus']['jumlah_kursi'] * 2 : $_SESSION['choose_bus']['jumlah_kursi']; ?>

                    <input type="hidden" name="bus_total_qty" value="<?php echo $total_qty; ?>" />
                    <input type="hidden" name="total_harga" value="<?php echo $total_harga + $company_info['company_admin_charge'] + $_SESSION['unique_code'] - $_SESSION['voucher_discount_value']; ?>" />
					<center><input type="submit" class="btn btn-primary" value="Place Order" /></center>
				</div>
			</div>
		</div>
		</form>
    </div>