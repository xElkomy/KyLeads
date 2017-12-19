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
                    <div class="row row-c-u-f">
                        <p><h3><?php echo $quizinfo->title;?></h3></p>
                    <hr>
                    <h6> Question : </h6>
                        <?php echo $question->title;?>
                            <div class="panel panel-default row vdivide">
                                <div class="panel-body ">
                                    <div class="col-sm-6">
                                        <form action="<?php echo base_url('quiz/newanswer'); ?>" method="post">
                                            <input type="hidden" name="quizid" value="<?php echo $question->quiz_id;?>"></input>
                                            <input type="hidden" name="questionid" value="<?php echo $question->id;?>"></input>
                                            <label>New Answer:<input name="answerval" class="form-control" style = "width: 300px;" required></input>
                                            <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-40">Add Answer</button>
                                        </form>  
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-center"><h6> Answers :</h6></div>
                                            <table style="width:100%">
                                                <?php 
                                                    $index=0;
                                                foreach ($choices as $choice) 
                                                {  
                                                    $index++;
                                                ?>
                                                    <tr>
                                                        <td><p>Answer <?php echo $index?></p> </td>
                                                        <td><?php echo $choice->value;?></td>
                                                        <td><a href="<?php echo base_url('quiz/delete_choice/'. $choice->id); ?>" type ="submit" class="btn btn-danger">Delete</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                    </div>
                                </div>
                            </div>
                            <a  href="<?php echo base_url('quiz/quiz_configure/'. $question->quiz_id); ?>" type ="submit" class="btn btn-success">Done</a> 
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
