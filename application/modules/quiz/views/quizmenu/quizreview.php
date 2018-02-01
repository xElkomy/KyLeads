<script type="text/javascript">
    var Quiz = <?php echo json_encode($quiz[0])?>;
</script>
<body class="body-custom bg-q-r">

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
      <div id="page-content-wrapper ">
          <div class="page-content ">
                <div class="container-q  ">           


            <div class="outer-div">
                <div class="inner-div">
                    <div class="row">
                        <div class="col j-c-t-u">
                      
                        <div class="city">
                            <hr>
                                <div class="text-center"><h3><?php echo $quiz[0]->title?></h3></div>
                                <div class="text-center"><h6><?php echo $quiz[0]->description?></h6></div>
                                <button type="button" onclick="start('previewquestion')" class="btn btn-t-p btn-success"><i class="fa fa-sign-in" aria-hidden="true"> Start</i></button>
                            <hr>
                        </div>
                        <div id="showform">
                            <hr>
                            <h6 style="padding:50px 0 0 20px;">Enter in your information in below to get your result!</h6>
                                
                                <form style="width:500px;margin:auto;" id="prospects_form" onsubmit="return false" >
                                
                                    <div class="form-group">
                                        <label for="usr" name="name" style="float:left">Name:</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>

                                    <div class="form-group">
                                        <label for="email" email="email"style="float:left">Email:</label>
                                        <input type="email" class="form-control" id="myemail">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-t-p" style="width:300px;"><i class="fa fa-paper-plane-o" aria-hidden="true"> GET MY RESULT!</i></button>
                                </form>

                            <hr>
                        </div>
                        <div id="showquizsummary">
                            <h6>Please wait .....</h6> 
                        </div>
    
                    <div id="previewquestion" style="display:none">
                    <div id="hideform">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                    <!-- Wrapper for carousel items -->
                                    <div class="carousel-inner">
                                <?php
                                    $firstQuestion=0;
                                    
                                    foreach($quiz[0]->questions  as $idx => $question){
                                        if($firstQuestion === $idx){
                                    ?>
                                            <div class="item active">
                                            <p>Question <?php echo $idx+1;?> of <?php echo count($quiz[0]->questions);?></p>
                                            <h6 class="bold-u a-b-u"> <?php echo $question->title?></h6>
                                            <hr>
                                            <table class="table">
                                                <tbody>
                                                    
                                                    <?php
                                                        foreach ($question->choices  as $idx1 => $choice) 
                                                        {    
                                                    ?>
                                                           <tr class="nopadding">
                                                                <td class="nopadding">
                                                                    <label class="listofradios-reviewquiz center-u">
                                                                        <input onclick="addResult(<?= $idx1?>,<?= $idx?>)"
                                                                        type="radio" id="radio-preview" class="go-to-left radio-aligment-quiz-preview" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="bold-u a-w-u quiz-preview-choices"><?php echo $choice->value;?></h7></a>   
                                                                    </label>    
                                                                </td>
                                                            </tr>
                                                            
                                                            <?php
                                                        }
                                                    ?> 
                                                  
                                                </tbody>
                                            </table>
                                                <!-- <button type="button" name="next" class="btn btn-success btn-t-p" style="float:right"> Continue <i class="fa fa-arrow-right" aria-hidden="true">  </i></button>     -->
                                    </div> 
                                    <?php  
                                        }else{
                                    ?>
                                            <div class="item">
                                            <p>Question <?php echo $idx+1;?> of <?php echo count($quiz[0]->questions);?></p>
                                            <h6 class="bold-u a-b-u"> <?php echo $question->title?></h6>
                                            <hr>
                                                <div class="form-check">
                                                <form>
                                                    <table class="table">
                                                        <tbody>
                                                    
                                                                <?php
                                                                    foreach ($question->choices as $idx1 => $choice) 
                                                                    {    
                                                                ?>
                                                                    <tr class="nopadding">
                                                                            <td class="nopadding">
                                                                            <?php
                                                                            if($idx+1 >= count($quiz[0]->questions)){
                                                                                ?>
                                                                                <label class="listofradios-reviewquiz center-u">
                                                                                    <input onclick="addResult(<?= $idx1?>,<?= $idx?>)"
                                                                                    type="radio" id="radio-preview" class="go-to-left radio-aligment-quiz-preview" name="last" value="<?php echo $choice->id;?>"><a><h7 class="bold-u a-w-u quiz-preview-choices"><?php echo $choice->value;?></h7></a>   
                                                                                </label>
                                                                                <?php
                                                                            }else{
                                                                                ?>
                                                                                    <label class="listofradios-reviewquiz center-u">
                                                                                    <input onclick="addResult(<?= $idx1?>,<?= $idx?>)"
                                                                                    type="radio" id="radio-preview" class="go-to-left radio-aligment-quiz-preview" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="bold-u a-w-u quiz-preview-choices"><?php echo $choice->value;?></h7></a>   
                                                                                </label>
                                                                            <?php
                                                                            }
                                                                            ?>    
                                                                            </td>
                                                                        </tr>
                                                                       
                                                                <?php
                                                                    }
                                                                ?> 
                                                  
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                                    <button type="button" name="back" class="btn btn-success go-to-left bold-u a-w-u quiz-preview-previous-button buttonColor-u"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</button>               
                                                </div> 
                                                    <?php 
                                                    }       
                                                }
                                            ?>                                                                          
                                            </div>
        
                                    </div>
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
    <script>

    function start(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block";  

        var $choice = $( "input:radio[name=choice]" );
        // $choice.on( "click", function() {
        //     $("#myCarousel").carousel("next");
        // });

        var $last = $( "input:radio[name=last]" );
        $last.on( "click", function() {
            $("#showform").show();
            $('#hideform').hide();
        });
    
        var $back = $("button[name=back]");
        $back.on( "click", function() {
            $("#myCarousel").carousel("prev");
        });


        // var x = document.getElementById("myemail").required;

        $("#prospects_form").submit(function(e) {

            e.preventDefault();
            $("#showform").hide();
            completequiz();
            $('#showquizsummary').show();
            

        });

      

    }


    var resultData = [];
    var outcome = [];
    var outcomeData = [];
    var userData = [];
    function addResult(choiceidx,questionidx){
        
        $("#myCarousel").carousel("next");
        var questionid = Quiz.questions[questionidx].auth_token;
        var answerid = Quiz.questions[questionidx].choices[choiceidx].auth_token;
        var outcomeid = Quiz.questions[questionidx].choices[choiceidx].outcome_token;
        // alert("Question : "+questionid+"Choice : "+answerid);
        if(resultData.length <= 0){
            resultData.push({
                    questionid : questionid,
                    answerid : answerid
            });
            outcomeData.push(outcomeid);
        }else{
            var isDataExist = false;
            for (var a = 0; a < resultData.length; a++) {
                if(resultData[a].questionid == questionid){
                    resultData[a].answerid = answerid;
                    outcomeData[a] = outcomeid;
                    isDataExist = true;
                }
            }
            if(isDataExist == false){
                resultData.push({
                        questionid : questionid,
                        answerid : answerid
                });
                outcomeData.push(outcomeid);
            }
        }

        // console.log(outcomeData);
        // console.log(resultData);
       
        // console.log("Question : "+questionid+" answer : "+answerid+" outcome : "+outcomeid );
        // console.log(resultData);
        // submitResult();
    }
    
    function completequiz(){
        
        var outcomeid =  GetOutcomeResult();
        $('#showquizsummary').load('<?php echo base_url(); ?>takequiz/getresult?id='+outcomeid);
    }
    function GetOutcomeResult(){
        var arr1 = outcomeData;
        var mf = 1;
        var m = 0;
        var item;
        for (var i=0; i<arr1.length; i++)
        {
                for (var j=i; j<arr1.length; j++)
                {
                        if (arr1[i] === arr1[j])
                        m++;
                        if (mf<m)
                        {
                        mf=m; 
                        item = arr1[i];
                        }
                }
                m=0;
        }
       return item;
    }
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
</script>
                    <!-- End of Content-->

                    <!-- Load JS here for greater good =============================-->
                   



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