( function ( $ ) {
    'use strict';
    $( document ).ready( function () {
        $('.popp-overlay').on('click',function(e) {
     		if ($(e.target).hasClass('popp-overlay')) {
     			$('.popp-overlay').hide();
     		}
     	});
    })
} ( jQuery ) );
