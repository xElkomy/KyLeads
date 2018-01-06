<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="wrap-s-c t-w-u">
                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                    <h6>KyPages Landing pages is coming soon!</h6>
                </div>
            </div>
        </div>
    </div><!-- /.container -->  


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
