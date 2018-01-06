<html>
     <!--<link rel="stylesheet" type="text/css" href="../../../assets/css/sidenav.css">-->
    
</html>
<script type="text/javascript">
    
</script>
<body class="body-custom">
  <div id="wrapper">
    <div id="sidebar-wrapper">
      <nav id="spy">
          <ul class="nav sidebar-nav-u nav-u">
          <a href="forms/create" class="t-w-u"><button type="button" class="btn btn-u-f btn-success tablinks" 
                onclick="openCity(event, 'new-optin')">Create new <br> opt-in form</button></a>
            <li class="active"><a  href="forms/dashboard" class="tablinks" onclick="openCity(event, 'dashboard')"><i class="fa fa-tachometer" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp Dashboard</i></a></li>
            <li><a href="forms/contacts"><i class="fa fa-users" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp Contacts</i></a></li>
            <li><a href="forms/integrations"><i class="fa fa-code-fork" aria-hidden="true"> &nbsp&nbsp&nbsp&nbsp Integrations</i></a></li>
          </ul>
      </nav>
    </div>
  </div>
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
