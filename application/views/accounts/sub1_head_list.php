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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Account</a></li>
								<li class="breadcrumb-item"><a href="javascript: void(0);">Sub1 Head</a></li>
							
							</ol>
						</div>
						<h4 class="page-title">Sub1 Head List</h4>
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
									<th>SL #</th>
									<th>Master Head</th>
									<th>Sub1 Head</th>
									<th>Opening Balance</th>
									<th>Action</th>
								</tr>
							</thead>


							<tbody>
								<?php foreach ($sub1_head_list as $row) { ?>
									<tr>
										<td><?= $row['fcoa_id']; ?></td>
										<td><?= $row['master_code'] . "-" . $row['fcoa_master']; ?></td>
										<td><?= $row['fcoa_code'] . "-" . $row['fcoa']; ?></td>
										<td><?= $row['fcoa_balance']; ?></td>
										<td>
											<a data-toggle="modal" data-target="#myModal" onclick="edit_doc(<?= $row['fcoa_id']; ?>)" title="Edit">
												<i class="ace-icon fa fa-edit bigger-120 "></i>
											</a>
											<!--<a onClick='return delete_alert("Are you sure Delete Sub1 Head ????");' href="<?php echo base_url(); ?>accounts/sub1_head_delete/<?php echo $row['fcoa_id']; ?>" title="Delete" class="btn btn-danger btn-bold"><i class="fa fa-remove"></i></a> -->
										</td>
									</tr>
								<?php 	} ?>
							</tbody>
					</table>
				
					<button class="btn btn-info btn-bold float-right" data-toggle="modal" onmouseover="clear_input_box()" data-target="#myModal">Add New</button>
					
				</div>
			</div>
		</div>
		<!-- end row -->


		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal add content-->
					<div class="modal-content">
						<?php echo form_open('accounts/sub1_head_list', 'id=loanAssign'); ?>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<input type="hidden" name="fcoa_id" id="fcoa_id" value="" />
										<label for="fcoa_master_id">Master Head</label>
										<select class="form-control" name="fcoa_master_id" id="fcoa_master_id" required />
										<option value="">Select Master Head</option>
										<?php
										$code_head = '';
										foreach ($master_head_list as $row) {
											$code_head = $row['master_code'] . "-" . $row['fcoa_master'];
										?>
											<option value="<?php echo $row['fcoa_master_id']; ?>"><?php echo $code_head; ?></option>
										<?php } ?>
										</select>
										<input type="hidden" class="form-control" id="fcoa_master_select">
									</div>
									<div class="col-sm-6">
										<label>Opening Balance</label>
										<input type="text" class="form-control" name="fcoa_balance" id="fcoa_balance" onkeyup="removeChar(this)">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<label for="fcoa">Sub1 Head Name</label>
										<input type="text" class="form-control" name="fcoa" id="fcoa" required>
									</div>

									<div class="col-sm-6">
										<label for="fcoa_code">Sub1 Head Code</label>
										<input type="text" class="form-control" name="fcoa_code" id="fcoa_code" onkeyup="removeChar(this)" required>
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

			<!-- edit modal -->
			<div id="myModalEdit" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content edit_content">
						<!-- edit content will be displayed here -->
					</div>
				</div>
			</div>
<!--modal close -->



	</div> <!-- end container -->
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


<script type="text/javascript">
	function edit_doc(fcoa_id) {
		$('#fcoa_master_id')
			.attr("disabled", true);

		$('#fcoa_master_select')
			.attr('disabled', false)
			.attr('name', 'fcoa_master_id');
		/* change add screen to update screen */
		$('#myModalEdit').html('Update Head');
		$('.save_btn').html('Update');

		var s1hlArray = <?php echo json_encode($sub1_head_list) ?>;

		for (i = 0; i < s1hlArray.length; i++) {
			if (s1hlArray[i].fcoa_id == fcoa_id) {
				var fcoa_id = s1hlArray[i].fcoa_id;
				var fcoa_master_id = s1hlArray[i].fcoa_master_id;
				var fcoa = s1hlArray[i].fcoa;
				var fcoa_code = s1hlArray[i].fcoa_code;
				var fcoa_balance = s1hlArray[i].fcoa_balance;
			}
		}
		$('[name=fcoa_id]').val(fcoa_id);
		$('[name=fcoa_master_id]').val(fcoa_master_id);
		$('[name=fcoa]').val(fcoa);
		$('[name=fcoa_code]').val(fcoa_code);
		$('[name=fcoa_balance]').val(fcoa_balance);


		$('[name=fcoa_master]').focus();
	}

	function clear_input_box() {

		$('#fcoa_master_id')
			.attr("disabled", false);

		$('#fcoa_master_select')
			.attr('disabled', true)
			.removeAttr('name', 'fcoa_master_id');

		$('.modal-title').html('Create New Head');
		$('.save_btn').html('Save');
		document.getElementById("#myModalEdit").reset();
	}



</script>
<script src="<?= base_url(); ?>assets/js/valid-functions.js"></script>
