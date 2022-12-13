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
										<li class="breadcrumb-item"><a href="javascript: void(0);">Manage House owner</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">Lists</a></li>

									</ol>
								</div>
								<h4 class="page-title">House Owners List</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
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
								<th>Contact</th>
								<th>email</th>
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
										<td>
											<?= $data->contact ?>
											<?php if ($data->alt_contact) { ?>
												,<?= $data->alt_contact ?>
											<?php } ?>
										</td>
										<td><?= $data->email ?></td>
										<td>
											<?php
											if ($data->status == 1) {
											?>
												<span class="label label-sm label-success">Active</span>
											<?php } else { ?>
												<span class="label label-sm label-danger">Inactive</span>
											<?php } ?>
										</td>
										<td>
											<div>
												<a class="blue" href="<?= base_url('paymentrecord/' . $data->id) ?>">
													<i class="fa fa-search-plus"></i>
												</a>

												<a class="green" href="<?= base_url('houseowneredit/' . $data->id) ?>">
													<i class="fas fa-edit text-info"></i>
												</a>

												<a class="red" href="<?= base_url('houseownerdelete/' . $data->id) ?>">
													<i class="fas fa-trash-alt text-danger"></i>
												</a>
											</div>
										</td>
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
        