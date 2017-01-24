(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).ready(function(){
		var btnContainer =$('.article-box .center-button');
		var loadMoreBtn = $('.article-box .center-button a.load-morel').hide();
		//$('.article-box .center-button a.load-morel').hide();
		loadMoreBtn.hide();
		var loader = btnContainer.find('.loader-icon-container');

	    $(window).scroll(function(){
	            if  ($(window).scrollTop() == $(document).height() - $(window).height()){

	            		if (btnContainer.find('.loader-icon-container').length < 1)
	            		{
	            			btnContainer.prepend(
	            			            			'<div class="loader-icon-container">'
	            			            			+'<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>'
	            			            			+'<span class="sr-only">Loading...</span>'
	            			            			+'</div>'
	            			 );
	            			loader = btnContainer.find('.loader-icon-container');
	            		}
	            		loader.show();
	            		loader.hide( "slow", function() {
	                  		loadMoreBtn.click();
						 });
	            }
	    }); 
	});
})( jQuery );
