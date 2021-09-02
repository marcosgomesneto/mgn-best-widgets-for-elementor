( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */ 
	var WidgetHelloWorldHandler = function( $scope, $ ) {
		console.log( $scope );
	};
	
	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		$(".mgn-collapse ul.mgn-collapse-list > li > a").on( 'click', function(e){
			e.preventDefault();
			var aLink = $(this);
			var panelID = $(this).attr('aria-controls');
			aLink.closest('.mgn-collapse-list').find('li a').attr('aria-expanded', 'false');
			aLink.attr('aria-expanded', 'true');
			$(".mgn-collapse .tab-content .tab-panel").removeClass("active").removeClass("in");
			$(".mgn-collapse .tab-content").find(".tab-panel#" + panelID).addClass("active").addClass("in");
			$(this).closest('ul').find('li').removeClass("active");
			$(this).closest('li').addClass("active");
		} );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', WidgetHelloWorldHandler );
	} );
} )( jQuery );
