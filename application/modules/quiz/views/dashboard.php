
<!--Dashboard-->
<script type="text/javascript">
    
</script>
<body>
    <?php $this->load->view("shared/nav.php"); ?>
  
    <div class="container-fluid">
     	    <!---->
             <div class="col-sm-2">
                <div>
                    <?php $this->load->view("quiznav.php"); ?>
                </div>
             </div>
     	    <div class="col-sm-10">
                <?php 
                    if(count($quizzes)>0){
                        ?><h3 class="text-center">List of Quizzes</h3><?php
                    }else{
                        ?><h3 class="text-center">No Quiz Yet</h3><?php
                    }
                ?>        
                    <div>
                        <table style="width:100%">
                            <tr>
                                <th>Tite</th>
                                <th>Description</th> 
                            </tr>
                                <?php 
                                    foreach ($quizzes as $quiz) 
                                    {  
                                        ?>
                                        <tr>
                                            <td><?php echo $quiz->title;?></td>
                                            <td><?php echo $quiz->description;?></td>
                                            <td>
                                                <a  href="<?php echo base_url('quiz/preview_quiz/'. $quiz->id); ?>" type ="submit" class="btn btn-default">Preview</a>
                                                <a href="<?php echo base_url('quiz/view_quiz/'. $quiz->id); ?>" type ="submit" class="btn btn-info">Open</a>
                                                <a href="<?php echo base_url('quiz/editquiz/'. $quiz->id); ?>" type ="submit" class="btn btn-primary">Edit</a>                                                
                                                <a href="<?php echo base_url('quiz/delete_quiz/'. $quiz->id); ?>" type ="submit" class="btn btn-danger">Delete</a>    
                                            </td> 
                                        </tr>
                                        <tr>
                                            <td><hr></td>
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
