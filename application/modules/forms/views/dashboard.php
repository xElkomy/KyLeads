<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <nav id="spy">
              <ul class="nav sidebar-nav-u nav-u menu-sample">
              <?php $this->load->view("formnav.php"); ?>
              <ul>
          </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container">
                  <div class="row row-c-u">
                    <div id="new-optin" class="tabcontent">
                    <h3 class="a-b-u">Dashboard/<small class="top-message-u">here you can see all forms and stats</small></h3>
              
                              <!-- DASHBOARD MODULE -->
                              <table class="table table-f table-borderless table-responsive">
                              <tbody>
                                  <tr class="center-u">
                                      <td><button type="button" class="btn btn-primary btn-r-u resize-button-u rounded-button-u signature-color-button">Icon/Image</button></td>
                                      <td class="alignment-quiz-table bold-u a-b-u">N/A<br><i class="fa fa-eye fa-1x" aria-hidden="true"></i><br>Views</td>
                                      <td class="alignment-quiz-table bold-u a-b-u">N/A<br><i class="fa fa-line-chart fa-1x" aria-hidden="true"></i><br>Conversion rate</td>
                                      <td class="alignment-quiz-table bold-u a-b-u">N/A<br><i class="fa fa-calendar fa-1x" aria-hidden="true"></i></i><br>Date Created</td>
                                      <td class="alignment-u-table alignment-u-table-custom a-b-u">
                                          <hr>
                                          <a class="fa fa-forms-custom fa-cogs fa-2x a-b-u" aria-hidden="true"></a>    
                                          <a class="fa fa-forms-custom fa-bar-chart fa-2x a-b-u" aria-hidden="true"></a>
                                          <hr>
                                      </td>
                                  </tr> 
                              </tbody>
                          </table>
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


    <!-- modals -->

    <?php $this->load->view("shared/modal_sitesettings.php"); ?>

    <?php $this->load->view("shared/modal_account.php"); ?>

    <?php $this->load->view("shared/modal_deletesite.php"); ?>

    <!-- /modals -->
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
