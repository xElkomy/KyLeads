<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>
    
    
    <!-- New Content -->

    <div class="container container-dashboard">

        <div class="row">
            <div class="col-md-4" >
                <ul class="list-group list-group-dashboard">
                    <li href="#"class="list-group-item list-group-item-dashboard list-group-item-rounded-t-r-l"><i class="fa-margin-left fa fa-signal"></i>Top Converting</li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('sites'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-external-link"></i> Landing page</a></li>  
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('sites'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-user" aria-hidden="true"></i> Name</a></li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('sites'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-line-chart" aria-hidden="true"></i> Conversion rate</a></li>
                    <li class="list-group-item list-group-item-dashboard-light list-group-item-rounded-b-r-l"><a href="<?php echo base_url('sites'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-users" aria-hidden="true"></i> Total Contacts</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-dashboard">
                    <li class="list-group-item list-group-item-dashboard list-group-item-rounded-t-r-l"><i class="fa-margin-left fa fa-signal"></i> Top Converting</li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('quiz'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-question-circle" aria-hidden="true"></i> Quiz</a></li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('quiz'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-user" aria-hidden="true"></i> Name</a></li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('quiz'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-line-chart" aria-hidden="true"> </i> Conversion rate</a></li>
                    <li class="list-group-item list-group-item-dashboard-light list-group-item-rounded-b-r-l"><a href="<?php echo base_url('quiz'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-users" aria-hidden="true"></i> Total Contacts</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-group list-group-dashboard"> 
                    <li class="list-group-item list-group-item-dashboard list-group-item-rounded-t-r-l"><i class="fa-margin-left fa fa-signal" aria-hidden></i> Top Converting</li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('forms'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-list-ul" aria-hidden></i> Form</a></li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('forms'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-user" aria-hidden="true"></i> Name</a></li>
                    <li class="list-group-item list-group-item-dashboard-light"><a href="<?php echo base_url('forms'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-line-chart" aria-hidden="true"></i> Conversion rate</a></li>
                    <li class="list-group-item list-group-item-dashboard-light list-group-item-rounded-b-r-l"><a href="<?php echo base_url('forms/contacts'); ?>" class="dashboard-link"><i class="fa-margin-left fa fa-users" aria-hidden="true"></i> Total Contacts</a></li>
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
