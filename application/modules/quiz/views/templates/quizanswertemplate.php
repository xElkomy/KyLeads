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
                                            foreach ($choices as $key => $choice) 
                                            {  
                                                $index++;
                                            ?>
                                            <tr>
                                                <td class="col-md-3">Answer: <?php echo $index?></td>
                                                <td class="col-md-7"><?php echo $choice->value;?></td>
                                                <td class="col-md-4">
                                                <div class="dropdown">
                                                    <?php 
                                                        if($choice->outcome_id != null){
                                                            $buttosize = "3x";
                                                        }else{
                                                            $buttosize = "1x";
                                                        }
                                                    ?>
                                                    <a onclick="myFunction(<?php echo $key+1;?>,<?php echo count($choices);?>, <?php echo $choice->id;?> )" class="fa fa-s fa-cogs fa-<?php echo $buttosize;?> c-d-f-d t-b-u a-u active-shadow dropbtn" aria-hidden="true"></a>
                                                    <div id="myDropdown<?php echo $key+1;?>" class="dropdown-content">
                                                       <?php
                                                            // var_dump($outcomes[0]->title);
                                                            if(count($outcomes)>0){
                                                                foreach ($outcomes as $outcome) {
                                                                    // var_dump($outcome->title);
                                                                    if($choice->outcome_id == $outcome->id)
                                                                        $color = "btn btn-primary";
                                                                    else    
                                                                        $color = "btn btn-default";
                                                                    ?><a class="<?php echo $color;?>" href="<?php echo base_url('quiz/link_template_outcome/'.$question->id.'/'. $choice->id).'/'.$outcome->id; ?>"><?php echo $outcome->title;?></a><?php
                                                                }
                                                            }else{
                                                                ?><p class="btn btn-default">No Outcome yet</p><?php
                                                            }
                                                            
                                                       ?>
                                                    </div>

                                                </div>
                                                </td>
                                                <td><a href="<?php echo base_url('quiz/delete_choice_template/'. $choice->id); ?>" type ="submit" class="btn btn-danger btn-r-u"><i class="fa fa-trash" aria-hidden="true">  Delete</i></a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                    
                                <div class="col-md-6">

                                <a  href="<?php echo base_url('quiz/templatequestions'); ?>" type ="submit" class="btn btn-r-u btn-lg btn-primary btn-wide fa fa-pencil-square g-r-u "> Exit and Save changes</a>
                                    
                                    <form action="<?php echo base_url('quiz/newanswer_template'); ?>" method="post">
                                        
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
    <script>
                            /* When the user clicks on the button, 
                            toggle between hiding and showing the dropdown content */
                            function myFunction(id,total,quizid) {
                                for (let index = 1; index < total+1; index++) {
                                    if(index == id){
                                        // alert("currenquiz"+quizid);
                                        document.getElementById("myDropdown"+id).classList.toggle("show");
                                    }else{
                                        document.getElementById("myDropdown"+index).classList.remove("show");
                                    }       
                                }  
                            }

                            // Close the dropdown if the user clicks outside of it
                            window.onclick = function(event) {
                            if (!event.target.matches('.dropbtn')) {

                                var dropdowns = document.getElementsByClassName("dropdown-content");
                                var i;
                                for (i = 0; i < dropdowns.length; i++) {
                                var openDropdown = dropdowns[i];
                                    if (openDropdown.classList.contains('show')) {
                                        openDropdown.classList.remove('show');
                                    }
                                }
                            }
                            }
                        </script>
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
