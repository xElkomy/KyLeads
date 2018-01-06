<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <nav id="spy">
              <ul class="nav sidebar-nav-u nav-u menu-sample">
              <?php $this->load->view("quiznav.php"); ?>
              <ul>
          </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container">
                  <div class="row row-c-u">
                    <div id="new-optin" class="tabcontent">
                      <h2 class="j-c-t-u">List of Quiz</h2>
                            
                              <!-- DASHBOARD MODULE -->
                            <table class="table table-f j-c-t-u table-borderless">
                            <hr>
                            <tbody>
                                    <?php foreach ($quizzes as $key => $quiz){  ?>

                                        <tr class="table-borderless">
                                            <td class="f-d-td"><button type="button" class="btn btn-primary n-q-d btn-r-u"><i class="fa fa fa-3x fa-home" aria-hidden="true"></i></button></td>
                                            <td class="f-d-td">
                                            <div class="row"><h6><?php echo $quiz->title;?></h6></div>
                                            <div class="row">
                                               
                                                <div class="col-md-6 j-c-t-u">
                                                    <p>0</p>
                                                    <div id="quizcontent-li"><h7><a><i class="fa fa fa-2x fa-users" aria-hidden="true"></i> Contacts</a></h7></div>
                                                </div>
                                                <div class="col-md-6 j-c-t-u">
                                                    <p>0.00%</p>
                                                    <div id="quizcontent-li"><h7><a><i class="fa fa fa-2x fa-line-chart" aria-hidden="true"></i> Conversion rate</a></h7></div>
                                                </div>
                                            
                                            </div>
                                        
                                            </td>
                                            <td class="f-d-td">
                                            <div class="dropdown">
                                                
                                                <a onclick="myFunction(<?php echo $key+1;?>,<?php echo count($quizzes);?>, <?php echo $quiz->id;?> )" class="fa fa-s fa-cogs fa-3x c-d-f-d t-b-u a-u active-shadow dropbtn" aria-hidden="true"></a>
                                                <div id="myDropdown<?php echo $key+1;?>" class="dropdown-content">
                                                    <a class="btn btn-primary tooltip-l" type ="submit" href="<?php echo base_url('quiz/quiz_configure/'.$quiz->id);?>" ><i class="fa fa-1x fa-wrench" aria-hidden="true"></i></a>
                                                    <a class="btn btn-info tooltip-l" type ="submit" href="<?php echo base_url('quiz/preview_quiz/'. $quiz->id); ?>"><i class="fa fa-1x fa-eye" aria-hidden="true"></i></a>  
                                                    <a class="btn btn-danger tooltip-l" type ="submit" href="<?php echo base_url('quiz/delete_quiz/'. $quiz->id); ?>" ><i class="fa fa-1x fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                                <a href="<?php echo base_url('quiz/analytics/'. $quiz->id); ?>" class="fa fa-s fa-bar-chart fa-3x c-d-f-d t-b-u active-shadow a-u" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                
                            </table>
                            <script>
                                /* When the user clicks on the button, 
                                toggle between hiding and showing the dropdown content */
                                function myFunction(id,total,quizid) {
                                    for (let index = 1; index < total+1; index++) {
                                        if(index == id){
                                            // alert("currenquiz"+quizid);
                                            document.getElementById("myDropdown"+id).classList.toggle("show");
                                        }else{
                                            document.getElementById("myDropdown"+index).classList.remove("show");
                                        }       
                                    }  
                                }

                                // Close the dropdown if the user clicks outside of it
                                window.onclick = function(event) {
                                if (!event.target.matches('.dropbtn')) {

                                    var dropdowns = document.getElementsByClassName("dropdown-content");
                                    var i;
                                    for (i = 0; i < dropdowns.length; i++) {
                                    var openDropdown = dropdowns[i];
                                        if (openDropdown.classList.contains('show')) {
                                            openDropdown.classList.remove('show');
                                        }
                                    }
                                }
                                }
                            </script>
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
