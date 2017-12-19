<body class="login">

	<div class="container">

		<div class="row">

			<div class="col-block col-md-6">

				<div class="logo">
					<img src="../images/kyleads/kyleads-logo-login.jpg" alt="" width="300px" height="200px">
				</div>

				<div class="center-l-f">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close fui-cross" type="button"></button>
							<strong><?php echo $this->lang->line('flashdata_success'); ?></strong> <?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('error')) : ?>
						<div class="alert alert-danger">
							<button data-dismiss="alert" class="close fui-cross" type="button"></button>
							<strong><?php echo $this->lang->line('flashdata_error'); ?></strong> <?php echo $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>

					<form role="form" action="auth" method="post">

						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn"><span class="fui-user"></span></button>
							</span>
							<input type="email" class="form-control" id="email" name="email" tabindex="1" autofocus placeholder="<?php echo $this->lang->line('login_input_email_placeholder'); ?>">
						</div>

						<div class="input-group">
							<span class="input-group-btn">
								<button class="btn"><span class="fui-lock"></span></button>
							</span>
							<input type="password" class="form-control" id="password" name="password" tabindex="2" placeholder="<?php echo $this->lang->line('login_input_password_placeholder'); ?>">
						</div>

						<label class="checkbox margin-bottom-20" for="checkbox1">
							<input type="checkbox" value="1" id="remember" name="remember" tabindex="3" data-toggle="checkbox">
							<?php echo $this->lang->line('login_remember_me'); ?>
						</label>

						<button type="submit" class="btn btn-r-u btn-primary btn-block btn-embossed" tabindex="4">Log in<span class="fui-arrow-right"></span></button>

						<div class="row">
							<div class="col-md-12 text-center">
								<a href="auth/forgot"><?php echo $this->lang->line('login_lost_password'); ?></a>
							</div>
						</div><!-- /.row -->

					</form>

					<div class="divider">
						<span><?php echo $this->lang->line('OR'); ?></span>
					</div>

					<h2 class="text-center margin-bottom-25">
						<?php echo $this->lang->line('login_signup_heading'); ?>
					</h2>

					<a href="auth/register" class="btn btn-l-c btn-r-u btn-block btn-inverse btn-embossed">Start your free trial<span class="fui-new"></span></a>
				</div>
			</div><!-- /.col -->
				<div class="col-block col-md-6 col-md-offset-6-c">
					<div class="center-info">
						<p class="t-w-u f-t-s">"It's not what we do once a in while that</p>
						<p class="t-w-u f-t-s">shapes our lives. It's what we do consistently."</p>
						<p class="t-w-u f-t-s">-Tony Robins</p>
					</div>
				</div>
		</div><!-- /.row -->

	</div><!-- /.container -->

	<!-- Load JS here for greater good =============================-->
	<?php if (ENVIRONMENT == 'production') : ?>
	<script src="<?php echo base_url('build/login.bundle.js'); ?>"></script>
	<?php elseif (ENVIRONMENT == 'development') : ?>
    <script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/login.bundle.js"></script>
    <?php endif; ?>
</body>
</html>