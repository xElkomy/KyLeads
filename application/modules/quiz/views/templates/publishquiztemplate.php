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
              <div class="container ">
                    <?php $cquiz = $quiz[0]; ?>
                    <h3>Publish Your Quiz</h3>
                    <h6>Title : <?php echo $cquiz->title?></h6>
                    <h6>Outcomes : 
                        <?php
                            if(count($cquiz->outcomes) > 0){
                                echo 'Complete';
                                $outcomesStatus=true;
                            }
                            else{
                                echo 'Incomplete';
                                $outcomesStatus=false;
                            } 
                        ?>
                    </h6>
                    <h6>Questions : 
                        <?php 
                            if(count($cquiz->questions) > 0){
                                echo 'Complete';
                                $questionsStatus=true;
                            }
                            else{
                                echo 'Incomplete';
                                $questionsStatus=false;
                            } 
                        ?>
                    </h6>
                    <h6>Outcome Mapping : 
                        <?php 
                             $isOutcomeComplete = true;
                            foreach ($cquiz->questions as $question) {
                                foreach ($question->choices as $choice) {
                                    if($choice->outcome_id == NULL){
                                        $isOutcomeComplete = false; 
                                    }
                                }
                            }
                            if(!$isOutcomeComplete){
                                echo "InComplete";
                                $mapStatus=false;
                            }
                            else{
                                echo "Complete";
                                $mapStatus=true;
                            }
                        if($outcomesStatus==true && $questionsStatus==true && $mapStatus==true){
                            echo "<br>Ready to Publish";
                        }else{
                            echo "<br>Not Ready to Publish";
                        }
                        ?>
                    </h6>
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
