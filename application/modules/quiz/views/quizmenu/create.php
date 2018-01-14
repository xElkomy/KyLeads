
<!--Create-->
<script type="text/javascript">

</script>
<body>
<?php $this->load->view("shared/nav.php"); ?>
<div class="container-fluid">
    <div class="row row-c-u-q">
        <div class="col-sm-2">
            <div>
                <?php $this->load->view("quiznav.php"); ?>
            </div>
        </div>
         <div class="col-sm-10">
         <div id="new-optin" class="tabcontent">
            <div class="text-center"><h3>Create New Quiz</h3> <hr></div>
                <div>
                    <form action="<?php echo base_url('quiz/newquiz'); ?>" method="post">
                        <label>Title :<input name="quiztitle" class="form-control" style = "width: 200px;" required></input> 
                        <label>Description :<input name="quizdescrip" class="form-control" style = "width: 500px;" required></input> 
                        <button id="btnSubmit" type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-40 btn-r-u"><i class="fa fa-check-square" aria-hidden="true"> Build Quiz and Save</i></button>
                    </form>     
            </div>
            <hr>
           
            </div>
        </div>
    </div>
</div>

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
