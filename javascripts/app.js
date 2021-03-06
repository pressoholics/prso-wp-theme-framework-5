jQuery.noConflict();
(function($) {

	/*** Init Zurb Foundation Orbit **/
	$(document).foundation({
		orbit: {
		  animation: 'slide', // Sets the type of animation used for transitioning between slides, can also be 'fade'
		  timer_speed: 10000, // Sets the amount of time in milliseconds before transitioning a slide
		  pause_on_hover: true, // Pauses on the current slide while hovering
		  resume_on_mouseout: false, // If pause on hover is set to true, this setting resumes playback after mousing out of slide
		  next_on_click: true, // Advance to next slide on click
		  animation_speed: 500, // Sets the amount of time in milliseconds the transition between slides will last
		  stack_on_small: false,
		  navigation_arrows: true,
		  slide_number: true,
		  slide_number_text: 'of',
		  container_class: 'orbit-container',
		  stack_on_small_class: 'orbit-stack-on-small',
		  next_class: 'orbit-next', // Class name given to the next button
		  prev_class: 'orbit-prev', // Class name given to the previous button
		  timer_container_class: 'orbit-timer', // Class name given to the timer
		  timer_paused_class: 'paused', // Class name given to the paused button
		  timer_progress_class: 'orbit-progress', // Class name given to the progress bar
		  timer_show_progress_bar: true, // If the progress bar should get shown (false skips computation)
		  slides_container_class: 'orbit-slides-container', // Class name given to the
		  bullets_container_class: 'orbit-bullets',
		  slide_selector: 'li', // Default is '*' which selects all children under the container
		  bullets_active_class: 'active', // Class name given to the active bullet
		  slide_number_class: 'orbit-slide-number', // Class name given to the slide number
		  caption_class: 'orbit-caption', // Class name given to the caption
		  active_slide_class: 'active', // Class name given to the active slide
		  orbit_transition_class: 'orbit-transitioning',
		  bullets: true, // Does the slider have bullets visible?
		  circular: true, // Does the slider should go to the first slide after showing the last?
		  timer: true, // Does the slider have a timer active? Setting to false disables the timer.
		  variable_height: false, // Does the slider have variable height content?
		  swipe: true
		}
	});	
	
	//Interchange -- Once orbit banner image has been loaded trigger resize to recalc orbit container
	/*
	$(document).on('replace', '.slideshow-wrapper img', function (e, new_path, original_path) {
  		setTimeout(function(){
			
			$(window).trigger('resize');
			$('.slideshow-wrapper').css( 'min-height', 0 );
			
		},500);
	});
	*/
	
	/*** Init Zurb Foundation **/
	$(document).ready(function(){
		
		// Add animation effects to content images on scroll - Except IE6,7,8 (see feature detect logic)
		if( $.support.cssFloat ) {
		  
			$("#main img").css( 'visibility', 'hidden' );
			$("#main img").waypoint( function() {
			                                    
				$(this).delay(100).queue(function(next){
				    
				    if( !$(this).hasClass("animated") ) {
				    	//See _app-animate.scss for animation options
				        $(this).addClass("animated fadeIn");
				    }
				    
				    next();
				
				});                                    
			
			}, { offset: "99%" });
		  
		}
		
		//Add 'active' class to navigation elements
		function activate_nav_items() {
			
			//Init vars
			var currentPostID = prsoParentThemeLocalVars['currentPostID'];
			
			//Add active class to any nav li elements for this post
			$('.active-for-post-' + currentPostID).addClass('active');
			
			//Add active class to all the nav item's parents
			$('.active-for-post-' + currentPostID).parents('li.menu-item').addClass('active');
			
		}
		activate_nav_items();
		
		/*** Use this js doc for all application specific JS ***/
		
		// Input placeholder text fix for IE
		$('[placeholder]').focus(function() {
		  var input = $(this);
		  if (input.val() == input.attr('placeholder')) {
			input.val('');
			input.removeClass('placeholder');
		  }
		}).blur(function() {
		  var input = $(this);
		  if (input.val() == '' || input.val() == input.attr('placeholder')) {
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		  }
		}).blur();
		
		// Prevent submission of empty form
		$('[placeholder]').parents('form').submit(function() {
		  $(this).find('[placeholder]').each(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
			  input.val('');
			}
		  })
		});
		
	});
	
})(jQuery);