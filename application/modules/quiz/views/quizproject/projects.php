<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container">
                <hr>
                <div class="row">
                     <!-- Button trigger modal for add question-->
                    <h6>Create New Project</h6>
                    <div class="panel-body">
                        <form action="<?php echo base_url('quiz/createproject'); ?>" method="post">
                            <label><input name="title" placeholder="Title" class="form-control" style = "margin:10px 0px 0px 10px;width: 550px;" required></input>                                                       
                            <textarea name="description" class="form-control col-xs-12" placeholder="Description" style = "margin:10px 0px 0px 10px;width: 550px;" required></textarea><br>
                            <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-20 g-r-u btn-r-u"><i class="fa fa-plus-circle" aria-hidden="true"> Add Project</i></button>
                        </form>                                                    
                    </div>
                </div>
                <hr>
                <div id="projectlist">
                    <table class="table table-f j-c-t-u table-borderless">
                            <hr>
                            <tbody>
                                    <?php foreach ($projects as $key => $project){  ?>

                                        <tr class="table-borderless">
                                           
                                            <td class="f-d-td">
                                            <div class="row"><h6><?php echo $project->title;?></h6></div>
                                            <div class="row">
                                                <div class="col-md-4 j-c-t-u">
                                                    <p id ="calenderid<?php echo $key+1?>"><?php echo date("d/m/Y", $project->create_at) ?></p>
                                                    <div id="quizcontent-li"><h7><a><i class="fa fa fa-2x fa-calendar" aria-hidden="true"></i>Date Created</a></h7></div>
                                                </div>
                                                <div class="col-md-4 j-c-t-u">
                                                    <p id ="contactsid<?php echo $key+1?>">0</p>
                                                    <div id="quizcontent-li"><h7><a><i class="fa fa fa-2x fa-users" aria-hidden="true"></i> Contacts</a></h7></div>
                                                </div>
                                                <div class="col-md-4 j-c-t-u">
                                                    <p id ="conversionrateid<?php echo $key+1?>">0.00%</p>
                                                    <div id="quizcontent-li"><h7><a><i class="fa fa fa-2x fa-line-chart" aria-hidden="true"></i> Conversion rate</a></h7></div>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="f-d-td">
                                                <a href="<?php echo base_url('quiz/dashboard/'. $project->auth_token); ?>" ><span class="glyphicon glyphicon-share fa-3x"></span></a>
                                                <a class="fa fa-s fa-bar-chart fa-3x c-d-f-d t-b-u active-shadow a-u" aria-hidden="true"></a>
                                                <a href="<?php echo base_url('quiz/delete_project/'. $project->auth_token); ?>" ><span class="glyphicon glyphicon-trash fa-3x"></span></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>        
                            </table>
                </div>
              </div>
          </div>
      </div>
  </div>
<!--/.fluid-container-->
    <!-- End of Content-->
    <!-- modals -->


    <!-- /modals -->


    <!-- Load JS here for greater good =============================-->
    <script type="text/javascript" >
		
		
			
	</script>
    <script type="text/javascript" src="./assets/js/quiz/dashboard.js">
        var baseUrl = "<?php echo base_url()?>";    
    </script>
    <!-- <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.bundle.js"></script>
    <?php endif; ?> -->

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
