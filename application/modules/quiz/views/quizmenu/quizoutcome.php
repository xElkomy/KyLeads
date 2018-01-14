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
                                
                                <h6 class="text-center"><i class="fa fa-lg fa-cogs" aria-hidden="true"> Outcome Configuration</i></h6><hr>
                               

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
                                                <a href="<?php echo base_url('quiz/delete_outcome/'. $outcome->id); ?>" type ="submit" class="btn  btn-r-u btn-danger"><i class="fa fa-trash" aria-hidden="true">  Delete</i></a> 
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>

                                    <a  href="<?php echo base_url('quiz/quizquestions'); ?>" type ="submit" style="margin-top:10px;width:180px" class=" g-r-u btn btn-r-u btn-lg btn-primary btn-wide fa fa-angle-double-right "> Continue and <br>Create Question</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="addquestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="vertical-alignment-helper">
                                            <div class="modal-dialog vertical-align-center" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times fa-lg" aria-hidden="true"></i></button>
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Outcome: <?php echo $quizinfo->title;?> </h5>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <form action="<?php echo base_url('quiz/newoutcome'); ?>" method="post">
                                                                    <!-- <input type="hidden" name="quizID" value="<?php echo $outcome->id;?>"></input> -->
                                                                    <label><input name="outcometitle" placeholder="Insert new outcome" class="form-control" style = "margin:10px 0px 0px 10px;width: 550px;" required></input>                                                       
                                                                    <textarea name="outcomedescription" class="form-control col-xs-12" placeholder="Insert description here" style = "margin:10px 0px 0px 10px;width: 550px;" required></textarea>
                                                                    <button type ="submit" class="btn btn-lg btn-primary btn-wide margin-top-20 g-r-u btn-r-u"><i class="fa fa-plus-circle" aria-hidden="true"> Add Outcome</i></button>
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
    