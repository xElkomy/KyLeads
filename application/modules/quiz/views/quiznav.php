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
                <a href="quiz/templates" class="t-w-u"><button type="button" class="btn btn-u btn-success tablinks" 
                onclick="openCity(event, 'new-optin')"> Create New <br> Quiz</button></a>
                <li class="active"><a href="quiz/dashboard">Dashboard</a></li>
                <li><a href="quiz/forms">Quiz Optin-in form</a></li>
                <li><a href="quiz/contacts">Contacts</a></li>
                <li><a href="quiz/integrations">Integrations</a></li>
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
