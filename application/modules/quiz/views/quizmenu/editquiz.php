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
                    <div class="row row-c-u-f">
                        <div id="new-optin" class="tabcontent">
                            <h3><?php echo $quizinfo->title;?></h3> <h5><?php echo $quizinfo->description;?></h5>
                                
                                <h6 class="text-center"><i class="fa fa-lg fa-cogs" aria-hidden="true"> Configuration</i></h6><hr>
                                    
                                    <form action="<?php echo base_url('quiz/update_quiz_info'); ?>" method="post">
                                        <!-- <input type="hidden" name="quizid" class="form-control" value = "<?php echo $quizinfo->id;?>"></input> -->
                                        <label>Title :<input name="quiztitle" class="form-control" style = "width: 500px;" value = "<?php echo $quizinfo->title;?>" required></input> 
                                        <label>Description :<input name="quizdescrip" class="form-control" style = "width:800px;" value = "<?php echo $quizinfo->description;?>" required></input> 
                                        
                                        <div style="width:180px;" class="g-r-u">
                                            <button type ="submit" class="btn btn-r-u btn-primary btn-wide g-r-u" style="margin-top:30px"><i class="fa fa-check-square" aria-hidden="true"> Save Changes</i></button>

                                            <a  href="<?php echo base_url('quiz/outcome'); ?>" type ="submit" style="margin-top:10px;width:180px" class="btn btn-r-u btn-lg btn-primary btn-wide fa fa-angle-double-right "> Continue and <br>Create Outcomes</a>
                                        
                                        </div>

                                    </form>
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
    <script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
    })
    </script>
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
    