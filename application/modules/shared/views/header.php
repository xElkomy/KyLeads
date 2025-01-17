<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<base href="<?php echo base_url(); ?>">

	<title><?php if (isset($title)) { echo $title; } else { echo $this->lang->line('alternative_page_title'); } ?></title>

	<?php if ($page == 'site_builder') : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/builder.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/builder.css" rel="stylesheet">
		<?php endif; ?>

	<?php elseif ($page == 'site') : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/sites.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/sites.css" rel="stylesheet">
		<?php endif; ?>

	<?php elseif ($page == 'asset') : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/images.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/images.css" rel="stylesheet">
		<?php endif; ?>

	<?php elseif ($page == 'user') : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/users.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/users.css" rel="stylesheet">
		<?php endif; ?>

	<?php elseif ($page == 'packages') : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/packages.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/packages.css" rel="stylesheet">
		<?php endif; ?>

	<?php elseif ($page == 'settings') : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/settings.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/settings.css" rel="stylesheet">
		<?php endif; ?>
		
	<?php else : ?>

		<?php if (ENVIRONMENT == 'production') : ?>
		<link href="<?php echo base_url(); ?>build/login.css" rel="stylesheet">
		<?php elseif (ENVIRONMENT == 'development') : ?>
		<link href="<?php echo $this->config->item('webpack_dev_url'); ?>build/login.css" rel="stylesheet">
		<?php endif; ?>

	<?php endif; ?>

	<link rel="shortcut icon" href="<?php echo base_url('img/favicon.png'); ?>">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('assets/js/html5shiv.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
	<![endif]-->
	<!--[if lt IE 10]>
	<link href="<?php echo base_url('assets/css/ie-masonry.css'); ?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/js/masonry.pkgd.min.js'); ?>"></script>
	<![endif]-->
	<link href="<?php echo base_url(); ?>assets/css/utilities.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/nav.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/forms.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/quiz.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/create.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/analytics.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/template_preview.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/site.css" rel="stylesheet">
	<script>
		var baseUrl = '<?php echo base_url('/'); ?>';
		var siteUrl = '<?php echo site_url('/'); ?>';
	</script>
</head>