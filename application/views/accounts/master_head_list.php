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
								<li class="breadcrumb-item"><a href="javascript: void(0);">Master Account</a></li>
							</ol>
						</div>
						<h4 class="page-title">Master Acoount List</h4>
					</div>
				</div>
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
								<th>SL #</th>
								<th>Master Head</th>
								<th>Master Code</th>
								<th>Action</th>
							</tr>
						</thead>


						<tbody>
							<?php
							// var_dump($master_head_list);
							foreach ($master_head_list as $row) { ?>
								<tr>
									<td><?= $row['fcoa_master_id']; ?></td>
									<td><?= $row['fcoa_master']; ?></td>
									<td><?= $row['master_code']; ?></td>
									<td>
										<a data-toggle="modal" data-target="#myModal" onclick="edit_doc(<?= $row['fcoa_master_id']; ?>)" title="Edit">
											<i class="ace-icon fa fa-edit bigger-120 "></i>
										</a>
										<!--<a onClick='return delete_alert("Are you sure Delete Master Head ????");' href="<?php echo base_url(); ?>accounts/master_head_delete/<?php echo $row['fcoa_master_id']; ?>" title="Delete"class="btn btn-danger btn-bold"><i class="fa fa-remove"></i></a> -->
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<div>
					<button class="btn btn-info btn-bold float-right" data-toggle="modal" onmouseover="clear_input_box()" data-target="#myModal">Add New</button>
					</div>



				</div>




				<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<?= form_open('accounts/master_head_list', 'id=loanAssign'); ?>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"></h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<input type="hidden" name="fcoa_master_id" id="fcoa_master_id" value="" />
												<label for="fcoa_master">Master Head Name </label>
												<input type="text" class="form-control" name="fcoa_master" id="fcoa_master" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<label for="company">Master Head Code</label>
												<input type="text" class="form-control" name="master_code" id="master_code" onkeyup="removeChar(this)" required>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary save_btn">Save</button>
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

<!-- inline scripts related to this page -->
<script type="text/javascript">
	function edit_doc(fcoa_master_id) {
		/* change add screen to update screen */
		$('.modal-title').html('Update Head');
		$('.save_btn').html('Update');

		var mhlArray = <?php echo json_encode($master_head_list) ?>;

		for (i = 0; i < mhlArray.length; i++) {
			if (mhlArray[i].fcoa_master_id == fcoa_master_id) {
				var fcoa_master_id = mhlArray[i].fcoa_master_id;
				var fcoa_master = mhlArray[i].fcoa_master;
				var master_code = mhlArray[i].master_code;
			}
		}
		$('[name=fcoa_master_id]').val(fcoa_master_id);
		$('[name=fcoa_master]').val(fcoa_master);
		$('[name=master_code]').val(master_code);


		$('[name=fcoa_master]').focus();
	}

	function clear_input_box() {
		$('.modal-title').html('Create New Head');
		$('.save_btn').html('Save');
		document.getElementById("loanAssign").reset();
	}

	
</script>
<!-- Added for accounts -->
<script src="<?= base_url(); ?>assets/js/valid-functions.js"></script>
<!-- Added for accounts -->