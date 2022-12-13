<div class="card-box table-responsive">
	<!-- start page title -->

	<div class="animate-bottom">
		<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
			<thead>
				<tr>
					<th>#SL</th>
					<th>Trans Date</th>
					<th>Post Date</th>
					<th>particulars</th>
					<th>Purpose</th>
					<th>Debit</th>
					<th>Credit</th>
					<th>Balance</th>
					<th>Details</th>
				</tr>
			</thead>
			<?php $balance_data = $accBalData['sub_balance'] + $accBalData['balance'];
			echo $balance_data; ?>
			<tbody>
				<tr>
					<td>1</td>
					<td><?= $startDate ?></td>
					<td><?= $startDate ?></td>
					<td>B/F</td>
					<td> </td>
					<td class="align-right"><?= $balance_data >= 0 ? abs($balance_data) : '' ?></td>
					<td class="align-right"><?= $balance_data <= 0 ? abs($balance_data) : '' ?></td>
					<td></td>
					<td>

					</td>
				</tr>
				<?php

				$i = 2;
				$deb = 0;
				$cre = 0;
				$bal = 0;
				//$accBalData['balance']<=0?$bal=$accBalData['balance']
				$bal = $balance_data;
				if ($accData) {
					foreach ($accData as $ad) {
						$deb += $ad['debit'];
						$cre += $ad['credit'];
						$bal += $ad['debit'];
						$bal -= $ad['credit'];

				?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $ad['current_date'] ?></td>
							<td><?= $ad['rec_date'] ?></td>
							<td><?= $ad['particulars'] ?></td>
							<td><?= $ad['purpose'] ?></td>
							<td class="align-right"><?= $ad['debit'] ?></td>
							<td class="align-right"><?= $ad['credit'] ?></td>
							<td class="align-right"><?= $bal < 0 ? abs($bal) . ' CR' : $bal . ' DR' ?></td>
							<td>
								<a href="<?php echo base_url(); ?>accounts/debit_voucher_edit/<?php echo $ad['debit_voucher_id']; ?>" title="Edit"><i class="fa fa-eye"></i></a>
							</td>
						</tr>
					<?php $i++;
					}  ?>
				<?php } else { ?>
					<tr>
						<td colspan="9">
							<center>No Data Found</center>
						</td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="5" style="text-align:right">Total</th>
					<th class="align-right"><?= $deb ?></th>
					<th class="align-right"><?= $cre ?></th>
					<th class="align-right"><?= $bal < 0 ? abs($bal) . ' CR' : $bal . ' DR' ?></th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<!-- Required datatable js -->