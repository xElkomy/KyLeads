<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
            <nav id="spy">
                <?php $this->load->view("quizmenunav.php"); ?>
            </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container-q ">
                    <div class="row row-c-u-f">
                       
                        <div class="row quiz-edit">
                        
                        <h3 class="bold-u a-b-u">Title: <?php echo $quizinfo->title;?></h3> <h5 class="bold-u a-b-u">Description: <?php echo $quizinfo->description;?></h5>
                                
                            <h6 class="bold-u a-b-u"><i class="fa fa-1x fa-wrench" aria-hidden="true"></i> Configuration</h6>
                            <hr>
                                
                                <form action="<?php echo base_url('quiz/update_quiz_info'); ?>" method="post" class="a-b-u">
                                   
                                    <label class="bold-u">Title :<input  id="quiztitle" name="quiztitle" class="form-control" style = "width: 790px;"  value="<?php echo $quizinfo->title;?>" required></input> 
                                    <label class="bold-u">Description :<input id="quizdescrip" name="quizdescrip" class="form-control" style = "width: 790px;" value="<?php echo $quizinfo->description;?>" row="2" required ></input> 
                                    <button type ="submit" class="btn btn-primary save-button-u go-to-left"><i class="fa fa-check-square bold-u" aria-hidden="true"></i> Save Changes</button>
                                    <a href="<?php echo base_url('quiz/outcome'); ?>" class="btn go-to-right btn-primary continue-button-u" role="button"><i class="fa fa-chevron-right" aria-hidden="true"></i>Continue</a>
                                       
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
    <!-- Load JS here for greater good =============================-->
   
    <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.bundle.js"></script>
    <?php endif; ?>
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
    </script>
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
    