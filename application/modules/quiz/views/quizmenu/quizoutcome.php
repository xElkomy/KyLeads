<script>
    var Outcomesdata = <?php echo json_encode($outcomes);?>
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
                    <div class="row">
                        <div class="col-md-6 "> 
                        <h3 class="bold-u a-b-u">Title: <?php echo $quizinfo->title;?></h3> <h6 class="bold-u a-b-u">Description: <?php echo $quizinfo->description;?></h5>
                            
                                
                                <table class="table table-bordered table-hover w-bg">
                                    <tr>
                                        <td class="col-md-1">
                                            <h6 class="bold-u a-b-u">
                                            <?php 
                                                if(count($outcomes) > 0){
                                                    echo count($outcomes);
                                                }else{
                                                    ?>0<?php 
                                                }
                                                ?>
                                            </h6>
                                        </td>
                                        <td class="col-md-10">
                                            <h6 class="bold-u a-b-u">
                                                <?php if(count($outcomes) > 0){
                                                    ?> Outcome/s Created<?php
                                                }else{
                                                    ?> No Outcome yet<?php          
                                                }
                                                ?> 
                                            </h6>
                                        </td>
                                        <td>
                                                <button type="button" class="btn custom-quiz-outcomes-button-add btn-primary bold-u a-w-u" data-toggle="modal" data-target="#addquestion">
                                                <i class="fa fa-plus-circle fa-1x" aria-hidden="true"> </i> Add New Outcome
                                                </button>
                                        </td>
                                    </tr>

                                </table>
                                    <table class="table table-bordered table-hover w-bg">
                                            <tr>
                                                <td class="col-md-1">#</td>
                                                <td class="col-md-1">Outcome:</td>
                                                <td class="col-md-1 center-u">Edit</td>
                                                <td class="col-md-1 center-u">Delete</td>
                                            </tr>                                    
                                        <?php 
                                            $index=0;  
                                        foreach ($outcomes as $key => $outcome) 
                                        {  
                                            $index++;
                                        ?>
                                            <tr class="tr-custom">
                                                <td class="col-md-1 bold-u a-b-u"><?php echo $index?></td>
                                                <td class="col-md-10 bold-u a-b-u"><?php echo $outcome->title;?></td>
                                                <td class="j-c-t-u">
                                                    <a type ="submit" onclick="myFunction(<?php echo $key?>)" id="quiz-outcome-button"class="btn btn-success custom-quiz-outcomes-button-delete a-w-u"><i class="fa fa-pencil" aria-hidden="true">  </i> </a> 
                                                </td>
                                                <td class="j-c-t-u">
                                                    <a href="<?php echo base_url('quiz/delete_outcome/'. $outcome->auth_token); ?>" type ="submit" class="btn btn-danger custom-quiz-outcomes-button-delete a-w-u"><i class="fa fa-trash" aria-hidden="true">  </i> </a> 
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <a href="<?php echo base_url('quiz/quizquestions'); ?>" class="btn go-to-right btn-primary continue-button-u btn-r-u" role="button"><i class="fa fa-chevron-right" aria-hidden="true"></i> Continue</a>
                                    </div> 
                                    
                                    <div class="col-md-6 col-md-6-quiz-outcome" id="showform">
                                        
                                        <h6 class="bold-u a-b-u"><i class="fa fa-1x fa-wrench" aria-hidden="true"></i>&nbspConfigure</h6>
                                
                                        <hr>
                                  
                                        <form>
                                            <small class="go-to-left" id="outcomeNumber"></small><br>
                                            <label class="go-to-left"> Outcome title : <br> </label>
                                            <input id="outcomeTitle" name="outcometitle" placeholder="Update Outcome here.." class="form-control" style = "width: 530px; margin-right:20px;" required></input>
                                            <label class="go-to-left">Outcome description :</label>
                                            <textarea  id="outcomeDescrip" name="outcomedescription" placeholder="Update Description here.." class="form-control" style = "width: 530px; margin-right:20px;margin-top:10px;" rows="10" cols="50" required></textarea>
                                            <button id="btnSubmit" type ="submit" class="btn bold-u a-w-u btn-lg btn-primary margin-top-20 go-to-right btn-r-u"><i class="fa fa-pencil" aria-hidden="true"></i> Update Outcome</button>
                                        </form>
                                    </div>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="vertical-alignment-helper">
                                            <div class="modal-dialog vertical-align-center" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                                                        <h6 class="modal-title bold-u a-b-u" id="exampleModalLabel">Adding outcome...</h6>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel">
                                                            <div class="panel-body">
                                                                <form action="<?php echo base_url('quiz/newoutcome'); ?>" method="post">
                                                                <label><input name="outcometitle" placeholder="Insert Outcome here.." class="form-control" style = "width: 540px;" required></input>
                                                                <textarea textarea rows="4" cols="50"name="outcomedescription" placeholder="Insert Description here" class="form-control" style = "width: 540px; margin-top:10px;"required></textarea>
                                                                <button type ="submit" class="btn  bold-u a-w-u btn-lg btn-primary margin-top-20 go-to-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Outcome</button>
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
        document.getElementById("outcomeTitle").value=Outcomesdata[idx].title;
        document.getElementById("outcomeDescrip").value=Outcomesdata[idx].description;
        document.getElementById("outcomeNumber").innerHTML="Outcome # "+(idx+1);
        if (x.style.display === "none") {
            x.style.display = "block";
        }else {
            x.style.display = "block";
        }
    }
   
    $('#btnSubmit').on('click', function(){
        if($('#outcomeTitle').val() === '' || $('#outcomeDescrip').val() === ''){
            alert("missing values");
        }else{
            var outcomeData = [];
            var baseto = "outcome";
            outcomeData.push({
                    id : Outcomesdata[index].auth_token,
                    title: $('#outcomeTitle').val(),
                    description: $('#outcomeDescrip').val(),
                    base : baseto,
            });
            Data = JSON.stringify( outcomeData[0]);
            $.post('<?php echo base_url(); ?>quiz/updatequizdetials', {results: Data, }).done(function(data) {
                //  alert("start quiz");
            });
           
        }           
    });
    
    </script>   
    
</body>
</html>
    