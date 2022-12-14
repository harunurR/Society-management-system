<div class="wrapper">
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class='card-box mt-4 py-0'>
					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box">
								<div class="page-title-right">
									<ol class="breadcrumb m-0">
										<li class="breadcrumb-item"><a href="javascript: void(0);">Voucher </a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>

									</ol>
								</div>
								<h4 class="page-title">Voucher Edit</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>

			<?php if ($this->session->flashdata('message')) : ?>
				<?= $this->session->flashdata('message') ?>
			<?php endif ?>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card-box table-responsive">


					<div class="row">
						<div class="col-sm-12">
							<div class="widget" style="min-height:500px;">
								<div class="widget-content padding">

									
									<?= form_open('accounts/debit_voucher_edit/' . $debit_voucher_row_edit['debit_voucher_id'], 'id="detvoucherform" name="detvoucherform"'); ?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Voucher No:</label>
												<input type="text" class="form-control" name="voucher_no" id="voucher_no" value="<?php echo $debit_voucher_row_edit["voucher_no"]; ?>" readonly>
											</div>
											<div class="col-sm-4">
												<label>Date:</label>
												<?php
												$current_date = $debit_voucher_row_edit["current_date"];
												$current_dateArr = explode("-", $current_date);
												$current_date = $current_dateArr[2] . "-" . $current_dateArr[1] . "-" . $current_dateArr[0];
												?>
												<input type="text" class="form-control" name="current_date" id="current_date" value="<?php echo $current_date; ?>" readonly>
											</div>
											<div class="col-sm-4" style="text-align:right;">
												<a href="<?php echo base_url(); ?>accounts/debit_voucher_print/<?php echo $debit_voucher_row_edit['debit_voucher_id']; ?>" class="text-muted small">
													<img width='35' border='0' style='' title='Print Debit Voucher' src='<?php echo base_url(); ?>upload/user/pdf.png'>
												</a>
											</div>
										</div>
									</div>

									<div class="form-group mt-3">
										<div class="radio ml-2 mb-2">
											<div class="radio radio-info form-check-inline">
												<input type="radio" name="pay_status" id="inlineRadio1" value="pay_to" <?php if ($debit_voucher_row_edit["pay_status"] == "pay_to") {
																															echo "checked";
																														} ?>>
												<label for="inlineRadio1"> Pay To </label>
											</div>
											<div class="radio radio-info form-check-inline">
												<input type="radio" name="pay_status" id="inlineRadio2" value="pay_by" <?php if ($debit_voucher_row_edit["pay_status"] == "pay_by") {
																															echo "checked";
																														} ?>>
												<label for="inlineRadio2"> Pay By </label>
											</div>

										</div>
										<input type="text" class="form-control" name="pay_name" id="pay_name" value="<?php echo $debit_voucher_row_edit["pay_name"]; ?>" required>
									</div>

									<div class="form-group">
										<label>Purpose: </label>
										<input type="text" class="form-control" name="purpose" id="purpose" value="<?php echo $debit_voucher_row_edit["purpose"]; ?>" required>
									</div>

									<div class="table-responsive">
										<table class="table table-bordered" id='area' cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>SN#</th>
													<th>Particulars <span style="color:red;">*</span></th>
													<th>A/C Name</th>
													<th>Debit (Tk)</th>
													<th>Credit (Tk)</th>
												</tr>
											</thead>

											<tfoot>
												<tr>
													<th style="text-align:right;" colspan="3">Total Amount Tk.</th>
													<th>
														<?php echo $debit_voucher_row_edit["debit_sum"]; ?>
													</th>
													<th>
														<?php echo $debit_voucher_row_edit["credit_sum"]; ?>
														<input type='hidden' name='debit_voucher_id' value='<?php echo $debit_voucher_row_edit['debit_voucher_id']; ?>' />
													</th>
												</tr>
											</tfoot>

											<tbody style="background:#eee;">
												<?php
												$inc = 1;
												foreach ($devoucher_bkdn_row_edit as $row2) {

												?>
													<tr>
														<td style='text-align:center;' id='increment_1'><?php echo $inc; ?></td>
														<td style='text-align:left;'>
															<input type='text' name='particulars[]' value="<?php echo $row2['particulars']; ?>" maxlength='50' style='text-align:left;border:none;' required />
														</td>

														<td style='text-align:left;'><?php echo $row2['account_code']; ?></td>

														<td style='text-align:left;'><?php echo $row2['debit']; ?></td>
														<td style='text-align:left;'><?php echo $row2['credit']; ?>
															<input type='hidden' name='bkdn_id[]' value='<?php echo $row2['devoucher_bkdn_id']; ?>' />
														</td>
													</tr>
												<?php
													$inc++;
												} ?>
											</tbody>
										</table>
									</div>
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Cheque No:</label>
												<input type="text" class="form-control" name="cheque_no" id="cheque_no" value="<?php echo $debit_voucher_row_edit["cheque_no"]; ?>">
											</div>
											<div class="col-sm-4">
												<label>Cheque Date:</label>
												<?php
												$cheque_dt = $debit_voucher_row_edit["cheque_dt"];
												if (!empty($cheque_dt)) {
													$cheque_dtArr = explode("-", $cheque_dt);
													$cheque_dt = $cheque_dtArr[1] . "/" . $cheque_dtArr[2] . "/" . $cheque_dtArr[0];
												} else {
													$cheque_dt = '';
												}
												?>
												<input type="text" class="form-control datepicker-input" name="cheque_dt" id="cheque_dt" value="<?php echo $cheque_dt; ?>" placeholder="mm/dd/yyyy">
											</div>
											<div class="col-sm-4">
												<label>Bank:</label>
												<input type="text" class="form-control" name="bank" id="bank" value="<?php echo $debit_voucher_row_edit["bank"]; ?>">
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary" onClick="return entry_validation(this.form)">Update</button>
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

<!-- Added for accounts -->
<script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
<script src="<?= base_url(); ?>assets/js/valid-functions.js"></script>

<!-- Added for accounts -->