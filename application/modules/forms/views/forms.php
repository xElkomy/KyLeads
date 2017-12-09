<body>

    <?php $this->load->view("shared/nav.php"); ?>
    
    
    <!-- New Content -->
    <div class="container-fluid container-fluid-custom">
    <div class="row">
      <nav class="col-md-2" id="myScrollspy">
        <ul class="nav nav-c nav-pills nav-pills-c nav-stacked" data-spy="affix">
          <li class="li-c"><button type="button" onclick="openCity(event, 'new_optin')" id="defaultOpen"  class="btn btn-success btn-c">Create New <br>Opt-in Form</button></li>
          <li class="li-c"><a class="a-c" onclick="openCity(event, 'Dashboard')">Dashboard</a></li>
          <li class="li-c"><a class="a-c" onclick="openCity(event, 'Contacts')">Contacts</a></li>
          <li class="li-c"><a class="a-c" onclick="openCity(event, 'Integration')">Integrations</a></li>
        </ul>
      </nav>
      <div class="col-md-10">
      <div class="container">
            <div class="row">
              <div class="col">
                  <div id="new_optin" class="tabcontent">
                    <div class="form-group">
                      <label for="usr"><h4>Name your new opt-in: </h4></label>
                      <input type="text" class="form-control form-control-custom" id="usr" placeholder="New Optin">
                    </div>
                    <hr>
                    <h6 class="j-c-t">Choose opt-in type</h6>
                    <div class="container">
                      <div class="row row-custom-c">
                        <div class="col-md-12">
                          <table class="table j-c-t table-borderless">
                            <tbody>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >Standard Popup</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >Floating Bar</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >Slide In</button></td>
                              </tr>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >Inline Forms</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >Full Screen</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >After Post Opt-in</button></td>
                                <td class="f-d-td"><button type="button" class="btn btn-primary square" >Sidebar opt-in</button></td>
                              </tr>
                             </tbody>
                          </table>
                        </div> 
                      </div>
                    </div>
                  </div>
                  <div id="Dashboard" class="tabcontent">
                    <h4>Dashboard/here you can see all forms and stats</h4>
                      <hr>
                    <div class="container">
                      <div class="row row-custom-c-d">
                        <div class="col-md-12">
                          <table class="table j-c-t table-borderless">
                            <tbody>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary square">Icon/Image</button></td>
                                <td class="f-d-td"><h6 class="f-d-c">Here you have date create, <br>Views, and conversion rate </h6</td>
                                <td class="f-d-td"><a data-toggle="modal" data-target="#myModal" class="c-c-i f-e-r fa fa-cogs fa-2" aria-hidden="true"></a> <i class="f-e-r fa fa-bar-chart" aria-hidden="true"></i></i></td>
                              </tr>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary square">Icon/Image</button></td>
                                <td class="f-d-td"><h6 class="f-d-c">Here you have date create, <br>Views, and conversion rate </h6</td>
                                <td class="f-d-td"><a data-toggle="modal" data-target="#myModal" class="c-c-i f-e-r fa fa-cogs fa-2" aria-hidden="true"></a> <i class="f-e-r fa fa-bar-chart" aria-hidden="true"></i></i></td>
                              </tr>
                              <tr class="table-borderless">
                                <td class="f-d-td"><button type="button" class="btn btn-primary square">Icon/Image</button></td>
                                <td class="f-d-td"><h6 class="f-d-c">Here you have date create, <br>Views, and conversion rate </h6</td>
                                <td class="f-d-td"><a data-toggle="modal" data-target="#myModal" class="c-c-i f-e-r fa fa-cogs fa-2" aria-hidden="true"></a> <i class="f-e-r fa fa-bar-chart" aria-hidden="true"></i></i></td>
                              </tr>
                             </tbody>
                          </table>
                        </div> 
                      </div>
                    </div>
                  </div>                  s
                  <div id="Contacts" class="tabcontent">
                    <h3>Contacts</h3>
                    <hr>                    
                  </div>
                  
                  <div id="Integration" class="tabcontent">
                    <h3>Integration</h3>
                    <hr>
                  </div>
                  
                  <script>
                  function openCity(evt, cityName) {
                      var i, tabcontent, tablinks;
                      tabcontent = document.getElementsByClassName("tabcontent");
                      for (i = 0; i < tabcontent.length; i++) {
                          tabcontent[i].style.display = "none";
                      }
                      tablinks = document.getElementsByClassName("tablinks");
                      for (i = 0; i < tablinks.length; i++) {
                          tablinks[i].className = tablinks[i].className.replace(" active", "");
                      }
                      document.getElementById(cityName).style.display = "block";
                      evt.currentTarget.className += " active";
                  }
                  document.getElementById("defaultOpen").click();
                  </script>  
                </div>
              </div>
            </div>
        </div>
      </div>
            <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"> Currently Editing: Campaign name</h4>
              
              
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              Modal body..
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
<!--/.fluid-container-->
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
