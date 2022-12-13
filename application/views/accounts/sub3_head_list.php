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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Accounts</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0);">Sub3 Head</a></li>
								
							</ol>
						</div>
						<h4 class="page-title">Sub3 Head List</h4>
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
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">
					
					
					<div>
						<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th>SL #</th>
									<th>Master Head</th>
									<th>Sub1 Head</th>
									<th>Sub2 Head</th>
									<th>Sub3 Head</th>
									<th>Opening Balance</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($sub3_head_list as $row) {

								?>
									<tr>
										<td><?= $row['fcoa_bkdn_sub_id']; ?></td>
										<td><?= $row['master_code'] . "-" . $row['fcoa_master']; ?></td>
										<td><?= $row['fcoa_code'] . "-" . $row['fcoa']; ?></td>
										<td><?= $row['bkdn_code'] . "-" . $row['fcoa_bkdn']; ?></td>
										<td><?= $row['sub_code'] . "-" . $row['fcoa_bkdn_sub']; ?></td>
										<td><?= $row['sub_balance']; ?></td>
										<td>
											<a data-toggle="modal" data-target="#myModalEdit" onclick="edit_head(<?= $row['fcoa_bkdn_sub_id'] ?>)" title="Edit">
												<i class="ace-icon fa fa-edit bigger-120 "></i>
											</a>
											<!--<a onClick='return delete_alert("Are you sure Delete Sub3 Head ????");' href="<?php echo base_url(); ?>accounts/sub3_head_delete/<?php echo $row['fcoa_bkdn_sub_id']; ?>" title="Delete"><i class="fa fa-remove"></i></a> -->
										</td>
									</tr>
								<?php 	} ?>
							</tbody>
						</table>
						<h3 class="header smaller lighter blue">
						
						<button class="btn btn-info btn-bold float-right" data-toggle="modal" onmouseover="clear_input_box()" data-target="#myModal">Add New</button>
					</h3>
					</div>
					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<?= form_open('accounts/sub3_head_list', 'id=loanAssign'); ?>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Create head</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<label>Master Head <span style="color:red;">*</span></label>
												<select class="form-control" name="fcoa_master_id" id="fcoa_master_id" required>
													<option value="">Select Master Head</option>
													<?php
													$code_head = '';
													foreach ($master_head_list as $row) {
														$code_head = $row['master_code'] . "-" . $row['fcoa_master'];
													?>
														<option value="<?php echo $row['fcoa_master_id']; ?>"><?php echo $code_head; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-sm-6 col-xs-12" id="sub1_head_row" style="display:none;">
												<label>Sub1 Head Name <span style="color:red;">*</span></label>
												<select class="form-control" name="fcoa_id" id="fcoa_id" required>
													<option value="">Select COA-SUB1</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6" id="sub2_head_row" style="display:none;">
												<label>Sub2 Head Name <span style="color:red;">*</span></label>
												<select class="form-control" name="fcoa_bkdn_id" id="fcoa_bkdn_id" required>
													<option value="">Select COA-SUB2</option>
												</select>
											</div>
											<div class="col-sm-6">
												<label>Opening Balance</label>
												<input type="text" class="form-control" name="sub_balance" id="sub_balance" onkeyup="removeChar(this)">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Sub3 Head Name <span style="color:red;">*</span></label>
												<input type="text" class="form-control" name="fcoa_bkdn_sub" id="fcoa_bkdn_sub" required>
											</div>

											<div class="col-sm-6">
												<label>Sub3 Head Code <span style="color:red;">*</span></label>
												<input type="text" class="form-control" name="sub_code" id="sub_code" onkeyup="removeChar(this)" required>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Save</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
								</form>
							</div>

						</div>
					</div>

					<!-- edit -->
					<div id="myModalEdit" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content edit_content">
								<!-- edit content will be displayed here -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



















<!-- page specific plugin scripts -->

<script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>

<!-- Required datatable js -->
<script src=" <?= base_url('assets/libs/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Buttons examples -->
<script src=" <?= base_url('assets/libs/datatables/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables/buttons.bootstrap4.min.js') ?>"></script>
<script src=" <?= base_url('assets/libs/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/pdfmake/pdfmake.min.js') ?>"></script>
<script src=" <?= base_url('assets/libs/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/libs/datatables/buttons.html5.min.js') ?>"></script>
<script src=" <?= base_url('assets/libs/datatables/buttons.print.min.js') ?>"></script>

<!-- Responsive examples -->
<script src="<?= base_url('assets/libs/datatables/dataTables.responsive.min.js') ?>"></script>
<script src=" <?= base_url('assets/libs/datatables/responsive.bootstrap4.min.js') ?>"></script>

<!-- Datatables init -->
<script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>
<!-- page specific plugin scripts -->

<!-- inline scripts related to this page -->
<script type="text/javascript">
	function edit_head(id) {

		$.ajax({
			url: baseUrl + 'accounts/sub3_head_edit',
			data: {
				'id': id
			},
			dataType: 'json',
			success: function(data) {
				result = '' + data['result'] + '';
				mainContent = '' + data['mainContent'] + '';

				if (result == 'success')
					$('.edit_content').html(mainContent);
			}
		});
		return false; // keeps the page from not refreshing     
	}

	window.onload = function() {
		jQuery(function($) {

		})
	}
</script>
<!-- Added for accounts -->
<script src="<?= base_url(); ?>assets/js/valid-functions.js"></script>
<!-- Added for accounts -->