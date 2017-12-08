
<!--Analytics-->
<script type="text/javascript">
    
</script>
<body>
    <?php $this->load->view("shared/nav.php"); ?>
  
    <div class="container-fluid">
     	    <div class="col-sm-2">
     	        <div>
     	             <?php $this->load->view("quiznav.php"); ?>
     	        </div>
     	           
     	    </div>
     	    <!---->
     	    <div class="col-sm-9 text-center">
     	        <h4>Analytics/View metrics for your Quiz</h4>
                <div class="row">
                        <div class="col-sm-2 text-center">
                     	      <a href="quiz"><p>Split Test Report</p></a>
                        </div>
                        <div class="col-sm-2 text-center">
                              <a href="quiz"><p>Advance Report</p></a>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-5"></div>  
                        <div class="col-sm-4 text-center">Date Range : mm/dd/yy - mm/dd/yy</div> 
                </div>
                <div class="row">
                        <div id="advancereport">
                            <div class="row paddingbig">
                                    <div class="col-sm-1"></div>
                         	     <div class="col-sm-2 text-center">
                         	          <a href="quiz"><p>Total Views</p></a>
                         	          <!--Chart-->
                         	          <div class="dot"></div>
                         	     </div>
                         	     <div class="col-sm-2 text-center">
                         	          <a href="quiz"><p>Quiz Starts</p></a>
                         	          <!--Chart-->
                         	          <div class="dot"></div>
                         	     </div>
                                 <div class="col-sm-2 text-center">
                         	          <a href="quiz"><p>Completions</p></a>
                         	          <!--Chart-->
                         	         <div class="dot"></div>
                         	      </div>
                         	     <div class="col-sm-2 text-center">
                         	          <a href="quiz"><p>Contacts</p></a>
                         	          <!--Chart-->
                         	          <div class="dot"></div>
                         	     </div>
                         	     <div class="col-sm-2 text-center">
                         	          <a href="quiz"><p>CTA Clicks</p></a>
                         	          <!--Chart-->
                         	          <div class="dot"></div>
                         	     </div>
                            </div>
                             
                     	     <div class="row container-fluid wrapper">
                              <!--Questions here-->
                                  <div class="row paddingsmall">
                                      <div class="col-sm-2 text-left"><a class="btn btn-secondary">Questions</a></div>
                     	              <div class="col-sm-10 text-left"><a class="btn btn-secondary">Outcomes</a></div>
                                  </div>
                     	         
                     	          <div class="row">
                     	              <ul class="listclear">
                     	                  <?php
                     	                  for($i=0;$i<5;$i++){
                     	                      ?>
                     	                      <li>
                     	                          <p class="col-sm-9 text-left">How are you?</p> 
                                                  <p class="col-sm-3 text-left">100%</p>
                     	                      </li>
                     	                      <?php
                     	                  }
                     	                  ?>
                     	                  
                     	              </ul>
                                      
                                  </div>
                             </div>
                        </div>
                        <div id="splittest">
                             <div class="col-sm-1"></div>
                     	     <div class="col-sm-2 text-center">
                     	          <a href="quiz"><p>Total Views</p></a>
                     	     </div>
                     	     <div class="col-sm-2 text-center">
                     	          <a href="quiz"><p>Total Contacts</p></a>
                     	     </div>
                             <div class="col-sm-2 text-center">
                     	          <a href="quiz"><p>Conversion Rate</p></a>
                     	      </div>
                     	     <div class="col-sm-2 text-center">
                     	          <a href="quiz"><p>Total Offer Clicks</p></a>
                     	     </div>
                     	     <div class="col-sm-2 text-center">
                     	          <a href="quiz"><p>Total Shares</p></a>
                     	     </div>
                     	     <div class="col-sm-1"></div>
                     	     <div class="row">
                     	         <div>
                     	             <h1>Graph here</h1>
                     	         </div>
                     	         
                     	     </div>
                     	     <div></div>
                        </div>
                </div>
                
               
                   
     	    </div>
    </div>
    
    <!-- End of Content-->
    <!-- modals -->

    <?php $this->load->view("shared/modal_sitesettings.php"); ?>

    <?php $this->load->view("shared/modal_account.php"); ?>

    <?php $this->load->view("shared/modal_deletesite.php"); ?>

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
