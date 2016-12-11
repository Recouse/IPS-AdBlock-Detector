;( function($, _, undefined){
	"use strict";

	ips.controller.register('core.adblock.detector', {
		initialize: function () {
			this.on( document, 'ready', this.check );
			this.on( document, 'scroll', this.scroll );
			this.on( document, 'click', '[data-action="closeMessage"]', this.close );
		},

		check: function() {
			if( ips.utils.cookie.get( 'adblockDetectedMessage_dismiss' ) == 'yes' )
			{
				$( '#adBlockDetectedMessage' ).addClass( 'ipsHide' );
			}
		},
		scroll: function() {
			var h = $( document ).scrollTop();
			if ( h > 100 )
			{
				$( '#adBlockDetectedMessage' ).addClass( "adblockDetectedMessage_fixed animated slideInDown" );
			}
			else
			{
				$( '#adBlockDetectedMessage' ).removeClass( 'adblockDetectedMessage_fixed animated slideInDown' );
			}
		},
		close: function(e) {
			e.preventDefault();

			$( '#adBlockDetectedMessage' ).slideUp();
			ips.utils.cookie.set( 'adblockDetectedMessage_dismiss', 'yes', 1 );
		}
	});
}(jQuery, _));