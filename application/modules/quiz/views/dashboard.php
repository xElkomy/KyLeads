
<!--Dashboard-->
<script type="text/javascript">
    
</script>

<body class="body-custom">

    <?php $this->load->view("shared/nav.php"); ?>

    <!-- New Content -->
    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
            <nav id="spy">
                <?php $this->load->view("quiznav.php"); ?>
            </nav>
      </div>
      <!-- Page content -->
      <div id="page-content-wrapper">
          <div class="page-content">
              <div class="container-q ">
                    <div class="row">

                        <div id="new-optin" class="tabcontent">

                            <table class="table table-q-d j-c-t-u table-borderless">
                            <br>
                            <h5 class="t-b-u j-c-t-u ">List of Quizzes</h5>                               
                            <tbody>
                                    
                                    <?php 
                                    foreach ($quizzes as $quiz) 
                                    {  
                                    ?>
                                    <tr class="table-borderless"> 
                                        <td class="f-d-td"><button type="button" class="btn btn-primary n-q-d"><?php echo $quiz->title;?><br><?php echo $quiz->description;?></button></td>
                                        <td class="f-d-td"><h6 class="t-b-u c-d-f-d">Here the title of the quiz, <br>the total contacts,<br> and conversion rate is displayed </h6</td>
                                        <td class="f-d-td"><a href="<?php echo base_url('quiz/quiz_configure/'. $quiz->id); ?>" class="fa fa-s fa-cogs fa-3x c-d-f-d t-b-u" aria-hidden="true"></a> 
                                        <a href="<?php echo base_url('quiz/analytics/'. $quiz->id); ?>" class="fa fa-s fa-bar-chart fa-3x c-d-f-d t-b-u" aria-hidden="true"></a></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div> 

                   
                    </div>
              </div>
          </div>
      </div>
  </div>

    <!-- End of Content-->
    
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
