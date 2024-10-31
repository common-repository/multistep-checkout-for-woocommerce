<?php

if ( ! defined( 'ABSPATH' ) ) exit;

$plugin_dir_url = plugin_dir_url( __FILE__ );

if ( current_user_can('manage_options') ) {

	if ( ! empty( $_POST ) && check_admin_referer( 'phoen_checkout_function', 'phoen_checkout_nonce_field' ) ) {
		
		if(isset($_POST['phoen_set_checkout']) && $_POST['phoen_set_checkout'] == 'Save changes')
		{
			$phoen_enable = isset($_POST['phoen_checkouts_enable'])?sanitize_text_field($_POST['phoen_checkouts_enable']):"";
			$phoen_checkout_text_color	=isset($_POST['phoen_checkout_text_color'])?sanitize_text_field($_POST['phoen_checkout_text_color']):"";
			$phoen_checkout_text_size	=isset($_POST['phoen_checkout_text_size'])?sanitize_text_field($_POST['phoen_checkout_text_size']):"";
			$phoen_checkout_num_background_color	=isset($_POST['phoen_checkout_num_background_color'])?sanitize_text_field($_POST['phoen_checkout_num_background_color']):"";
			$phoen_checkout_num_border_radius	=isset($_POST['phoen_checkout_num_border_radius'])?sanitize_text_field($_POST['phoen_checkout_num_border_radius']):"";
			$phoen_checkout_num_text_color	=isset($_POST['phoen_checkout_num_text_color'])?sanitize_text_field($_POST['phoen_checkout_num_text_color']):"";
			$phoen_checkout_divider_color	=isset($_POST['phoen_checkout_divider_color'])?sanitize_text_field($_POST['phoen_checkout_divider_color']):"";
			$phoen_checkout_acti_text_color	=isset($_POST['phoen_checkout_acti_text_color'])?sanitize_text_field($_POST['phoen_checkout_acti_text_color']):"";
			$phoen_checkout_acti_num_back_color	=isset($_POST['phoen_checkout_acti_num_back_color'])?sanitize_text_field($_POST['phoen_checkout_acti_num_back_color']):"";
			$phoen_checkout_acti_num_color	=isset($_POST['phoen_checkout_acti_num_color'])?sanitize_text_field($_POST['phoen_checkout_acti_num_color']):"";
			$phoen_checkout_acti_border_color	=isset($_POST['phoen_checkout_acti_border_color'])?sanitize_text_field($_POST['phoen_checkout_acti_border_color']):"";
			$phoen_checkout_margin_top	=isset($_POST['phoen_checkout_margin_top'])?sanitize_text_field($_POST['phoen_checkout_margin_top']):"";
			$phoen_checkout_text_transform	=isset($_POST['phoen_checkout_text_transform'])?sanitize_text_field($_POST['phoen_checkout_text_transform']):"";
			$phoen_checkout_margin_bottom	=isset($_POST['phoen_checkout_margin_bottom'])?sanitize_text_field($_POST['phoen_checkout_margin_bottom']):"";
			$phoen_checkout_com_bil_ship	=isset($_POST['phoen_checkout_com_bil_ship'])?sanitize_text_field($_POST['phoen_checkout_com_bil_ship']):"";
			$phoen_checkout_com_bil_ship_label	=isset($_POST['phoen_checkout_com_bil_ship_label'])?sanitize_text_field($_POST['phoen_checkout_com_bil_ship_label']):"";
			$phoen_checkout_com_order_payment	=isset($_POST['phoen_checkout_com_order_payment'])?sanitize_text_field($_POST['phoen_checkout_com_order_payment']):"";
			$phoen_checkout_com_order_payment_label	=isset($_POST['phoen_checkout_com_order_payment_label'])?sanitize_text_field($_POST['phoen_checkout_com_order_payment_label']):"";
			$phoen_checkout_label_login	=isset($_POST['phoen_checkout_label_login'])?sanitize_text_field($_POST['phoen_checkout_label_login']):"";
			$phoen_checkout_label_billing	=isset($_POST['phoen_checkout_label_billing'])?sanitize_text_field($_POST['phoen_checkout_label_billing']):"";
			$phoen_checkout_label_shipping	=isset($_POST['phoen_checkout_label_shipping'])?sanitize_text_field($_POST['phoen_checkout_label_shipping']):"";
			$phoen_checkout_label_order	=isset($_POST['phoen_checkout_label_order'])?sanitize_text_field($_POST['phoen_checkout_label_order']):"";
			$phoen_checkout_label_payment	=isset($_POST['phoen_checkout_label_payment'])?sanitize_text_field($_POST['phoen_checkout_label_payment']):"";
			$phoen_checkout_label_next	=isset($_POST['phoen_checkout_label_next'])?sanitize_text_field($_POST['phoen_checkout_label_next']):"";
			$phoen_checkout_label_previous	=isset($_POST['phoen_checkout_label_previous'])?sanitize_text_field($_POST['phoen_checkout_label_previous']):"";
				
			$phoen_multi_settings =array(
				'phoen_enable'=>$phoen_enable,
				'phoen_checkout_text_color'=>$phoen_checkout_text_color,
				'phoen_checkout_text_size'=>$phoen_checkout_text_size,
				'phoen_checkout_num_background_color'=>$phoen_checkout_num_background_color,
				'phoen_checkout_num_border_radius'=>$phoen_checkout_num_border_radius,
				'phoen_checkout_num_text_color'=>$phoen_checkout_num_text_color,
				'phoen_checkout_divider_color'=>$phoen_checkout_divider_color,
				'phoen_checkout_acti_text_color'=>$phoen_checkout_acti_text_color,
				'phoen_checkout_acti_num_back_color'=>$phoen_checkout_acti_num_back_color,
				'phoen_checkout_acti_num_color'=>$phoen_checkout_acti_num_color,
				'phoen_checkout_acti_border_color'=>$phoen_checkout_acti_border_color,
				'phoen_checkout_margin_top'=>$phoen_checkout_margin_top,
				'phoen_checkout_margin_bottom'=>$phoen_checkout_margin_bottom,
				'phoen_checkout_text_transform'=>$phoen_checkout_text_transform,
				'phoen_checkout_com_bil_ship'=>$phoen_checkout_com_bil_ship,
				'phoen_checkout_com_bil_ship_label'=>$phoen_checkout_com_bil_ship_label,
				'phoen_checkout_com_order_payment'=>$phoen_checkout_com_order_payment,
				'phoen_checkout_com_order_payment_label'=>$phoen_checkout_com_order_payment_label,
				'phoen_checkout_label_login'=>$phoen_checkout_label_login,
				'phoen_checkout_label_billing'=>$phoen_checkout_label_billing,
				'phoen_checkout_label_shipping'=>$phoen_checkout_label_shipping,
				'phoen_checkout_label_order'=>$phoen_checkout_label_order,
				'phoen_checkout_label_payment'=>$phoen_checkout_label_payment,
				'phoen_checkout_label_next'=>$phoen_checkout_label_next,
				'phoen_checkout_label_previous'=>$phoen_checkout_label_previous,
			);
					
			update_option('phoen_checkout_enable',$phoen_multi_settings);
		}
		
		if(isset($_POST['phoen_set_checkout_reset']) && $_POST['phoen_set_checkout_reset'] == 'Reset')
		{
		
			$phoen_multi_settings =array(
						'phoen_enable'=>'1',
						'phoen_checkout_text_color'=>"#464646",
						'phoen_checkout_text_size'=>'16',
						'phoen_checkout_num_background_color'=>"#c1c1c1",
						'phoen_checkout_num_border_radius'=>"4",
						'phoen_checkout_num_text_color'=>"#4c4c4c",
						'phoen_checkout_divider_color'=>"#c1c1c1",
						'phoen_checkout_acti_text_color'=>"#307ebc",
						'phoen_checkout_acti_num_back_color'=>"#307ebc",
						'phoen_checkout_acti_num_color'=>"#fff",
						'phoen_checkout_acti_border_color'=>"#307ebc",
						'phoen_checkout_margin_top'=>"0",
						'phoen_checkout_margin_bottom'=>"20",
						'phoen_checkout_text_transform'=>"uppercase",
						'phoen_checkout_com_bil_ship'=>'',
						'phoen_checkout_com_bil_ship_label'=>'',
						'phoen_checkout_com_order_payment'=>'',
						'phoen_checkout_com_order_payment_label'=>'',
						'phoen_checkout_label_login'=>'Login',
						'phoen_checkout_label_billing'=>'Billing',
						'phoen_checkout_label_shipping'=>'Shipping',
						'phoen_checkout_label_order'=>'Order Info',
						'phoen_checkout_label_payment'=>'Payment Info',
						'phoen_checkout_label_next'=>'Continue',
						'phoen_checkout_label_previous'=>'Previous',
					);
					
					update_option('phoen_checkout_enable',$phoen_multi_settings);
					
		}
	}
}
		
