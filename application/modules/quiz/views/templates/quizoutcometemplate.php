<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
            <nav id="spy">
                <?php $this->load->view("templatemenunav.php"); ?>
            </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container-q ">
                    <div class="row row-c-u-f">

                        <div id="new-optin" class="tabcontent">
                        
                            <h3><?php echo $quizinfo->title;?></h3> <h5><?php echo $quizinfo->description;?></h5>
                                
                                <h6 class="text-center"><i class="fa fa-lg fa-cogs" aria-hidden="true">Outcome Configuration</i></h6><hr>
                                <hr>

                                <table class="table table-bordered table-hover">
            
                                    <tr>
                                        <td class="col-md-12">
                                            <h5>
                                            <?php if(count($outcomes) > 0){
                                                    echo count($outcomes);
                                                    ?> Outcome/s are Created<?php
                                                }else{
                                                    ?> No Outcome yet<?php          
                                                }
                                                ?> 
                                            </h5>
                                        </td>
                                     
                                        <td>
                                                <!-- Button trigger modal for add question-->
                                                <button type="button" class="btn btn-r-u btn-primary" data-toggle="modal" data-target="#addquestion">
                                                <i class="fa fa-plus-circle" aria-hidden="true"> New Outcome</i>
                                                </button>

                                        </td>
                                    </tr>

                                </table>

                                    <table class="table table-bordered table-hover">                                    

                                        <?php 
                                            $index=0;
                                            
                                        foreach ($outcomes as $outcome) 
                                        {  
                                            $index++;
                                        ?>
                                            <tr class="tr-custom">
                                                <td class="col-md-12 l-t-i-u"><?php echo $index.'. '.$outcome->title;?></td>
                                                <td class="j-c-t-u">
                                                <a href="<?php echo base_url('quiz/delete_template_outcome/'. $outcome->id); ?>" type ="submit" class="btn  btn-r-u btn-danger"><i class="fa fa-trash" aria-hidden="true">  Delete</i></a> 
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    


                                    <!-- Modal -->
                                    <div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="vertical-alignment-helper">
                                            <div class="modal-dialog vertical-align-center" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Outcome for <?php echo $quizinfo->title;?> </h5>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <form action="<?php echo base_url('quiz/newoutcometemplate'); ?>" method="post">
                                                                    <!-- <input type="hidden" name="quizID" value="<?php echo $outcome->id;?>"></input> -->
                                                                    <label><input name="outcometitle" placeholder="New Outcome" class="form-control" style = "width: 540px;" required></input>
                                                                    <input name="outcomedescription" placeholder="Put Description here" class="form-control" style = "width: 540px; height:  300px;" required></input>
                                                                    <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-40 g-r-u btn-r-u"><i class="fa fa-plus-circle" aria-hidden="true"> Add Outcome</i></button>
                                                                </form>                                                    
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
    