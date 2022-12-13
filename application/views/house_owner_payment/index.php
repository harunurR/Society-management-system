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
								<li class="breadcrumb-item"><a href="javascript: void(0);">House Owners subscription payment</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0);">List</a></li>
								
							</ol>
						</div>
						<h4 class="page-title">House Owner subscription List</h4>
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
			<div class="col-12">
				<div class="card-box table-responsive">
					<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>#SL</th>
								<th>Name</th>
								<th>Actul Amount</th>
								<th>Paid Amount</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($datas) {
								foreach ($datas as $i => $data) { ?>
									<tr>
										<td><?= ++$i ?> </td>
										<td><?= $data->name ?></td>
										<td><?= $data->actual_amount ?></td>
										<td><?= $data->pay_amount ?></td>
										<td><?= $data->pdate ?></td>
										<td>
											<?php if ($data->status == 0) { ?>
												<span class="red">Unpaid</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a class="add btn btn-outline-success btn-rounded waves-light waves-effect width-xs" href="<?= base_url('paynow/' . $data->payment_id.'/1/'.$data->actual_amount) ?>">
													Pay Now
												</a>
											<?php } elseif($data->status == 1) { ?>
											<span class="green">Paid</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<a class="add btn btn-outline-danger btn-rounded waves-light waves-effect width-xs" href="<?= base_url('paynow/' . $data->payment_id.'/0/0') ?>">
													Unpaid
												</a>
											<?php } else { ?>
												<span class="badge badge-warning">Cannot change</span>
											<?php } ?>
										</td>
										<td>
											<div class="hidden-sm hidden-xs action-buttons">
											    <?php if ($data->status != 2) { ?>
    												<a class="green" href="<?= base_url('paymentedit/' . $data->payment_id) ?>">
    													<i class="fas fa-edit text-info"></i>
    												</a>
    
    												<a class="red" href="<?= base_url('paymentdelete/' . $data->payment_id) ?>">
    													<i class="fas fa-trash-alt text-danger"></i>
    												</a>
												<?php } ?>
											</div>

										</td>
									</tr>
							<?php }
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div><!-- end row -->
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
        