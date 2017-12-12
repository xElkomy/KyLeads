<html>
     <!--<link rel="stylesheet" type="text/css" href="../../../assets/css/sidenav.css">-->
    
</html>
<script type="text/javascript">
    
</script>
<body>
    <nav class="navbar navbar-inverse sidenav">
          <ul class="nav navbar-nav">
            <li></li>
            <li><a href="quiz/create">Create New</a></li>
            <li><a href="quiz/dashboard">Dashboard</a></li>
            <li><a href="quiz/forms">Quiz Optin-in form</a></li>
            <li><a href="quiz/contacts">Contacts</a></li>
            <li><a href="quiz/integrations">Integrations</a></li>
          </ul>
    </nav>
    
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
