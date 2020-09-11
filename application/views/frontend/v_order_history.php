<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(https://wallpapercave.com/wp/wp2120656.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Order History</h1>
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
					<h2>Order history, for your historical travel :)</h2>
					<p>In here, you can see your order history here.</p>
				</div>
			</div>
            
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php foreach ($order_history as $key => $value) { ?>
                            <tr>
                                <td>
                                    #<?php echo $value['id']; ?>
                                </td>
                                <td>
                                    <?php echo $value['date']; ?>
                                </td>
                                <td>
                                    Rp <?php echo $value['total_harga']; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/travel/order_history_detail?id=<?php echo $value['id']; ?>" class="btn btn-primary btn-sm">See Detail</a>
                                </td>
                            </tr>

                            <!-- Modal Update Biodata -->
                                <div class="modal fade" style="z-index: 10000;" id="update_bio_<?php echo $value['id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit your bidoata</h4>
                                            </div>
                                        
                                            <div class="modal-body">
                                                <form method="post" action="<?php echo base_url(); ?>index.php/travel/add_biodata/">
                                                    <!-- PARSING CURRENT URL -->
                                                    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
                                                    <input type="hidden" name="current_url" value="<?php echo $actual_link; ?>"	/>
                                                    <input type="hidden" name="datas[id_parent]" value="<?php echo $_SESSION['customer']['id']; ?>"	/>
                                                    <input type="hidden" name="datas[id]" value="<?php echo $value['id']; ?>"	/>
                                                        
                                                    <div class="form-group">
                                                        <input type="text" name="datas[first_name]" class="form-control" placeholder="First Name" value="<?php echo $value['s_first_name']; ?>" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" name="datas[last_name]" class="form-control" placeholder="Last Name" value="<?php echo $value['s_last_name']; ?>" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="number" name="datas[phone_number]" class="form-control" placeholder="Phone Number" value="<?php echo $value['s_phone_number']; ?>" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="number" name="datas[no_identity]" class="form-control" placeholder="Identiy Number (KTP/KK/SIM)" value="<?php echo $value['s_no_identity']; ?>" required />
                                                    </div>
                                                <!-- </form> -->
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <input type="submit" value="Update Biodata" class="btn btn-primary" /></form>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- END -->

                            <!-- Modal Delete Biodata -->
                                <div class="modal fade" style="z-index: 10000;" id="delete_bio_<?php echo $value['id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Delete</h4>
                                            </div>
                                        
                                            <div class="modal-body">
                                                Are you sure, you want to delete this data?
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/travel/delete_biodata?id=<?php echo $value['id']; ?>&current_url=<?php echo $actual_link; ?>" >Delete</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- END -->
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
    </div>