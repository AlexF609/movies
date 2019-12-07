"use strict";

var $ = jQuery;

var AtomicBlocksNewsletterSubmission = {

	init: function() {
		$( '.ab-newsletter-submit' ).on( 'click', function( event ) {

			event.preventDefault();

			wp.a11y.speak( atomic_blocks_newsletter_vars.l10n.a11y.submission_processing );

			var button = $( this );

			var button_text_original = button.text();

			button.text( atomic_blocks_newsletter_vars.l10n.button_text_processing ).prop( 'disabled', true );

			var form = $( this ).parents( 'form' );

			var nonce = button.parent().find( "[name='ab-newsletter-form-nonce']" ).val();

			var email = button.parent().find( "[name='ab-newsletter-email-address']" ).val();

			var provider = button.parent().find( "[name='ab-newsletter-mailing-list-provider']" ).val();

			var list = button.parent().find( "[name='ab-newsletter-mailing-list']" ).val();

			var successMessage = button.parent().find( "[name='ab-newsletter-success-message']" ).val();

			var errorMessageContainer = button.parents( '.ab-block-newsletter' ).find( '.ab-block-newsletter-errors' );

			if ( ! email ) {
				button.text( button_text_original ).prop( 'disabled', false );
				wp.a11y.speak( atomic_blocks_newsletter_vars.l10n.a11y.submission_failed );
				return;
			}

			if ( ! provider || ! list ) {
				form.html( '<p class="ab-newsletter-submission-message">' + atomic_blocks_newsletter_vars.l10n.invalid_configuration + '</p>' );
				return;
			}

			$.ajax( {
				data: {
					action: 'atomic_blocks_newsletter_submission',
					atomic_blocks_newsletter_email: email,
					atomic_blocks_newsletter_mailing_list_provider: provider,
					atomic_blocks_newsletter_mailing_list: list,
					atomic_blocks_newsletter_form_nonce: nonce,
					atomic_blocks_newsletter_success_message: successMessage,
				},
				type: 'post',
				url: atomic_blocks_newsletter_vars.ajaxurl,
				success: function( response ) {
					if ( response.success ) {
						form.html( '<p class="ab-newsletter-submission-message">' + response.data.message + '</p>' );
						wp.a11y.speak( atomic_blocks_newsletter_vars.l10n.a11y.submission_succeeded );
					}

					if ( ! response.success ) {
						errorMessageContainer.html( '<p>' + response.data.message + '</p>' ).fadeIn();
						button.text( button_text_original ).prop( 'disabled', false );
						wp.a11y.speak( atomic_blocks_newsletter_vars.l10n.a11y.submission_failed );
					}

				},
				failure: function( response ) {
					errorMessageContainer.html( '<p>' + response.data.message + '</p>' ).fadeIn();
				}

			} );
		} );

		$( '.ab-newsletter-email-address-input' ).on( 'keyup', function( event ) {
			$( '.ab-block-newsletter-errors' ).html('').fadeOut();
		} );
	}
}

$( document ).ready( function() {
	AtomicBlocksNewsletterSubmission.init();
} );
