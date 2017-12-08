<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autoupdate extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$model_list = [
		'settings/Core_settings_model' => 'MCores'
		];
		$this->load->model($model_list);

		if ( ! $this->session->has_userdata('user_id'))
		{
			redirect('auth', 'refresh');
		}
	}

	/**
	 * Check autoupdate exist or not
	 *
	 * @return 	void
	 */
	public function index()
	{
		$updates = json_decode(file_get_contents($this->config->item('autoupdate_uri')), TRUE);
		$config = file_get_contents('./config.ini');

		foreach ($updates as $version => $value)
		{
			if ($version > $config)
			{
				$c_user = getmyuid();
				$temp_file = tempnam(sys_get_temp_dir(), 'TMP');
				$p_user = fileowner($temp_file);
				@unlink($temp_file);

				$license = $this->MCores->get_by_name('license_key');
				if (count($license) > 0)
				{
					$url = $this->config->item('license_uri') . $license['value'];
					/** curl **/
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_POST, FALSE);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					$output = curl_exec($ch);
					curl_close($ch);
				}
				else
				{
					$output = '';
				}

				if ($c_user != $p_user)
				{
					$temp['alert_type'] = 'error';
					$temp['header'] = $this->lang->line('autoupdate_index_error_heading');
					$temp['content'] = $this->lang->line('autoupdate_index_error_content');

					$this->load->view('error', array('data'=>$temp));
				}
				else if ($output != 'valid')
				{
					$temp['alert_type'] = 'error';
					$temp['header'] = $this->lang->line('autoupdate_index_invalid_error_heading');
					$temp['content'] = $this->lang->line('autoupdate_index_invalid_error_content');

					$this->load->view('error', array('data'=>$temp));
				}
				else
				{
					$temp['alert_type'] = 'info';
					$temp['header'] = $this->lang->line('autoupdate_index_alert_heading');
					$temp['content'] = $this->lang->line('autoupdate_index_alert_content');

					$this->load->view('alert', array('data'=>$temp));
				}
				break;
			}
			else
			{
				redirect('sites', 'refresh');
			}
		}
	}

	/**
	 * Auto Update
	 *
	 * @return 	void
	 */
	public function update()
	{
		$return = TRUE;
		$return_json = [];

		$updates = json_decode(file_get_contents($this->config->item('autoupdate_uri')), TRUE);
		$config = file_get_contents('./config.ini');
		$rev_updates = array_reverse($updates);

		foreach ($rev_updates as $version => $value)
		{
			if ($version > $config)
			{
				// Enable write permission (777) to the folders
				if (isset($rev_updates[$version][0]['permission_directories']))
				{
					foreach ($rev_updates[$version][0]['permission_directories'] as $key => $value)
					{
						@chmod(FCPATH . $key, 0777);
					}
				}

				// Add files one by one
				if (isset($rev_updates[$version][0]['add_files']))
				{
					foreach ($rev_updates[$version][0]['add_files'] as $key => $value)
					{
						$write = FCPATH . $value;
						// Create folder in Local Server if not exist
						if ( ! file_exists(dirname($write)))
						{
							@mkdir(dirname($write), 0777, true);
						}
						// Read the file from Remote Server
						$read = file_get_contents($key);
						// Write the file in Local Server
						if ( ! file_put_contents($write, $read))
						{
							$return = FALSE;
						}
					}
				}

				// Delete files one by one
				if (isset($rev_updates[$version][0]['delete_files']))
				{
					foreach ($rev_updates[$version][0]['delete_files'] as $key => $value)
					{
						@chmod(FCPATH . $key, 0777);
						@unlink(FCPATH . $key);
					}
				}

				// Download zip and extract as per json file value
				if (isset($rev_updates[$version][0]['zip_file']))
				{
					foreach ($rev_updates[$version][0]['zip_file'] as $key => $value)
					{
						$write = FCPATH . $value;

						// Read the file from Remote Server
						$read = file_get_contents($key);
						// Write the file in Local Server
						if ( ! file_put_contents($write, $read))
						{
							$return = FALSE;
						}
						/**** extract without library ****/
						$zip = new ZipArchive;
						if ($zip->open($write) === TRUE)
						{
							$zip->extractTo(FCPATH . '/tmp/');
							$zip->close();
						}
						$folder = basename($write, '.zip');
						// echo $folder; die();
						recursive_copy(FCPATH . '/tmp/' . $folder, FCPATH);
						recursive_delete(FCPATH . '/tmp/' . $folder);
						@unlink($write);
						// die();
					}
				}

				// Delete directories recursively
				if (isset($rev_updates[$version][0]['delete_directories']))
				{
					foreach ($rev_updates[$version][0]['delete_directories'] as $key => $value)
					{
						$this->path = FCPATH . $key;

						if (file_exists($this->path))
						{
							recursive_delete($this->path);
						}
					}
				}

				// Revert back the folder permission to 755
				if (isset($rev_updates[$version][0]['permission_directories']))
				{
					foreach ($rev_updates[$version][0]['permission_directories'] as $key => $value)
					{
						@chmod(FCPATH . $key, 0755);
					}
				}

				if ($return)
				{
					// Update the version in Local Server
					file_put_contents(FCPATH . 'config.ini', $version);
					$return_json['code'] = 1;
					$return_json['content'] = sprintf($this->lang->line('autoupdate_update_success_content'), site_url('sites'));

					// Code for migrating database goes here
					        // Only Change version in future
			        $option = array(
			                        'migration_enabled' => TRUE,
			                        'migration_path' => APPPATH.'migrations/',
			                        'migration_version' => 001 
			                    );
			        $this->load->library('migration', $option);

			        if ($this->migration->current() === FALSE)
			        {
			            $return_json['content'] += '<br/><div class="alert alert-warning"><strong>'.$this->lang->line('migrate_failure').'</strong></div>';
			        }

				}
				else
				{
					$return_json['code'] = 0;
					$return_json['content'] = $this->lang->line('autoupdate_update_error_content');
				}
			}
			else
			{
				// Nothing to update
				$return_json['code'] = 0;
				$return_json['content'] = sprintf($this->lang->line('autoupdate_update_no_update_content'), site_url('sites'));
			}
		}

		die(json_encode($return_json));
	}

	/**
	 * Auto Update bak
	 */
	public function update_bak()
	{
		$return = TRUE;
		$return_json = [];

		$updates = json_decode(file_get_contents($this->config->item('autoupdate_uri')), TRUE);
		$config = file_get_contents('./config.ini');
		$rev_updates = array_reverse($updates);

		foreach ($rev_updates as $version => $value)
		{
			if ($version > $config)
			{
				// Enable write permission (777) to the folders
				if (isset($rev_updates[$version][0]['permission_directories']))
				{
					foreach ($rev_updates[$version][0]['permission_directories'] as $key => $value)
					{
						@chmod(FCPATH . $key, 0777);
					}
				}

				// Add files one by one
				if (isset($rev_updates[$version][0]['add_files']))
				{
					foreach ($rev_updates[$version][0]['add_files'] as $key => $value)
					{
						$write = FCPATH . $value;
						// Create folder in Local Server if not exist
						if ( ! file_exists(dirname($write)))
						{
							@mkdir(dirname($write), 0777, true);
						}
						// Read the file from Remote Server
						$read = file_get_contents($key);
						// Write the file in Local Server
						if ( ! file_put_contents($write, $read))
						{
							$return = FALSE;
						}
					}
				}

				// Delete files one by one
				if (isset($rev_updates[$version][0]['delete_files']))
				{
					foreach ($rev_updates[$version][0]['delete_files'] as $key => $value)
					{
						@chmod(FCPATH . $key, 0777);
						@unlink(FCPATH . $key);
					}
				}

				// Add folder recursively
				// if (isset($rev_updates[$version][0]['add_directories']))
				// {

				// }

				// Delete directories recursively
				if (isset($rev_updates[$version][0]['delete_directories']))
				{
					foreach ($rev_updates[$version][0]['delete_directories'] as $key => $value)
					{
						$this->path = FCPATH . $key;

						if (file_exists($this->path))
						{
							$objects = new RecursiveIteratorIterator (
								new RecursiveDirectoryIterator($this->path),
								RecursiveIteratorIterator::SELF_FIRST);

							$directories = array(0 => $this->path);
							$files = array();

							/** Recursive process of Folders. Discovery step for files and directories */
							foreach ($objects as $name => $object)
							{
								if (is_file($name))
								{
									$files[] = $name;
								}
								elseif (is_dir($name))
								{
									$directories[] = $name;
								}
							}

							foreach ($files as $file)
							{
								@unlink($file);
							}

							/** Sort folders in reverse order and delete one at a time */
							arsort($directories);
							foreach ($directories as $directory)
							{
								@chmod($directory, 0777);
								@rmdir($directory);
							}
						}
					}
				}

				// Revert back the folder permission to 755
				if (isset($rev_updates[$version][0]['permission_directories']))
				{
					foreach ($rev_updates[$version][0]['permission_directories'] as $key => $value)
					{
						@chmod(FCPATH . $key, 0755);
					}
				}

				if ($return)
				{
					// Update the version in Local Server
					file_put_contents(FCPATH . 'config.ini', $version);
					$return_json['code'] = 1;
					$return_json['content'] = sprintf($this->lang->line('autoupdate_update_success_content'), site_url('sites'));
				}
				else
				{
					$return_json['code'] = 0;
					$return_json['content'] = $this->lang->line('autoupdate_update_error_content');
				}
			}
			else
			{
				// Nothing to update
				$return_json['code'] = 0;
				$return_json['content'] = sprintf($this->lang->line('autoupdate_update_no_update_content'), site_url('sites'));
			}
		}

		die(json_encode($return_json));
	}

}