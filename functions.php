<?php 
if ( ! defined( 'ABSPATH' ) ) { exit; }
// Function to display admin options for the plugin
function ldppp_admin_view(){
	$ldppp_templateOption = get_option('ldppp_display_in_template');
	$ldppp_displayOption = get_option('ldppp_after_before_content');
	$ldppp_loginOption = get_option('ldppp_only_logged_in_users');
	$ldppp_enable_likes_plugin = get_option('ldppp_enable_likes_plugin');
	$ldppp_hide_likes = get_option('ldppp_hide_likes');
	$ldppp_hide_dislikes = get_option('ldppp_hide_dislikes');	
	$ldppp_enable_product_page = get_option('ldppp_enable_product_page');	
	$ldppp_enable_achieve_product_page = get_option('ldppp_enable_achieve_product_page');

	$ldppp_templateButtonOption = get_option('ldppp_enable_product_page');
	$ldppp_displaybtnOption = get_option('ldppp_after_before_btn');

	$ldppp_templateAchieveButtonOption = get_option('ldppp_enable_product_achieve_page');
	$ldppp_displayachievebtnOption = get_option('ldppp_after_before_achieve_btn');
	?>
	<h2>Posts-Products Like/Dislike Settings</h2>
	<form method="post" action="options.php">
    <?php settings_fields( 'ldppp-like-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'ldppp-like-plugin-settings-group' ); ?>
    <table class="form-table">
    	 <tr valign="top">
			<th scope="row">Enable Plugin?</th>
			<td>
			    <input type="checkbox" id="ldppp_enable_likes_plugin" name="ldppp_enable_likes_plugin" value="yes" <?php echo checked('yes', $ldppp_enable_likes_plugin, false); ?> /> 
			    <label for="ldppp_enable_likes_plugin">Enable Plugin</label>				
			</td>
        </tr>
        <tr valign="top">
			<th scope="row">Display in single pages?</th>
			<td>
			    <label for="ldppp_item1"><?php echo esc_html('Yes'); ?>
			        <input type="radio" name="ldppp_display_in_template" id="ldppp_item1" value="yes" <?php checked($ldppp_templateOption, 'yes'); ?> />
			    </label>

			    <label for="ldppp_item2"><?php echo esc_html('No'); ?>
			        <input type="radio" name="ldppp_display_in_template" id="ldppp_item2" value="no" <?php checked($ldppp_templateOption, 'no'); ?> />
			    </label>
			</td>
        </tr>
  		<tr valign="top" id="ldppp_content_position">
		    <th scope="row">Display position</th>
		    <td>
		        <label for="ldppp_before_content">Before Content
		            <input type="radio" id="ldppp_before_content" name="ldppp_after_before_content" value="before" <?php checked($ldppp_displayOption, 'before'); ?> />
		        </label>
		        
		        <label for="ldppp_after_content">After Content
		            <input type="radio" id="ldppp_after_content" name="ldppp_after_before_content" value="after" <?php checked($ldppp_displayOption, 'after'); ?> />
		        </label>
		    </td>
		</tr>
  		<tr valign="top">
		    <th scope="row">Only work if user is logged in?</th>
		    <td>
		        <label for="ldppp_logged_in_yes">Yes
		            <input type="radio" id="ldppp_logged_in_yes" name="ldppp_only_logged_in_users" value="yes" <?php checked($ldppp_loginOption, 'yes'); ?> />
		        </label>
		        
		        <label for="ldppp_logged_in_no">No
		            <input type="radio" id="ldppp_logged_in_no" name="ldppp_only_logged_in_users" value="no" <?php checked($ldppp_loginOption, 'no'); ?> />
		        </label>
		    </td>
		</tr>
		<tr valign="top">
		    <th scope="row">Hide Likes</th>
		    <td>
		        <input type="checkbox" id="ldppp_hide_likes" name="ldppp_hide_likes" value="yes" <?php checked($ldppp_hide_likes, 'yes'); ?> />
		        <label for="ldppp_hide_likes">Hide Likes</label>
		    </td>
		</tr>
        <tr valign="top">
		    <th scope="row">Hide Dislikes</th>
		    <td>
		        <input type="checkbox" id="ldppp_hide_dislikes" name="ldppp_hide_dislikes" value="yes" <?php checked($ldppp_hide_dislikes, 'yes'); ?> />
		        <label for="ldppp_hide_dislikes">Hide Dislikes</label>
		    </td>
		</tr>
       	<tr valign="top">
		    <th scope="row">Display in single product page?</th>
		    <td>
		        <label for="ldppp_item3">Yes
		            <input type="radio" name="ldppp_enable_product_page" id="ldppp_item3" value="yes" <?php checked($ldppp_templateButtonOption, 'yes'); ?> />
		        </label>		        
		        <label for="ldppp_item4">No
		            <input type="radio" name="ldppp_enable_product_page" id="ldppp_item4" value="no" <?php checked($ldppp_templateButtonOption, 'no'); ?> />
		        </label>
		    </td>
		</tr>
       	<tr valign="top" id="ldppp_btn_content_position">
		    <th scope="row">Display Button position</th>
		    <td>
		        <label for="ldppp_before_btn">Before Button
		            <input type="radio" name="ldppp_after_before_btn" id="ldppp_before_btn" value="before_btn" <?php checked($ldppp_displaybtnOption, 'before_btn'); ?> />
		        </label>
		        
		        <label for="ldppp_after_btn">After Button
		            <input type="radio" name="ldppp_after_before_btn" id="ldppp_after_btn" value="after_btn" <?php checked($ldppp_displaybtnOption, 'after_btn'); ?> />
		        </label>
		    </td>
		</tr>
        <tr valign="top">
		    <th scope="row">Display in product Achieve page?</th>
		    <td>
		        <label for="ldppp_item5">Yes
		            <input type="radio" name="ldppp_enable_product_achieve_page" id="ldppp_item5" value="yes" <?php checked($ldppp_templateAchieveButtonOption, 'yes'); ?> />
		        </label>
		        
		        <label for="ldppp_item6">No
		            <input type="radio" name="ldppp_enable_product_achieve_page" id="ldppp_item6" value="no" <?php checked($ldppp_templateAchieveButtonOption, 'no'); ?> />
		        </label>
		    </td>
		</tr>
        <tr valign="top" id="ldppp_btn_achieve_content_position">
    		<th scope="row">Display Button position</th>
		    <td>
		        <label for="ldppp_before_achieve_btn">Before Button
		            <input type="radio" name="ldppp_after_before_achieve_btn" id="ldppp_before_achieve_btn" value="before_achieve_btn" <?php checked($ldppp_displayachievebtnOption, 'before_achieve_btn'); ?> />
		        </label>
		        
		        <label for="ldppp_after_achieve_btn">After Button
		            <input type="radio" name="ldppp_after_before_achieve_btn" id="ldppp_after_achieve_btn" value="after_achieve_btn" <?php checked($ldppp_displayachievebtnOption, 'after_achieve_btn'); ?> />
		        </label>
		    </td>
		</tr>	
    </table>    
    <?php submit_button(); ?>
	</form>
	<?php
}

// Add Like/Dislike buttons to post content according to admin options choosed
function ldppp_show_buttons($content){

	if ( ! is_single() ) { return $content; }
	global $wpdb;
	$ldppp_table_name = $wpdb->prefix . "ldppp_likes_dislikes";

	$ldppp_ratings = $wpdb->prefix . "ldppp_ratings";
	global $current_user;
	global $post;
	$ldppp_templateOption = get_option('ldppp_display_in_template');
	$ldppp_displayOption = get_option('ldppp_after_before_content');

	if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;	
	}	
	$ip_address = isset( $_SERVER['SERVER_ADDR'] ) ? sanitize_text_field( $_SERVER['SERVER_ADDR'] ) : '';
	$ldppp_enable_likes_plugin = get_option('ldppp_enable_likes_plugin');
	$ldppp_hide_likes = get_option('ldppp_hide_likes');
	$ldppp_hide_dislikes = get_option('ldppp_hide_dislikes');	

	if($ldppp_enable_likes_plugin == 'yes') {

		if(is_user_logged_in()){ 
			if(!$ldppp_hide_likes){
				$ldppp_likeCount = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = 1 AND post_id = %d", $post->ID ));
			}
			if(!$ldppp_hide_dislikes) {
				$ldppp_dislikeCount = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = '1' AND post_id = %d", $post->ID ));
			}
			
			$ldppp_haslike = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = '1' AND post_id = %d AND user_id = %d", $post->ID, $user_id ));

			$ldppp_hasdislike = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = '1' AND post_id = %d AND user_id = %d", $post->ID, $user_id ));
			
			$ldppp_counterShow = '<div class="ldppp_like-dislike">';

			if($ldppp_haslike) {
				$ldppp_counterShow .= '<a href="#" data-option="like" data-id="'.$post->ID.'" id="ldppp_AjaxLike"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;'.$ldppp_likeCount.'</a>';
			}else {
				$ldppp_counterShow .= '<a href="#" data-option="like" data-id="'.$post->ID.'" id="ldppp_AjaxLike"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;'.$ldppp_likeCount.'</a>';
			}

			if($ldppp_hasdislike){
				$ldppp_counterShow .= '<a href="#"  data-option="dislike" data-id="'.$post->ID.'" id="ldppp_AjaxDislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp;'.$ldppp_dislikeCount.'</a>';
			}else {
				$ldppp_counterShow .= '<a href="#"  data-option="dislike" data-id="'.$post->ID.'" id="ldppp_AjaxDislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;'.$ldppp_dislikeCount.'</a>';
			}
			
			$ldppp_counterShow .= '<span id="ldppp_likesErrorMsg"></span>';

			$ldppp_counterShow .= '<span id="ldppp_errorMsg"></span>';

			$ldppp_counterShow .= '</div>';
			
			$ldppp_result1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_ratings WHERE user_id = %d AND post_id = %d" , array($user_id, $post->ID)));

		 	$ldppp_results = $wpdb->num_rows;			

			$ldppp_rated_class = 'ldppp_rated_class';

			$ldppp_totalratings = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(ratings) FROM $ldppp_ratings WHERE post_id = %d", $post->ID ));

			$ldppp_average_ratings = $wpdb->get_var( $wpdb->prepare( "SELECT ROUND(AVG(ratings), 1) FROM $ldppp_ratings WHERE post_id = %d", $post->ID ));

			if($ldppp_results){ 

				$ldppp_counterShow .= '<div class="ldppp_post_align_center">';

				$ldppp_counterShow .= '<div class="ldppp_rate">';	

				if($ldppp_result1->ratings == '5'){
							$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.$post->ID.'" /><label for="ldppp_star5" class="'.$ldppp_rated_class.'" title="text"><span>5 stars</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.$post->ID.'" /><label for="ldppp_star5" title="text"><span>5 stars</span></label>';
				}
				if($ldppp_result1->ratings == '4') {
						$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.$post->ID.'" /><label for="ldppp_star4" class="'.$ldppp_rated_class.'" title="text"><span>4 stars</span></label>';
				} else {
					$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.$post->ID.'" /><label for="ldppp_star4" title="text"><span>4 stars</span></label>';
				}
				if($ldppp_result1->ratings == '3') {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.$post->ID.'" /><label for="ldppp_star3" class="'.$ldppp_rated_class.'" title="text"><span>3 stars</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.$post->ID.'" /><label for="ldppp_star3" title="text"><span>3 stars</span></label>';
				}
				if($ldppp_result1->ratings == '2'){

					$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.$post->ID.'" /><label for="ldppp_star2" class="'.$ldppp_rated_class.'" title="text"><span>2 stars</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.$post->ID.'" /><label for="ldppp_star2" title="text"><span>2 stars</span></label>';
				}
				if($ldppp_result1->ratings == '1') {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.$post->ID.'" /><label for="ldppp_star1" class="'.$ldppp_rated_class.'" title="text"><span>1 star</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.$post->ID.'" /><label for="ldppp_star1" title="text"><span>1 star</span></label>';
				}

				$ldppp_counterShow .= '</div>';
				$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">Total Ratings'.$ldppp_totalratings.'</div>';
				$ldppp_counterShow .= '<div class="ldppp_avgratings" id="ldppp_avgratings">Average Ratings:&nbsp;'.$ldppp_average_ratings.'/ 5</div>';

				$ldppp_counterShow .= '</div>';

				} 				
			else 
			{
				$ldppp_counterShow .= '<div class="ldppp_post_align_center">';
				$ldppp_counterShow .= '<div class="ldppp_rate">
				    <input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.$post->ID.'" />
				    <label for="ldppp_star5" title="text"><span>5 stars</span></label>
				    <input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.$post->ID.'" />
				    <label for="ldppp_star4" title="text"><span>4 stars</span></label>
				    <input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.$post->ID.'" />
				    <label for="ldppp_star3" title="text"><span>3 stars</span></label>
				    <input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.$post->ID.'" />
				    <label for="ldppp_star2" title="text"><span>2 stars</span></label>
				    <input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.$post->ID.'" />
				    <label for="ldppp_star1" title="text"><span>1 star</span></label>
				</div>';

				if($ldppp_totalratings > 0) {
					$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">Toal Ratings'.$ldppp_totalratings.'</div>';
				} else {
					$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">No ratings available.</div>';
				}
				if($ldppp_average_ratings >= 1.0){
					$ldppp_counterShow .= '<div class="ldppp_avgrating" id="ldppp_avgratings">Average Ratings:&nbsp;'.$ldppp_average_ratings.'/ 5</div>';
				} else {
					$ldppp_counterShow .= '<div class="ldppp_avgratings" id="ldppp_avgratings">'.$ldppp_average_ratings.'</div>';
				}
				$ldppp_counterShow .= '</div>';
			}							
		}

		if(!is_user_logged_in()){
			if(!$ldppp_hide_likes){
				$ldppp_likeCount = $wpdb->get_var($wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = %d AND post_id = %d", 1, $post->ID ));
			}
			if(!$ldppp_hide_dislikes) {
				$ldppp_dislikeCount = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = '1' AND post_id = %d", $post->ID ));
			}

			$ldppp_haslike = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = '1' AND post_id = %d AND user_ip_address = %s", $post->ID, $ip_address ));

			$ldppp_hasdislike = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = '1' AND post_id = %d AND user_ip_address = %s", $post->ID, $ip_address ));			
						
			$ldppp_counterShow = '<div class="ldppp_like-dislike">';

			if($ldppp_haslike) {
				$ldppp_counterShow .= '<a href="#" data-option="like" data-id="'.$post->ID.'" id="ldppp_AjaxLike"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;'.$ldppp_likeCount.'</a>';
			}else {
				$ldppp_counterShow .= '<a href="#" data-option="like" data-id="'.$post->ID.'" id="ldppp_AjaxLike"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;'.$ldppp_likeCount.'</a>';
			}

			if($ldppp_hasdislike){
				$ldppp_counterShow .= '<a href="#"  data-option="dislike" data-id="'.$post->ID.'" id="ldppp_AjaxDislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp;'.$ldppp_dislikeCount.'</a>';
			}else {
				$ldppp_counterShow .= '<a href="#"  data-option="dislike" data-id="'.$post->ID.'" id="ldppp_AjaxDislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>&nbsp;'.$ldppp_dislikeCount.'</a>';
			}
			
			$ldppp_counterShow .= '<span id="ldppp_likesErrorMsg"></span>';

			$ldppp_counterShow .= '<span id="ldppp_errorMsg"></span>';

			$ldppp_counterShow .= '</div>';

			$ldppp_result1 = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_ratings WHERE user_ip_address = %s AND post_id = %d" , array($ip_address, $post->ID)));

		 	$ldppp_results = $wpdb->num_rows;			

			$ldppp_rated_class = 'ldppp_rated_class';

			$ldppp_totalratings = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM $ldppp_ratings WHERE post_id = %d", $post->ID ));

			$ldppp_average_ratings = $wpdb->get_var( $wpdb->prepare( "SELECT ROUND(AVG(ratings), 1) FROM $ldppp_ratings WHERE post_id = %d", $post->ID ));

			if($ldppp_results){ 

				$ldppp_counterShow .= '<div class="ldppp_post_align_center">';

				$ldppp_counterShow .= '<div class="ldppp_rate">';	

				if($ldppp_result1->ratings == '5'){
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.$post->ID.'" /><label for="ldppp_star5" class="'.$ldppp_rated_class.'" title="text"><span>5 stars</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.$post->ID.'" /><label for="ldppp_star5" title="text"><span>5 stars</span></label>';
				}
				if($ldppp_result1->ratings == '4') {
					$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.$post->ID.'" /><label for="ldppp_star4" class="'.$ldppp_rated_class.'" title="text"><span>4 stars</span></label>';
				} else {
					$ldppp_counterShow .=  '<input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.$post->ID.'" /><label for="ldppp_star4" title="text"><span>4 stars</span></label>';
				}
				if($ldppp_result1->ratings == '3') {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.$post->ID.'" /><label for="ldppp_star3" class="'.$ldppp_rated_class.'" title="text"><span>3 stars</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.$post->ID.'" /><label for="ldppp_star3" title="text"><span>3 stars</span></label>';
				}
				if($ldppp_result1->ratings == '2'){
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.$post->ID.'" /><label for="ldppp_star2" class="'.$ldppp_rated_class.'" title="text"><span>2 stars</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.$post->ID.'" /><label for="ldppp_star2" title="text"><span>2 stars</span></label>';
				}
				if($ldppp_result1->ratings == '1') {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.$post->ID.'" /><label for="ldppp_star1" class="'.$ldppp_rated_class.'" title="text"><span>1 star</span></label>';
				} else {
					$ldppp_counterShow .= '<input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.$post->ID.'" /><label for="ldppp_star1" title="text"><span>1 star</span></label>';
				}

				$ldppp_counterShow .= '</div>';

				$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">Total Ratings'.$ldppp_totalratings.'</div>';
				$ldppp_counterShow .= '<div class="ldppp_avgratings" id="ldppp_avgratings">Average Ratings:&nbsp;'.$ldppp_average_ratings.'/ 5</div>';

				$ldppp_counterShow .= '</div>';
			} 

			else 
			{
				$ldppp_counterShow .= '<div class="ldppp_post_align_center">';
				$ldppp_counterShow .= '<div class="ldppp_rate">
				    <input type="radio" id="ldppp_star5" name="ldppp_start_rates" value="5" data-id="'.$post->ID.'" />
				    <label for="ldppp_star5" title="text"><span>5 stars</span></label>
				    <input type="radio" id="ldppp_star4" name="ldppp_start_rates" value="4" data-id="'.$post->ID.'" />
				    <label for="ldppp_star4" title="text"><span>4 stars</span></label>
				    <input type="radio" id="ldppp_star3" name="ldppp_start_rates" value="3" data-id="'.$post->ID.'" />
				    <label for="ldppp_star3" title="text"><span>3 stars</span></label>
				    <input type="radio" id="ldppp_star2" name="ldppp_start_rates" value="2" data-id="'.$post->ID.'" />
				    <label for="ldppp_star2" title="text"><span>2 stars</span></label>
				    <input type="radio" id="ldppp_star1" name="ldppp_start_rates" value="1" data-id="'.$post->ID.'" />
				    <label for="ldppp_star1" title="text"><span>1 star</span></label>
				</div>';

				if($ldppp_totalratings > 0) {
					$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">Total Ratings'.$ldppp_totalratings.'</div>';
				}  else {
					$ldppp_counterShow .= '<div class="ldppp_totalratings" id="ldppp_totalratings">No ratings available.</div>';
				}
				if($ldppp_average_ratings >= 1.0){
					$ldppp_counterShow .= '<div class="ldppp_avgrating" id="ldppp_avgratings">Average Ratings:&nbsp;'.$ldppp_average_ratings.'/ 5</div>';
				} else {
					$ldppp_counterShow .= '<div class="ldppp_avgratings" id="ldppp_avgratings">'.$ldppp_average_ratings.'</div>';
				}
				$ldppp_counterShow .= '</div>';
			}
		}
	}
	
	if($ldppp_templateOption == 'yes'){
		if($ldppp_displayOption == 'before'){

			if ( is_product() ){ 
				$content = $content;
			} else {
				$content = $ldppp_counterShow.$content;
			}
			return $content; 
		}
		else{
			if ( is_product() ){ 
				$content = $content;
			} else {
				$content = $content.$ldppp_counterShow;
			}
			return $content; 
		}
	}
	else{
		return $content;
	}
	
}
add_filter('the_content', 'ldppp_show_buttons');

function ldppp_update_ratings(){

	global $wpdb;
	$ldppp_table_name = $wpdb->prefix."ldppp_ratings";

	global $current_user;
	$current_user = wp_get_current_user();

	$userID = $current_user->ID;

	function ldppp_get_client_ip_server() {
	    $ipaddress = '';

	    $possible_headers = array(
	        'HTTP_CLIENT_IP',
	        'HTTP_X_FORWARDED_FOR',
	        'HTTP_X_FORWARDED',
	        'HTTP_FORWARDED_FOR',
	        'HTTP_FORWARDED',
	        'REMOTE_ADDR'
	    );

	    foreach ($possible_headers as $header) {
	        if (isset($_SERVER[$header]) && filter_var($_SERVER[$header], FILTER_VALIDATE_IP)) {
	            // Sanitize the IP address
	            $ipaddress = sanitize_text_field($_SERVER[$header]);
	            break;
	        }
	    }

	    return $ipaddress;
	}

	$ipAddress = ldppp_get_client_ip_server();

	$postID = absint( $_REQUEST['postID'] );
	$ratings = sanitize_text_field( $_REQUEST['ratings'] );

	$data = array();

	if(is_user_logged_in()){

		$ldppp_result = $wpdb->get_row($wpdb->prepare("SELECT * FROM $ldppp_table_name WHERE user_id = %d AND post_id = %d" , array($userID, $postID)));

		$ldppp_resultCount = $wpdb->num_rows;

		if($ldppp_resultCount > 0){
			$wpdb->update(
			$ldppp_table_name, 
				array( 
					'ratings' => $ratings,
				),
				array(
					'post_id' => $postID,
					'user_id' => $userID
				)	 
			);
			$data['update'] = "Rating Successfully Updated.";	
		} 
		else 
		{
			$wpdb->insert($ldppp_table_name, array(
				'post_id' => $postID, 
				'user_id' => $userID,
				'ratings' => $ratings,
				'user_ip_address' => '0'
			));
			$data['insert'] = "Rating Successfully Inserted.";	
		}
		$data['ratings'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT ratings FROM $ldppp_table_name WHERE user_id=%s AND post_id=%d",
		        $userID,
		        $postID
		    )
		);

		$data['avg_ratings'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT ROUND(AVG(ratings), 1) FROM $ldppp_table_name WHERE post_id=%d",
		        $postID
		    )
		);

		$data['totalratings'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT COUNT(ratings) FROM $ldppp_table_name WHERE post_id=%d",
		        $postID
		    )
		);

		$data['user_rate'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT ratings FROM $ldppp_table_name WHERE post_id=%d AND user_id=%s",
		        $postID,
		        $userID
		    )
		);
	} 
	else
	{
		$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT * FROM $ldppp_table_name WHERE user_ip_address = %s AND post_id = %d ", array($ipAddress, $postID ) ));
		$ldppp_resultCount = $wpdb->num_rows;

		if($ldppp_resultCount > 0){
			$wpdb->update(
			$ldppp_table_name, 
				array( 
					'ratings' => $ratings,
				),
				array(
					'post_id' => $postID,
					'user_ip_address' => $ipAddress
				)	 
			);
			$data['update'] = "Rating Successfully Updated.";	
		} 
		else 
		{			
			$wpdb->insert($ldppp_table_name, array(
				'post_id' => $postID, 
				'user_id' => '0',
				'ratings' => $ratings,
				'user_ip_address' => $ipAddress
			));
			$data['insert'] = "Rating Successfully Inserted.";	
		}

		$data['ratings'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT ratings FROM $ldppp_table_name WHERE user_ip_address=%s AND post_id=%d",
		        $ipAddress,
		        $postID
		    )
		);

		$data['avg_ratings'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT ROUND(AVG(ratings),1) FROM $ldppp_table_name WHERE post_id=%d",
		        $postID
		    )
		);

		$data['totalratings'] = $wpdb->get_var(
		    $wpdb->prepare(
		        "SELECT COUNT(ratings) FROM $ldppp_table_name WHERE post_id=%d",
		        $postID
		    )
		);
	}
	$data['success_msg'] = 'Rating Successfully Added.';
	$data['error_msg'] = 'Rating Not added.';

	echo wp_json_encode($data);
	wp_die();

}
add_action('wp_ajax_nopriv_ldppp_update_ratings', 'ldppp_update_ratings');
add_action('wp_ajax_ldppp_update_ratings','ldppp_update_ratings');

