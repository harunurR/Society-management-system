<div class="topbar-menu">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="has-submenu">
                            <a href="<?= base_url('dashboard') ?>"><i class="fe-airplay"></i>Dashboard</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#">
                                <i class="fe-box"></i>Manage House owners</a>
                            <ul class="submenu">
                                <li class="has-submenu">
                                    <a href="#">House owners <div class="arrow-down"></div></a>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url('houseowner') ?>">List</a></li>
                                        <li><a href="<?= base_url('houseowneradd') ?>">Add</a></li>
                                    </ul>
                                </li>

                                <li class="has-submenu">
                                    <a href="#">House owners Payments <div class="arrow-down"></div></a>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url('payment') ?>">List</a></li>
                                        <li><a href="<?= base_url('paymentadd') ?>">Add </a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>




                        <li class="has-submenu">
                            <a href="#"><i class="fe-briefcase"></i>Accounts
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>accounts/master_head_list">Master Account</a></li>
                                <li><a href="<?= base_url(); ?>accounts/sub1_head_list">Sub1 Head</a></li>
                                <li><a href="<?= base_url(); ?>accounts/sub2_head_list">Sub2 Head</a></li>
                                <li><a href="<?= base_url(); ?>accounts/sub3_head_list">Sub3 Head</a></li>
                                <li><a href="<?= base_url(); ?>accounts/navigation_head_view">Navigation Head View</a></li>
                            </ul>
                        </li>


                        <li class="has-submenu">
                            <a href="#"><i class="fe-briefcase"></i>Voucher
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>accounts/debit_voucher_list">Voucher List</a></li>
                                <li><a href="<?= base_url(); ?>accounts/debit_voucher_entry">Voucher Entry</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="fe-briefcase"></i>Reports
                            </a>
                            <ul class="submenu">
                                <li><a href="<?= base_url(); ?>accounts/trial_balance">Trial Balance</a></li>
                                <li><a href="<?= base_url(); ?>acc_head_report">Acount Head Report</a></li>
                                <li><a href="<?= base_url(); ?>rnp_report">Receipt And Payment Account</a></li>
                            </ul>
                        </li>

                    </ul>



                    
                    </ul>
                    <!-- End navigation menu -->

                    <div class="clearfix"></div>
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>
        </header>