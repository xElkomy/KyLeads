
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
                 <div class="text-center"><h3><?php echo $quiz->title?></h3> <hr></div>
                 <div class="text-center"><h6><?php echo $quiz->description?></h6> <hr></div>
                 
                 <?php
                    ?>
                        <div class="tab">
                            <?php
                                foreach ($questions as $key => $question) {
                                    ?>
                                        
                                        <button class="btn btn-lg btn-default tablinks" onclick="openQuestion(event, 'Question <?php echo $key+1;?>')"><?php echo $key+1;?></button>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                     $currentQuestion=0;
                        
                        foreach($questions as $idx => $question){
                            // if($currentQuestion === $idx){
                                ?>
                                    <div id="Question <?php echo $idx+1;?>" class="tabcontent">
                                        <p>Question <?php echo $idx+1;?> of <?php echo count($questions);?></p>
                                        <h6> <?php echo $question->title?></h6>
                                        <table>
                                                <?php 
                                                    ?>
                                                    <form action="">
                                                    <ul>
                                                        <?php
                                                        foreach ($question->choices as $choice) 
                                                        {  
                                                            ?>
                                                            <li class = "btn btn-lg btn-seconday btn-wide" style="text-align: left; width: 300px;">
                                                                <input type="radio" name="choice" value="<?php echo $choice->id;?>"><a><h7><?php echo $choice->value;?></h7></a>
                                                            </li></br>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    </form>
                                                    <?php
                                                ?>
                                        </table>
                                    </div> 
                                <?php  
                                // }          
                        }
                    ?> 
                        <?php 
                            if($currentQuestion>0){
                                ?><button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-40">Back</button><?php
                            }
                        ?>
                    <?php        
                ?>
        <script>
            function openQuestion(evt, name) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                }
            tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
            document.getElementById(name).style.display = "block";
            evt.currentTarget.className += " active";
            }
            // document.getElementById("defaultOpen").click();
            $(document).ready(function(){
                $('.tablinks:first').click();
            });
        </script>            
     	       
            
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
