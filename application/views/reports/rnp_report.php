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
								<label for="form-field-select-3">Month</label>
								<select class="form-control" id="accmonth">
									<option value=""> Choose a Month... </option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
						</div>

						<div class="col-xs-12 col-sm-3">
							<div class="form-group">
								<label for="accDate">Year</label>
								<select class="form-control" id="accyear">
									<option value=""> Choose a Year... </option>
									<?php for($i=2020; $i<=date('Y'); $i++){ ?>
									    <option value="<?= $i ?>" <?= $i==date('Y')?"selected":"" ?>><?= $i ?></option>
									<?php } ?>
								</select>
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
<script>
	function get_details_report() {
		var accmonth = $('#accmonth').val();
		var accyear = $('#accyear').val();
		if (accmonth) {
			$.ajax({
				url: baseUrl + 'rnp_report/get_rnp_report',
				data: {
					'accmonth': accmonth,
					'accyear': accyear
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
			alert("Please select any month");
			$('#accmonth').focus();
		}
		return false; // keeps the page from not refreshing     
	}
</script>