<?php
/*
** Plugin Name: Multi Step Checkout For Woocommerce
** Plugin URI: https://www.phoeniixx.com/product/multistep-checkout-for-woocommerce/
** Version:2.9
** Author: phoeniixx
** Text Domain: multi-step-ckeckout-for-woocommerce
** Author URI: http://www.phoeniixx.com/
** Description: What does your plugin do and what features does it offer...
** WC requires at least: 2.6.0
** WC tested up to: 3.9.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
	{
		
		include(dirname(__FILE__).'/libs/execute-libs.php');
		
		add_action('wp_head','phoen_frontend_assestss');
		
		add_action("admin_enqueue_scripts","phoen_multi_check_admin_scripts");
		
		function phoen_multi_check_admin_scripts(){
			$current_page = get_current_screen()->base;
			if($current_page== "toplevel_page_muli_step_checkout"){
			
				wp_enqueue_script( 'wp-color-picker');
				wp_enqueue_style( 'wp-color-picker');
				
			}
			
			wp_enqueue_script( 'phoen-mutli-custom-script-handle', plugin_dir_url(__FILE__ )."assets/js/phoen_multi_admin.js", array(), false, true );
		}
		
		function phoen_frontend_assestss(){
				
			wp_enqueue_script( 'phoen-multi-checkout-script-name', plugin_dir_url(__FILE__)."/assets/js/phoen_multi_checkout.js" , array( 'jquery' ),true );
			
			if(is_user_logged_in()):?>
				<script>
					var pmsc_user_login = 'user_login';
				
				</script>
			<?php else: ?>		
				<script>
					
					var pmsc_user_login = '';
				
				</script>
			<?php endif;
				$phoen_checkout_enable_settings =get_option('phoen_checkout_enable');
			?>
				<style >
					.woocommerce .pmsc_tabs.phoen_multi_checkout_list {
						list-style: outside none none;
						margin: 0;
						padding: 0;
						text-align: center;
					}
					
					.woocommerce ul.pmsc_tabs li {
						    display: inline-block;
						    list-style: outside none none;
						    padding: 0;
							position: relative;
							text-align: center;
							margin: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_margin_top'])?$phoen_checkout_enable_settings['phoen_checkout_margin_top']:"0"?> 0 <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_margin_bottom'])?$phoen_checkout_enable_settings['phoen_checkout_margin_bottom']:"20"?>px;
							color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_text_color'])?$phoen_checkout_enable_settings['phoen_checkout_text_color']:"#464646"?>;
							font-size: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_text_size'])?$phoen_checkout_enable_settings['phoen_checkout_text_size']:"15"?>px;
							text-transform: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_text_transform'])?$phoen_checkout_enable_settings['phoen_checkout_text_transform']:"uppercase"?>;
							width: 19%;
							vertical-align: top;
					}
					
					.woocommerce ul.pmsc_tabs li::before {
							background-color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_divider_color'])?$phoen_checkout_enable_settings['phoen_checkout_divider_color']:"#c1c1c1"?>;
							content: "";
							height: 4px;
							right: 50%;
							position: absolute;
							top: -18px;
							width: 100%;
							z-index: 1;
						}
					
					.woocommerce ul.pmsc_tabs li:first-child:before {
						display: none;
					}
					
					.woocommerce ul.pmsc_tabs li::after {
						background-color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_num_background_color'])?$phoen_checkout_enable_settings['phoen_checkout_num_background_color']:"#c1c1c1"?>;
						border-radius: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_num_border_radius'])?$phoen_checkout_enable_settings['phoen_checkout_num_border_radius']:"4"?>px;
						color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_num_text_color'])?$phoen_checkout_enable_settings['phoen_checkout_num_text_color']:"#4c4c4c"?>;
						content: "";
						height: 33px;
						left: 50%;
						line-height: 33px;
						margin-left: -20px;
						position: absolute;	
						top: -33px;
						width: 33px;
						font-size: 16px;
						z-index: 9;
					}
					
					.woocommerce ul.pmsc_tabs li:first-child:after {
						content: "1";
					}
					
					.woocommerce ul.pmsc_tabs li:nth-child(2):after {
						content: "2";
					}
					.woocommerce ul.pmsc_tabs li:nth-child(3):after {
						content: "3";
					}
					.woocommerce ul.pmsc_tabs li:nth-child(4):after {
						content: "4";
					}
					.woocommerce ul.pmsc_tabs li:nth-child(5):after {
						content: "5";
					}

					.woocommerce ul.pmsc_tabs li.selected {
					    color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_acti_text_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_text_color']:"#307ebc"?>;
					}
					
					.woocommerce ul.pmsc_tabs li.selected::before {
						background-color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_acti_border_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_border_color']:"#307ebc"?>;
					}
					
					.woocommerce ul.pmsc_tabs li.selected::after {
						background-color:  <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_acti_num_back_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_num_back_color']:"#307ebc"?>;
						color: <?php  echo isset($phoen_checkout_enable_settings['phoen_checkout_acti_num_color'])?$phoen_checkout_enable_settings['phoen_checkout_acti_num_color']:"#fff"?>;
					}
					
					a:focus {
						box-shadow: none;
					}
					
					@media only screen and (max-width: 800px) {
						.woocommerce ul.pmsc_tabs li {
							width: 140px;
						}
					}
					
					@media only screen and (max-width: 768px) {
						.woocommerce ul.pmsc_tabs li {
							width: 110px;
							padding: 0;
						}
						.woocommerce ul.pmsc_tabs li::before {
							width: 110px;
							right: 55px;
						}
					}
					
					@media only screen and (max-width: 600px) {
						.woocommerce ul.pmsc_tabs li {
							width: 100px;
							padding: 0;
						}
						
						.woocommerce ul.pmsc_tabs li::before {
							opacity: 0;
						}
						
						.woocommerce ul.pmsc_tabs li:first-child {
							margin-bottom: 40px;
						}
						
					}
					
					@media only screen and (max-width: 480px) {
						.woocommerce ul.pmsc_tabs li {
							width: auto;
							padding: 0 5px;
						}
						
						
					}
					
					

				</style>
			<?php
			
		}
		
		function pmsc_activate() {

			$phoen_checkout_enable_settings = get_option('phoen_checkout_enable');
			
			if(!empty($phoen_checkout_enable_settings)){
				
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
		
		register_activation_hook( __FILE__, 'pmsc_activate' );
			
		$phoen_checkout_enable_settings = get_option('phoen_checkout_enable');
		
		if(isset($phoen_checkout_enable_settings['phoen_enable']) && $phoen_checkout_enable_settings['phoen_enable'] == 1)
		{
			! defined( 'PHOEN_CUSTOM_CHECKOUT_TEMPLATE_PATH' )   && define( 'PHOEN_CUSTOM_CHECKOUT_TEMPLATE_PATH', plugin_dir_path( __FILE__ ) . 'woocommerce/' );
 
			add_filter( 'woocommerce_locate_template', 'phoen_custom_checkout_template', 10, 3 ); 
		
		}
 
		function phoen_custom_checkout_template( $template, $template_name, $template_path ){
	
			if('checkout/form-checkout.php' == $template_name ){
				
				$template = PHOEN_CUSTOM_CHECKOUT_TEMPLATE_PATH . 'checkout/form-checkout.php';
			
			}
			
			return $template;
		}
			
			

		remove_action('woocommerce_before_checkout_form','woocommerce_checkout_login_form',10);
		remove_action('woocommerce_before_checkout_form','woocommerce_checkout_coupon_form',10);
		
		remove_action('woocommerce_checkout_order_review','woocommerce_order_review',10);
		remove_action('woocommerce_checkout_order_review','woocommerce_checkout_payment',20);
		
		add_action('phoen_before_checkout_login_form','woocommerce_checkout_login_form',10);
		add_action('phoen_before_checkout_coupan_form','woocommerce_checkout_coupon_form',10);
		
		add_action( 'phoen_checkout_order_review', 'woocommerce_order_review', 10 );
		add_action( 'phoen_checkout_order_payment', 'woocommerce_checkout_payment', 20 );
		
		add_action('admin_menu', 'phoe_multistep_checkout_menu');
		
		function phoe_multistep_checkout_menu() {
		   
			add_menu_page('muli_step_checkout', __('Multi-step Checkout','multi-step-ckeckout-for-woocommerce') ,'manage_options','muli_step_checkout','phoe_multi_step_checkout', plugin_dir_url( __FILE__ ).'assets/images/aa2.png',57);
		   
		}
		
		function phoe_multi_step_checkout(){
		?>
			<div id="profile-page" class="wrap">
    
				<?php
					
				if(isset($_GET['tab']))
						
				{
					$tab = sanitize_text_field( $_GET['tab'] );
					
				}
				
				else
					
				{
					
					$tab="";
					
				}
				 $tab = (isset($_GET['tab']))?$_GET['tab']:'';?>
				
				<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
				
					<a class="nav-tab <?php if($tab == 'phoe_checkout_setting' || $tab == ''){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=muli_step_checkout&amp;tab=phoe_checkout_setting"><?php _e('Setting','multi-step-ckeckout-for-woocommerce'); ?></a>
					
					<a class="nav-tab <?php if($tab == 'premium_setting' ){ echo esc_html( "nav-tab-active" ); } ?>" href="?page=muli_step_checkout&amp;tab=premium_setting"><?php _e('Premium','multi-step-ckeckout-for-woocommerce'); ?></a>
					
					
				</h2>
				
			</div>
        
			<?php
			
			if($tab=='phoe_checkout_setting'|| $tab == '' )
			{
				
			  include_once(plugin_dir_path(__FILE__).'includes/phoen_checkout_settings.php');
										
			}
			
			if($tab=='premium_setting' )
			{
				
			   include_once(plugin_dir_path(__FILE__).'includes/phoen_premium_settings.php');
									 
			}
			
		}
	
	}else{
		
		_e("Woocommerce Plugin Not Activated",'multi-step-ckeckout-for-woocommerce'); 
		
	}

?>
