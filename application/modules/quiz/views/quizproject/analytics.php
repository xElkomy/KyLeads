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
						<?php $cquiz = $quiz[0];?>
								<h4>Analytics/<i>View metrics for your Project</i> </h4>
								<ul class="nav nav-pills">
									<li class="active j-c-t-u"><a data-toggle="pill">Split Test <br>Report</a></li>
									<div class="g-r-u a-b-u">Date Range: <input id ="startdate" value="2018-01-01"></input> - <input id ="enddate" value="2018-01-31"></input></div>
								</ul>
								<div class="tab-content tab-content-a">

									<div id="home" class="tab-pane fade in active">
									<div class="row">

										<div id="chartContainer" style="height: 400px; max-width: 920px; margin: 0px auto;"></div>
										<script type="text/javascript" src="./assets/js/linegraph/multipledata.js"></script>
										<script type="text/javascript" src="./assets/js/linegraph/line.js"></script>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
          	</div>
      	</div>
  	</div>

   
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
