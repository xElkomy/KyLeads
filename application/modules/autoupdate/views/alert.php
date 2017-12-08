<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $this->lang->line('alert_page_title');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Flat UI -->
    <link href="<?php echo base_url(); ?>build/sent.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('img/favicon.png'); ?>">

</head>
<body>

    <div class="container">

    	<div class="row">

    		<br>

    		<div class="col-md-offset-3 col-md-6">

    			<div class="alert alert-info">
                    <button type="button" class="close fui-cross"></button>
                    <h4><?php echo $data['header']; ?></h4>
                    <div id="content">
                        <p><?php echo $data['content']; ?></p>
                    </div>
                </div>

    			<p class="small text-center"><?php echo $this->lang->line('application_link'); ?></p>

    		</div><!-- /.col-md-12 -->
    	</div>
    </div>
    <!-- /.container -->
    <script>
    var siteUrl = "<?php echo site_url();?>";
    </script>
    <?php if (ENVIRONMENT == 'production') : ?>
    <script src="<?php echo base_url('build/autoupdate.bundle.js'); ?>"></script>
    <?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/autoupdate.bundle.js"></script>
    <?php endif; ?>
</body>
</html>
