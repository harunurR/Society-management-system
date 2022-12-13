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
										<li class="breadcrumb-item"><a href="javascript: void(0);">Voucher</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>

									</ol>
								</div>
								<h4 class="page-title">Voucher List</h4>
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
		<!-- end page title -->
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">


					<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>SL #</th>
								<th>Voucher No</th>
								<th>Date</th>
								<th>Pay Name</th>
								<th>Purpose</th>
								<th>Amount</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							<?php
							foreach ($debit_voucher_list as $row) {

							?>
								<tr>
									<td><?= $row['debit_voucher_id']; ?></td>
									<td><?= $row['voucher_no']; ?></td>
									<td><?= $row['current_date']; ?></td>
									<td><?= $row['pay_status'] == "pay_to" ? "Pay To" : "Pay By"; ?> - <?= $row['pay_name']; ?></td>
									<td><?= $row['purpose']; ?></td>
									<td><?= $row['debit_sum']; ?></td>
									<td>
										<a class="btn btn-primary btn-xs" href="<?= base_url(); ?>accounts/debit_voucher_edit/<?= $row['debit_voucher_id']; ?>" title="Edit"><i class="fa fa-edit"></i></a>
										|
										<!--<a class="btn btn-danger btn-xs" href="<?= base_url(); ?>accounts/debit_voucher_delete/<?= $row['debit_voucher_id']; ?>" onclick="return confirm('are you sure want to delete this record?');" title="Delete"><i class="fa fa-trash"></i></a>-->
									</td>
								</tr>
							<?php 	} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- end row -->





	</div> <!-- end container -->
</div>





















<!-- page specific plugin scripts -->

<script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>



<!-- Required datatable js -->
<script src=" <?= base_url('assets/libs/datatables/jquery.dataTables.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/datatables/dataTables.bootstrap4.min.js') ?>""></script>
<!-- Buttons examples -->
<script src=" <?= base_url('assets/libs/datatables/dataTables.buttons.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/datatables/buttons.bootstrap4.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/jszip/jszip.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/pdfmake/pdfmake.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/pdfmake/vfs_fonts.js') ?>""></script>
<script src=" <?= base_url('assets/libs/datatables/buttons.html5.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/datatables/buttons.print.min.js') ?>""></script>

<!-- Responsive examples -->
<script src=" <?= base_url('assets/libs/datatables/dataTables.responsive.min.js') ?>""></script>
<script src=" <?= base_url('assets/libs/datatables/responsive.bootstrap4.min.js') ?>""></script>

<!-- Datatables init -->
<script src=" <?= base_url('assets/js/pages/datatables.init.js') ?>""></script>