$phoen_checkout_enable_settings = get_option('phoen_checkout_enable');
?>

<div class="pho-upgrade-btn">
		<a href="https://www.phoeniixx.com/product/multistep-checkout-for-woocommerce/" target="_blank"><img src="<?php echo esc_attr($plugin_dir_url); ?>../assets/images/premium-btn.png" /></a>
		<a target="blank" href="http://multistepcheckout.phoeniixxdemo.com/checkout/"><img src="<?php echo esc_attr($plugin_dir_url); ?>../assets/images/button2.png" /></a>
</div>
		
<div class="phoe_video_main">
	<h3><?php _e('How to set up plugin','multi-step-ckeckout-for-woocommerce');?></h3> 
	<iframe width="800" height="360"src="https://www.youtube.com/embed/9VGQOzypEqk" allowfullscreen></iframe>
</div>		
		
<form method="post">

	<?php wp_nonce_field( 'phoen_checkout_function', 'phoen_checkout_nonce_field' ); ?>
	<h2> <?php _e('General Settings','multi-step-ckeckout-for-woocommerce'); ?></h2>
	<table class="form-table">
	
		<tbody>
		
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_enable_settings"><?php _e("Enable Checkout Plugin",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td>
				<?php 
					$general_settings =get_option("phoen_checkout_enable");
				?>
					<input type="checkbox" value="1" <?php echo esc_attr((isset($phoen_checkout_enable_settings['phoen_enable']) && $phoen_checkout_enable_settings['phoen_enable'] == '1')?'checked':'');?> name="phoen_checkouts_enable" />
					<p class="description">Check this option to enable the plugin features.</p>
				</td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_login"><?php _e("Label of Login",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_login"  id="phoen_checkout_label_login"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_login'])?$phoen_checkout_enable_settings['phoen_checkout_label_login']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_billing"><?php _e("Label of Billing",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_billing"  id="phoen_checkout_label_billing"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_billing'])?$phoen_checkout_enable_settings['phoen_checkout_label_billing']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_shipping"><?php _e("Label of Shipping",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_shipping"  id="phoen_checkout_label_shipping"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_shipping'])?$phoen_checkout_enable_settings['phoen_checkout_label_shipping']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_order"><?php _e("Label of Order",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_order"  id="phoen_checkout_label_order"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_order'])?$phoen_checkout_enable_settings['phoen_checkout_label_order']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_payment"><?php _e("Label of Payment",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_payment"  id="phoen_checkout_label_payment"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_payment'])?$phoen_checkout_enable_settings['phoen_checkout_label_payment']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_next"><?php _e("Label of Next",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_next"  id="phoen_checkout_label_next"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_next'])?$phoen_checkout_enable_settings['phoen_checkout_label_next']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_label_previous"><?php _e("Label of Previous",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_label_previous"  id="phoen_checkout_label_previous"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_label_previous'])?$phoen_checkout_enable_settings['phoen_checkout_label_previous']:""); ?>"/></td>
			</tr>
			
		</tbody>
		
		
	</table> 
	<h2><?php _e("Styling",'multi-step-ckeckout-for-woocommerce'); ?></h2>
	<table class="form-table">
	
		<tbody>
		<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_com_bil_ship"><?php _e("Combine Billing & Shipping",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td>
					<input type="checkbox" name="phoen_checkout_com_bil_ship"  id="phoen_checkout_com_bil_ship"  value="1" <?php echo esc_attr((isset($phoen_checkout_enable_settings['phoen_checkout_com_bil_ship']) && $phoen_checkout_enable_settings['phoen_checkout_com_bil_ship'] == '1')?'checked':'');?>  />
					
					<input type="text" name="phoen_checkout_com_bil_ship_label" placeholder="Add Label"  id="phoen_checkout_com_bil_ship_label"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_com_bil_ship_label'])?$phoen_checkout_enable_settings['phoen_checkout_com_bil_ship_label']:""); ?>" />
					<p class="description">Check this option to combine.</p>
				</td>	
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_com_order_payment"><?php _e("Combine Order & Payment",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td>
					<input type="checkbox" name="phoen_checkout_com_order_payment"  id="phoen_checkout_com_order_payment"  value="1" <?php echo esc_attr((isset($phoen_checkout_enable_settings['phoen_checkout_com_order_payment']) && $phoen_checkout_enable_settings['phoen_checkout_com_order_payment'] == '1')?'checked':'');?>  />
					<input type="text" name="phoen_checkout_com_order_payment_label"   placeholder="Add Label"  id="phoen_checkout_com_order_payment_label"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_com_order_payment_label'])?$phoen_checkout_enable_settings['phoen_checkout_com_order_payment_label']:""); ?>" />
					<p class="description">Check this option to combine.</p>
				</td>	
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_margin_top"><?php _e("Margin Top",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="number" name="phoen_checkout_margin_top" min="0"  id="phoen_checkout_margin_top"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_margin_top'])?$phoen_checkout_enable_settings['phoen_checkout_margin_top']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_margin_bottom"><?php _e("Margin Bottom",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="number" name="phoen_checkout_margin_bottom" min="0" id="phoen_checkout_margin_bottom" value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_margin_bottom'])?$phoen_checkout_enable_settings['phoen_checkout_margin_bottom']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_text_transform"><?php _e("Text Transform",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td>
					<select name="phoen_checkout_text_transform">
						<option value="uppercase" <?php echo esc_attr((isset($phoen_checkout_enable_settings['phoen_checkout_text_transform']) && $phoen_checkout_enable_settings['phoen_checkout_text_transform']=="uppercase")?"selected":"");?>>Uppercase</option>
						<option value="lowercase" <?php echo esc_attr((isset($phoen_checkout_enable_settings['phoen_checkout_text_transform']) && $phoen_checkout_enable_settings['phoen_checkout_text_transform']=="lowercase")?"selected":"");?>>Lowercase</option>
						<option value="capitalize" <?php echo esc_attr((isset($phoen_checkout_enable_settings['phoen_checkout_text_transform']) && $phoen_checkout_enable_settings['phoen_checkout_text_transform']=="capitalize")?"selected":"");?>>Capitalize</option>
					</select>
				</td>
			</tr>
			
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_text_color"><?php _e("Text Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_text_color"  id="phoen_checkout_text_color" class="color-picker" value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_text_color'])?$phoen_checkout_enable_settings['phoen_checkout_text_color']:""); ?>"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_text_size"><?php _e("Text Size",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="number" name="phoen_checkout_text_size"  id="phoen_checkout_text_size"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_text_size'])?$phoen_checkout_enable_settings['phoen_checkout_text_size']:""); ?>"  min="15" max="20"/></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_num_background_color"><?php _e("Step Background Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_num_background_color"  id="phoen_checkout_num_background_color" class="color-picker" value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_num_background_color'])?$phoen_checkout_enable_settings['phoen_checkout_num_background_color']:""); ?>"/></td>
			</tr>
			
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_num_border_radius"><?php _e("Step Border Radius",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="number" name="phoen_checkout_num_border_radius"  id="phoen_checkout_num_border_radius"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_num_border_radius'])?$phoen_checkout_enable_settings['phoen_checkout_num_border_radius']:""); ?>" min="0" /></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_num_text_color"><?php _e("Step Text Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_num_text_color"  id="phoen_checkout_num_text_color" class="color-picker"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_num_text_color'])?$phoen_checkout_enable_settings['phoen_checkout_num_text_color']:""); ?>" min="0" /></td>
			
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_divider_color"><?php _e("Divider Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_divider_color"  id="phoen_checkout_divider_color"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_divider_color'])?$phoen_checkout_enable_settings['phoen_checkout_divider_color']:""); ?>" class="color-picker" /></td>
			</tr>
			
		</tbody>
	</table>
	<h2><?php _e("On Active Mode",'multi-step-ckeckout-for-woocommerce'); ?></h2>	
	<table class="form-table">
	
		<tbody>
		<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_acti_text_color"><?php _e("Text Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_acti_text_color"  id="phoen_checkout_acti_text_color"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_acti_text_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_text_color']:""); ?>" class="color-picker" /></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_acti_num_back_color"><?php _e("Step Background Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_acti_num_back_color"  id="phoen_checkout_acti_num_back_color"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_acti_num_back_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_num_back_color']:""); ?>" class="color-picker" /></td>
			</tr>
			
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_acti_num_color"><?php _e("Step Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_acti_num_color"  id="phoen_checkout_acti_num_color"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_acti_num_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_num_color']:""); ?>" class="color-picker" /></td>
			</tr>
			<tr class="phoen-user-user-login-wrap">
				<th><label for="phoen_checkout_acti_border_color"><?php _e("Divider Border Color",'multi-step-ckeckout-for-woocommerce'); ?></label></th>
				<td><input type="text" name="phoen_checkout_acti_border_color"  id="phoen_checkout_acti_border_color"  value="<?php echo esc_attr(isset($phoen_checkout_enable_settings['phoen_checkout_acti_border_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_border_color']:""); ?>" class="color-picker" /></td>
			</tr>
		</tbody>
	</table>	
	<br />
	<input type="submit" value="Save changes" class="button-primary" name="phoen_set_checkout">
	<input type="submit" value="Reset" class="button-primary" name="phoen_set_checkout_reset">
	
</form>
		
<style>

	.form-table th {
	
		width: 270px;
		
		padding: 25px;
		
	}
	
	.form-table td {
	
		padding: 20px 10px;
	}
	
	.form-table {
	
		background-color: #fff;
	}
	
	h3 {
	
		padding: 10px;
		
	}
	
	.pho-upgrade-btn {
		margin-top: 15px;
	}
	
	a:focus {
		box-shadow: none;
	}
	
	.phoe_video_main {
		padding: 20px;
		text-align: center;
	}
	
	.phoe_video_main h3 {
		color: #02c277;
		font-size: 28px;
		font-weight: bolder;
		margin: 20px 0;
		text-transform: capitalize
		display: inline-block;
	}

</style>