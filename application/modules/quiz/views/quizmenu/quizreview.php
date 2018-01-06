<body class="body-custom ">

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


<div class="outer-div">
    <div class="inner-div">
        <div class="row">
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


<script>
    var totalItems = $(".item").length;
 
    function start(name) {
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
        }
        document.getElementById(name).style.display = "block";  
    
    var $choice = $("input:radio[name=choice]");
    $choice.on( "click", function() {
        $("#myCarousel").carousel("next");
    });

    var $back = $("button[name=back]");
    $back.on( "click", function() {
        $("#myCarousel").carousel("prev");
    });
}
function counter(event) {
   var element   = event.target;         // DOM element, in this example .owl-carousel
    var items     = event.item.count;     // Number of items
    var item      = event.item.index + 1;     // Position of the current item
  $('#counter').html("item "+item+" of "+items)
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
                </div>
            </div>
        </div>
  </div>
    <!-- End of Content-->
    <!-- modals -->
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
    </script>
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