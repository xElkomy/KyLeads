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
                     
                    <h3><?php echo $quiz->title;?></h3> <h5><?php echo $quiz->description;?></h5>
                            
                    <div class="text-center"><h3><?php echo $quizinfo->title;?> Quiz Settings</h3> <hr></div>
                            
                            <form action="<?php echo base_url('quiz/update_quiz_info'); ?>" method="post">
                                <input type="hidden" name="quizid" value="<?php echo $quizinfo->id;?>"></input>
                                <label>Title :<input name="quiztitle" class="form-control" style = "width: 200px;" value = "<?php echo $quizinfo->title;?>" required></input> 
                                <label>Description :<input name="quizdescrip" class="form-control" style = "width: 500px;" value = "<?php echo $quizinfo->description;?>" required></input> 
                                <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-40">Save Changes</button>
                            </form>

                            <hr>   

                            <div><p><h6> Questions : </h6><?php echo count($questions)?> questions are created</p></div>
                            
                            <hr>
                            
                                <table style="width:100%">
                                    <?php 
                                        $index=0;
                                        
                                    foreach ($questions as $question) 
                                    {  
                                        $index++;
                                    ?>
                                        <tr>
                                            <td><p>Question<?php echo $index?></p> </td>
                                            <td><?php echo $question->title;?></td>
                                            <td>
                                            <a href="<?php echo base_url('quiz/update_answers/'. $question->id); ?>" type ="submit" class="btn btn-primary">Update Answers</a>
                                            <a href="<?php echo base_url('quiz/delete_question/'. $question->id); ?>" type ="submit" class="btn btn-danger">Delete</a> 
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h6> Add Question here</h6>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <form action="<?php echo base_url('quiz/newquestion'); ?>" method="post">
                                                        <input type="hidden" name="quizid" value="<?php echo $quiz->id;?>"></input>
                                                        <label>Question :<input name="questiontitle" class="form-control" style = "width: 500px;" required></input>
                                                        <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-40">Add Question</button>
                                                    </form>  
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
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
    