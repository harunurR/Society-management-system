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
										<li class="breadcrumb-item"><a href="javascript: void(0);">Account Head Report</a></li>
									</ol>
								</div>
								<h4 class="page-title">Search head report</h4>
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

		<div class="row">
			<div class="col-md-12">
				<div class="card-box table-responsive">
					<?php if ($this->session->flashdata('message')) : ?>
						<?= $this->session->flashdata('message') ?>
					<?php endif ?>
					<div class="row">
						<div class="col-xs-12 col-sm-3">
							<div>
								<label for="form-field-select-3">Account Head</label>
								<br />
								<select class="form-control" id="accHead">
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
							<div class="form-group">
								<label for="accDate">Date</label>
								<input type="text" id="current_date" class="form-control" />
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-12 col-sm-3">
							<button type="button" class="btn btn-primary" onclick="get_details_report()">Get Report</button>
						</div>
					</div>
					<hr>
				</div>


			</div>
			<div class="col-12" id="details_data">

			</div>

		</div>
	</div>
</div>
<script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>

<script>
	jQuery(document).ready(function() {
		$("#current_date span").html(moment().subtract(29, "days").format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")), $("#current_date").daterangepicker({
			format: "DD-MM-YYYY",
			startDate: moment().format("DD-MM-YYYY"),
			endDate: moment().format("DD-MM-YYYY"),
			minDate: "01-01-2012",
			maxDate: "<?= date("m-d-y") ?>",
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
			console.log(e.toISOString(), t.toISOString(), n), $("#current_date span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
		})
	});
</script>



<script>
	function get_details_report() {
		var accHead = $('#accHead').val();
		// var rDate = $('#reportrange').val(); // irfans add
		var rDate = $('#current_date').val();
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
</script>


<script src="<?= base_url(); ?>assets/js/valid-functions.js"></script>