<meta name="viewport" content="width=device-width, initial-scale=1">
<body>

    <?php $this->load->view("shared/nav.php"); ?>
    
    
    <!-- New Content -->

    <div class="container-fluid">

        <div class="row" id="content">
          <div class="col-md-4" >
                 <ul class="list-group" id="list-group">
                  <li class="list-group-item" id="list-group-item">Top Converting</li>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Landing page</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Name</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Conversion rate</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Total contacts</li></a>
                </ul>
          </div>
          <div class="col-md-4">
                <ul class="list-group" id="list-group">
                  <li class="list-group-item" id="list-group-item">Top Converting</li>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Quiz</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Name</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Conversion rate</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Total contacts</li></a>
                </ul>
          </div>
          <div class="col-md-4">
                <ul class="list-group" id="list-group">
                  <li class="list-group-item" id="list-group-item">Top Converting</li>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Form</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Name</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Conversion rate</li></a>
                  <a href="#" ><li class="list-group-item" id="list-group-item">Total contacts</li></a>
                </ul>
          </div>
        </div>
        <div class="row" align="center" id="footer">
            <div class="col-md-12">
              <h6>Trends</h6>
            </div>
            <div class="col-md-12">
              <ul id="footer">
                <li id="footer-li"><h7><a href="#">Today</a></h7></li>
                <li id="footer-li"><h7><a href="#">Yesterday</a></h7></li>
                <li id="footer-li"><h7><a href="#">Last Week</a></h7></li>
                <li id="footer-li"><h7><a href="#">Last Month</a></h7></li>
                <li id="footer-li"><h7><a href="#">Year to date</a></h7></li>
              </ul>
            </div>
            <div class="col-md-12">
            <h7>Conversion rate (average across all forms and pages)</h7><br>
            <h7>Total Leads</h7>
            </div>
        </div>
    </div>
    
    <!-- End of Content-->

    <!-- modals -->

    <?php $this->load->view("shared/modal_sitesettings.php"); ?>

    <?php $this->load->view("shared/modal_account.php"); ?>

    <?php $this->load->view("shared/modal_deletesite.php"); ?>

    <!-- /modals -->


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
