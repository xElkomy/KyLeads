<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <nav id="spy">
              <ul class="nav sidebar-nav-u nav-u menu-sample">
                <?php $this->load->view("formnav.php"); ?>
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
                        <!-- CREATE MODULE -->
                      <h5 class="j-c-t-u t-b-u">Choose opt-in type</h5>

                          <table class="table table-f j-c-t-u table-borderless">
                            <tbody>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >Standard Popup</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >Floating Bar</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >Slide In</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >Sidebar opt-in</button></td>
                              </tr>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >Inline Forms</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >Full Screen</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary n-f" >After Post Opt-in</button></td>

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


    <!-- modals -->

    <?php $this->load->view("shared/modal_sitesettings.php"); ?>

    <?php $this->load->view("shared/modal_account.php"); ?>

    <?php $this->load->view("shared/modal_deletesite.php"); ?>

    <!-- /modals -->
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
