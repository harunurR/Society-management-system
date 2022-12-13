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
										<li class="breadcrumb-item"><a href="javascript: void(0);">House Owners Payment</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
										
									</ol>
								</div>
								<h4 class="page-title">Registers Subscription Fee</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- end page title -->
		<div class="row">
			<div class="col-12">
				<div class="card-box">

					<!-- Form row -->
					<div class="row">
						<div class="col-md-6 offset-md-3">
							<div class="card-box">
								

								<?= form_open('paymentadd', array('class' => 'form-horizontal', 'role' => 'form')) ?>

								<div class="form-group">
									<label for="inputAddress" class="col-form-label">Choose house owner</label>
									<select class="form-control select2 house_owner" onchange="get_data(this.value)" id="name" data-placeholder="Choose owners..." name="id_of_name">
										<option>Select</option>
										<?php if ($datas) {
											foreach ($datas as $i => $data) {
										?>
												<option value="<?= $data->id ?>"><?= $data->name ?></option>
										<?php
											}
										}
										?>
									</select>
									<?= form_error('id_of_name') ?>
								</div>
								<div class="form-group">
									<label for="inputAddress" class="col-form-label">Contact</label>
									<input type="text" class="form-control" id="contact_no" placeholder="Contact" name="contact" readonly value="<?= set_value('name', '') ?>">
									<?= form_error('contact') ?>
								</div>
								<div class="form-row">

									<div class="form-group col-md-6">
										<div>
											<label for="inputEmail44" class="col-form-label">Flat no</label>
										</div>
										<input type="text" class="form-control" id="flat_no" placeholder="Flat No " readonly name="flat_no" value="<?= set_value('flat_no', '') ?>">
										<?= form_error('flat_no') ?>
									</div>
									<div class="form-group col-md-6">
										<div>
											<label for="inputPassword4" class="col-form-label">House no </label>
										</div>

										<input type="text" class="form-control" id="house_no" placeholder="House No" readonly name="house_no" value="<?= set_value('alt_contact', '') ?>">
										<?= form_error('house_no') ?>
									</div>


								</div>

								<div class="form-group">
									<label for="inputPassword4" class="col-form-label">Actual Amount</label>
									<input type="text" class="form-control" id="actual_amount" readonly placeholder="Actual Amount" name="a_amount" value="<?= set_value('a_amount', '') ?>">
									<?= form_error('a_amount') ?>
								</div>
								<div class="form-group">
									<label for="inputPassword4" class="col-form-label">Paid Amount</label>
									<input type="text" class="form-control" id="pay_amount" placeholder="Pay Amount" name="amount" value="<?= set_value('amount', '') ?>">
									<?= form_error('amount') ?>
								</div>
								<div class="form-group">
									<label for="inputPassword4" class="col-form-label">Paid Amount</label>
									<input type="date" class="form-control" id="p_date" placeholder="Date of Payment" name="pdate" value="<?= set_value('pdate', date('Y-m-d')) ?>">
									<?= form_error('pdate') ?>
								</div>
								<div class="col-12" id="infor"></div>


								<button type="submit" class="btn btn-primary">Submit</button>
								&nbsp; &nbsp; &nbsp;
								<button type="reset" class="btn btn-secondary">Reset</button>
								<?= form_close() ?>
							</div>
						</div>
					</div>
					<!-- end row -->


				</div>
			</div>
		</div>


	</div> <!-- end container -->
</div>















<!-- inline scripts related to this page -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	jQuery(function($) {
		var hwdata = {
			<?php if ($datas) {
				foreach ($datas as $d) {
			?><?= $d->id ?>: {
				"house": "<?= $d->house_no ?>",
				"flat": "<?= $d->flat_no ?>",
				"amount": "<?= $d->amount ?>",
				"contact": "<?= $d->contact ?>",
			},
		<?php }
			} ?>
		};
		var lst_payment = {
			<?php if ($last_payment) {
				foreach ($last_payment as $last) {
			?><?= $last->house_owner_id ?>: {
				"last_date": "<?= $last->dat ?>",
			},
		<?php }
			} ?>
		};
		$('.house_owner').change(function() {
			$('#house_no').val((hwdata[this.value].house));
			$('#actual_amount').val((hwdata[this.value].amount));
			$('#pay_amount').val((hwdata[this.value].amount));
			$('#contact_no').val((hwdata[this.value].contact));
			$('#flat_no').val((hwdata[this.value].flat));
			if ((lst_payment[this.value].last_date)) {
				$('#infor').html('<div class="alert alert-success no_pd"<a href="#" class="fade_in"></a><span value="">your last payment date is ' + (lst_payment[this.value].last_date) + '</span></div>');
			} else {
				$('#infor').html('<div class="alert alert-success no_pd"<a href="#" class="fade_in"></a><span value="">There is no payment you made</span></div>');
			}
		});





	});
</script>