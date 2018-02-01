<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
   

  <!-- end page -->
  <div id="page-content-wrapper">
      <div class="page-content">
          <div class="container">
            <div class="row row-quiz-project">
                <div class="col center-content-project list-of-project">
                <div class="row">
                    <div class="col center-content-project list-of-project">
                        <h6 class="a-b-u go-to-right">Create New Project <hr class="nopadding nomargin"></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col center-content-project list-of-project">
                    <button type ="submit" class="btn btn-add-project btn-primary btn-r-u go-to-right"data-toggle="modal" data-target="#addquestion"><i class="fa fa-plus-circle" aria-hidden="true"> </i> Add Project <hr class="nopadding nomargin"></button>
                   
                    </div>
                </div>                              
                <div class="row center-content-project list-of-project">
                <hr>
                    <div id="projectlist">
            
                        <table class="table table-borderless">
                                <h6 class="a-b-u">List of Project</h6>
                                <tbody>
                                        <?php foreach ($projects as $key => $project){  ?>

                                            <tr class="table-borderless">
                                            
                                                <td class="f-d-td">
                                                <div class="row"><h6 class="a-b-u"><?php echo $project->title;?></h6></div>
                                                <div class="row">
                                                    <div class="col-md-3 ">
                                                        <p class="a-b-u" id ="calenderid<?php echo $key+1?>"><?php echo date("d/m/Y", $project->create_at) ?></p>
                                                        <div id="quizcontent-li"><h7><a><i class="fa fa fa-1x fa-calendar" aria-hidden="true"></i><br>Date Created</a></h7></div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <p  class="a-b-u" id ="contactsid<?php echo $key+1?>">0</p>
                                                        <div id="quizcontent-li"><h7><a><i class="fa fa fa-1x fa-users" aria-hidden="true"></i><br> Contacts</a></h7></div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <p class="a-b-u" id ="conversionrateid<?php echo $key+1?>">0.00%</p>
                                                        <div id="quizcontent-li"><h7><a><i class="fa fa fa-1x fa-line-chart" aria-hidden="true"></i> <br>Conversion rate</a></h7></div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                    
                                                        <a href="<?php echo base_url('quiz/dashboard/'. $project->auth_token); ?>" ><span class="fa fa-external-link a-b-u bg-tr-quiz-project-dashboard-button project-font-size"></span></a>
                                                        <a href="<?php echo base_url('quiz/proj_analytics/'.$project->auth_token); ?>"><span class="fa fa-bar-chart a-b-u bg-tr-quiz-project-dashboard-button project-font-size"></span></a>
                                                        <a href="<?php echo base_url('quiz/delete_project/'. $project->auth_token); ?>" ><span class="fa fa-trash a-b-u bg-tr-quiz-project-dashboard-button project-font-size"></span></a>
                                     
                                                    </div>
                                                </div>
                                                </td>
                                              
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>        
                                </table>
                        
                            </div>
                        </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="vertical-alignment-helper">
                                            <div class="modal-dialog vertical-align-center" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                                                        <h5 class="modal-title" id="exampleModalLabel">Create New Project</h5>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                             <div class="row">
                                                                    <div class="panel-body">
                                                                        <form action="<?php echo base_url('quiz/createproject'); ?>" method="post">
                                                                            <label><input name="title" placeholder="Insert Tit Description here..." class="form-control" style = "margin:10px 0px 0px 10px;width: 550px;" required></input>                                                       
                                                                            <textarea name="description" class="form-control col-xs-12" placeholder="Insert Project Description here..." style = "margin:10px 0px 0px 10px;width: 550px;" required></textarea><br>
                                                                            <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-20 g-r-u btn-r-u"><i class="fa fa-plus-circle" aria-hidden="true"> Add Project</i></button>
                                                                        </form>                                                    
                                                                    </div>
                                                                </div>                                        
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
<!--/.fluid-container-->
    <!-- End of Content-->
    <!-- modals -->


    <!-- /modals -->


     <!-- Load JS here for greater good =============================-->
   
    <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/sites.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.bundle.js"></script>
    <?php endif; ?>
    <script type="text/javascript" src="./assets/js/project/dashboard.js">
        var baseUrl = "<?php echo base_url()?>";    
    </script>
  
   
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
