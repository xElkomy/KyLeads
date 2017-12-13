<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <nav id="spy">
              <ul class="nav sidebar-nav-u nav-u menu-sample">

              <a href="forms/create" class="t-w-u"><button type="button" class="btn btn-u btn-success tablinks" 
                onclick="openCity(event, 'new-optin')"> Create new <br> opt-in form</button></a>
                  
                  <li>
                      <a  href="forms/dashboard" class="tablinks" onclick="openCity(event, 'dashboard')">
                          Dashboard
                      </a>
                  </li>
                  <li>
                  <a href="forms/contacts" class="tablinks" onclick="openCity(event, 'contacts')">
                      Contacts
                  </a>
                    </li>
                    <li>
                        <a href="forms/integrations" class="tablinks" onclick="openCity(event, 'integrations')">
                            Integrations
                        </a>
                    </li>
              </ul>
          </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container">
                  <div class="row row-c-u">

                    <div id="new-optin" class="tabcontent">
                      <div class="form-group form-group-u">
                        <label for="j-c-t-u"class="t-b-u"><h4>Name your opt-in: </h4></label>
                        <input type="text" class="form-control f-c-c" placeholder="New Opt-in">
                         </div>
                         <hr>
                            <!-- DASHBOARD MODULE -->
                          <table class="table table-f j-c-t-u table-borderless">
                              <tbody>
                                <tr class="table-borderless">
                                  <td class="f-d-td"><button type="button" class="btn btn-primary n-f">Icon/Image</button></td>
                                  <td class="f-d-td"><h6 class="t-b-u c-d-f-d">Here you have date create, <br>Views, and conversion rate </h6</td>
                                  <td class="f-d-td"><a class="fa fa-s fa-cogs fa-3x c-d-f-d t-b-u" aria-hidden="true"></a> <a class="fa fa-s fa-bar-chart fa-3x c-d-f-d t-b-u" aria-hidden="true"></a></td>
                                </tr>
                                <tr class="table-borderless">
                                  <td class="f-d-td"><button type="button" class="btn btn-primary n-f">Icon/Image</button></td>
                                  <td class="f-d-td"><h6 class="t-b-u c-d-f-d">Here you have date create, <br>Views, and conversion rate </h6</td>
                                  <td class="f-d-td"><a class="fa fa-s fa-cogs fa-3x c-d-f-d t-b-u" aria-hidden="true"></a> <a class="fa fa-s fa-bar-chart fa-3x c-d-f-d t-b-u" aria-hidden="true"></a></td>
                                </tr>
                                <tr class="table-borderless">
                                  <td class="f-d-td"><button type="button" class="btn btn-primary n-f">Icon/Image</button></td>
                                  <td class="f-d-td"><h6 class="t-b-u c-d-f-d">Here you have date create, <br>Views, and conversion rate </h6</td>
                                  <td class="f-d-td"><a class="fa fa-s fa-cogs fa-3x c-d-f-d t-b-u" aria-hidden="true"></a> <a class="fa fa-s fa-bar-chart fa-3x c-d-f-d t-b-u" aria-hidden="true"></a></td>
                                </tr>
                              </tbody>
                          </table>
                    </div> 

                  </div>
              </div>
          </div>
      </div>
      <script>
        function openCity(evt, name) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            }
          tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
          document.getElementById(name).style.display = "block";
          evt.currentTarget.className += " active";
          }
    </script>
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
