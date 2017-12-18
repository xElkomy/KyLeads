<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      	<div id="sidebar-wrapper">
            <nav id="spy">
                <?php $this->load->view("quiznav.php"); ?>
            </nav>
      	</div>
      <!-- Page content -->
      	<div id="page-content-wrapper">
          	<div class="page-content">
              	<div class="container ">
                    <div class="row row-c-u-a">
                    	<div id="new-optin" class="tabcontent">
							<h4>Analytics/<i>View metrics for your Quiz</i> </h4>
								<ul class="nav nav-pills">
									<li class="active j-c-t-u"><a data-toggle="pill" href="#home">Split Test <br>Report</a></li>
									<li class="j-c-t-u"><a data-toggle="pill" href="#menu1">Advanced<br>Report</a></li>
								</ul>
								
								<div class="tab-content">

									<div id="home" class="tab-pane fade in active">
									<h3>HOME</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
									
									<div id="menu1" class="tab-pane fade">

										<div class="row">
											<div class="g-r-u">Date Rage: mm/dd/yy - mm/dd/yy</div>
										</div>

										<div class="row row-centered">
											
											<div class="col-md-2 col-c-u">
												<h6>Total Views</h6>
												<?php $this->load->view("analytics/totalviews.php"); ?>										
											</div>

											<div class="col-md-2 col-c-u">
												<h6>Quiz Starts</h6>
												<?php $this->load->view("analytics/quizstarts.php"); ?>
											</div>
											
											<div class="col-md-2 col-c-u">
												<h6>Completions</h6>
												<?php $this->load->view("analytics/completions.php"); ?>
											</div>	
											
											<div class="col-md-2 col-c-u">
												<h6>Contacts</h6>
												<?php $this->load->view("analytics/contacts.php"); ?>
											</div>	
											
											<div class="col-md-2 col-c-u">
												<h6>CTA Clicks</h6>
												<?php $this->load->view("analytics/ctaclicks.php"); ?>
											</div>											

										</div>
										<div class="row">

											<div class="col">

												<div class="main-a">
										
													<input class="input-a" id="tab1-a" type="radio" name="tabs" checked>
														<label class="label-a" for="tab1"><i class="fa fa-question-circle" aria-hidden="true"> Question</i></label>
													</input>
													
													<input class="input-a" id="tab2-a" type="radio" name="tabs">
														<label class="label-a"  for="tab2"><i class="fa fa-folder-open" aria-hidden="true"> Outcomes</i></label>
													</input>	
													<section class="section-a" id="content1-a">
														<h1>Sample1</h1>
													</section>
														
													<section class="section-a" id="content2-a">
														<h1>Sample</h1>											
													</section>
																									
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
          	</div>
      	</div>
  	</div>

    <!-- End of Content-->

	<script type="text/javascript" src="./assets/js/analytics.js"></script>
	<script type="text/javascript" src="./assets/js/doughnut/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="./assets/js/doughnut/Chart.js"></script>
    <!-- Load JS here for greater good =============================-->
    <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.bundle.js"></script>
    <?php endif; ?>

    <!--[if lt IE 10]>
    <script>
    $(function(){
    	var msnry = new Masonry( '#sites', {
	    	// options
	    	itemSelector: '.site',
	    	"gutter": 20
	    });

    })
    </script>
    <![endif]-->
</body>
</html>
