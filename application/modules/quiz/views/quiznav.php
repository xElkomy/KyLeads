<html>
     <!--<link rel="stylesheet" type="text/css" href="../../../assets/css/sidenav.css">-->
    
</html>
<script type="text/javascript">
    
</script>
<body class="body-custom">  
  ----------------
  <div id="wrapper">
    <div id="sidebar-wrapper">
        <nav class="main-menu sidebar-nav nav">
            <ul class="ul-custom-sidebar">
                <li class="li-custom ">
                        <a class="quiznav"href="quiz/templates"><button type="button" 
                          class="btn-custom-quiz btn btn-success signature-color-button">
                          Create New Quiz</button>
                        </a>
                  </li>
                <hr>
                <li class="li-custom">
                    <a href="quiz/dashboard/<?php echo $this->session->userdata('quizproj_id')?>"class="a-custom-form">
                        <i class="fa fa-u fa-tachometer fa-3x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="li-custom">
                    <a href="quiz/forms" class="a-custom-form">
                    <i class="fa fa-u  fa-question  fa-3x"></i>
                        <span class="nav-text">
                            Quiz Opt-in Form
                        </span>
                    </a>
                </li>
                <li class="li-custom">
                    <a href="quiz/contacts" class="a-custom-form">
                    <i class="fa fa-u fa-users fa-3x"></i>
                        <span class="nav-text">
                            Contacts
                        </span>
                    </a>
                </li>
                <li class="li-custom">
                    <a href="quiz/integrations" class="a-custom-form">
                    <i class="fa fa-u fa-sitemap fa-3x"></i>
                        <span class="nav-text">
                            Integrations
                        </span>
                    </a>   
                </li>
            </ul>
        </nav>
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
