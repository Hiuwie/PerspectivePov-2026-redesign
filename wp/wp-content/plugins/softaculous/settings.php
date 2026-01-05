<?php

if (!defined('ABSPATH')){
    exit;
}

function softaculous_page_settings($title = 'Softaculous Dashboard'){
	global $l, $error, $msg;
	
	soft_admin_notice(1);
	
	if(!empty($error)){
		echo '<div id="message" class="error"><p>'.$error.'</p></div>';
	}
	
	if(!empty($msg)){
		echo '<div id="message" class="updated"><p>'.$msg.'</p></div>';
	}
	echo '<div style="margin: 10px 20px 0 2px;">	
			<div class="metabox-holder columns-2">
			<div class="postbox-container">	
			<div class="wrap">
				<h1><!--This is to fix promo--></h1>
				<table cellpadding="2" cellspacing="1" width="100%" class="fixed" border="0">
					<tr>
						<td valign="top"><h1>'.$title.'</h1>
						</td>
						<td align="right" width="40"><a target="_blank" href="https://twitter.com/softaculous"><img src="'.plugins_url('', __FILE__).'/images/twitter.png" /></a></td>
						<td align="right" width="40"><a target="_blank" href="https://www.facebook.com/softaculous"><img src="'.plugins_url('', __FILE__).'/images/facebook.png" /></a></td>
					</tr>
				</table>
				<hr/>
				<br/>
				<div class="postbox">
				<div class="postbox-header">
					<h2 class="hndle ui-sortable-handle">
						<span>'.__('General Settings', 'softaculous').'</span>
					</h2>
				</div>
				<div class="inside">
				<!--Main Table-->
				<table cellpadding="8" cellspacing="1" width="100%" class="form-table">
					<form action="" method="post">
						<tr>
							<th valign="top"><label for="soft_conn_key">Softaculous Connection Key</label></th>
							<td>
								<input type="text" name="soft_conn_key" id="soft_conn_key" value="'.soft_get_connection_key().'" size="60" readonly>
								<input type="submit" name="reset_conn_key" class="button button-primary action" value="Reset Key" >
							</td>
						</tr>
						<tr>
							<th valign="top"><label for="soft_allowed_ips">Allowed IP(s)</label></th>
							<td>
								<input type="text" name="soft_allowed_ips" id="soft_allowed_ips" value="'.(isset($_POST['soft_allowed_ips']) ? soft_optREQ('soft_allowed_ips') : implode(',' , soft_get_allowed_ips())).'"><br />
								<span>Please enter comma separated IP address(s) of panels which will be allowed to make API calls</span>
								<br/>
								</br/>
								<input type="submit" name="soft_save" class="button button-primary action" value="Save Settings" >
							</td>
						</tr>
						'.wp_nonce_field('softaculous-options').'
					</form>
				</table>
				
				</div>
				</div>
			
				<br/>
				<br/>
				<div style="width:45%;background:#FFF;padding:15px; margin:auto">
					<b>Let your followers know that you are managing WordPress websites like a Pro using Softaculous :</b>
					<form method="get" action="https://twitter.com/intent/tweet" id="tweet" onsubmit="return dotweet(this);">
						<textarea name="text" cols="45" row="3" style="resize:none;">I easily manage my #WordPress #site using @softaculous</textarea>
						&nbsp; &nbsp; <input type="submit" value="Tweet!" class="button button-primary" onsubmit="return false;" id="twitter-btn" style="margin-top:20px;"/>
					</form>
			
				</div>
				<br />
			<script>
				function dotweet(ele){
					window.open(jQuery("#"+ele.id).attr("action")+"?"+jQuery("#"+ele.id).serialize(), "_blank", "scrollbars=no, menubar=no, height=400, width=500, resizable=yes, toolbar=no, status=no");
					return false;
				}
			</script>
			<hr />
			<a href="'.SOFTACULOUS_WWW_URL.'" target="_blank">Softaculous</a> v'.SOFTACULOUS_VERSION.' You can report any bugs <a href="https://wordpress.org/plugins/softaculous/" target="_blank">here</a>.
		</div>
		</div>
		</div>
	</div>';
}
	
if(isset($_POST['reset_conn_key'])){
	
	global $l, $error, $msg;
	
	/* Make sure post was from this page */
	if(count($_POST) > 0){
		check_admin_referer('softaculous-options');
	}
	
	soft_get_connection_key(1);
	
	if(empty($error)){
		$msg = __('Connection key reset successfully', 'softaculous');
	}
}

if(isset($_POST['soft_save'])){
	global $l, $error, $msg;
	
	/* Make sure post was from this page */
	if(count($_POST) > 0){
		check_admin_referer('softaculous-options');
	}
	
	if(isset($_REQUEST['soft_allowed_ips'])){
		
		$_allowed_ips = array();
		
		$allowed_ips = soft_optPOST('soft_allowed_ips');
		$_a_ips = explode(',', $allowed_ips);
		
		foreach($_a_ips as $aip){
			$aip = trim($aip);
			if(empty($aip)){
				continue;
			}
			
			if(!soft_valid_ip($aip)){
				$error = __('Please enter valid IP(s)', 'softaculous');
				continue;
			}
			
			$_allowed_ips[] = $aip;
		}
		
		if(empty($_allowed_ips)){
			$error = $l['empty_allowed_ips'];
		}
		
		if(empty($error)){
			update_option('softaculous_allowed_ips', $_allowed_ips);
		}
	}
	
	if(empty($error)){
		$msg = __('Settings saved successfully', 'softaculous');
	}
}

softaculous_page_settings();
