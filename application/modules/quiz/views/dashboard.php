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
                    <?php 
                        if(count($quizzes)>0){
                            ?><h2 class="j-c-t-u">List of Quiz</h2><?php
                        }else{
                            ?><h2 class="j-c-t-u">No Quiz</h2><?php
                        }
                    
                    ?>  
                            <table class="table table-f j-c-t-u table-borderless">
                            <tbody>
                                    <?php foreach ($quizzes as $key => $quiz){  ?>
                                            <tr class="center-u bg-tr-quiz-dashboard">
                                                <td class="nomargin quizdashboard"><button type="button" class="btn btn-primary rounded-button-u resize-button-u signature-color-button">Icon/Image</button></td>
                                                <td>
                                                    <div class="row bold-u a-b-u center-u custom-quiz-title-alignment">TITLE:<br><?php echo $quiz->title;?>?</div> 
                                                    <div class="row row-dashboard-total-cons">
                                                        <div class="col-md-4 bold-u a-b-u"><p id ="contactsid<?php echo $key+1?>">0</p><br><i class="fa fa-users fa-2x" aria-hidden="true"></i><br>Total Contacts</div>
                                                        <div class="col-md-4 bold-u a-b-u"><p id ="conversionrateid<?php echo $key+1?>">0.00%</p><br><i class="fa fa fa-2x fa-line-chart" aria-hidden="true"></i><br>Conversion rate</div>
                                                		<div class="col-md-4 bold-u a-b-u"><p id ="calenderid<?php echo $key+1?>"><?php echo date("d/m/Y", $quiz->create_at) ?></p><br><i class="fa fa fa-2x fa-calendar" aria-hidden="true"></i></i><br>Date Created</div>
                                                    </div>
                                                </td>

                                            <td class="alignment-quiz-table alignment-u-table-custom">
                                                <hr>
                                                <div class="dropdown">  
                                                    <a onclick="myFunction(<?php echo $key+1;?>,<?php echo count($quizzes);?>, <?php echo $quiz->id;?> )" class="fa fa-forms-custom bg-tr-quiz-dashboard-button fa-cogs fa-2x a-b-u dropbtn" aria-hidden="true"></a>
                                                        <div id="myDropdown<?php echo $key+1;?>" class="dropdown-content">
                                                            <a class="btn btn-quiz-dropdown-config bold-u" type ="submit" href="<?php echo base_url('quiz/quiz_configure/'.$quiz->auth_token);?>" >Edit</a>
                                                            <a class="btn btn-quiz-dropdown-config bold-u" type ="submit" href="<?php echo base_url('takequiz/quiz/'. $quiz->auth_token); ?>" target="_blank">Preview</i></a>  
                                                            <a class="btn btn-quiz-dropdown-config bold-u" type ="submit" href="<?php echo base_url('quiz/delete_quiz/'. $quiz->auth_token); ?>" >Delete</i></a>
                                                        </div>
                                                </div>
                                                <a href="<?php echo base_url('quiz/analytics/'. $quiz->auth_token); ?>" class="fa fa-forms-custom bg-tr-quiz-dashboard-button fa-bar-chart fa-2x a-b-u" aria-hidden="true"></a>
                                            <hr class="hrmargin">
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
