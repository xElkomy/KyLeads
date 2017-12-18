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
                            <p><h3>Quiz title: <?php echo $quizinfo->title;?></h3></p>
                                <hr>
                            
                            <h6>Question: <?php echo $question->title;?>  </h6>
                                                
                            <div class="panel panel-default row vdivide">
                                <div class="panel-body ">
                                    
                                    <div class="col-md-6">
                                        
                                        <h6>Answer</h6>

                                            <table class="table table-bordered table-hover">     
                                                <?php 
                                                    $index=0;
                                                foreach ($choices as $choice) 
                                                {  
                                                    $index++;
                                                ?>
                                                <tr>
                                                    <td class="col-md-3">Answer: <?php echo $index?></td>
                                                    <td class="col-md-12"><?php echo $choice->value;?></td>
                                                    <td><a href="<?php echo base_url('quiz/delete_choice/'. $choice->id); ?>" type ="submit" class="btn btn-danger btn-r-u"><i class="fa fa-trash" aria-hidden="true">  Delete</i></a></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        
                                    <div class="col-md-6">

                                    <a  href="<?php echo base_url('quiz/quiz_configure/'. $question->quiz_id); ?>" type ="submit" class="btn btn-r-u btn-lg btn-primary btn-wide fa fa-pencil-square g-r-u "> Exit and Save changes</a>
                                        
                                        <form action="<?php echo base_url('quiz/newanswer'); ?>" method="post">
                                            
                                            <label><h6>New Answer:</h6><input name="answerval" class="form-control" style = "width: 410px;" required></input></label>
                                            <input type="hidden" name="quizid" value="<?php echo $question->quiz_id;?>"></input>
                                            <input type="hidden" name="questionid" value="<?php echo $question->id;?>"></input>
                                            <button type ="submit" class="btn btn-lg btn-primary btn-wide g-l-u btn-r-u"><i class="fa fa-plus-circle" aria-hidden="true"> Add answer</i></button>                                  
                                        
                                        </form>
                                
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>

    <!-- End of Content-->

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
