
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
            <div class="container ">
                    <div class="row row-c-u-f">
                        <?php $this->load->view("quiz/analytics"); ?>     
                    </div>
              </div>
          </div>
      </div>
  </div>
    
    <!-- End of Content-->

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
