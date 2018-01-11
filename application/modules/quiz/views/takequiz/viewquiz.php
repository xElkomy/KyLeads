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
                <button type="button" onclick="start('previewquestion'); startquiz();" class="btn btn-t-p btn-success"><i class="fa fa-sign-in" aria-hidden="true"> Start</i></button>
            <hr>
        </div>
        <div id="showform">
                <hr>
                <h6 style="padding:50px 0 0 20px;">Enter in your information in below to get your result!</h6>
                                
                <form style="width:500px;margin:auto;" id="prospects_form" onsubmit="return false" >
                                
                <div class="form-group">
                    <label for="usr" name="name" style="float:left">Name:</label>
                    <input type="text" class="form-control" id="username">
                </div>

                <div class="form-group">
                    <label for="email" email="email"style="float:left">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <button type="submit" class="btn btn-success btn-t-p" style="width:300px;"><i class="fa fa-paper-plane-o" aria-hidden="true"> GET MY RESULT!</i></button>
                </form>

                <hr>
        </div>
        <div id="showquizsummary"> 
                            
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
                    <h6> <?php echo $question->title?></h6>
                    
                        <div class="form-check f-c-c-t-p">
                            <?php
                                foreach ($question->choices as $choice) 
                                {
                            ?>

                                        <div class="margin-l-t-p">
                                            <label class="form-check-label f-c-l-t-p">
                                                <input onclick="addResult(<?php echo $quizid;?>,<?php echo $question->id;?>,<?php echo $choice->id;?>,<?php echo $choice->outcome_id;?>)" 
                                                type="radio" class="form-check-input f-c-i-t-p" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u" style="font-size:17px;"><?php echo $choice->value;?></h7></a>   
                                            </label>    
                                        </div>
                            
                                    <br>
                                    <?php
                                }
                            ?> 
                        </div>
                        <!-- <button type="button" name="next" class="btn btn-success btn-t-p" style="float:right"> Continue <i class="fa fa-arrow-right" aria-hidden="true">  </i></button>     -->
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
                                                <?php
                                                    if($idx+1 >= count($quiz[0]->questions)){
                                                        ?>
                                                        <input onclick="addResult(<?php echo $quizid;?>,<?php echo $question->id;?>,<?php echo $choice->id;?>,<?php echo $choice->outcome_id;?>); completequiz(); " type="radio" 
                                                        class="form-check-input f-c-i-t-p" name="last" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u" style="font-size:17px;"><?php echo $choice->value;?></h7></a>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <input onclick="addResult(<?php echo $quizid;?>,<?php echo $question->id;?>,<?php echo $choice->id;?>,<?php echo $choice->outcome_id;?>)"type="radio" 
                                                        class="form-check-input f-c-i-t-p" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u" style="font-size:17px;"><?php echo $choice->value;?></h7></a>
                                                    <?php
                                                    }
                                                ?>
                                                  
                                            </label>    
                                        </div>
                                    <br>
                            <?php
                                }
                            ?>
                        </div>
                            <button type="button" name="back" class="btn next btn-success btn-t-p" style="float:left"><i class="fa fa-arrow-left" aria-hidden="true"> Previous </i></button>               
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

        var $choice = $( "input:radio[name=choice]" );
        $choice.on( "click", function() {
            $("#myCarousel").carousel("next");
        });

        var $last = $( "input:radio[name=last]" );
        $last.on( "click", function() {
            $("#showform").show();
            $('#hideform').hide();
        });
    
        var $back = $("button[name=back]");
        $back.on( "click", function() {
            $("#myCarousel").carousel("prev");
        });

        var x = document.getElementById("email").required;

        $("#prospects_form").submit(function(e) {
            e.preventDefault();
                
                if(x===true){
                $("#showform").hide();
                submitResult();
                $('#showquizsummary').show();
            }
        });

    }
    
    function startquiz(){
        var quizData = [];
        quizData.push({
                quizid : <?php echo $quiz[0]->id;?>,
                user_id : <?php echo $quiz[0]->user_id;?>
         });
        Data = JSON.stringify( quizData[0]);
        // alert(Data);
        $.post('<?php echo base_url(); ?>takequiz/startquiz', {results: Data, }).done(function(data) {
            //  alert("start quiz");
        });
    }

    function completequiz(){
        var quizData = [];
        quizData.push({
                quizid : <?php echo $quiz[0]->id;?>,
                user_id : <?php echo $quiz[0]->user_id;?>
         });
        Data = JSON.stringify( quizData[0]);
        // alert(Data);
        $.post('<?php echo base_url(); ?>takequiz/completequiz', {results: Data, }).done(function(data) {
            //  alert("start quiz");
        });
        var outcomeid =  GetOutcomeResult();
        $('#showquizsummary').load('<?php echo base_url(); ?>takequiz/getresult?id='+outcomeid);
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
    function submitResult(){
        addContactData(); 
    }

    function validateForm() {
        var username = document.forms["myForm"]["username"].value;
        var email = document.forms["myForm"]["email"].value;
        if (username == "" || email == "") {
            
            return false;
        }else{
            return true;
        }
    }

    function addContactData(){
        var name = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        userData.push({
            userid : <?php echo $quiz[0]->user_id;?>,
            fname : name,
            lname :  "",
            email :  email,
            outcomeid: GetOutcomeResult(),
            quizid : <?php echo $quiz[0]->id;?>,
        });
        Data = JSON.stringify( userData[0]);
        rData = JSON.stringify( resultData );
        console.log(Data);
        $.post('<?php echo base_url(); ?>takequiz/AddContact', {accountData: Data, resultData: rData, }).done(function(data) {
            //  alert("information added: "+data);
        });
        

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