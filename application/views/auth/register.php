<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>South Khulshi Residential Area Welfare Society</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

        <!-- App css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css" rel="stylesheet" type="text/css') ?>" />
        <link href="<?= base_url('assets/css/icons.min.css" rel="stylesheet" type="text/css') ?>" />
        <link href="<?= base_url('assets/css/app.min.css" rel="stylesheet" type="text/css') ?>" />

    </head>

    <body class="authentication-bg bg-gradient">

            <div class="account-pages pt-5 mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">
    
                                <div class="card-body p-4">
                                    
                                    <div class="text-center w-75 m-auto">
                                        <a href="index.html">
                                            <span><img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="" height="18"></span>
                                        </a>
                                        <h5 class="text-uppercase text-center font-bold mt-4">Register</h5>
                                    </div>
    
                                    <?= form_open_multipart('register'); ?>
    
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input class="form-control" type="text" id="fullname" placeholder="Enter your name" name="name" value="<?= set_value('name','')?>">
											<?= form_error('name') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="email" value="<?= set_value('email','')?>" >
											<?= form_error('email') ?>
                                        </div>
										<div class="form-group">
                                            <label for="contact">Contact Number</label>
                                            <input class="form-control" type="text" id="contact" placeholder="Contact Number" name="contact"  value="<?= set_value('contact','')?>">
											<?= form_error('contact') ?>
                                        </div>
										
										<div class="form-group">
                                            <label for="password" class="mr-5">Image</label>
                                            <input type="file" class="" name="image" />
											<?= form_error('password') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" id="password" placeholder="Enter your password" name="password">
											<?= form_error('password') ?>
                                        </div>
										<div class="form-group">
                                            <label for="password">Confirm Password</label>
                                            <input class="form-control" type="password" id="password" placeholder="Re-enter your password" name="repassword" >
											<?= form_error('repassword') ?>
										</div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox checkbox-success">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                                <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-gradient btn-block" type="submit"> Sign Up Free </button>
                                        </div>
    
                                    </form>
    
                                    <div class="row mt-4">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted mb-0">Alredy Registered? <a href="<?= base_url('login') ?>" class="text-dark ml-1"><b>Sign in</b></a></p>
                                            </div>
                                        </div>
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
    
                     
    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->

        <!-- Vendor js -->
        <script src="<?= base_url('assets/js/vendor.min.js') ?>"></script>

        <!-- App js -->
        <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
        
    </body>
</html>

































<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - KHS Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
		<link rel="stylesheet" href="<?= base_url('assets/font-awesome/4.5.0/css/font-awesome.min.css') ?>" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url('assets/css/fonts.googleapis.com.css') ?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url('assets/css/ace.min.css') ?>" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?= base_url('assets/css/ace-part2.min.css') ?>" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url('assets/css/ace-rtl.min.css') ?>" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?= base_url('assets/css/ace-ie.min.css') ?>" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?= base_url('assets/js/html5shiv.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/respond.min.js') ?>"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">KHS</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="signup-box" class="signup-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<?= form_open_multipart('register'); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?= set_value('name','')?>"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
														<?= form_error('name') ?>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Phone Number" name="contact"  value="<?= set_value('contact','')?>"/>
															<i class="ace-icon fa fa-phone"></i>
														</span>
														<?= form_error('contact') ?>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email','')?>" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
														<?= form_error('email') ?>
													</label>
													
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" name="image" />
															<i class="ace-icon fa fa-upload"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password"  name="password"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
														<?= form_error('password') ?>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" name="repassword" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
														<?= form_error('repassword') ?>
													</label>

													<label class="block">
														<input type="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="<?= base_url('login') ?>" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?= base_url('assets/js/jquery-2.1.4.min.js') ?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url('assets/js/jquery.mobile.custom.min.js') ?>'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
