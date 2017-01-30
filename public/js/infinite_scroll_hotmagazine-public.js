window.lastScrollTop = 0;
window.delta = 200;
var lastPostCount = 8;
var firstPage = true;
var hasBeenClicked = false;
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
    			// $(window).scrollTop() - $(btnContainer).offSet().top < 
	            // if  ($(window).scrollTop() == $(document).height() - $(window).height()){
				var $posts = $('.article-box #cat_all .news-post.article-post');
				var postsCount = $posts.length;
				var st = $(window).scrollTop();

	            if  ( st + ($(window).height() ) > (btnContainer.offset().top + btnContainer.outerHeight())){

	            		if (btnContainer.find('.loader-icon-container').length < 1)
	            		{
	            			btnContainer.prepend(
	            			            			'<div class="loader-icon-container">'
	            			            			+'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>'
	            			            			+'<span class="sr-only">Loading...</span>'
	            			            			+'</div>'
	            			 );
	            			loader = btnContainer.find('.loader-icon-container');
	            		}
	            		if(Math.abs( st  - window.lastScrollTop) <= window.delta){
        					return;
	            		}

	            		loader.show();
	            		// only click button if this is the first loading or the previous click has increased the length of post
	            		if (firstPage == true || (postsCount > lastPostCount)){
	            			// when the load more btn hasn't been clicked  setTimeOut before click
		            		if (hasBeenClicked == false) {
			                  	firstPage = false;
			                  //  click the loadmore btn after 4s
		            			setTimeout(function(){
		                  			loadMoreBtn.click();
			            			loader.fadeOut(8000);
			            			//set click to false to allow another click to work on scroll
			            			hasBeenClicked = false;

		            			}, 4000);
		            			// before click execute after 4s set hasbeenClicked = true to prevent click by another scroll
		            			hasBeenClicked = true;
		            		}
	            		}
                  		lastPostCount = postsCount;
	            		window.lastScrollTop = st;
	            }
	    }); 
	});
})( jQuery );
