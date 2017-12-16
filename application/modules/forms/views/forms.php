<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <nav id="spy">
              <ul class="nav sidebar-nav-u nav-u">

              <a href="forms/create" class="t-w-u"><button type="button" class="btn btn-u btn-success tablinks" 
                onclick="openCity(event, 'new-optin')"> Create New <br> Opt-in Form</button></a>
                  
                  <li class="active">
                      <a  href="forms/dashboard" class="tablinks" onclick="openCity(event, 'dashboard')">
                          Dashboard
                      </a>
                  </li>
                  <li>
                      <a href="forms/contacts">
                          Contacts
                      </a>
                  </li>
                  <li>
                      <a href="forms/integrations">
                          Integrations
                      </a>
                  </li>
              </ul>
          </nav>
      </div>
      <!-- Page content -->
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
        // document.getElementById("defaultOpen").click();
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
