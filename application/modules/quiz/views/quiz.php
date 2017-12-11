
<!--Dashboard-->
<script type="text/javascript">
    
</script>
<body>
    <?php $this->load->view("shared/nav.php"); ?>
  
    <div class="container-fluid">
     	    <div class="col-sm-2" >
             <nav class="navbar navbar-inverse sidenav " data-spy="affix">
                <ul class="nav navbar-nav"> 
                    <li class="li-c"><a class="a-c" onclick="openPanel(event, 'new_quiz')">Create New</a></li>
                    <li class="li-c"><a class="a-c" onclick="openPanel(event, 'dashboard')" id="defaultOpen">Dashboard</a></li>
                    <li class="li-c"><a class="a-c" onclick="openPanel(event, 'forms')">Quiz Optin-in form</a></li>
                    <li class="li-c"><a class="a-c" onclick="openPanel(event, 'contacts')">Contacts</a></li>
                    <li class="li-c"><a class="a-c" onclick="openPanel(event, 'integrations')">Integrations</a></li>
                </ul>
             </nav>  
     	    </div>
     	    <!---->
     	    <div class="col-sm-8">
     	        <div id="new_quiz" class="tabcontent">
                    <div class="text-center"><h3>Create New Quiz</h3> <hr></div>
                    <div>
                            <label>Title :<input id="quiztitle" class="form-control" style = "width: 200px;" required></input> 
                            <label>Description :<input id="quizdescrip" class="form-control" style = "width: 500px;" required></input> 
                            <a id="btnSubmit" class="btn btn-lg btn-primary btn-wide margin-top-40">Save</a>
                    </div>             
                </div>
                <div id="dashboard" class="tabcontent">
                    <?php $this->load->view("quiz/dashboard.php"); ?>
                </div>
                <div id="forms" class="tabcontent">
                    <h3>New Form</h3>
                      
                </div>
                <div id="contacts" class="tabcontent">
                    <h3>Contacts</h3>
                </div>
                <div id="integrations" class="tabcontent">
                    <h3>Integrations</h3>
                </div>
     	    </div>
            <script>
                $('#btnSubmit').on('click', function(){
                    
                    if($('#quiztitle').val() === '' || $('#quizdescrip').val() === ''){
                        alert("title or description is missing values");
                    }else{
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url(); ?>quiz/newquiz",
                            data: {
                                title : $('#quiztitle').val(),
                                description : $('#quizdescrip').val(),
                            }
                            }).done(function (result) {
                            });
                    }            
                 });
                function openPanel(evt, panelName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    document.getElementById(panelName).style.display = "block";
                    evt.currentTarget.className += " active";
                  }
                  document.getElementById("defaultOpen").click();
            </script>  
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
