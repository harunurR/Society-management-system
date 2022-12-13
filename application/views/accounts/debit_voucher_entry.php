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
										<li class="breadcrumb-item"><a href="javascript: void(0);">Entry</a></li>

									</ol>
								</div>
								<h4 class="page-title">Voucher Entry</h4>
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


					
					<?php if ($this->session->flashdata('message')) : ?>
						<?= $this->session->flashdata('message') ?>
					<?php endif ?>

					<div class="row">
						<div class="col-sm-12">
							<div class="widget" style="min-height:500px;">
								<div class="widget-content padding">
									<?= form_open('accounts/debit_voucher_list', 'id="detvoucherform" name="detvoucherform"'); ?>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Voucher No:</label>
												<input type="text" class="form-control" name="voucher_no" id="voucher_no" disabled>
											</div>
											<div class="col-sm-4">
												<label>Date:</label>
												<input type="date" class="form-control" name="current_date" id="current_date" value="" required placeholder="mm/dd/yyyy" autocomplete="off">
											</div>


										</div>
									</div>
									<style>
										
									</style>
									<div class="form-group mt-3">
										<div class="radio ml-2 mb-2">
											<div>
												
												<div class="radio radio-info form-check-inline">
													<input type="radio" name="pay_status" id="inlineRadio1" checked value="pay_to">
													<label for="inlineRadio1"> Pay To </label>
												</div>
												<div class="radio radio-info form-check-inline">
													<input type="radio" name="pay_status" id="inlineRadio2" value="pay_by">
													<label for="inlineRadio2"> Pay By </label>
												</div>
											</div>
										</div>
										<input type="text" class="form-control" name="pay_name" id="pay_name" required autocomplete="off">
									</div>
									<div class="form-group">
										<label>Purpose:</label>
										<input type="text" class="form-control" name="purpose" id="purpose" required autocomplete="off">
									</div>
									<div class="table-responsive">
										<table class="table table-bordered" id='area' cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>SN#</th>
													<th>Particulars</th>
													<th>A/C Name</th>
													<th>Debit (Tk)</th>
													<th>Credit (Tk)</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th style="text-align:right;" colspan="3">Total Amount Tk.</th>
													<th><input type='text' name='debit_sum' id='debit_sum' value='' style='text-align:center; border:none;' readonly autocomplete="off" /></th>
													<th><input type='text' name='credit_sum' id='credit_sum' value='' style='text-align:center; border:none;' readonly autocomplete="off" /></th>
												</tr>
												<tr>
													<th style="text-align:right;" colspan="5">
														<!-- <input type='button' name='add' id='add' class='add' value='Add' onClick='adddesemp();'>
														<input type='button' name='remove' id='remove' value='Remove' onClick='return removedesemp();'> -->
														<input type="button" name='add' id='add' value='Add' onClick='adddesemp();' class="add btn btn-outline-success btn-rounded waves-light waves-effect width-md">
														<input type="button" name='remove' id='remove' value='Remove' onClick='return removedesemp();' class="btn btn-outline-danger btn-rounded waves-light waves-effect width-md">
													</th>
												</tr>
											</tfoot>
											<tbody style="background:#eee;">
												<tr>
													<td style='text-align:center;' id='increment_1'>1</td>
													<td style='text-align:left;'><input type='text' name='particulars[]' id='particulars_1' value='' maxlength='50' style='text-align:left;border:none;' /></td>
													<td style='text-align:left;'>
														<div style='width:100%;position:relative;'>
															<input type='text' name='account_code[]' id='account_code_1' class='cls_account_code' value='' style='border:none;' onkeyup="check_account_code(this.value,'1');" maxlength='100' autocomplete="off" />
															<div id='account_code_suggestions_1' style='display:none;'>
																<div id='account_code_list_1' style='border:1px solid #3F3FFF;'></div>
															</div>
														</div>
														<input type='hidden' name='table_name[]' id='table_name_1' value=''>
														<input type='hidden' name='table_id[]' id='table_id_1' value=''>
													</td>
													<td style='text-align:left;'>
														<input type='text' name='debit[]' id='debit_1' class='cls_debit' value='' style='text-align:center; border:none;' maxlength='15' onkeyup='removeChar(this)' onBlur='return debit_entry(1);' autocomplete="off" />
													</td>
													<td style='text-align:left;'>
														<input type='text' name='credit[]' id='credit_1' class='cls_credit' value='' style='text-align:center; border:none;' maxlength='15' onkeyup='removeChar(this)' onBlur='return credit_entry(1);' autocomplete="off" />
														<input type='hidden' name='jobinc[]' id='jobinc_1' class='jobinc' value='1'>
														<input type='hidden' name='bkdn_id[]' value='' />
													</td>
												</tr>
												<tr>
													<td style='text-align:center;' id='increment_2'>2</td>
													<td style='text-align:left;'><input type='text' name='particulars[]' id='particulars_2' value='' maxlength='50' style='text-align:left;border:none;' /></td>
													<td style='text-align:left;'>
														<div style='width:100%;position:relative;'>
															<input type='text' name='account_code[]' id='account_code_2' class='cls_account_code' value='' style='border:none;' onkeyup="check_account_code(this.value,'2');" maxlength='100' autocomplete="off" />
															<div id='account_code_suggestions_2' style='display:none;'>
																<div id='account_code_list_2' style='border:1px solid #3F3FFF;'></div>
															</div>
														</div>
														<input type='hidden' name='table_name[]' id='table_name_2' value=''>
														<input type='hidden' name='table_id[]' id='table_id_2' value=''>
													</td>
													<td style='text-align:left;'>
														<input type='text' name='debit[]' id='debit_2' class='cls_debit' value='' style='text-align:center; border:none;' maxlength='15' onkeyup='removeChar(this)' onBlur='return debit_entry(2);' autocomplete="off" />
													</td>
													<td style='text-align:left;'>
														<input type='text' name='credit[]' id='credit_2' class='cls_credit' value='' style='text-align:center; border:none;' maxlength='15' onkeyup='removeChar(this)' onBlur='return credit_entry(2);' autocomplete="off" />
														<input type='hidden' name='jobinc[]' id='jobinc_2' class='jobinc' value='2'>
														<input type='hidden' name='bkdn_id[]' value='' />
													</td>
												</tr>

											</tbody>
										</table>
									</div>
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4">
												<label>Cheque No:</label>
												<input type="text" class="form-control" name="cheque_no" id="cheque_no" value="">
											</div>
											<div class="col-sm-4">
												<label>Cheque Date:</label>
												<input type="date" class="form-control" name="cheque_dt" id="cheque_dt" value="" placeholder="mm/dd/yyyy">
											</div>

											<div class="col-sm-4">
												<label>Bank:</label>
												<input type="text" class="form-control" name="bank" id="bank" value="">
											</div>
										</div>
									</div>
									<button type="button" class="btn btn-primary detvoucherform" onClick="return entry_validation(this.form)">Submit</button>
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
<script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
<script src="<?= base_url(); ?>assets/js/valid-functions.js"></script>

<!-- Added for accounts -->

<!-- Added for accounts -->