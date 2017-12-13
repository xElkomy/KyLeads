
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
     	    <div class="col-sm-10">
                <div><p><h3><?php echo $quizinfo->title;?></h3></p></div>
                <hr>
                <div><h6> Question : </h6></div>
                <div><?php echo $question->title;?></div>
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
                            <div>
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
                                                    <td>
                                                        <a href="<?php echo base_url('quiz/delete_choice/'. $choice->id); ?>" type ="submit" class="btn btn-danger">Delete</a> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><hr></td>
                                                    <td><hr></td>
                                                </tr> 
                                                <?php
                                            }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a  href="<?php echo base_url('quiz/view_quiz/'. $question->quiz_id); ?>" type ="submit" class="btn btn-success">Done</a> 
                
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
