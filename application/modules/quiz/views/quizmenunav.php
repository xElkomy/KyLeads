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
                <li ><i type="hidden" class="fa fa" aria-hidden="true"></i></li>
                <li class="active"><a href="quiz/quiz_configure"><i class="fa fa-tachometer" aria-hidden="true">Configure</i></a></li>
                <li><a href="quiz/outcome"><i class="fa fa-question-circle" aria-hidden="true">Outcomes</i></a></li>
                <li><a href="quiz/quizquestions"><i class="fa fa-question-circle" aria-hidden="true">Questions</i></a></li>
                <li><a href="quiz/publish"><i class="fa fa-code-fork" aria-hidden="true">Publish</i></a></li>
                <hr>
                <li><a href="quiz/dashboard"><i class="fa fa-tachometer" aria-hidden="true">  Dashboard</i></a></li>
                <li><a href="quiz/forms"><i class="fa fa-question-circle" aria-hidden="true">  Quiz Optin-in form</i></a></li>
                <li><a href="quiz/contacts"><i class="fa fa-users" aria-hidden="true">  Contacts</i></a></li>
                <li><a href="quiz/integrations"><i class="fa fa-code-fork" aria-hidden="true">  Integrations</i></a></li>

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
