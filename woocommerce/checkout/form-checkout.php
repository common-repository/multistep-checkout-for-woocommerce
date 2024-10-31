<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

?>
	<ul class="pmsc_tabs phoen_multi_checkout_list	">

	<?php 
	
		if(!is_user_logged_in()):$pmsc_no_login = "class='selected'";$pmsc_select_div = "class='selected'";
			else:$pmsc_login = "none";
			$pmsc_select_div = "class='selected'";
			$pmsc_select_div_login = "class='selected'";
		endif;
		
			$phoen_checkout_enable = get_option("phoen_checkout_enable");
			$combine_biling_shipping_enable =!empty($phoen_checkout_enable['phoen_checkout_com_bil_ship'])?$phoen_checkout_enable['phoen_checkout_com_bil_ship']:"";
			$phoen_checkout_com_bil_ship_label =!empty($phoen_checkout_enable['phoen_checkout_com_bil_ship_label'])?$phoen_checkout_enable['phoen_checkout_com_bil_ship_label']:"";
			$phoen_checkout_com_order_payment =!empty($phoen_checkout_enable['phoen_checkout_com_order_payment'])?$phoen_checkout_enable['phoen_checkout_com_order_payment']:"";
			$phoen_checkout_com_order_payment_label =!empty($phoen_checkout_enable['phoen_checkout_com_order_payment_label'])?$phoen_checkout_enable['phoen_checkout_com_order_payment_label']:"";
		
		?>
		<li <?php echo (isset($pmsc_select_div) && !empty($pmsc_select_div))?$pmsc_select_div:'';?> data-step="0"><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_login'])?$phoen_checkout_enable['phoen_checkout_label_login']:'Login', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
		
		<?php 
			if($combine_biling_shipping_enable==1 && $phoen_checkout_com_order_payment!=1){
				?>
				<li  data-step='1' <?php echo (isset($pmsc_select_div_login) && !empty($pmsc_select_div_login))?$pmsc_select_div_login:'';?>><?php _e($phoen_checkout_com_bil_ship_label , 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<li  data-step='2'><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_order'])?$phoen_checkout_enable['phoen_checkout_label_order']:'Order Info', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<li  data-step='3'><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_payment'])?$phoen_checkout_enable['phoen_checkout_label_payment']:'Payment Info', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<?
			}
			
			if($combine_biling_shipping_enable!=1 && $phoen_checkout_com_order_payment==1){
				?>
				<li  data-step='1' <?php echo (isset($pmsc_select_div_login) && !empty($pmsc_select_div_login))?$pmsc_select_div_login:'';?>><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_billing'])?$phoen_checkout_enable['phoen_checkout_label_billing']:'Billing', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<li  data-step='2'><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_shipping'])?$phoen_checkout_enable['phoen_checkout_label_shipping']:'Shipping', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<li  data-step='3'><?php _e( $phoen_checkout_com_order_payment_label, 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<?
			}
			
			if($combine_biling_shipping_enable==1 && $phoen_checkout_com_order_payment==1){
				?>
				<li  data-step='1' <?php echo (isset($pmsc_select_div_login) && !empty($pmsc_select_div_login))?$pmsc_select_div_login:'';?>><?php _e($phoen_checkout_com_bil_ship_label , 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<li  data-step='2'><?php _e( $phoen_checkout_com_order_payment_label, 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<?
			}
			
			if($combine_biling_shipping_enable!=1 && $phoen_checkout_com_order_payment!=1){
				?>
					<li  data-step='1' <?php echo (isset($pmsc_select_div_login) && !empty($pmsc_select_div_login))?$pmsc_select_div_login:'';?>><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_billing'])?$phoen_checkout_enable['phoen_checkout_label_billing']:'Billing', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
					<li  data-step='2'><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_shipping'])?$phoen_checkout_enable['phoen_checkout_label_shipping']:'Shipping', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
					<li  data-step='3'><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_order'])?$phoen_checkout_enable['phoen_checkout_label_order']:'Order Info', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
					<li  data-step='4'><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_payment'])?$phoen_checkout_enable['phoen_checkout_label_payment']:'Payment Info', 'multi-step-ckeckout-for-woocommerce' ); ?></li>
				<?php
			}
		?>

	</ul>
	
	<div class="login_form" id="pmsc_0">
			
		<?php 
			
			do_action('phoen_before_checkout_login_form');
		?>
	
	</div>
	
	<?php
	
		if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
			echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
			return;
		}
		
		?>
			
		<div class="pmsc_coupan_form" style="display:none;"> 
			
			<?php do_action('phoen_before_checkout_coupan_form');?>
		
		</div>
		

		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
		<?php
		
			//when both option are not enable
			
				if($combine_biling_shipping_enable!=1 && $phoen_checkout_com_order_payment!=1){
					if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
				
					<div class="col-1_billing ui-tabs-panel" id='pmsc_1' style="display:none">
			
						<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
				   
					</div>

					<div class="col-2_shipping ui-tabs-panel ui-tabs-hide" id="pmsc_2" style="display:none">
					
						<?php
					   
							do_action( 'woocommerce_before_checkout_shipping_form' );
							do_action( 'woocommerce_checkout_shipping' );
							do_action( 'woocommerce_checkout_after_customer_details' );
						   
					   ?>
				   </div>

				<?php endif; ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			   <div id="pmsc_3" class="woocommerce-checkout-review-order" style="display:none">
				   
				   <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
				   
				   <div class="coupan_form">
						
						<?php do_action( 'phoen_checkout_order_review' ); ?>

					</div>
					
					
					
					<input type="checkbox" name="payment_method" value="" data-order_button_text="" style="display: none;" />
				</div>
				
				<div class="ui-tabs-panel ui-tabs-hide " id="pmsc_4" style="display:none">
					
					<h3 id="phoen_order_review_heading"><?php _e( 'Payment Info', 'woocommerce' ); ?></h3>
					
					<?php do_action( 'phoen_checkout_order_payment' ); ?>
					
					
				</div>
	<?php }
	
	
	// when both option are enable
	
		if($combine_biling_shipping_enable==1 && $phoen_checkout_com_order_payment==1){
		
				if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
				
					<div class="col-1_billing ui-tabs-panel" id='pmsc_1' style="display:none">
			
						<?php 
							do_action( 'woocommerce_checkout_before_customer_details' ); 
							do_action( 'woocommerce_checkout_billing' ); 
							do_action( 'woocommerce_before_checkout_shipping_form' );
							do_action( 'woocommerce_checkout_shipping' );
							do_action( 'woocommerce_checkout_after_customer_details' );
						?>
				   
					</div>

				<?php endif; ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			   <div id="pmsc_2" class="woocommerce-checkout-review-order" style="display:none">
				   
				   <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
				   
				   <div class="coupan_form">
						
						<?php do_action( 'phoen_checkout_order_review' ); ?>
						<?php do_action( 'phoen_checkout_order_payment' ); ?>
					</div>
					
					
					
					<input type="checkbox" name="payment_method" value="" data-order_button_text="" style="display: none;" />
				</div>
			<?php
		}
		
		if($combine_biling_shipping_enable!=1 && $phoen_checkout_com_order_payment==1){
			
				if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
				
					<div class="col-1_billing ui-tabs-panel" id='pmsc_1' style="display:none">
			
						<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
				   
					</div>

					<div class="col-2_shipping ui-tabs-panel ui-tabs-hide" id="pmsc_2" style="display:none">
					
						<?php
					   
							do_action( 'woocommerce_before_checkout_shipping_form' );
							do_action( 'woocommerce_checkout_shipping' );
							do_action( 'woocommerce_checkout_after_customer_details' );
						   
					   ?>
				   </div>

				<?php endif; ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			   <div id="pmsc_3" class="woocommerce-checkout-review-order" style="display:none">
				   
				   <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
				   
				   <div class="coupan_form">
						
						<?php 
							do_action( 'phoen_checkout_order_review' ); 
							do_action( 'phoen_checkout_order_payment' );
						?>

					</div>
					
					
					
					<input type="checkbox" name="payment_method" value="" data-order_button_text="" style="display: none;" />
				</div>
				<?
		}
		if($combine_biling_shipping_enable==1 && $phoen_checkout_com_order_payment!=1){
			if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
				
					<div class="col-1_billing ui-tabs-panel" id='pmsc_1' style="display:none">
			
						<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
						<?php
							do_action( 'woocommerce_checkout_billing' ); 
							do_action( 'woocommerce_before_checkout_shipping_form' );
							do_action( 'woocommerce_checkout_shipping' );
							do_action( 'woocommerce_checkout_after_customer_details' );
						?>
				   
					</div>

				<?php endif; ?>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

			   <div id="pmsc_2" class="woocommerce-checkout-review-order" style="display:none">
				   
				   <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
				   
				   <div class="coupan_form">
						
						<?php do_action( 'phoen_checkout_order_review' ); ?>

					</div>
					
					
					
					<input type="checkbox" name="payment_method" value="" data-order_button_text="" style="display: none;" />
				</div>
				
				<div class="ui-tabs-panel ui-tabs-hide " id="pmsc_3" style="display:none">
					
					<h3 id="phoen_order_review_heading"><?php _e( 'Payment Info', 'woocommerce' ); ?></h3>
					
					<?php do_action( 'phoen_checkout_order_payment' ); ?>
					
					
				</div>
				<?php
		}
		
				 do_action( 'woocommerce_checkout_after_order_review' ); ?>
			
			
		</form>
		
		<div style="text-align: right; display: inline-block; float: right;">
			<button name="prev" style="display:none" class="phoen_checkout_button_prev"><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_previous'])?$phoen_checkout_enable['phoen_checkout_label_previous']:'Previous', 'multi-step-ckeckout-for-woocommerce' ); ?></button>
			<button name="next" class="phoen_checkout_butt_next"><?php _e( !empty($phoen_checkout_enable['phoen_checkout_label_next'])?$phoen_checkout_enable['phoen_checkout_label_next']:'Continue', 'multi-step-ckeckout-for-woocommerce' ); ?></button>
		</div >
		<div style="text-align: left; display: inline-block;">
			<button data-href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" id="phoen-back-to-cart" class="button alt" type="button">Back to cart</button>
		</div>
		<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<style>	
	
	.selected{
		color:red;
	}

</style>
<script>
jQuery("#phoen-back-to-cart").click(function(){
	
	var send_location=jQuery(this).attr("data-href");
	
	window.location.href = send_location;
	
});
</script>