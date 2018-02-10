<script>
    var Questionsdata = <?php echo json_encode($questions);?>
</script>
<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
            <nav id="spy">
                <?php $this->load->view("quizmenunav.php"); ?>
            </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container-q ">
                    <!-- start of the page -->
                    <div class="row">
                        <div class="col-md-6"> 
                        <h3 class="bold-u a-b-u">Title: <?php echo $quizinfo->title;?></h3> <h6 class="bold-u a-b-u">Description: <?php echo $quizinfo->description;?></h5>
                               
                                <hr>
                          
                                <table class="table table-bordered table-hover w-bg">
                                    
                                    <tr>
                                        <td class="col-md-1">
                                            <h6 class="bold-u a-b-u">
                                            <?php 
                                                if(count($questions) > 0){
                                                    echo count($questions);
                                                }else{
                                                    ?>0<?php 
                                                }
                                                ?>
                                            </h6>
                                        </td>
                                        <td class="col-md-10">
                                            <h6 class="bold-u a-b-u">
                                                <?php if(count($questions) > 0){
                                                    ?> Total Question/s Created<?php
                                                }else{
                                                    ?> No question yet<?php          
                                                }
                                                ?> 
                                            </h6>
                                        </td>
                                        <td>
                                                <!-- Button trigger modal for add question-->
                                                <button type="button" class="btn custom-quiz-outcomes-button-add btn-primary bold-u a-w-u" data-toggle="modal" data-target="#addquestion">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Question
                                                </button>

                                        </td>
                                    </tr>

                                </table>
                                <table class="table table-bordered table-hover w-bg">                                    
                                    <tr>
                                                <td class="col-md-1">#</td>
                                                <td class="col-md-1">Question:</td>
                                                <td class="col-md-1 center-u">Edit</td>
                                                <td class="col-md-1 center-u">Delete</td>
                                            </tr>
                                        <?php 
                                            $index=0;
                                            
                                        foreach ($questions as $key => $question) 
                                        {  
                                            $index++;
                                        ?>
                                            <tr class="tr-custom">
                                            <td class="col-md-1 bold-u a-b-u"><?php echo $index?></td>
                                                <td class="col-md-12"><?php echo $index.'. '.$question->title;?></td>
                                                <td>
                                                    <a type ="submit" onclick="myFunction(<?php echo $key?>)" id="quiz-outcome-button"class="btn btn-success custom-quiz-outcomes-button-delete a-w-u"><i class="fa fa-pencil" aria-hidden="true">  </i>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('quiz/delete_question/'. $question->auth_token); ?>" type ="submit" class="btn custom-quiz-outcomes-button-delete btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </table>

                                        <a href="<?php echo base_url('quiz/quizreview'); ?>" class="btn go-to-right btn-primary continue-button-u btn-r-u" role="button"><i class="fa fa-chevron-right" aria-hidden="true"></i> Continue</a>
                                        </div> 
                                    
                                    <div class="col-md-6 col-md-6-quiz-outcome" id="showform">
                                        <div class="row">
                                            <h6 class="bold-u a-b-u"><i class="fa fa-1x fa-wrench" aria-hidden="true"></i> Update Question with description</h6>
                                    
                                            <hr>
                                    
                                            <form class="center-u">
                                           
                                              
                                                <label id="questionID"></label>
                                               
                                                <small class="go-to-left" id="questionNumber"></small><br>
                                                <label class="go-to-left">Question title:</label>
                                               
                                                <input id="questionTitle" name="outcometitle" placeholder="Update Outcome here.." class="form-control" style = "width: 530px; margin-right:20px;" required></input>
                                                <label class="go-to-left">Question description:</label>
                                                <input  id="questionDescrip" name="outcomedescription" placeholder="Update Description here.." class="form-control" style = "width: 530px; margin-right:20px;" rows="3" cols="50" required></input>
                                                <div class="row">
                                                <div id="answers" style="width:530px;height:100%;margin-top:10px;margin-bottom:10px;border:2px solid lightgray">
                                                    Loading your answers....
                                                        </div> 
                                                </div>
                             
                                                <button id="btnSubmit" type ="submit" style = "position:relative; top:1;" class="btn bold-u a-w-u btn-lg btn-primary margin-bottom-20 go-to-right btn-r-u"><i class="fa fa-pencil" aria-hidden="true"></i> Update Question</button>
                                        
                                            </form> 
                                             
                                        </div>
                                       
                                    </div>
                                    



                                    <!-- Modal -->
                                    <div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="vertical-alignment-helper">
                                            <div class="modal-dialog vertical-align-center" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                                                        <h5 class="modal-title" id="exampleModalLabel">Adding Question </h5>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label><b>Note:</b><i> Question mark is already added after the statement</i> </label>
                                                        <div class="panel panel">
                                                            <div class="panel-body">
                                                                <form action="<?php echo base_url('quiz/newquestion'); ?>" method="post">
                                                                    <input type="hidden" name="quizID" value="<?php echo $quizinfo->id;?>"></input>
                                                                    <label><input name="questiontitle" placeholder="Insert new Question here.." class="form-control" style = "width: 550px; margin:10px;" required></input>
                                                                    <button type ="submit" class="btn  bold-u a-w-u btn-lg btn-primary go-to-right" style = " margin:10px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Question</button>
                                                                </form>                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
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
     <!-- Load JS here for greater good =============================-->
   
    <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.bundle.js"></script>
    <?php endif; ?>
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
    var index;
    function myFunction(idx) {
        index = idx;
        var x = document.getElementById("showform");
        document.getElementById("questionTitle").value=Questionsdata[idx].title;
        document.getElementById("questionDescrip").value=Questionsdata[idx].description;
        document.getElementById("questionNumber").innerHTML="Question # "+(idx+1);
       
        var url ="<?php echo base_url('quiz/update_answers/'); ?>"+Questionsdata[idx].auth_token;
        document.getElementById("answers").innerHTML='<object style="width:530px;height:300px"type="text/html" data="'+url+'" ></object>'; 
        if (x.style.display === "none") {
            x.style.display = "block";
        }else {
            x.style.display = "block";
        }
    }
    $('#btnSubmit').on('click', function(){
        if($('#questionTitle').val() === '' || $('#questionDescrip').val() === ''){
            alert("missing values");
        }else{
            var questionData = [];
            var baseto = "question";
            questionData.push({
                    id : Questionsdata[index].auth_token,
                    title: $('#questionTitle').val(),
                    description: $('#questionDescrip').val(),
                    base : baseto,
            });
            Data = JSON.stringify( questionData[0]);
            $.post('<?php echo base_url(); ?>quiz/updatequizdetials', {results: Data, }).done(function(data) {
                //  alert("start quiz");
            });
           
        }           
    });
    </script>
</body>
</html>
    