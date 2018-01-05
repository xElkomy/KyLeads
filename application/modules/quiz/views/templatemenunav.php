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
                <li class="active"><a href="quiz/configure_template"><i class="fa fa-tachometer" aria-hidden="true">Configure</i></a></li>
                <li><a href="quiz/templateoutcome"><i class="fa fa-question-circle" aria-hidden="true">Outcomes</i></a></li>
                <li><a href="quiz/templatequestions"><i class="fa fa-question-circle" aria-hidden="true">Questions</i></a></li>
                <li><a href="quiz/templatequestions"><i class="fa fa-question-circle" aria-hidden="true">Review</i></a></li>
                <li><a href="quiz/publishtemplate"><i class="fa fa-code-fork" aria-hidden="true">Publish</i></a></li>
                <hr>
                <li><a href="quiz/dashboard"><i class="fa fa-tachometer" aria-hidden="true">  Dashboard</i></a></li>
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
