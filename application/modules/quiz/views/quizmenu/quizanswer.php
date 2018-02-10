<script>
    var Questiondata = <?php echo json_encode($question);?>;
    var Outcomesdata = <?php echo json_encode($outcomes);?>;
    var Choicesdata = <?php echo json_encode($choices);?>;
   
</script>
  <div id="">
      <div class="">
          <div class="container ">
                <div class="row" style="width:100%;height:100%">          
                        <div class="panel panel-default row vdivide">
                            <div class="panel-body ">


                                <div class="col-md-7">
                                    
                                    <!-- <h7 class="bold-u a-b-u">Your answers:</h6> -->
                                    <form action="<?php echo base_url('quiz/newanswer'); ?>" method="post" class="go-to-right">
                                    
                                    <button type ="" class="btn btn-lg btn-primary quiz-add-new-answer go-to-right"data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Answer</button>                                                                  
                                        
                                        <input name="answerval" placeholder="Insert new Answer here.." class="form-control" style = "width: 300px; margin:2px" required></input></label>
                                        <input type="hidden" name="quizid" value="<?php echo $question->quiz_token;?>"></input>
                                        <input type="hidden" name="questionid" value="<?php echo $question->auth_token;?>"></input>
                                        
                                    </form>
                                  
                                        
                                        <table class="table table-bordered table-hover">
                                            
                                            <tr>
                                                <td class="col-md-1">#</td>
                                                <td class="col-md-1">Answers:</td>
                                                <td class="col-md-1 center-u">Outcomes</td>
                                                <td class="col-md-1 center-u">Delete</td>
                                            </tr>
                                            <?php 
                                                $index=0;
                                            foreach ($choices as $key => $choice) 
                                            {  
                                                $index++;
                                            ?>
                                            <tr>
                                                <td class="col-md-1"><?php echo $index?></td>
                                                <td class="col-md-10"><?php echo $choice->value;?></td>
                                                <td class="col-md-10 center-u">
                                                <div class="dropdown">
                                                    <?php 
                                                        if($choice->outcome_token != NULL){
                                                            $buttosize = "2x";
                                                        }else{
                                                            $buttosize = "1x";
                                                        }
                                                    ?>

                                                    <a onclick="myFunction(<?php echo $key+1;?>,<?php echo count($choices);?>, <?php echo $choice->token;?> )" class="fa fa-2x fa-tasks fa-<?php echo $buttosize;?> a-b-u dropbtn" aria-hidden="true"></a>
                                                        <div id="myDropdown<?php echo $key+1;?>" class="dropdown-content-outcomes">
                                                        
                                                        <div class="go-to-left bold-u a-b-u">Logic Branching: <i class="fa fa-question-circle" aria-hidden="true"></i></div><br>
                                                        <div class="go-to-left a-b-u">Select the logic branching action for your answer </div>
                                                        
                                                       <?php
                                                            // var_dump($outcomes[0]->title);
                                                            if(count($outcomes)>0){
                                                                foreach ($outcomes as $key1 => $outcome) {
                                                                    // var_dump($outcome->title);
                                                                    if($choice->outcome_token == $outcome->auth_token) 
                                                                        $color = "btn btn-primary ";
                                                                    else    
                                                                        $color = "btn btn-default";
                                                                    ?>
                                                                        
                                                                        <a style="width:100%; margin:2px"class="<?php echo $color;?> quiz-outcome-result" href="<?php echo base_url('quiz/link_outcome/'.$question->auth_token.'/'. $choice->auth_token).'/'.$outcome->auth_token; ?>"><?php echo $outcome->title;?></a>
                                                                        <!-- <a style="width:100%; margin:2px"class="<?php echo $color;?> quiz-outcome-result" onclick="link(<?=$key?>,<?=$key1?>)"><?php echo $outcome->title;?></a> -->
                                                                    <?php
                                                                }
                                                            }else{
                                                                ?><p class="btn btn-default">No Outcome yet</p><?php
                                                            }
                                                            
                                                       ?>
                                                    </div>

                                                </div>
</td>
                                                                                                <td class="center-u">
                                                <a href="<?php echo base_url('quiz/delete_choice/'.$question->auth_token.'/'. $choice->auth_token); ?>" type ="submit" class="btn btn-danger btn-r-u custom-quiz-quizanswer-button-delete "><i class="fa fa-trash" aria-hidden="true"> </i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                    
                            </div>
                            <br>  
                        </div>
                    </div>
                </div>
          </div>
        </div>
    <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.bundle.js"></script>
    <?php endif; ?>
    <script type="text/javascript" src="./assets/js/quiz/answers.js">
    
    </script>
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

