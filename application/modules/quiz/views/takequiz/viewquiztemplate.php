<body class="body-t-p">
<nav class="nav-t-p">
    <img src="../images/kyleads/kyleads-logo-template-preview.jpg" alt="" width="250px" height="90px">  
</nav>  

<div class="outer-div">
    <div class="inner-div">
        
        <div class="row">
        <p><?php echo $status;?></p>
            <div class="col j-c-t-u">
                <div id="London" class="city">
                    <hr>
                        <div class="text-center"><h3><?php echo $quiz[0]->title?></h3></div>
                        <div class="text-center"><h6><?php echo $quiz[0]->description?></h6></div>
                        <button type="button" onclick="start('previewquestion')" class="btn btn-t-p btn-success"><i class="fa fa-sign-in" aria-hidden="true"> Start</i></button>
                    <hr>
                </div>

                <div id="previewquestion" style="display:none">

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
                            <h6> <?php echo $question->title?></h6>
                               
                                <div class="form-check f-c-c-t-p">
                                    <?php
                                        foreach ($question->choices as $choice) 
                                        {
                                    ?>
                                                <div class="margin-l-t-p">
                                                    <label class="form-check-label f-c-l-t-p">
                                                        <input onclick="addResult(<?php echo $quizid;?>,<?php echo $question->id;?>,<?php echo $choice->id;?>,<?php echo $choice->outcome_id;?>)" type="radio" class="form-check-input f-c-i-t-p" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u"><?php echo $choice->value;?></h7></a>   
                                                    </label>    
                                                </div>
                                       
                                            <br>
                                            <?php
                                        }
                                    ?> 
                                </div>
                                <button type="button" name="next" class="btn next btn-info" style="float:right">Continue   <i class="fa fa-arrow-right" aria-hidden="true">  </i></button>    
                    </div> 
                    <?php  
                        }else{
                    ?>
                            <div class="item">
                            <p>Question <?php echo $idx+1;?> of <?php echo count($quiz[0]->questions);?></p>
                            <h6> <?php echo $question->title?></h6>
                               
                                <div class="form-check f-c-c-t-p">
                                    <?php
                                        foreach ($question->choices as $choice) 
                                        {
                                    ?>
                                                <div class="margin-l-t-p">
                                                    <label class="form-check-label f-c-l-t-p">
                                                        <input onclick="addResult(<?php echo $quizid;?>,<?php echo $question->id;?>,<?php echo $choice->id;?>,<?php echo $choice->outcome_id;?>)" type="radio" class="form-check-input f-c-i-t-p" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u"><?php echo $choice->value;?></h7></a>   
                                                    </label>    
                                                </div>
                                            <br>
                                            <?php
                                        }
                                    ?>
                                </div>
                                <?php if($idx+1 >= count($quiz[0]->questions)){
                                        ?><button onclick="submitResult()" type="button" class="btn next btn-success" style="float:center">Get Result <i class="fa fa-arrow-right" aria-hidden="true">  </i></button> <?php
                                    }else{
                                        ?> <button type="button" name="back" class="btn next btn-info" style="float:left"><i class="fa fa-arrow-left" aria-hidden="true"> Previous </i></button>   <?php
                                        ?><button type="button" name="next" class="btn next btn-info" style="float:right"> Continue <i class="fa fa-arrow-right" aria-hidden="true"></i></button>  <?php
                                    }
                                ?>       
                                            
                        </div> 
                            <?php 
                            }       
                        }
                    ?>                                                                           
                </div>
                </div>
                <div>
            </div>
        </div> 
    </div>   
</div>
<div class="footer"><h6>Powered by KyLeads</h6></div>

<script>
    function start(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block";  

        var $next = $("button[name=next]");
        $next.on( "click", function() {
            $("#myCarousel").carousel("next");
        });
        var $back = $("button[name=back]");
        $back.on( "click", function() {
            $("#myCarousel").carousel("prev");
        });
    }
    var resultData = [];
    var outcome = [];
    var outcomeData = [];
    var userData = [];
    function addResult(quizid,questionid,answerid,outcomeid){
        if(resultData.length <= 0){
            resultData.push({
                    quizid : quizid,
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
                        quizid : quizid,
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

    function GetOutcomeResult(){
        var arr1 = outcomeData;
        var mf = 1;
        var m = 0;
        var item;
        for (var i=0; i<arr1.length; i++)
        {
                for (var j=i; j<arr1.length; j++)
                {
                        if (arr1[i] == arr1[j])
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
</script>
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