// Main function to process ajax like and dislike clicks
function ldppp_AjaxCount(){
	global $wpdb;
	$ldppp_table_name = $wpdb->prefix . "ldppp_likes_dislikes";
	global $current_user;
	$current_user = wp_get_current_user();
	$userID = $current_user->ID;	

	function ldppp_get_client_ip_server() {
		$ipaddress = '';
		if ($_SERVER['HTTP_CLIENT_IP'])
		    $ipaddress = isset( $_SERVER['HTTP_CLIENT_IP'] ) ? sanitize_text_field( $_SERVER['HTTP_CLIENT_IP'] ) : '';
		else if($_SERVER['HTTP_X_FORWARDED_FOR'])			
			$ipaddress = isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? sanitize_text_field( $_SERVER['HTTP_X_FORWARDED_FOR'] ) : '';
		else if($_SERVER['HTTP_X_FORWARDED'])			
			$ipaddress = isset( $_SERVER['HTTP_X_FORWARDED'] ) ? sanitize_text_field( $_SERVER['HTTP_X_FORWARDED'] ) : '';
		else if($_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = isset( $_SERVER['HTTP_FORWARDED_FOR'] ) ? sanitize_text_field( $_SERVER['HTTP_FORWARDED_FOR'] ) : '';
		else if($_SERVER['HTTP_FORWARDED'])
			$ipaddress = isset( $_SERVER['HTTP_FORWARDED'] ) ? sanitize_text_field( $_SERVER['HTTP_FORWARDED'] ) : '';
		else if($_SERVER['REMOTE_ADDR'])
			$ipaddress = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( $_SERVER['REMOTE_ADDR'] ) : '';
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
	$ipAddress = ldppp_get_client_ip_server();
	
	$userAction = sanitize_text_field( $_REQUEST['userAction'] );
	$postID = absint( $_REQUEST['postID'] );
	
	$ldppp_loginOption = get_option('ldppp_only_logged_in_users');
	$resultdata = array();

	$ldppp_hide_likes = get_option('ldppp_hide_likes');
	$ldppp_hide_dislikes = get_option('ldppp_hide_dislikes');	

	// When login option select "YES"
	if($ldppp_loginOption == 'yes')
	{
		if(is_user_logged_in())
		{
			if($userAction == 'like')
			{
				$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT like_count,dislike_count FROM $ldppp_table_name WHERE user_id = %d AND post_id = %d AND ( dislike_count = '1' OR like_count = '1' )", array($userID, $postID ) ));
				$ldppp_resultCount = $wpdb->num_rows;
				if($ldppp_resultCount > 0){
					if($ldppp_result->dislike_count == '1')
					{
						$wpdb->update(
							$ldppp_table_name, 
							array( 
								'like_count' => '1',
								'dislike_count' => '0'
							),
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
					else
					{
						$wpdb->delete(
							$ldppp_table_name, 
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
				}
				else
				{
					$wpdb->insert($ldppp_table_name, array(
						'post_id' => $postID, 
						'user_id' => $userID,
						'dislike_count' => '0',
						'like_count' => '1',
						'user_ip_address' => '0'
					));
				}
			}
			else
			{
				$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT like_count,dislike_count FROM $ldppp_table_name WHERE user_id = %d AND post_id = %d AND ( dislike_count = '1' OR like_count = '1' )", array($userID, $postID ) ));
				$ldppp_resultCount = $wpdb->num_rows;
				if($ldppp_resultCount > 0)
				{
					if($ldppp_result->like_count == '1')
					{
						$wpdb->update(
							$ldppp_table_name, 
							array( 
								'like_count' => '0',
								'dislike_count' => '1'
							),
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
					else
					{
						$wpdb->delete(
							$ldppp_table_name, 
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
				}
				else
				{
					$wpdb->insert($ldppp_table_name, array(
						'post_id' => $postID, 
						'user_id' => $userID,
						'dislike_count' => '1',
						'like_count' => '0',
						'user_ip_address' => '0'
					));
				}
			}
		}
		else
		{
			$resultdata['error_msg'] = 'Please Login!';
		}
	}

	// When login option select "NO"
	else
	{
		if(is_user_logged_in())
		{
			if($userAction == 'like')
			{
				$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT like_count,dislike_count FROM $ldppp_table_name WHERE user_id = %d AND post_id = %d AND ( dislike_count = '1' OR like_count = '1' )", array($userID, $postID ) ));
				$ldppp_resultCount = $wpdb->num_rows;
				if($ldppp_resultCount > 0)
				{
					if($ldppp_result->dislike_count == '1')
					{
						$wpdb->update(
							$ldppp_table_name, 
							array( 
								'like_count' => '1',
								'dislike_count' => '0'
							),
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)
						);
					}
					else
					{
						$wpdb->delete(
							$ldppp_table_name, 
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
				}
				else
				{
					$wpdb->insert($ldppp_table_name, array(
						'post_id' => $postID, 
						'user_id' => $userID,
						'dislike_count' => '0',
						'like_count' => '1',
						'user_ip_address' => '0'
					));
				}
			}
			else
			{
				$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT like_count,dislike_count FROM $ldppp_table_name WHERE user_id = %d AND post_id = %d AND ( dislike_count = '1' OR like_count = '1' )", array($userID, $postID ) ));
				$ldppp_resultCount = $wpdb->num_rows;
				if($ldppp_resultCount > 0)
				{
					if($ldppp_result->like_count == '1')
					{
						$wpdb->update(
							$ldppp_table_name, 
							array( 
								'like_count' => '0',
								'dislike_count' => '1'
							),
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
					else{
						$wpdb->delete(
							$ldppp_table_name, 
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
				}
				else
				{
					$wpdb->insert($ldppp_table_name, array(
						'post_id' => $postID, 
						'user_id' => $userID,
						'dislike_count' => '1',
						'like_count' => '0',
						'user_ip_address' => '0'
					));
				}
			}
		}	

		//Logged in user functionality ends
	
		//guast user functionality begins
		else
		{
			if($userAction == 'like')
			{
				$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT like_count,dislike_count FROM $ldppp_table_name WHERE user_ip_address = %s AND post_id = %d AND ( dislike_count = '1' OR like_count = '1' )", array($ipAddress, $postID ) ));
				$ldppp_resultCount = $wpdb->num_rows;
				if($ldppp_resultCount > 0)
				{
					if($ldppp_result->dislike_count == '1')
					{
						$wpdb->update(
							$ldppp_table_name, 
							array( 
								'like_count' => '1',
								'dislike_count' => '0'
							),
							array(
								'post_id' => $postID,
								'user_ip_address' => $ipAddress
							)	 
						);
					}
					else
					{
						$wpdb->delete(
							$ldppp_table_name, 
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
				}
				else
				{
					$wpdb->insert($ldppp_table_name, array(
						'post_id' => $postID, 
						'user_id' => '0',
						'dislike_count' => '0',
						'like_count' => '1',
						'user_ip_address' => $ipAddress
					));
				}
			}
			else
			{
				$ldppp_result = $wpdb->get_row($wpdb->prepare( "SELECT like_count,dislike_count FROM $ldppp_table_name WHERE user_ip_address = %s AND post_id = %d AND ( dislike_count = '1' OR like_count = '1' )", array($ipAddress, $postID ) ));
				$ldppp_resultCount = $wpdb->num_rows;
				if($ldppp_resultCount > 0)
				{
					if($ldppp_result->like_count == '1')
					{
						$wpdb->update(
							$ldppp_table_name, 
							array( 
								'like_count' => '0',
								'dislike_count' => '1'
							),
							array(
								'post_id' => $postID,
								'user_ip_address' => $ipAddress
							)	 
						);
					}
					else
					{
						$wpdb->delete(
							$ldppp_table_name, 
							array(
								'post_id' => $postID,
								'user_id' => $userID
							)	 
						);
					}
				}
				else
				{
					$wpdb->insert($ldppp_table_name, array(
						'post_id' => $postID, 
						'user_id' => '0',
						'dislike_count' => '1',
						'like_count' => '0',
						'user_ip_address' => $ipAddress
					));
				}
			}	
		}
	}

	$ldppp_hide_likes = get_option('ldppp_hide_likes');
	$ldppp_hide_dislikes = get_option('ldppp_hide_dislikes');	

	if (is_user_logged_in()) {
    $resultdata['user_like_count'] = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = 1 AND post_id = %d AND user_id = %s", $postID, $userID ));

    $resultdata['user_dislike_count'] = $wpdb->get_var(
	    $wpdb->prepare(
	        "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = 1 AND post_id = %d AND user_id = %s",
	            $postID,
	            $userID
	        )
	    );
	} else {
	    $resultdata['user_like_count'] = $wpdb->get_var(
	        $wpdb->prepare(
	            "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = 1 AND post_id = %d AND user_ip_address = %s",
	            $postID,
	            $ipAddress
	        )
	    );

	    $resultdata['user_dislike_count'] = $wpdb->get_var(
	        $wpdb->prepare(
	            "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = 1 AND post_id = %d AND user_ip_address = %s",
	            $postID,
	            $ipAddress
	        )
	    );
	}

	if (!$ldppp_hide_dislikes) {
	    $resultdata['dislike_count'] = $wpdb->get_var(
	        $wpdb->prepare(
	            "SELECT COUNT(*) FROM $ldppp_table_name WHERE dislike_count = 1 AND post_id = %d",
	            $postID
	        )
	    );
	} else {
	    $resultdata['dislike_count'] = '';
	}

	if (!$ldppp_hide_likes) {
	    $resultdata['like_count'] = $wpdb->get_var(
	        $wpdb->prepare(
	            "SELECT COUNT(*) FROM $ldppp_table_name WHERE like_count = 1 AND post_id = %d",
	            $postID
	        )
	    );
	} else {
	    $resultdata['like_count'] = '';
	}

	echo wp_json_encode($resultdata);
	wp_die();
}
add_action("wp_ajax_nopriv_ldppp_AjaxCount", "ldppp_AjaxCount");
add_action("wp_ajax_ldppp_AjaxCount", "ldppp_AjaxCount");

require_once( LDPPP_PLUGIN_DIR . 'files/single_page.php' );

require_once( LDPPP_PLUGIN_DIR . 'files/shop_achieve.php' );