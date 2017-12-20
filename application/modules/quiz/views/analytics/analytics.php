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
								
								<div class="tab-content tab-content-a">

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
														<label class="label-a" for="tab1-a"><i class="fa fa-question-circle" aria-hidden="true"> </i> Questions</label>
													</input>
													
													<input class="input-a" id="tab2-a" type="radio" name="tabs">
														<label class="label-a"  for="tab2-a"><i class="fa fa-folder-open" aria-hidden="true"> </i> Outcomes</label>
													</input>	
													
													<section class="section-a" id="content1-a">
														<h1>Question</h1>
													</section>
														
													<section class="section-a" id="content2-a">
														
													
														<div class="container">
															<div class="row">
																<div class="col-sm-12 col-md-12">
																	<div class="panel-group" id="accordion">
																		<div class="panel panel-default nav nav-pills nav-stacked">
																			<div class="panel-heading ">
																				<h4 class="panel-title">
																					<a class=""data-toggle="collapse"  data-target-id="1" data-parent="#accordion" href="#collapseOne">How old are you? <div class="percent-a g-r-u">700 (100%)</div> </a>
																				</h4>
																			</div>
																			<div id="collapseOne" class="panel-collapse collapse in ">
																				<div class="panel-body">
																				
																					<table class="table">
																						<tr><td><li class="active"><a href="#" data-target-id="1"><i></i> 18-22 
																							<div class="percent-a g-r-u">150 (21.5%)</div> 
																						</a></li></td></tr>
																						<tr><td><li class=""><a href="#" data-target-id="2"><i></i> 22-27 
																							<div class="percent-a g-r-u">550 (78.5)</div> 
																						</a></li></td></tr>
																						
																					</table>
																				</div>
																			</div>
																		</div>
																		<div class="panel panel-default">
																			<div class="panel-heading">
																				<h4 class="panel-title">
																					<a data-toggle="collapse"  data-target-id="5" data-parent="#accordion" href="#collapseTwo">What you favorite sport? <div class="percent-a g-r-u">700 (100%)</a>
																				</h4>
																			</div>
																			<div id="collapseTwo" class="panel-collapse collapse">
																				<div class="panel-body">
																					<table class="table">
																						<tr>
																							<td>
																								<li class="active"><a href="#" data-target-id="5"><i></i>Basketball</a></li>
																							</td>
																						</tr>
																						<tr>
																							<td>
																								<li class="active"><a href="#" data-target-id="6"><i></i>Soccer</a></li>
																							</td>
																						</tr>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>


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
