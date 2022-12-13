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
										<li class="breadcrumb-item"><a href="javascript: void(0);">Manage House Owners</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
										<li class="breadcrumb-item active"><?= $data->name ?></li>
									</ol>
								</div>
								<h4 class="page-title">Edit House Owners</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end page title -->


		<!-- Form row -->
		<div class="row">
			<div class="col-md-12">
				<div class="card-box">


					<?= form_open('houseowneredit/' . $data->id, array('class' => 'form-horizontal', 'role' => 'form')) ?>
					<div class="form-group">
						<label for="inputAddress" class="col-form-label">Name</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Name" name="name" value="<?= set_value('name', $data->name) ?>">
						<?= form_error('name') ?>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputEmail4" class="col-form-label">Contact</label>
							<input type="text" class="form-control" id="inputEmail4" placeholder="Contact" name="contact" value="<?= set_value('contact', $data->contact) ?>">
							<?= form_error('contact') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4" class="col-form-label">Alternative Contact</label>
							<input type="text" class="form-control" id="inputPassword4" placeholder="Alt Contact" name="alt_contact" value="<?= set_value('alt_contact', $data->alt_contact) ?>">
							<?= form_error('alt_contact') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4" class="col-form-label">Email</label>
							<input type="email" class="form-control" id="inputPassword4" placeholder="Email" name="email" value="<?= set_value('email', $data->email) ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="inputAddress2" class="col-form-label">Permanent Address</label>
						<textarea class="form-control" rows="5" placeholder="Permanent Address" name="per_add"><?= set_value('per_add', $data->per_add) ?></textarea>
						<?= form_error('per_add') ?>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="inputEmail44" class="col-form-label">House no</label>
							<input type="text" class="form-control" id="inputEmail44" placeholder="House No" name="house_no" value="<?= set_value('house_no', $data->house_no) ?>">
							<?= form_error('house_no') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4" class="col-form-label">Flat no </label>
							<input type="text" class="form-control" id="inputPassword4" placeholder="Flat No" name="flat_no" value="<?= set_value('flat_no', $data->flat_no) ?>">
							<?= form_error('flat_no') ?>
						</div>
						<div class="form-group col-md-4">
							<label for="inputPassword4" class="col-form-label">Pay Amount</label>
							<input type="text" class="form-control" id="inputPassword4" placeholder="Pay Amount" name="amount" value="<?= set_value('amount', $data->amount) ?>">
							<?= form_error('amount') ?>
						</div>
					</div>
					<div class="form-group">

					</div>
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