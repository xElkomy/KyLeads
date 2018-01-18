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
						<?php $cquiz = $quiz[0];?>
								<h4>Analytics/<i>View metrics for your Quiz</i> </h4>
								<ul class="nav nav-pills">
									<li class="active j-c-t-u"><a data-toggle="pill" href="#home">Split Test <br>Report</a></li>
									<li class="j-c-t-u"><a data-toggle="pill" href="#menu1">Advanced<br>Report</a></li>
								</ul>
								
								<div class="tab-content tab-content-a">

									<div id="home" class="tab-pane fade in active">
										<p>Display Line Graph No Split Testing</p>
									</div>
									<div id="menu1" class="tab-pane fade">

										<div class="row">
											<div class="g-r-u">Date Rage: mm/dd/yy - mm/dd/yy</div>
										</div>

										<div class="row row-centered">
											
											<div class="col-md-2 col-c-u">
												<h6>Total Views</h6>
												<?php $this->load->view("analytics/totalviews.php",$id); ?>										
											</div>

											<div class="col-md-2 col-c-u">
												<h6>Quiz Starts</h6>
												<?php $this->load->view("analytics/quizstarts.php",$id); ?>
											</div>
											
											<div class="col-md-2 col-c-u">
												<h6>Completions</h6>
												<?php $this->load->view("analytics/completions.php",$id); ?>
											</div>	
											
											<div class="col-md-2 col-c-u">
												<h6>Contacts</h6>
												<?php $this->load->view("analytics/contacts.php",$id); ?>
											</div>	
											
											<div class="col-md-2 col-c-u">
												<h6>CTA Clicks</h6>
												<?php $this->load->view("analytics/ctaclicks.php",$id); ?>
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
													<div class="container">
															<div class="row">
																<div class="col-sm-12 col-md-12">
																	<div class="panel-group" id="accordion">
																		<div class="panel panel-default nav nav-pills nav-stacked">
																			<?php 
																				foreach ($cquiz->questions as $key => $question) {
																					?>
																						<div class="panel-heading ">
																						<h4 class="panel-title">
																							<a class="question" data-toggle="collapse"  data-target-id="1" data-parent="#accordion" href="#collapse<?php echo $key?>"> <?php echo $question->title?><div class="percent-a g-r-u"  id="questiontarget<?php echo $key?>">0 (100%)</div> </a>
																						</h4>
																						</div>
																						<div id="collapse<?php echo $key?>" class="panel-collapse collapse in ">
																						<div class="panel-body">
																							<table class="table">
																					<?php foreach ($question->choices as $key1 => $choice) {
																							?>
																							<tr><td><li class="active"><a ><i></i><?php echo $choice->value; ?> 
																							<div class="percent-a g-r-u" id="choice<?php echo $key1+1?>of<?php echo $key+1?>">0 (0%)</div> 
																							</a></li></td></tr>
																							<?php
																						}
																						?>						
																								</table>
																							</div>
																						</div>
																			<?php	
																				}
																			?>																	
																		</div>
																	</div>
																</div>
															</div>
														</div>
													
													</section>
														
													<section class="section-a" id="content2-a">
													<div class="container">
															<div class="row">
																<div class="col-sm-12 col-md-12">
																	<div class="panel-group" id="accordion">
																		<div class="panel panel-default nav nav-pills nav-stacked">
																		<?php
																			foreach ($cquiz->outcomes as $key => $outcome) {
																				?>	<div class="panel-heading">
																					<h4 class="panel-title">
																					<a class="outcome" id="<?php echo $key?>"><?php echo $outcome->title;?><div class="percent-a g-r-u" id="outcometarget<?php echo $key?>">700 (100%)</div> </a>
																					</h4>
																				</div><?php
																			}
																		?>																		
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
	<script type="text/javascript" >
		var outcomes = new Array();
		var questions = new Array();
		var urlData = "<?php echo base_url();?>api/quizreport?id=<?php echo $id?>&outcomeid=";
		var urlDataQuestion = "<?php echo base_url();?>api/quizreport?id=<?php echo $id?>&questionid=";
		<?php foreach($cquiz->outcomes as $key => $val){ ?>
			outcomes.push('<?php echo $val->id; ?>');
		<?php } ?>
		<?php foreach($cquiz->questions as $key => $val){ ?>
			questions.push('<?php echo $val->id; ?>');
    	<?php } ?>		
	</script>
	<script type="text/javascript" src="./assets/js/analytics.js"></script>
	<script type="text/javascript" src="./assets/js/doughnut/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="./assets/js/doughnut/Chart.js"></script>
	<script type="text/javascript" src="./assets/js/report/outcomes.js"></script>
	<script type="text/javascript" src="./assets/js/report/questions.js"></script>
    <!-- Load JS here for greater good =============================-->
    

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
