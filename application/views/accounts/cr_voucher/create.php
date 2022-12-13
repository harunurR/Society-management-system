<div class="page-heading">
            <h1><i class='fa fa-check'></i> Credit Voucher</h1>
        </div>
        <!-- Page Heading End-->
        <!-- Your awesome content goes here -->
        <div class="row">
            <div class="col-sm-12">
                <div class="widget" style="min-height:500px;">
                    <div class="widget-content padding">
                        <form role="form" id="detvoucherform" name="detvoucherform" method="POST" action="<?php echo base_url(); ?>accounts/credit_voucher_list" enctype="multipart/form-data">


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Voucher No:</label>
                                        <input type="text" class="form-control" name="voucher_no" id="voucher_no" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Date: <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control datepicker-input" placeholder="mm/dd/yyyy" name="current_date" id="current_date" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Pay To: <span style="color:red;">*</span> </label>
                                <input type="text" class="form-control" name="pay_to" id="pay_to" required>
                            </div>

                            <div class="form-group">
                                <label>Purpose: <span style="color:red;">*</span> </label>
                                <input type="text" class="form-control" name="purpose" id="purpose" required>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id='area' cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SN#</th>
                                            <th>Particulars</th>
                                            <th>A/C Name</th>
                                            <th>Debit (Tk)</th>
                                            <th>Credit (Tk)</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th style="text-align:right;" colspan="3">Total Amount Tk.</th>
                                            <th>
                                                <input type='text' name='debit_sum' id='debit_sum' value='' style='text-align:center; border:none;' readonly />
                                            </th>
                                            <th>
                                                <input type='text' name='credit_sum' id='credit_sum' value='' style='text-align:center; border:none;' readonly />
                                            </th>
                                        </tr>

                                        <tr>
                                            <th style="text-align:right;" colspan="5">
                                                <input type='button' name='add' id='add' class='add' value='Add' onClick='adddesemp();'>
                                                <input type='button' name='remove' id='remove' value='Remove' onClick='return removedesemp();'>
                                            </th>
                                        </tr>

                                    </tfoot>

                                    <tbody>

                                        <tr>
                                            <td style='text-align:center;' id='increment_1'>1</td>
                                            <td style='text-align:left;'>
                                                <input type='text' name='particulars[]' id='particulars_1' value='' maxlength='50' style='text-align:left;border:none;' />
                                            </td>

                                            <td style='text-align:left;'>
                                                <div style='width:100%;position:relative;'>
                                                    <input type='text' name='account_code[]' id='account_code_1' class='cls_account_code' value='' style='border:none;' onkeyup="check_account_code(this.value,'1');" maxlength='100' />
                                                    <div id='account_code_suggestions_1' style='display:none;'>
                                                        <div id='account_code_list_1' style='border:1px solid #3F3FFF;'></div>
                                                    </div>
                                                </div>
                                                <input type='hidden' name='table_name[]' id='table_name_1' value=''>
                                                <input type='hidden' name='table_id[]' id='table_id_1' value=''>
                                            </td>

                                            <td style='text-align:left;'>
                                                <input type='text' name='debit[]' id='debit_1' class='cls_debit' value='' style='text-align:center; border:none;' maxlength='15' onkeyup='removeChar(this)' onBlur='return debit_entry(1);' />
                                            </td>
                                            <td style='text-align:left;'>
                                                <input type='text' name='credit[]' id='credit_1' class='cls_credit' value='' style='text-align:center; border:none;' maxlength='15' onkeyup='removeChar(this)' onBlur='return credit_entry(1);' />
                                                <input type='hidden' name='jobinc[]' id='jobinc_1' class='jobinc' value='1'>
                                                <input type='hidden' name='bkdn_id[]' value='' />
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Cheque No:</label>
                                        <input type="text" class="form-control" name="cheque_no" id="cheque_no" value="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Cheque Date:</label>
                                        <input type="text" class="form-control datepicker-input" name="cheque_dt" id="cheque_dt" value="" placeholder="mm/dd/yyyy">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Bank:</label>
                                        <input type="text" class="form-control" name="bank" id="bank" value="">
                                    </div>
                                </div>
                            </div>



                            <button type="button" class="btn btn-primary" onClick="return entry_validation(this.form)">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

