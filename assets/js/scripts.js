(function(jQuery){
 
	jQuery(document).ready(function(){
		if(jQuery('input:radio[name="ldppp_display_in_template"]:checked').val() == 'no'){
				jQuery('#ldppp_content_position').hide('slow');
		}
		jQuery('input:radio[name="ldppp_display_in_template"]').on('change', function(){
			if(jQuery(this).val() == 'yes'){
				jQuery('#ldppp_content_position').show('slow');
			}
			else{
				jQuery('#ldppp_content_position').hide('slow');
			}
		})

		jQuery('#ldppp_likesErrorMsg').slideUp('1000');
		jQuery('#ldppp_AjaxLike').on('click', function(e){
			e.preventDefault();
			var userAction = jQuery(this).attr('data-option');
			var postID = jQuery(this).attr('data-id');
			jQuery('#ldppp_likesErrorMsg').slideUp('1000');
			jQuery('#ldppp_errorMsg').slideUp('1000');

			jQuery.ajax({
				type : "POST",
				dataType: 'json',
				url : ldppp_count_ajax.ajaxurl,
				data : {
					action: "ldppp_AjaxCount",
					postID : postID,
					userAction: userAction
				},
				success: function(data) {
					var like = data.like_count;
					var dislike = data.dislike_count;
					var user_like_count = data.user_like_count;
					var errorMsg = data.like_message;
					var error = data.error_msg;
					if(user_like_count > 0){ 
						jQuery('#ldppp_AjaxLike').html('<i class="fa fa-thumbs-up" aria-hidden="true"></i> '+like);
					} else { 
						jQuery('#ldppp_AjaxLike').html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+like);
					}
					jQuery('#ldppp_AjaxDislike').html('<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '+dislike);
					if(errorMsg != null){
						jQuery('#ldppp_likesErrorMsg').slideDown('1000');
						jQuery('#ldppp_likesErrorMsg').html(errorMsg);
						jQuery('#ldppp_likesErrorMsg').css({'visibility':'visible'});
					}
					if(error != null){
						jQuery('#ldppp_errorMsg').slideDown('1000');
						jQuery('#ldppp_errorMsg').html(error);
						jQuery('#ldppp_errorMsg').css({'visibility':'visible'});
					}
				}
			})   
		});
		jQuery('#ldppp_AjaxDislike').on('click', function(e){
			e.preventDefault();
			var userAction = jQuery(this).attr('data-option');
			var postID = jQuery(this).attr('data-id');
			jQuery('#ldppp_likesErrorMsg').slideUp('1000');
			jQuery('#ldppp_errorMsg').slideUp('1000');
			
			jQuery.ajax({
				type : "POST",
				dataType: 'json',
				url : ldppp_count_ajax.ajaxurl,
				data : {
					action: 'ldppp_AjaxCount',
					postID : postID,
					userAction: userAction
				},
				success: function(data) {
					var like = data.like_count;
					var dislike = data.dislike_count;
					var user_dislike_count = data.user_dislike_count;
					var errorMsg = data.dislike_message;
					var error = data.error_msg;
					jQuery('#ldppp_AjaxLike').html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+like);
					
					if(user_dislike_count > 0) {
						jQuery('#ldppp_AjaxDislike').html('<i class="fa fa-thumbs-down" aria-hidden="true"></i> '+dislike);
					}
					else {
						jQuery('#ldppp_AjaxDislike').html('<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '+dislike);
					}
					
					if(errorMsg != null){
						jQuery('#ldppp_likesErrorMsg').slideDown('1000');
						jQuery('#ldppp_likesErrorMsg').html(errorMsg);
						jQuery('#ldppp_likesErrorMsg').css({'visibility':'visible'});
					}
					if(error != null){
						jQuery('#ldppp_errorMsg').slideDown('1000');
						jQuery('#ldppp_errorMsg').html(error);
						jQuery('#ldppp_errorMsg').css({'visibility':'visible'});
					}
				}
			})   
		});

		jQuery("input[name='ldppp_start_rates']").on('click', function(e){
			e.preventDefault();
			var ratings = jQuery(this).val();
			var postID = jQuery(this).attr('data-id');			
			jQuery.ajax({
				type : "POST",
				dataType : 'json',
				url: ldppp_count_ajax.ajaxurl,
				data : {
					action: 'ldppp_update_ratings',
					postID : postID,
					ratings : ratings
				},
				success:function(response){
					var success_msg = response.success_msg;
					var error_msg = response.error_msg;
					var update = response.update;
					var totalratings = response.totalratings;
					var avg_ratings = response.avg_ratings;

					if(update){
						//alert(update);
					}
					var insert = response.insert; 
					if(insert){
						//alert(insert);
					}
					var ratings = response.ratings;
					//alert(ratings);
					var value = jQuery('#ldppp_star'+ratings+'').val();
					//alert(value);					
					jQuery("input[name='ldppp_start_rates']").next().removeClass('ldppp_rated_class');

					jQuery('#ldppp_star'+value+'').next().addClass('ldppp_rated_class');

					jQuery('#ldppp_totalratings').text('Total Ratings:'+totalratings);
					jQuery('#ldppp_avgratings').text('Average Ratings: '+avg_ratings+'/5');					
				}
			});
		});

		// For Product achieve page
		jQuery(".ldppp_check_id").on('click', function(e){
			e.preventDefault();			
			var ratings = jQuery(this).val();
			var postID = jQuery(this).attr('data-id');
			var s_class = jQuery(this).parent().attr('class');
			var newStr = s_class.split(' ').slice(1).join(' ');
			var id = jQuery(this).attr('id').replace(/[^0-9]/gi, '');
			var f_id = parseInt(id, 10);
			jQuery.ajax({
				type : "POST",
				dataType : 'json',
				url: ldppp_count_ajax.ajaxurl,
				data : {
					action: 'ldppp_update_ratings',
					postID : postID,
					ratings : ratings
				},
				success:function(response){
					var success_msg = response.success_msg;
					var error_msg = response.error_msg;
					var update = response.update;
					var totalratings = response.totalratings;
					var avg_ratings = response.avg_ratings;
					var user_rate = response.user_rate;
					//alert(user_rate);
					if(update){
						//alert(update);
					}
					var insert = response.insert; 
					if(insert){
						//alert(insert);
					}					
					var ratings = response.ratings;
					jQuery('.'+newStr).children().removeClass('ldppp_rated_class');
					jQuery('#ldppp_star'+f_id+'').next().addClass('ldppp_rated_class');
					jQuery('#ldppp_totalratings'+postID).text('Total Ratings:'+ totalratings);
					jQuery('#ldppp_avgratings'+postID).text('Average Ratings: '+avg_ratings+'/5');					
				}
			})
		});
	});
	
})(jQuery); 

jQuery( document ).ready(function() { 

	if(jQuery('input:radio[name="ldppp_enable_product_page"]:checked').val() == 'no'){
				jQuery('#ldppp_btn_content_position').hide('slow');
		}
		jQuery('input:radio[name="ldppp_enable_product_page"]').on('change', function(){
			if(jQuery(this).val() == 'yes'){
				jQuery('#ldppp_btn_content_position').show('slow');
			}
			else{
				jQuery('#ldppp_btn_content_position').hide('slow');
			}
		})

		if(jQuery('input:radio[name="ldppp_enable_product_achieve_page"]:checked').val() == 'no'){
				jQuery('#ldppp_btn_achieve_content_position').hide('slow');
		}
		jQuery('input:radio[name="ldppp_enable_product_achieve_page"]').on('change', function(){
			if(jQuery(this).val() == 'yes'){
				jQuery('#ldppp_btn_achieve_content_position').show('slow');
			}
			else{
				jQuery('#ldppp_btn_achieve_content_position').hide('slow');
			}
		})
});