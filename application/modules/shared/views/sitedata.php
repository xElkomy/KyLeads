<form class="form-horizontal" role="form" id="siteSettingsForm">

	<input type="hidden" name="siteID" id="siteID" value="<?php echo $data['site']->sites_id; ?>">

	<div id="siteSettingsWrapper" class="siteSettingsWrapper">

		<div class="optionPane">

			<h6><?php echo $this->lang->line('sitedata_sitedetails'); ?></h6>

			<div class="form-group">
				<label for="name" class="col-sm-3 control-label"><?php echo $this->lang->line('sitedata_label_name'); ?></label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="siteSettings_siteName" name="siteSettings_siteName" placeholder="<?php echo $this->lang->line('sitedata_label_name'); ?>" value="<?php echo $data['site']->sites_name; ?>">
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="col-sm-3 control-label"><?php echo $this->lang->line('sitedata_label_globalcss'); ?></label>
				<div class="col-sm-9">
					<textarea class="form-control" id="siteSettings_siteCSS" name="siteSettings_siteCSS" placeholder="<?php echo $this->lang->line('sitedata_label_globalcss'); ?>" rows="6"><?php echo $data['site']->global_css; ?></textarea>
				</div>
			</div>

		</div><!-- /.optionPane -->

		<div class="optionPane" id="siteSettingsPublishing">

			<h6><?php echo $this->lang->line('sitedata_hostingdetails'); ?></h6>

			<?php if ($data['site']->custom_domain == '' && $data['site']->sub_domain == '' && $data['site']->sub_folder == '') : ?>
				<div class="alert alert-warning">
					<button class="close fui-cross" data-dismiss="alert"></button>
					<h4><?php echo $this->lang->line('sitedata_hosting_not_published_heading'); ?></h4>
					<p>
						<?php echo $this->lang->line('sitedata_hosting_not_published_message'); ?>
					</p>
				</div>
			<?php else:?>
				<div class="alert alert-success">
					<button class="close fui-cross" data-dismiss="alert"></button>
					<h4><?php echo $this->lang->line('sitedata_hosting_published_heading'); ?></h4>
					<p>
						<?php echo $this->lang->line('sitedata_hosting_published_message'); ?>
					</p>
					<ul>
						<?php if ($data['site']->custom_domain != '') : ?>
							<li><b><?php echo $this->lang->line('sitedata_hosting_dropdown_customdomain'); ?></b>: <?php echo $data['site']->custom_domain; ?></li>
						<?php endif;?>
						<?php if ($data['site']->sub_domain != '') : ?>
							<li><b><?php echo $this->lang->line('sitedata_hosting_dropdown_subdomain'); ?></b>: <?php if (isset($_SERVER['HTTPS'])) { echo "https://";} else { echo "http://"; }?><?php echo $data['site']->sub_domain; ?>.<?php echo $_SERVER['SERVER_NAME']; ?>/</li>
						<?php endif; ?>
						<?php if ($data['site']->sub_folder != '') : ?>
							<li><b><?php echo $this->lang->line('sitedata_hosting_dropdown_subfolder'); ?></b>: <?php echo $this->config->item('base_url'); ?><?php echo $data['site']->sub_folder; ?></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>

			<div class="row">

				<div class="col-md-4">
					<select class="form-control select select-primary select-block mbl" id="select_hostingOptions">
						<option value="" selected=""><?php echo $this->lang->line('sitedata_hosting_dropdown_choose'); ?></option>

						<?php if ($this->session->userdata('user_type') != "Admin") : ?>
							<?php if (in_array("Sub-Folder", $data['hosting_option'])) : ?>
								<option value="Sub Folder"><?php echo $this->lang->line('sitedata_hosting_dropdown_subfolder'); ?></option>
							<?php endif; ?>
						<?php else : ?>
							<option value="Sub Folder"><?php echo $this->lang->line('sitedata_hosting_dropdown_subfolder'); ?></option>
						<?php endif; ?>

						<?php if ($this->session->userdata('user_type') != "Admin") : ?>
							<?php if (in_array("Sub-Domain", $data['hosting_option'])) : ?>
								<option value="Sub Domain"><?php echo $this->lang->line('sitedata_hosting_dropdown_subdomain'); ?></option>
							<?php endif; ?>
						<?php else : ?>
							<option value="Sub Domain"><?php echo $this->lang->line('sitedata_hosting_dropdown_subdomain'); ?></option>
						<?php endif; ?>

						<?php if ($this->session->userdata('user_type') != "Admin") : ?>
							<?php if (in_array("Custom Domain", $data['hosting_option'])) : ?>
								<option value="Custom Domain"><?php echo $this->lang->line('sitedata_hosting_dropdown_customdomain'); ?></option>
							<?php endif; ?>
						<?php else : ?>
							<option value="Custom Domain"><?php echo $this->lang->line('sitedata_hosting_dropdown_customdomain'); ?></option>
						<?php endif; ?>
					</select>
				</div>

				<div class="col-md-8">

					<section id="section_subfolder" class="hosting_option">

						<div class="input-group">
							<span class="input-group-addon"><?php echo $this->config->item('base_url'); ?></span>
							<input type="text" name="sub_folder" class="form-control" placeholder="yoursite" value="<?php echo $data['site']->sub_folder; ?>">
						</div>

						<div>
							<?php echo $this->lang->line('sitedata_hosting_info_subfolder'); ?>
						</div>

					</section>

					<section id="section_subdomain" class="hosting_option">

						<div class="input-group">
							<input type="text" name="sub_domain" class="form-control" placeholder="mysite" value="<?php echo $data['site']->sub_domain; ?>">
							<span class="input-group-addon">.<?php echo $_SERVER['SERVER_NAME']; ?>/</span>
						</div>

						<div>
							<?php echo $this->lang->line('sitedata_hosting_info_subdomain'); ?>
						</div>

					</section>

					<section id="section_customdomain" class="hosting_option">

						<div class="form-group">
							<input type="text" name="custom_domain" class="form-control" placeholder="http://mydomainname.com" value="<?php echo $data['site']->custom_domain; ?>">
							<span class="form-control-feedback fui-check"></span>
						</div>

						<div>
							<?php echo sprintf($this->lang->line('sitedata_hosting_info_customdomain'), $this->config->item('base_url')); ?>
						</div>

					</section>

				</div>

			</div><!-- /.row -->

		</div><!-- ./optionPane -->

	</div><!-- /.siteSettingsWrapper -->

</form>