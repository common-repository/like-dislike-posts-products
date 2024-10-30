<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
// for display on shop page
$ldppp_enable_likes_plugin = get_option('ldppp_enable_likes_plugin');
if($ldppp_enable_likes_plugin == 'yes'){
	$ldppp_templateAchieveButtonOption = get_option('ldppp_enable_product_achieve_page');
		$ldppp_displayachievebtnOption = get_option('ldppp_after_before_achieve_btn');
	if($ldppp_templateAchieveButtonOption == 'yes'){
		if($ldppp_displayachievebtnOption == 'before_achieve_btn'){
			add_action( 'woocommerce_after_shop_loop_item', 'ldppp_product_rating_display_icons_on_shop',5 );
		}
		if($ldppp_displayachievebtnOption == 'after_achieve_btn') {
			add_action( 'woocommerce_after_shop_loop_item', 'ldppp_product_rating_display_icons_on_shop',11 );
		}
	}
}
function ldppp_product_rating_display_icons_on_shop()
{
	global $wpdb;
	$ldppp_ratings = $wpdb->prefix . "ldppp_ratings";
	global $current_user;
	global $post;
	$ldppp_counterShow='';
	if ( is_user_logged_in() ) 
	{
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;	
	}	
	$ip_address = isset( $_SERVER['SERVER_ADDR'] ) ? sanitize_text_field( $_SERVER['SERVER_ADDR'] ) : '';
	// Validate and sanitize the IP address
	$ip_address = filter_var($ip_address, FILTER_VALIDATE_IP);	
	if ( is_user_logged_in() ) 
	{
		$ldppp_result1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_ratings WHERE user_id = %d AND post_id = %d" , array($user_id, $post->ID)));
		$ldppp_results = $wpdb->num_rows;
		$ldppp_rated_class = 'ldppp_rated_class';
		$ldppp_totalratings = $wpdb->get_var( $wpdb->prepare("SELECT COUNT(ratings) FROM $ldppp_ratings WHERE post_id = %d", $post->ID));
		$ldppp_average_ratings = $wpdb->get_var( $wpdb->prepare("SELECT ROUND(AVG(ratings), 1) FROM $ldppp_ratings WHERE post_id = %d", $post->ID));
		if($ldppp_results)
		{ 
			$ldppp_counterShow .= '<div class="ldppp_rate rate'.esc_attr($post->ID).'">';
			if($ldppp_result1->ratings == '5')
			{
				$ldppp_counterShow .= '<input type="radio" class="ldppp_check_id" id="ldppp_star5'.esc_attr($post->ID).'" name="ldppp_star_rates" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			} 
			else 
			{
				$ldppp_counterShow .= '<input type="radio" class="ldppp_check_id" id="ldppp_star5'.esc_attr($post->ID).'" name="ldppp_star_rates" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '4') 
			{
				$ldppp_counterShow .=  '<input type="radio" class="ldppp_check_id" id="ldppp_star4'.esc_attr($post->ID).'" name="ldppp_star_rates" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .=  '<input type="radio" class="ldppp_check_id" id="ldppp_star4'.esc_attr($post->ID).'" name="ldppp_star_rates" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '3') 
			{
				$ldppp_counterShow .= '<input type="radio" class="ldppp_check_id" id="ldppp_star3'.esc_attr($post->ID).'" name="ldppp_star_rates" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" class="ldppp_check_id" id="ldppp_star3'.esc_attr($post->ID).'" name="ldppp_star_rates" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '2')
			{
				$ldppp_counterShow .= '<input type="radio"  class="ldppp_check_id" id="ldppp_star2'.esc_attr($post->ID).'" name="ldppp_star_rates" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" class="ldppp_check_id" id="ldppp_star2'.esc_attr($post->ID).'" name="ldppp_star_rates" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '1') 
			{
				$ldppp_counterShow .= '<input type="radio" class="ldppp_check_id" id="ldppp_star1'.esc_attr($post->ID).'" name="ldppp_star_rates" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio"  class="ldppp_check_id" id="ldppp_star1'.esc_attr($post->ID).'" name="ldppp_star_rates" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			}
			$ldppp_counterShow .= '</div>';
		}		
		else 
		{
			$ldppp_counterShow .= '<div class="ldppp_rate rate'.esc_attr($post->ID).'">
		    <input type="radio" id="ldppp_star5'.esc_attr($post->ID).'" class="ldppp_check_id" name="ldppp_star_rates" value="5" data-id="'.esc_attr($post->ID).'" />
		    <label for="ldppp_star5'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>
		    <input type="radio" id="ldppp_star4'.esc_attr($post->ID).'" class="ldppp_check_id" name="ldppp_star_rates" value="4" data-id="'.esc_attr($post->ID).'" />
		    <label for="ldppp_star4'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>
		    <input type="radio" id="ldppp_star3'.esc_attr($post->ID).'"  class="ldppp_check_id" name="ldppp_star_rates" value="3" data-id="'.esc_attr($post->ID).'" />
		    <label for="ldppp_star3'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>
		    <input type="radio" id="ldppp_star2'.esc_attr($post->ID).'" class="ldppp_check_id" name="ldppp_star_rates" value="2" data-id="'.esc_attr($post->ID).'" />
		    <label for="ldppp_star2'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>
		    <input type="radio" id="ldppp_star1'.esc_attr($post->ID).'" class="ldppp_check_id" name="ldppp_star_rates" value="1" data-id="'.esc_attr($post->ID).'" />
		    <label for="ldppp_star1'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>
			</div>';
		}
	} 
	// if user not logged in
	else
	{
		$ldppp_result1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_ratings WHERE user_ip_address = %s AND post_id = %d" , array($ip_address,$post->ID)));
		$ldppp_results = $wpdb->num_rows;	
		$ldppp_rated_class = 'ldppp_rated_class';
		$ldppp_totalratings = $wpdb->get_var( $wpdb->prepare("SELECT COUNT(*) FROM $ldppp_ratings WHERE post_id = %d", $post->ID));
		$ldppp_average_ratings = $wpdb->get_var( $wpdb->prepare("SELECT ROUND(AVG(ratings), 1) FROM $ldppp_ratings WHERE post_id = %d", $post->ID));
		if($ldppp_results){ 
			$ldppp_counterShow .= '<div class="ldppp_rate rate'.esc_attr($post->ID).'">';
			if($ldppp_result1->ratings == '5'){
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star5'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			} else {
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star5'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '4') {
				$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			} else {
				$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '3') {
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star3'.esc_attr($post->ID).'" name="ldppp_star_rates"  class="ldppp_check_id" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			} else {
				$counterShow .= '<input type="radio" id="ldppp_star3'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '2'){
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star2'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			} else {
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star2'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '1') {
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star1'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1'.esc_attr($post->ID).'" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			} else {
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star1'.esc_attr($post->ID).'" name="ldppp_star_rates" class="ldppp_check_id" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			}
			$ldppp_counterShow .= '</div>';
		} else {
			$ldppp_counterShow .= '<div class="ldppp_rate rate'.esc_attr($post->ID).'">
			    <input type="radio" class="ldppp_check_id" id="ldppp_star5'.esc_attr($post->ID).'" name="ldppp_star_rates" value="5" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star5'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" class="ldppp_check_id" id="ldppp_star4'.esc_attr($post->ID).'" name="ldppp_star_rates" value="4" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star4'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" class="ldppp_check_id" id="ldppp_star3'.esc_attr($post->ID).'" name="ldppp_star_rates" value="3" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star3'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" class="ldppp_check_id" id="ldppp_star2'.esc_attr($post->ID).'" name="ldppp_star_rates" value="2" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star2'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" class="ldppp_check_id" id="ldppp_star1'.esc_attr($post->ID).'" name="ldppp_star_rates" value="1" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star1'.esc_attr($post->ID).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>
			</div>';
		}
	}
	if ($ldppp_totalratings > 0) {
	    $ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings' . esc_attr($post->ID) . '">' . esc_html__('Total Ratings:', 'like-dislike-posts-products') . ' ' . esc_html($ldppp_totalratings) . '</div>';
	} else {
	    $ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings' . esc_attr($post->ID) . '">' . esc_html__('No ratings available.', 'like-dislike-posts-products') . '</div>';
	}
	if ($ldppp_average_ratings >= 1.0) {
	    $ldppp_counterShow .= '<div class="ldppp_avgrating" id="ldppp_avgratings' . esc_attr($post->ID) . '">' . esc_html__('Average Ratings:', 'like-dislike-posts-products') . esc_html($ldppp_average_ratings) . esc_html__('/5','like-dislike-posts-products') . '</div>';
	} else {
	    $ldppp_counterShow .= '<div class="ldppp_avgratings" id="ldppp_avgratings' . esc_attr($post->ID) . '">' . esc_html($ldppp_average_ratings) . '</div>';
	}
	$ldppp_allowed_html = array(
        'input' => array(
            'type'  => array(),
            'id'    => array(), 
            'name'  => array(),
            'value' => array(),
            'data-id'=> array(),
            'class' => array(),
        ),
        'label' => array(
            'for'   => array(),
            'class' => array(),
        ),
        'span' => array(
            'class' => array(),
        ),
        'div' => array(
            'class' => array(),
            'id' => array(),
        ),
    );
	echo wp_kses($ldppp_counterShow ,$ldppp_allowed_html );
}