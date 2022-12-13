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
										<li class="breadcrumb-item"><a href="javascript: void(0);">House Owners Subscription</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">list</a></li>
										<li class="breadcrumb-item active"><?= $datas[0]->name ?></li>
									</ol>
								</div>
								<h4 class="page-title">Detail Information And Subscription Payment List of <span class="text-success"><?= $datas[0]->name ?></span></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>

			<?php if ($this->session->flashdata('message')) { ?>
				<?= $this->session->flashdata('message') ?>
			<?php } ?>
		</div>
		<!-- end page title -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card-box">
					<div class="table-responsive">

						<table class="table mb-0">
							
							<tbody>
								<tr>
									
									<th>Contact</th>
									<th>Alternative Contact</th>
									<th>Email</th>
									<th>Permanent Address</th>
									<th>House No</th>
									<th>Flat No</th>
									<th>Subscription Amount</th>
								</tr>
								<tr>
									
									<th><?= $details[0]->contact ?></th>
									<th><?= $details[0]->alt_contact ?></th>
									<th><?= $details[0]->email ?></th>
									<th><?= $details[0]->per_add ?></th>
									<th><?= $details[0]->house_no ?></th>
									<th><?= $details[0]->flat_no ?></th>
									<th><?= $details[0]->amount ?></th>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>

			</div>


		</div>
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">


					<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>#SL</th>
								<th>Date</th>
								<th>Actual Amount</th>
								<th>Paid Amount</th>
								<th></th>
							</tr>
						</thead>


						<tbody>

							<?php if ($datas) {
								foreach ($datas as $i => $data) { ?>
									<tr>
										<td><?= ++$i ?> </td>
										<td>
											<?= $data->pdate ?>

										</td>
										<td><?= $data->actual_amount ?></td>
										<td>
											<?= $data->pay_amount ?>

										</td>

										<td></td>


									</tr>
							<?php }
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end row -->





	</div> <!-- end container -->
</div>





















<!-- page specific plugin scripts -->

<script src="<?= base_url('assets/js/vendor.min.js') ?>""></script>

        <!-- Required datatable js -->
        <script src=" <?= base_url('assets/libs/datatables/jquery.dataTables.min.js') ?>""></script>
<script src="<?= base_url('assets/libs/datatables/dataTables.bootstrap4.min.js') ?>""></script>
        <!-- Buttons examples -->
        <script src=" <?= base_url('assets/libs/datatables/dataTables.buttons.min.js') ?>""></script>
<script src="<?= base_url('assets/libs/datatables/buttons.bootstrap4.min.js') ?>""></script>
        <script src=" <?= base_url('assets/libs/jszip/jszip.min.js') ?>""></script>
<script src="<?= base_url('assets/libs/pdfmake/pdfmake.min.js') ?>""></script>
        <script src=" <?= base_url('assets/libs/pdfmake/vfs_fonts.js') ?>""></script>
<script src="<?= base_url('assets/libs/datatables/buttons.html5.min.js') ?>""></script>
        <script src=" <?= base_url('assets/libs/datatables/buttons.print.min.js') ?>""></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/libs/datatables/dataTables.responsive.min.js') ?>""></script>
        <script src=" <?= base_url('assets/libs/datatables/responsive.bootstrap4.min.js') ?>""></script>

<!-- Datatables init -->
<script src="<?= base_url('assets/js/pages/datatables.init.js') ?>""></script>
        