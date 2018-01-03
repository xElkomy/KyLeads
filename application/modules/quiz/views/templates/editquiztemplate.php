<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
            <nav id="spy">
                <?php $this->load->view("templatemenunav.php"); ?>
            </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container-q ">
                    <div class="row row-c-u-f">

                        <div id="new-optin" class="tabcontent">

                            <h3><?php echo $quizinfo->title;?></h3> <h5><?php echo $quizinfo->description;?></h5>
                                
                                <h6 class="text-center"><i class="fa fa-lg fa-cogs" aria-hidden="true"> Configuration</i></h6><hr>
                                
                                    <form action="<?php echo base_url('quiz/update_template_info'); ?>" method="post">
                                        <input type="hidden" name="quizid" class="form-control" value = "<?php echo $quizinfo->id;?>"></input>
                                        <label>Title :<input name="quiztitle" class="form-control" style = "width: 200px;" value = "<?php echo $quizinfo->title;?>" required></input> 
                                        <label>Description :<input name="quizdescrip" class="form-control" style = "width: 500px;" value = "<?php echo $quizinfo->description;?>" required></input> 
                                        <button type ="submit" class="btn btn-r-u btn-primary btn-wide margin-top-40 "><i class="fa fa-check-square" aria-hidden="true"> Save Changes</i></button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
    <!-- End of Content-->
    <!-- modals -->
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
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
    