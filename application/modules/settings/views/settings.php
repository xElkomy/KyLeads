<?php $this->load->view("shared/header.php"); ?>

<body>

	<?php $this->load->view("shared/nav.php"); ?>

	<div class="container-fluid">

		<div class="row">

			<div class="col-md-9 col-sm-8">
				<h1><span class="fui-gear"></span> <?php echo $this->lang->line('settings_heading'); ?></h1>
			</div><!-- /.col -->

			<div class="col-md-3 col-sm-4 text-right">

			</div><!-- /.col -->

		</div><!-- /.row -->

		<hr class="dashed margin-bottom-30">

		<div class="row">

			<div class="col-md-12">

				<ul class="nav nav-tabs nav-append-content" id="settingsTabs">
					<li class="active"><a href="#appSettings"><span class="fui-gear"></span> <?php echo $this->lang->line('settings_tab_application_settings'); ?></a></li>
					<li><a href="#paymentSettings"><span class="fui-gear"></span> <?php echo $this->lang->line('settings_tab_payment_settings'); ?></a></li>
					<li><a href="#updateSettings"><span class="fui-gear"></span> <?php echo $this->lang->line('settings_tab_update_settings'); ?></a></li>
				</ul> <!-- /tabs -->

				<div class="tab-content">

					<div class="tab-pane active" id="appSettings">

						<div class="row">

							<div class="col-md-8">

								<?php if ($this->session->flashdata('error') == '' && $this->session->flashdata('success') == '') : ?>

									<div class="alert alert-warning">
										<button type="button" class="close fui-cross" data-dismiss="alert"></button>
										<h4><?php echo $this->lang->line('settings_warning_heading'); ?></h4>
										<p>
											<?php echo $this->lang->line('settings_warning_message'); ?>
										</p>
									</div>

								<?php else : ?>

									<?php if ($this->session->flashdata('error') != '') : ?>
										<div class="alert alert-warning">
											<button type="button" class="close fui-cross" data-dismiss="alert"></button>
											<h4><?php echo $this->lang->line('flashdata_error'); ?></h4>
											<?php echo $this->session->flashdata('error'); ?>
										</div>
									<?php endif; ?>

									<?php if ($this->session->flashdata('success') != '') : ?>
										<div class="alert alert-success">
											<button type="button" class="close fui-cross" data-dismiss="alert"></button>
											<h4><?php echo $this->lang->line('flashdata_success'); ?></h4>
											<?php echo $this->session->flashdata('success'); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>

								<form class="form-horizontal settingsForm" role="form" id="settingsForm" method="post" action="settings/update">
									<?php foreach ($apps as $app) : ?>

										<div class="form-group">
											<label for="<?php echo $app->name; ?>" class="col-sm-3 control-label"><?php echo $app->name; ?> <?php if ($app->required == 1) : ?>*<?php endif; ?></label>
											<div class="col-sm-9">
												<textarea class="form-control" name="<?php echo $app->name; ?>" id="<?php echo $app->name; ?>"><?php echo $app->value; ?></textarea>
												<div class="settingDescription">
													<?php echo $app->description; ?>
												</div>
											</div>
										</div>
									<?php endforeach; ?>									

									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<p class="text-danger">
												<?php echo $this->lang->line('settings_requiredfields'); ?>
											</p>
											<button type="submit" class="btn btn-primary btn-wide"><span class="fui-check"></span> <?php echo $this->lang->line('settings_button_update'); ?></button>
										</div>
									</div>
								</form>

							</div><!-- /.col -->

							<div class="col-md-4">

								<div class="alert alert-info configHelp" id="configHelp">
									<button type="button" class="close fui-cross" data-dismiss="alert"></button>
									<div>
										<h4>
											<?php echo $this->lang->line('settings_confighelp_heading'); ?>
										</h4>
										<p>
											<?php echo $this->lang->line('settings_confighelp_message'); ?>
										</p>
									</div>
								</div>

							</div><!-- /.col -->

						</div><!-- /.row -->

					</div>

					<div class="tab-pane" id="paymentSettings">

						<div class="row">

							<div class="col-md-8">

								<?php if ($this->session->flashdata('error') == '' && $this->session->flashdata('success') == '') : ?>

									<div class="alert alert-warning">
										<button type="button" class="close fui-cross" data-dismiss="alert"></button>
										<h4><?php echo $this->lang->line('settings_warning_heading'); ?></h4>
										<p>
											<?php echo $this->lang->line('settings_warning_message'); ?>
										</p>
									</div>

								<?php else : ?>

									<?php if ($this->session->flashdata('error') != '') : ?>
										<div class="alert alert-warning">
											<button type="button" class="close fui-cross" data-dismiss="alert"></button>
											<h4><?php echo $this->lang->line('flashdata_error'); ?></h4>
											<?php echo $this->session->flashdata('error'); ?>
										</div>
									<?php endif; ?>

									<?php if ($this->session->flashdata('success') != '') : ?>
										<div class="alert alert-success">
											<button type="button" class="close fui-cross" data-dismiss="alert"></button>
											<h4><?php echo $this->lang->line('flashdata_success'); ?></h4>
											<?php echo $this->session->flashdata('success'); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>

								<form class="form-horizontal settingsForm" role="form" id="settingsForm" method="post" action="settings/update_payment#paymentSettings">
									<?php foreach ($payments as $payment) : ?>
										<?php if ($payment->name == 'stripe_test_mode') : ?>
											<div class="form-group">
												<label for="<?php echo $payment->name; ?>" class="col-sm-3 control-label"><?php echo $payment->name; ?> <?php if ($payment->required == 1) : ?>*<?php endif; ?></label>
												<div class="col-sm-9">
													<input type="hidden" value="off" name="<?php echo $payment->name; ?>" >
													<input type="checkbox" value="test" <?php if ($payment->value == 'test') : ?>checked<?php endif; ?> name="<?php echo $payment->name; ?>" data-toggle="switch" id="<?php echo $payment->name; ?>">
												</div>
											</div>
										<?php elseif($payment->name == 'paypal_test_mode') : ?>

											<div class="form-group">
												<label for="<?php echo $payment->name; ?>" class="col-sm-3 control-label"><?php echo $payment->name; ?> <?php if ($payment->required == 1) : ?>*<?php endif; ?></label>
												<div class="col-sm-9">
													<input type="hidden" value="off" name="<?php echo $payment->name; ?>" >
													<input type="checkbox" value="test" <?php if ($payment->value == 'test') : ?>checked<?php endif; ?> name="<?php echo $payment->name; ?>" data-toggle="switch" id="<?php echo $payment->name; ?>">
												</div>
											</div>
										<?php else : ?>

											<div class="form-group">
												<label for="<?php echo $payment->name; ?>" class="col-sm-3 control-label"><?php echo $payment->name; ?> <?php if ($payment->required == 1) : ?>*<?php endif; ?></label>
												<div class="col-sm-9">
												<?php if($payment->id == 8) :?>
												<select name="<?php echo $payment->name; ?>" id="<?php echo $payment->name; ?>" class="form-control select select-primary select-block mbl">
													<option value="stripe" <?php if($payment->value == "stripe"){ echo 'selected="selected"'; } ?>>Stripe</option>
													<option value="paypal" <?php if($payment->value == "paypal"){ echo 'selected="selected"'; } ?>>Paypal</option>
												</select>
												<?php else :?>
													<textarea class="form-control" name="<?php echo $payment->name; ?>" id="<?php echo $payment->name; ?>"><?php echo $payment->value; ?></textarea>
													<div class="settingDescription">
														<?php echo $payment->description; ?>
													</div>
												<?php endif; ?>
												</div>
												
											</div>
										<?php endif; ?>
									<?php endforeach;?>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<p class="text-danger">
												<?php echo $this->lang->line('settings_requiredfields'); ?>
											</p>
											<button type="submit" class="btn btn-primary btn-wide"><span class="fui-check"></span> <?php echo $this->lang->line('settings_button_update'); ?></button>
										</div>
									</div>
								</form>

							</div><!-- /.col -->

							<div class="col-md-4">

								<div class="alert alert-info configHelp" id="configHelp">
									<button type="button" class="close fui-cross" data-dismiss="alert"></button>
									<div>
										<h4>
											<?php echo $this->lang->line('settings_confighelp_heading'); ?>
										</h4>
										<p>
											<?php echo $this->lang->line('settings_confighelp_message'); ?>
										</p>
									</div>
								</div>

							</div><!-- /.col -->

						</div><!-- /.row -->

					</div>

					<div class="tab-pane" id="updateSettings">

						<div class="row">

							<div class="col-md-8">

								<?php if ($this->session->flashdata('error') == '' && $this->session->flashdata('success') == '') : ?>

									<div class="alert alert-warning">
										<button type="button" class="close fui-cross" data-dismiss="alert"></button>
										<h4><?php echo $this->lang->line('settings_warning_heading'); ?></h4>
										<p>
											<?php echo $this->lang->line('settings_warning_message'); ?>
										</p>
									</div>

								<?php else : ?>

									<?php if ($this->session->flashdata('error') != '') : ?>
										<div class="alert alert-warning">
											<button type="button" class="close fui-cross" data-dismiss="alert"></button>
											<h4><?php echo $this->lang->line('flashdata_error'); ?></h4>
											<?php echo $this->session->flashdata('error'); ?>
										</div>
									<?php endif; ?>

									<?php if ($this->session->flashdata('success') != '') : ?>
										<div class="alert alert-success">
											<button type="button" class="close fui-cross" data-dismiss="alert"></button>
											<h4><?php echo $this->lang->line('flashdata_success'); ?></h4>
											<?php echo $this->session->flashdata('success'); ?>
										</div>
									<?php endif; ?>

								<?php endif; ?>

								<form class="form-horizontal settingsForm" role="form" id="settingsForm" method="post" action="settings/update_core#updateSettings">
									<?php foreach ($cores as $core) : ?>
										<?php if ($core->name == 'auto_update') : ?>
											<div class="form-group">
												<label for="<?php echo $core->name; ?>" class="col-sm-3 control-label"><?php echo $core->name; ?> <?php if ($core->required == 1) : ?>*<?php endif; ?></label>
												<div class="col-sm-9">
													<input type="hidden" value="no" name="<?php echo $core->name; ?>" >
													<input type="checkbox" value="yes" <?php if ($core->value == 'yes') : ?>checked<?php endif; ?> name="<?php echo $core->name; ?>" data-toggle="switch" id="<?php echo $core->name; ?>">
												</div>
											</div>
										<?php else : ?>
											<div class="form-group">
												<label for="<?php echo $core->name; ?>" class="col-sm-3 control-label"><?php echo $core->name; ?> <?php if ($core->required == 1) : ?>*<?php endif; ?></label>
												<div class="col-sm-9">
													<textarea class="form-control" name="<?php echo $core->name; ?>" id="<?php echo $core->name; ?>"><?php echo $core->value; ?></textarea>
													<div class="settingDescription">
														<?php echo $core->description; ?>
													</div>
												</div>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<p class="text-danger">
												<?php echo $this->lang->line('settings_requiredfields'); ?>
											</p>
											<button type="submit" class="btn btn-primary btn-wide"><span class="fui-check"></span> <?php echo $this->lang->line('settings_button_update'); ?></button>
										</div>
									</div>
								</form>

							</div><!-- /.col -->

							<div class="col-md-4">

								<div class="alert alert-info configHelp" id="configHelp">
									<button type="button" class="close fui-cross" data-dismiss="alert"></button>
									<div>
										<h4>
											<?php echo $this->lang->line('settings_confighelp_heading'); ?>
										</h4>
										<p>
											<?php echo $this->lang->line('settings_confighelp_message'); ?>
										</p>
									</div>
								</div>

							</div><!-- /.col -->

						</div><!-- /.row -->

					</div>

				</div> <!-- /tab-content -->

			</div><!-- /.col -->

		</div><!-- /.row -->

	</div><!-- /.container -->

	<!-- Modal -->

	<?php $this->load->view("shared/modal_account.php"); ?>

	<div class="modal fade paypalWarningModal" id="paypalWarningModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo $this->lang->line('modal_close'); ?></span></button>
					<h4 class="modal-title" id="myModalLabel"><span class="fui-info"></span> Using Paypal to process payments</h4>
				</div>

				<div class="modal-body">
					
					<p>
						To be able to use Paypal to process payments for your SB Pro application, you will need to make sure of the following:
					</p>

					<ol>
						<li>
							You have a <b>Paypal Business account</b><br>
							To learn more on how to setup a Paypal Business account, please have a look at the following articles:
							<ul>
								<li><a href="http://www.makeuseof.com/tag/set-paypal-account-business/" target="_blank">http://www.makeuseof.com/tag/set-paypal-account-business/</a></li>
								<li><a href="https://www.paypal.com/us/webapps/mpp/merchant" target="_blank">https://www.paypal.com/us/webapps/mpp/merchant</a></li>
							</ul>
						</li>
						<li>
							Your Paypal account needs to be configured to accept payment for digitally delivered goods (Express Checkout). If you're having trouble activating Express Checkout for digital goods, we advice to reach out to Paypal customer support.
						</li>
					</ol>

				</div><!-- /.modal-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fui-cross"></span> <?php echo $this->lang->line('modal_close'); ?></button>
				</div>

			</div><!-- /.modal-content -->

		</div><!-- /.modal-dialog -->

	</div><!-- /.modal -->


	<!-- /modals -->

	<!-- Load JS here for greater good =============================-->
	<?php if (ENVIRONMENT == 'production') : ?>
		<script src="<?php echo base_url('build/settings.bundle.js'); ?>"></script>
	<?php elseif (ENVIRONMENT == 'development') : ?>
		<script src="<?php echo $this->config->item('webpack_dev_url'); ?>build/settings.bundle.js"></script>
	<?php endif; ?>

</body>
</html>