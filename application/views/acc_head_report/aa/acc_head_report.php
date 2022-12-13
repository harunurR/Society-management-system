<div class="wrapper">
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
							<li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
							<li class="breadcrumb-item active">Datatable</li>
						</ol>
					</div>
					<h4 class="page-title">Datatable</h4>
				</div>
			</div>
		</div>
		<div>
			<?php if ($this->session->flashdata('message')) : ?>
				<?= $this->session->flashdata('message') ?>
			<?php endif ?>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card-box table-responsive">
					<select class="form-control select2" id="accHead">
						<option>Select</option>
						<?php if ($accHead) {
							foreach ($accHead as $mh) { ?>
								<option value="<?= $mh['table_id'] ?>,<?= $mh['table_name'] ?>"><?= $mh['ac'] ?></option>
						<?php }
						} ?>
					</select>
					<div class="form-group">
						<label>With all options</label>
						<input type="text" id="reportrange" class="form-control" />
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-3">
							<button type="button" class="btn btn-primary" onclick="get_details_report()">Get Report</button>
						</div>
					</div>

					<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div>
										<label for="form-field-select-3">Account Head</label>
										<br />
										<select class="form-control" >
											<option value=""> Choose a Head... </option>
											<?php if ($accHead) {
												foreach ($accHead as $mh) { ?>
													<option value="<?= $mh['table_id'] ?>,<?= $mh['table_name'] ?>"><?= $mh['ac'] ?></option>
											<?php }
											} ?>

										</select>
									</div>
								</div>

								<div class="col-xs-12 col-sm-3">
									<div>
										<label for="accDate">Date</label>
										<div class="input-group">
											<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" required placeholder="03-11-2021 /  03-11-2021" />
											<span class="input-group-addon">
												<i class="fa fa-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row" id="details_data">
				</div>
			</div>
		</div>
	</div>
</div>

<!-- page specific plugin styles -->
<div class="wrapper">
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
							<li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
							<li class="breadcrumb-item active">Datatable</li>
						</ol>
					</div>
					<h4 class="page-title">Datatable</h4>
				</div>
			</div>
		</div>
		<div class="main-content">
			<div class="main-content-inner">
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="<?= base_url('dashboard') ?>">Home</a>
						</li>

						<li>
							<a href="<?= base_url('howseowner') ?>">House Owner</a>
						</li>
						<li class="active">Add</li>
					</ul><!-- /.breadcrumb -->
				</div>

				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
							<h3 class="header smaller lighter blue">
								Voucher Create
							</h3>

							
							<br>
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<button type="button" class="btn btn-primary" onclick="get_details_report()">Get Report</button>
								</div>
							</div>
							<hr>
							

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>

<script src="<?= base_url('assets/libs/moment/moment.min.js') ?>"></script>

<script src="<?= base_url('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') ?>"></script>

<script src="<?= base_url('assets/libs/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/libs/select2/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pages/form-advanced.init.js') ?>"></script>
<!-- <script src="<?= base_url('assets/js/pages/form-pickers.init.js') ?>"></script> -->
<script>
	jQuery(document).ready(function() {
		jQuery("#timepicker").timepicker({
			defaultTIme: !1,
			icons: {
				up: "mdi mdi-chevron-up",
				down: "mdi mdi-chevron-down"
			}
		}), jQuery("#timepicker2").timepicker({
			showMeridian: !1,
			icons: {
				up: "mdi mdi-chevron-up",
				down: "mdi mdi-chevron-down"
			}
		}), jQuery("#timepicker3").timepicker({
			minuteStep: 15,
			icons: {
				up: "mdi mdi-chevron-up",
				down: "mdi mdi-chevron-down"
			}
		}), $("#reportrange span").html(moment().subtract(29, "days").format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")), $("#reportrange").daterangepicker({
			format: "DD-MM-YYY",
			startDate: moment().subtract(29, "days"),
			endDate: moment(),
			minDate: "01/01/2012",
			maxDate: "<?=date('d/m/Y') ?>",
			dateLimit: {
				days: 60
			},
			showDropdowns: !0,
			showWeekNumbers: !0,
			timePicker: !1,
			timePickerIncrement: 1,
			timePicker12Hour: !0,
			ranges: {
				Today: [moment(), moment()],
				Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			},
			opens: "left",
			drops: "down",
			buttonClasses: ["btn", "btn-sm"],
			applyClass: "btn-success",
			cancelClass: "btn-default",
			separator: " to ",
			locale: {
				applyLabel: "Submit",
				cancelLabel: "Cancel",
				fromLabel: "From",
				toLabel: "To",
				customRangeLabel: "Custom",
				daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
				monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				firstDay: 1
			}
		}, function(e, t, n) {
			console.log(e.toISOString(), t.toISOString(), n), $("#reportrange span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
		})
	});








































	function get_details_report() {
		var accHead = $('#accHead').val();
		var rDate = $('#reportrange').val();

		if (accHead) {
			$.ajax({
				url: baseUrl + 'acc_head_report/get_acc_report',
				data: {
					'accHead': accHead,
					'rDate': rDate
				},
				dataType: 'json',
				success: function(data) {
					result = '' + data['result'] + '';
					mainContent = '' + data['mainContent'] + '';

					if (result == 'success')
						$('#details_data').html(mainContent);

				},
				error: function(e) {
					console.log(e);
				}
			});
		} else {
			alert("Please select any Account head");
			$('#tbl_fcoa_master').focus();
		}
		return false; // keeps the page from not refreshing     
	}
	window.onload = function() {
		jQuery(function($) {


		})
	}
</script>