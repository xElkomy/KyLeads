
<!--Dashboard-->
<script type="text/javascript">
    
</script>
<body>
    <?php $this->load->view("shared/nav.php"); ?>
  
    <div class="container-fluid">
     	    <div class="col-sm-2">
     	        <div>
     	             <?php $this->load->view("quiznav.php"); ?>
     	        </div>
     	           
     	    </div>
     	    <!---->
     	    <div class="col-sm-9">
     	        <h3 class="text-center">List of Quizzes</h3>
                    <div>
                        <!--Get quiz Data from Controller-->
                        <!--Display-->
                         <!--Loop to display llist of Quizzes-->
                        <?php
                            for($i=0;$i<5;$i++){
                                ?>
                                <div class="row">
                                     <div class="col-sm-4">
                                         <div class="box"></div>
                                     </div>
                                     <div class="col-sm-4">
                                         <p>Put Description here</p>
                                     </div>
                                     <div class="col-sm-3">
                                         <a href="quiz">Edit |</a>
                                         <a href="quiz">Reports |</a>
                                         <a href="quiz">Contacts</a>
                                     </div>
                                     
                                </div>
                                <?php
                            }
                        ?>
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
