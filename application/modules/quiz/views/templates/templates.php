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
                    <div class="row row-c-u-q">

                    <div id="new-optin" class="tabcontent">

                      <h5 class="j-c-t-u t-b-u">Choose Quiz Template</h5>                    

                      <table class="table table-f j-c-t-u table-borderless">
                            <tbody>
                              <tr class="table-borderless">
                                <td class="f-d-td"><a href="quiz/create" type="button" class="center btn btn-primary n-q" ><h6>Build your quiz <br> from scratch</h6></a></td>
                              </tr>
                              <tr class="table-borderless">
                                <?php
                                    foreach ($quizzes_template as $key => $quiz) 
                                    {  
                                ?>
                                         
                                    <td class="f-d-td">
                                    <button type="button" class="btn btn-primary n-q" >
                                        <h6><?php echo $quiz->title; ?></h6>
                                        <a href="<?php echo base_url('quiz/preview_template/'. $quiz->id); ?>" type ="submit" class="btn btn-default btn-r-u">Preview</a>                                            
                                        <a  href="<?php echo base_url('quiz/newquiz_temp/'. $quiz->id); ?>" type ="submit" class="btn btn-primary">Use Quiz</a> 
                                    </button>
                                    </td>       
                                                                               
                                <?php
                                     }
                                ?>
                              </tr>
                             </tbody>
                          </table>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
<!--/.fluid-container-->
    <!-- End of Content-->
    <!-- modals -->


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
