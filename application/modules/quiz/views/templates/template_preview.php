<body class="body-t-p">
<nav class="nav-t-p">
    <img src="../images/kyleads/kyleads-logo-template-preview.jpg" alt="" width="250px" height="90px">  
</nav>  


<div class="outer-div">
    <div class="inner-div">
        <div class="row">
            <div class="col j-c-t-u">

                <div id="London" class="w3-container city">
                    <hr>
                        <div class="text-center"><h3><?php echo $quizzes[0]->title?></h3></div>
                        <div class="text-center"><h6><?php echo $quizzes[0]->description?></h6></div>
                        <button type="button" onclick="openCity('previewquestion')" class="btn btn-t-p btn-success"><i class="fa fa-sign-in" aria-hidden="true"> Start</i></button>
                    <hr>
                </div>

                <div id="previewquestion" style="display:none">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">

                            <div id="Question <?php echo $idx+1;?>" class="tabcontent">
                                                                       
                                <div class="item active">                                              
                                    <h1>Sample</h1>                                              
                                </div> 
                                                                             
                            </div> 
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>

                </div>
                <div>
            </div>
        </div> 
    </div>   
</div>
<div class="footer"><h6>Powered by KyLeads</h6></div>

<script>
    function openCity(cityName) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block";  
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
