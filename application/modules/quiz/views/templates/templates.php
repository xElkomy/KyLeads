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
                        <hr>    
                      <table class="table table-f j-c-t-u table-borderless">
                            <tbody>
                            <tr class="table-borderless">
    
                                <td class="f-d-td"><a href="quiz/create" type="button" class="center btn btn-primary n-q" ><h6> <br><i class="fa fa-3x fa-home" aria-hidden="true"></i> <br>  Build your quiz <br> from scratch</h6></a></td>
                            
                            <?php
                                if($this->session->userdata('user_type') === "Admin"){
                            ?>  
                              
                                    <td class="f-d-td"><a href="quiz/createtemplate" type="button" class="center btn btn-primary n-q" ><h6> <br> <i class="fa fa-2x fa-pencil" aria-hidden="true"></i><br> Create New <br> Template</h6></a></td>
                                
                            <?php
                                }
                            ?>   
                            </tr>
                              <tr class="table-borderless">
                                <?php
                                    foreach ($quizzes_template as $key => $quiz) 
                                    {  
                                ?>
                                         
                                    <td class="f-d-td">
                                    <button type="button" class="btn btn-primary n-q" >
                                        <h6><?php echo $quiz->title; ?></h6>

                                        <a href="<?php echo base_url('quiz/preview_template/'. $quiz->id); ?>" type ="submit" class="btn btn-info btn-m-s-u btn-r-u tooltip-r"><i class="fa fa-eye" aria-hidden="true"><span class="tooltiptext-r">Preview</span></i></a>                                            
                                        <a  href="<?php echo base_url('quiz/newquiz_temp/'. $quiz->id); ?>" type ="submit" class="btn btn-success btn-m-s-u btn-r-u tooltip-l"><i class="fa fa-share-square-o" aria-hidden="true"><span class="tooltiptext-l">Use </span></i></a><br>
                                        
                                        <?php if($this->session->userdata('user_type') === "Admin"){
                                            ?>
                                            <a  href="<?php echo base_url('quiz/configure_template/'. $quiz->id); ?>" type ="submit" class="btn btn-warning btn-m-s-u btn-r-u tooltip-r"><i class="fa fa-wrench" aria-hidden="true"><span class="tooltiptext-r">Edit </span></i></a>
                                            <a  href="<?php echo base_url('quiz/delete_quiz_template/'. $quiz->id); ?>" type ="submit" class="btn btn-danger  btn-m-s-u btn-r-u tooltip-l"><i class="fa fa-trash-o" aria-hidden="true"><span class="tooltiptext-l">Delete </span></i></a>
                                            <?php
                                        }
                                        ?>
                                        
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
