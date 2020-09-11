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
					<h2>Order History #<?php echo $order_detail['id']; ?></h2>
				</div>
			</div>
            
            <!-- <div class="row" style="margin-bottom: 40px;">
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
			</div> -->

			<div class="row">
				<div class="col-sm-5">
					<h2 style="color: #09C6AB;">Order Information</h2>
					
					<!-- TEMP SOLUTION -->
                    <?php foreach ($order_detail['_bus_information'] as $key => $item) { ?>
						Bis: <strong><?php echo $item['bus_name']; ?></strong> <br />
						Kelas: <strong><?php echo $item['bus_class']; ?></strong><br />
						Jurusan: <strong><?php echo $item['titik_awal']; ?> - <?php echo $item['tujuan_akhir']; ?></strong> <br />
						Jadwal Berangkat: <strong><?php echo $item['jadwal_berangkat']; ?></strong><br />
                        Jumlah Kursi: <strong><?php echo $item['total_kursi']; ?></strong><br />
                        Status Perjalanan: <strong><?php echo $item['bus_status_perjalanan']; ?></strong>
						<h3 style="color: #09C6AB; margin-top: 10px;">Rp. <?php echo $item['bus_price']; ?> <span class="small">/- kursi</span></h3>
                        <h3 style="text-align: right;">Rp. <?php echo $item['bus_price'] * $item['total_kursi']; ?></h3>
                        <?php $harga[] = $item['bus_price'] * $item['total_kursi']; ?>
					<?php } ?>
				</div>

				<div class="col-sm-1" style="color: white;">. <!-- clearfix --> </div>

				<div class="col-sm-6">
					<h2 style="color: #09C6AB;">Total Order</h2>

					<table width="100%">
                        <tr>
                            <td>Jumlah Biaya</td>
                            <td>Rp <?php echo array_sum($harga); ?></td>
                        </tr>

                        <tr>
                            <td>Biaya Administrasi</td>
                            <td>Rp <?php echo $company_info['company_admin_charge']; ?></td>
                        </tr>

                        <tr>
                            <td>Kode Unik</td>
                            <td>Rp <?php echo $order_detail['total_harga'] - (array_sum($harga) + $company_info['company_admin_charge']); ?></td>
                        </tr>

                        <tr>
                            <td style="color: white;">.</td>
                            <td style="color: white;">.</td>
                        </tr>

                        <tr>
                            <td><strong>Jumlah yang harus dibayarkan</strong></td>
                            <td><strong>Rp <?php echo $order_detail['total_harga']; ?></strong></td>
                        </tr>

                        <tr>
                            <td><strong>Status Pembayaran</strong></td>
                            <td><strong><?php if ($order_detail['status'] == 0) { echo 'Belum dibayar'; } else { echo 'Sudah dibayar'; } ?></strong></td>
                        </tr>
                    </table>

                    <br />
					<span class="small">Catatan: <br />
                    <font color="red">*</font> Apabila lokasi keberangkatan anda, berbeda dengan titik awal berangkat, silahkan untuk menghubungi customer service untuk mengkonfirmasi estimasi keberangkatan anda.<br />
                    <font color="red">**</font> Pastikan anda mentransfer ke bank kami sampai 3 digit terakhir.</span>

					<br /><br />
				</div>
            </div>
            
            <center><a class="btn btn-primary" href="<?php echo base_url(); ?>index.php/travel/order_history/">Back to Order History</a></center>
		</div>
    </div>