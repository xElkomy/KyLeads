<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <!-- Page content -->
      	<div id="page-content-wrapper">
          	<div class="page-content">
              	<div class="container ">
                    <div class="row row-c-u-a">
                    	<div id="new-optin" class="tabcontent">
								<h4>Analytics/<i>View metrics for your Project</i> </h4>
								<ul class="nav nav-pills">
									<li class="active j-c-t-u"><a data-toggle="pill">Split Test <br>Report</a></li>
									<div class="g-r-u a-b-u">Date Range: <input id ="startdate" value="2018-01-01"></input> - <input id ="enddate" value="2018-01-31"></input></div>
								</ul>
								<div class="tab-content tab-content-a">

									<div id="home" class="tab-pane fade in active">
									<div class="row">

										<!-- <div id="chartContainer" style="height: 400px; max-width: 920px; margin: 0px auto;"></div> -->
										<canvas class="quizprojectanalytics" id="LineChart"></canvas>
										<script type="text/javascript" src="./assets/js/linegraph/linechart.lib.js"></script>
										<script type="text/javascript" src="./assets/js/linegraph/linechart.js"></script>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
          	</div>
      	</div>
  	</div>

	<script type="text/javascript" >
			var baseUrl = "<?php echo base_url();?>";
			var id = "<?=$id?>";
			var from = document.getElementById('startdate').value;
			var to = document.getElementById('enddate').value;
			
			window.onload = function () {
				executedefault();
				executeMultipleReport();
			}
	</script>
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
