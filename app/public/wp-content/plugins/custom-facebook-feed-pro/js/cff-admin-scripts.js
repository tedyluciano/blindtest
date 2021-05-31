jQuery(document).ready(function($) {

	//Tooltips
	jQuery('#cff-admin .cff-tooltip-link').click(function(){
		jQuery(this).closest('tr, h3, div').find('.cff-tooltip').slideToggle();
	});

	//Toggle Access Token field
	if( jQuery('#cff_show_access_token').is(':checked') ) jQuery('.cff-access-token-hidden').show();
	jQuery('#cff_show_access_token').change(function(){
		jQuery('.cff-access-token-hidden').fadeToggle();
	});

	//Check Access Token length
	jQuery("#cff_access_token").change(function() {

		var cff_token_string = jQuery('#cff_access_token').val(),
			cff_token_check = cff_token_string.indexOf('|');

  		if ( (cff_token_check == -1) && (cff_token_string.length < 50) && (cff_token_string.length !== 0) ) {
  			jQuery('.cff-profile-error.cff-access-token').fadeIn();
  		} else {
  			jQuery('.cff-profile-error.cff-access-token').fadeOut();
  		}

	});

	// //Is this a page, group or profile?
	// var cff_page_type = jQuery('.cff-page-type select').val(),
	// 	$cff_page_type_options = jQuery('.cff-page-options'),
	// 	$cff_profile_error = jQuery('.cff-profile-error.cff-page-type'),
	// 	$cff_group_error = jQuery('.cff-group-error.cff-page-type');

	// //Should we show anything initially?
	// if(cff_page_type !== 'page') $cff_page_type_options.hide();
	// if(cff_page_type == 'profile') $cff_profile_error.show();
	// if(cff_page_type == 'group') $cff_group_error.show();

	// //When page type is changed show the relevant item
	// jQuery('.cff-page-type').change(function(){
	// 	cff_page_type = jQuery('.cff-page-type select').val();

	// 	if( cff_page_type !== 'page' ) {
	// 		$cff_page_type_options.hide();
	// 		if( cff_page_type == 'profile' ) {
	// 				$cff_profile_error.show();
	// 				$cff_group_error.hide();
	// 			} else if( cff_page_type == 'group' ) {
	// 				$cff_group_error.show();
	// 				$cff_profile_error.hide();
	// 			} else {
	// 				$cff_group_error.hide();
	// 				$cff_profile_error.hide();
	// 			}
			
	// 	} else {
	// 		$cff_page_type_options.show();
	// 		$cff_profile_error.hide();
	// 		$cff_group_error.hide();
	// 	}
	// });


	//PHOTOS ONLY
	//When 'Display photos from your Photos page' is checked then show the options
	var cff_photo_source = jQuery('#cff_photos_source').val();

	//Should we show anything initially?
	if(cff_photo_source == 'timeline') jQuery('.cff-photo-source-options').hide();

	jQuery('#cff_photos_source').change(function(){
		cff_photo_source = jQuery(this).val();

		if( cff_photo_source == 'photospage' ) {
			jQuery('.cff-photo-source-options').show();
		} else {
			jQuery('.cff-photo-source-options').hide();
		}
	});

	//ALBUMS ONLY
	//When 'Dispay albums from your Photos page' is checked then show the options
	var cff_album_source = jQuery('#cff_albums_source').val();

	//Should we show anything initially?
	if(cff_album_source == 'timeline') jQuery('.cff-album-source-options').hide();

	jQuery('#cff_albums_source').change(function(){
		cff_album_source = jQuery(this).val();

		if( cff_album_source == 'photospage' ) {
			jQuery('.cff-album-source-options').slideDown();
		} else {
			jQuery('.cff-album-source-options').slideUp();
		}
	});

	//VIDEOS ONLY
	//When 'Dispay videos from your Videos page' is checked then show the options
	var cff_video_source = jQuery('#cff_videos_source').val();

	//Should we show anything initially?
	if(cff_video_source == 'timeline') jQuery('.cff-video-source-options').hide();

	jQuery('#cff_videos_source').change(function(){
		cff_video_source = jQuery(this).val();

		if( cff_video_source == 'videospage' ) {
			jQuery('.cff-video-source-options').show();
		} else {
			jQuery('.cff-video-source-options').hide();
		}
	});

	//EVENTS ONLY
	var cff_event_source = jQuery('#cff_events_source').val();

	//Should we show anything initially?
	if(cff_event_source == 'timeline') jQuery('.cff-events-source-options').hide();

	jQuery('#cff_events_source').change(function(){
		cff_event_source = jQuery(this).val();

		if( cff_event_source == 'eventspage' ) {
			jQuery('.cff-events-source-options').show();
		} else {
			jQuery('.cff-events-source-options').hide();
		}
	});


	//Show narrow option when Full-width layout is selected
	function toggleMediaOptions(){
		if( $('.cff-full').hasClass('cff-layout-selected') ){
			$('.cff-media-position').show();
		} else {
			$('.cff-media-position').hide();
		}
	}
	toggleMediaOptions();



	//Choose events source
	var $cff_events_only_options = jQuery('.cff-events-only-options'),
		checked = jQuery("#post-types input.cff-post-type:checkbox:checked");
	
	//Hide page source option initially
	$cff_events_only_options.hide();

	//Show if only events are checked
	if (checked.length === 1 && checked[0].id === 'cff_show_event_type') {
		$cff_events_only_options.slideDown();
	}


	//Albums only
	var $cff_albums_only_options = jQuery('.cff-albums-only-options');
	
	//Hide page source option initially
	$cff_albums_only_options.hide();

	//Show if only events are checked
	if (checked.length === 1 && checked[0].id === 'cff_show_albums_type') {
		$cff_albums_only_options.slideDown();
	}


	//Photos only
	var $cff_photos_only_options = jQuery('.cff-photos-only-options');
	
	//Hide page source option initially
	$cff_photos_only_options.hide();

	//Show if only events are checked
	if (checked.length === 1 && checked[0].id === 'cff_show_photos_type') {
		$cff_photos_only_options.slideDown();
	}


	//Videos only
	var $cff_videos_only_options = jQuery('.cff-videos-only-options');
	
	//Hide page source option initially
	$cff_videos_only_options.hide();

	//Show if only videos are checked
	if (checked.length === 1 && checked[0].id === 'cff_show_video_type') {
		$cff_videos_only_options.slideDown();
	}


	//On change check which post type is checked
	jQuery("#post-types").change(function() {
		var checked = jQuery("#post-types input.cff-post-type:checkbox:checked");

		if (checked.length === 1 && checked[0].id === 'cff_show_event_type') {
	        $cff_events_only_options.slideDown();
	    } else if (checked.length === 1 && checked[0].id === 'cff_show_albums_type') {
	        $cff_albums_only_options.slideDown();
	    } else if (checked.length === 1 && checked[0].id === 'cff_show_photos_type') {
	        $cff_photos_only_options.slideDown();
	    } else if (checked.length === 1 && checked[0].id === 'cff_show_video_type') {
	        $cff_videos_only_options.slideDown();
	    } else {
	        $cff_events_only_options.slideUp();
	        $cff_albums_only_options.slideUp();
	        $cff_photos_only_options.slideUp();
	        $cff_videos_only_options.slideUp();
	    }
	});


	//Header icon
	//Icon type
	//Check the saved icon type on page load and display it
	jQuery('#cff-header-icon-example').removeClass().addClass('fa fa-' + jQuery('#cff-header-icon').val() );
	//Change the header icon when selected from the list
	jQuery('#cff-header-icon').change(function() {
	    var $self = jQuery(this);

	    jQuery('#cff-header-icon-example').removeClass().addClass('fa fa-' + $self.val() );
	});

	//Test Facebook API connection button
	jQuery('#cff-api-test').click(function(e){
		e.preventDefault();
		//Show the JSON
		jQuery('#cff-api-test-result textarea').css('display', 'block');
	});


	//If 'Others only' is selected then show a note
	var $cffOthersOnly = jQuery('#cff-others-only');

	if ( jQuery("#cff_show_others option:selected").val() == 'onlyothers' ) $cffOthersOnly.show();
	
	jQuery("#cff_show_others").change(function() {
		if ( jQuery("#cff_show_others option:selected").val() == 'onlyothers' ) {
			$cffOthersOnly.show();
		} else {
			$cffOthersOnly.hide();
		}
	});

	//Selecting a post layout
	jQuery('.cff-layout').click(function(){
        var $self = jQuery(this);
        $self.addClass('cff-layout-selected').find('#cff_preset_layout').attr('checked', 'checked');
        $self.siblings().removeClass('cff-layout-selected');
        toggleMediaOptions();
    });

    //Add the color picker
	if( jQuery('.cff-colorpicker').length > 0 ) jQuery('.cff-colorpicker').wpColorPicker();

	//Show clear cache message when changing only events options
	// jQuery("#cff-admin .cff-please-clear-cache input, #cff-admin .cff-please-clear-cache select").change(function() {
	// 	jQuery('.cff-clear-cache-notice').show();
	// });


	//Mobile width
	var cff_feed_width = jQuery('#cff-admin #cff_feed_width').val(),
			$cff_width_options = jQuery('#cff-admin #cff_width_options');

	if (typeof cff_feed_width !== 'undefined') {
		//Show initially if a width is set
		if(cff_feed_width.length > 1 && cff_feed_width !== '100%') $cff_width_options.show();

		jQuery('#cff_feed_width').change(function(){
			cff_feed_width = jQuery(this).val();

			if( cff_feed_width.length < 2 || cff_feed_width == '100%' ) {
				$cff_width_options.slideUp();			
			} else {
				$cff_width_options.slideDown();
			}
		});
	}

	//Scroll to hash for quick links
  jQuery('#cff-admin a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : this.hash.slice(1);
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });

  //Shortcode tooltips
  jQuery('#cff-admin label').click(function(){
  	var $el = jQuery(this);
    var $cff_shortcode = $el.siblings('.cff_shortcode');
    if($cff_shortcode.is(':visible')){
      $el.siblings('.cff_shortcode').css('display','none');
    } else {
      $el.siblings('.cff_shortcode').css('display','block');
    }  
  });
  jQuery('#cff-admin th').hover(function(){
    if( jQuery(this).find('.cff_shortcode').length > 0 ){
      jQuery(this).find('label').append('<code class="cff_shortcode_symbol">[]</code>');
    }
  }, function(){
    jQuery(this).find('.cff_shortcode_symbol').remove();
  });
  jQuery('#cff-admin label').hover(function(){
    if( jQuery(this).siblings('.cff_shortcode').length > 0 ){
      jQuery(this).attr('title', 'Click for shortcode option');
    }
   }, function(){});


  //Caching options
	if( jQuery('#cff_caching_type_page').is(':checked') ) {
		jQuery('.cff-caching-cron-options').hide();
	} else {
		jQuery('.cff-caching-page-options').hide();
	}

	$('input[type=radio][name=cff_caching_type]').change(function() {
      if (this.value == 'page') {
      	jQuery('.cff-caching-cron-options').slideUp();
      	jQuery('.cff-caching-page-options').slideDown();
      }
      else if (this.value == 'background') {
      	jQuery('.cff-caching-page-options').slideUp();
      	jQuery('.cff-caching-cron-options').slideDown();
      }
  });


  //Should we show the caching time settings?
	var cff_cache_cron_interval = jQuery('#cff_cache_cron_interval').val(),
			$cff_caching_time_settings = jQuery('#cff-caching-time-settings');

	//Should we show anything initially?
	if(cff_cache_cron_interval == '30mins' || cff_cache_cron_interval == '1hour') $cff_caching_time_settings.hide();

	jQuery('#cff_cache_cron_interval').change(function(){
		cff_cache_cron_interval = jQuery('#cff_cache_cron_interval').val();

		if(cff_cache_cron_interval == '30mins' || cff_cache_cron_interval == '1hour'){
			$cff_caching_time_settings.hide();
		} else {
			$cff_caching_time_settings.show();
		}
	});


	//Post limit manual setting
	var cff_limit_setting = jQuery('#cff_limit_setting').val(),
			cff_post_limit = jQuery('#cff_post_limit').val(),
			$cff_limit_manual_settings = jQuery('#cff_limit_manual_settings');
	if( typeof cff_post_limit === 'undefined' ) cff_post_limit = '';

	//Should we show anything initially?
	if(cff_limit_setting == 'auto') $cff_limit_manual_settings.hide();
	if(cff_post_limit.length > 0){
		$cff_limit_manual_settings.show();
		jQuery('#cff_limit_setting').val('manual');
	}

	jQuery('#cff_limit_setting').change(function(){
		cff_limit_setting = jQuery('#cff_limit_setting').val();

		if(cff_limit_setting == 'auto'){
			$cff_limit_manual_settings.hide();
			jQuery('#cff_post_limit').val('');
		} else {
			$cff_limit_manual_settings.show();
		}
	});


	//Open/close the expandable option sections
	jQuery('.cff-expandable-options').hide();
	jQuery('.cff-expand-button a').on('click', function(e){
		e.preventDefault();
		var $self = jQuery(this);
		$self.parent().next('.cff-expandable-options').toggle();
		if( $self.text().indexOf('Show') !== -1 ){
			$self.text( $self.text().replace('Show', 'Hide') );
		} else {
			$self.text( $self.text().replace('Hide', 'Show') );
		}
	});


	//Support tab show video
	jQuery('#cff-play-support-video').on('click', function(e){
		e.preventDefault();
		jQuery('#cff-support-video').show().attr('src', jQuery('#cff-support-video').attr('src')+'&amp;autoplay=1' );
	});

	//Facebook login
	$('#cff_fb_login').on('click', function(){
		$('#cff_fb_login_modal').show();
	});
	$('#cff_admin_cancel_btn').on('click', function(){
		$('#cff_fb_login_modal').hide();
	});

	//Select a page for token
	$('.cff-managed-page').on('click', function(){
		$('#cff_access_token').val( $(this).attr('data-token') ).addClass('cff-success');
		if( $('#cff_page_id').val().trim() == '' ) $('#cff_page_id').val( $(this).attr('data-page-id') );

		$(this).siblings().removeClass('cff-page-selected');
		$(this).addClass('cff-page-selected');
		// $('.cff-save-page-token').show();
		//Check the own access token setting so it reveals token field
		if( $('#cff_show_access_token:checked').length < 1 ){
			$("#cff_show_access_token").trigger("change").prop( "checked", true );
		}
	});


	// Clear avatar cache
    var $cffClearAvatarsBtn = $('#cff-admin #cff_clear_avatars');

    $cffClearAvatarsBtn.click(function(event) {
        event.preventDefault();

        $('#cff-clear-avatars-success').remove();
        $(this).prop("disabled",true);

        $.ajax({
            url : ajaxurl,
            type : 'post',
            data : {
                action : 'cff_clear_avatar_cache'
            },
            success : function(data) {
                $cffClearAvatarsBtn.prop('disabled',false);
                if(!data===false) {
                    $cffClearAvatarsBtn.after('<i id="cff-clear-avatars-success" class="fa fa-check-circle cff-success-check"></i>');
                } else {
                    $cffClearAvatarsBtn.after('<span>error</span>');
                }
            }
        }); // ajax call
    }); // clear-persistent-cache click


});