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
    
                    foreach($quiz[0]->questions as $idx => $question){
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
                                                                <input type="radio" class="form-check-input f-c-i-t-p" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u"><?php echo $choice->value;?></h7></a>   
                                                            </label>    
                                                        </div>
                                               
                                                    <br>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                          
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
                                                        <input type="radio" class="form-check-input f-c-i-t-p" name="choice" value="<?php echo $choice->id;?>"><a><h7 class="t-b-u"><?php echo $choice->value;?></h7></a>   
                                                    </label>    
                                                </div>
                                                
                                            <br>
                                            <?php
                                        }
                                    ?>
                                </div>
                                    <button type="button" name="back" class="btn back btn-success" style="float:left"><i class="fa fa-arrow-left" aria-hidden="true"> Back</i></button>
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
    function start(name) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(name).style.display = "block";  
    
    var $choice = $( "input:radio[name=choice]" );
    $choice.on( "click", function() {
        $("#myCarousel").carousel("next");
    });

    var $back = $( "button[name=back]" );
    $back.on( "click", function() {
        $("#myCarousel").carousel("prev");
    });
    }
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