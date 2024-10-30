<?php  
if ( ! defined( 'ABSPATH' ) ) { exit; }
// for display on sinlge page
//$enable_product_page = get_option('enable_product_page');
$ldppp_enable_likes_plugin = get_option('ldppp_enable_likes_plugin');
if($ldppp_enable_likes_plugin == 'yes'){
	$ldppp_templateButtonOption = get_option('ldppp_enable_product_page');
	$ldppp_displaybtnOption = get_option('ldppp_after_before_btn');
	if($ldppp_templateButtonOption == 'yes'){
		if($ldppp_displaybtnOption == 'before_btn'){
			add_action('woocommerce_before_add_to_cart_form','ldppp_product_review_display_icons');
		}
		if($ldppp_displaybtnOption == 'after_btn'){
			add_action('woocommerce_after_add_to_cart_form','ldppp_product_review_display_icons');
		}
	}
}
function ldppp_product_review_display_icons()
{
	global $wpdb;
	$ldppp_ratings = $wpdb->prefix . "ldppp_ratings";
	global $current_user;
	global $post;
	$ldppp_counterShow = '';

	if ( is_user_logged_in() ) 
	{
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;	
	}
	$ip_address = isset( $_SERVER['SERVER_ADDR'] ) ? sanitize_text_field( $_SERVER['SERVER_ADDR'] ) : '';
	if ( is_user_logged_in() ) 
	{
		$ldppp_result1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_ratings WHERE user_id = %d AND post_id = %d" , array($user_id,$post->ID)));
		$ldppp_results = $wpdb->num_rows;
		$ldppp_rated_class = 'ldppp_rated_class';
		$ldppp_totalratings = $wpdb->get_var( $wpdb->prepare("SELECT COUNT(*) FROM $ldppp_ratings WHERE post_id = %d", $post->ID ));
		$ldppp_average_ratings = $wpdb->get_var( $wpdb->prepare( "SELECT ROUND(AVG(ratings), 1) FROM $ldppp_ratings WHERE post_id = %d",$post->ID));

		if($ldppp_results)
		{ 
			$ldppp_counterShow .= '<div class="ldppp_rate">';
			if($ldppp_result1->ratings == '5')
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			} 
			else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '4') 
			{
				$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '3') 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '2')
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '1') 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			}
			$ldppp_counterShow .= '</div>';			
		} else {
			$ldppp_counterShow .= '<div class="ldppp_rate">
			    <input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star5" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star4" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star3" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star2" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star1" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>
			</div>';		
		}
	} 
	// if user not logged in
	else
	{
		$ldppp_result1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_ratings WHERE user_ip_address = %s AND post_id = %d" , array($ip_address, $post->ID)));
	 	$ldppp_results = $wpdb->num_rows;		
		$ldppp_rated_class = 'ldppp_rated_class';
		$ldppp_totalratings = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_ratings WHERE post_id = %d", $post->ID));
		$ldppp_average_ratings = $wpdb->get_var( $wpdb->prepare("SELECT ROUND(AVG(ratings), 1) FROM $ldppp_ratings WHERE post_id = %d", $post->ID));
		if($ldppp_results)
		{ 
			$ldppp_counterShow .= '<div class="ldppp_rate">';	
			if($ldppp_result1->ratings == '5')
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star5" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '4') 
			{
				$counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star4" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '3') 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star3" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '2')
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star2" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>';
			}
			if($ldppp_result1->ratings == '1') 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1" class="'.esc_attr($ldppp_rated_class).'" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			} else 
			{
				$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.esc_attr($post->ID).'" /><label for="ldppp_star1" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>';
			}
			$ldppp_counterShow .= '</div>';			
		} else {
			$ldppp_counterShow .= '<div class="ldppp_rate">
			    <input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star5" title="text"><span>'. esc_html__('5 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star4" title="text"><span>'. esc_html__('4 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star3" title="text"><span>'. esc_html__('3 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star2" title="text"><span>'. esc_html__('2 stars', 'like-dislike-posts-products') .'</span></label>
			    <input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.esc_attr($post->ID).'" />
			    <label for="ldppp_star1" title="text"><span>'. esc_html__('1 star', 'like-dislike-posts-products') .'</span></label>
			</div>';
		}
	}
	if($ldppp_totalratings > 0) {
		$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">' . esc_html__('Total Ratings:', 'like-dislike-posts-products') . ' ' . esc_html($ldppp_totalratings) . '</div>';
	}  else {
		$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings' . esc_attr($post->ID) . '">' . esc_html__('No ratings available.', 'like-dislike-posts-products') . '</div>';
	}
	if($ldppp_average_ratings >= 1.0){
		$ldppp_counterShow .= '<div class="ldppp_avgrating" id="ldppp_avgratings">' . esc_html__('Average Ratings:', 'like-dislike-posts-products') . esc_html($ldppp_average_ratings) . esc_html__('/5','like-dislike-posts-products') . '</div>';
	} else {
		$ldppp_counterShow .= '<div class="ldppp_avgratings" id="ldppp_avgratings">' . esc_html($ldppp_average_ratings) . '</div>';
	}
	$ldppp_allowed_html = array(
        'input' => array(
            'type'  => array(),
            'id'    => array(), 
            'name'  => array(),
            'value' => array(),
            'data-id' => array(),
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