( function( $ ) {
	'use strict';
	/* global ashlinSlideshow */

	$( function() {
		let slideshowFrame;
		const container 		= $( '#as-container' ), // Container id
			addImageButton 		= container.find( '#as-add-images-btn' ), // Add images button
			slideshowImages 	= container.find( 'ul.as-images' ), // Images ul block
			slideshowImagesIds 	= $( '#slideshow-images-ids' ); // Images id hidden field
		let oldImageIds = slideshowImagesIds.val();
		// Add images
		addImageButton.on( 'click', function( event ) {
			event.preventDefault();

			// If the media frame already exists, reopen it.
			if ( slideshowFrame ) {
				slideshowFrame.open();
				return;
			}

			// Create a new media frame
			slideshowFrame = wp.media( {
				title: ashlinSlideshow.wp_media_title,
				button: {
					text: ashlinSlideshow.wp_media_button_text,
				},
				multiple: true, // Set to true to allow multiple files to be selected
			} );

			// When an image is selected in the media frame...
			slideshowFrame.on( 'select', function() {
				const selection = slideshowFrame.state().get( 'selection' );
				let attachmentIds = slideshowImagesIds.val();

				selection.map( function ( attachment ) {
					attachment = attachment.toJSON();
					if ( attachment.id ) {
						attachmentIds = attachmentIds
							? attachmentIds + ',' + attachment.id
							: attachment.id;
						const attachmentImage =
							attachment.sizes && attachment.sizes.thumbnail
								? attachment.sizes.thumbnail.url
								: attachment.url;

						slideshowImages.append(
							'<li class="as-image" data-attachment_id="' +
							attachment.id +
							'"><img src="' +
							attachmentImage +
							'" /><ul class="as-actions"><li><a href="#" class="as-delete" title="' +
							ashlinSlideshow.delete_text +
							'">' +
							ashlinSlideshow.delete_text +
							'</a></li></ul></li>'
						);
					}
					return true;
				} );

				slideshowImagesIds.val( attachmentIds );
				ashlinSlideshowUpdatePublishBlock();
			} );

			// Finally, open the modal on click
			slideshowFrame.open();
		} );

		// Remove image.
		container.on( 'click', 'a.as-delete', function () {
			$( this ).closest( 'li.as-image' ).remove();

			let attachmentIds = '';

			container.find( 'ul li.as-image' )
				.each( function () {
					const attachmentId = $( this ).attr( 'data-attachment_id' );
					attachmentIds = attachmentIds + attachmentId + ',';
				} );

			slideshowImagesIds.val( attachmentIds );
			ashlinSlideshowUpdatePublishBlock();
			return false;
		} );

		// Image ordering.
		slideshowImages.sortable( {
			items: 'li.as-image',
			/**
			 * On drag and drop processed
			 */
			update: function () {
				let attachmentIds = '';
				container
					.find( 'ul li.as-image' )
					.each( function () {
						const attachmentId = $( this ).attr( 'data-attachment_id' );
						attachmentIds = attachmentIds + attachmentId + ',';
					} );

				slideshowImagesIds.val( attachmentIds );
			},
		} );

		/**
		 * Enable / Disable publish block based on id exists
		 */
		function ashlinSlideshowUpdatePublishBlock() {
			let imageIds = slideshowImagesIds.val();
			imageIds = imageIds.replace( /,*$/, '' ); // Remove last , from the string
			imageIds = $.trim( imageIds );// Remove empty spaces
			if ( '' !== imageIds || oldImageIds !== imageIds ) {
				$( '.as-publish-block' ).show();
			} else {
				$( '.as-publish-block' ).hide();
			}
		}
		ashlinSlideshowUpdatePublishBlock();

		// For store image ids
		$( '#as-publish-slideshow-btn' ).on( 'click', function( event ) {
			event.preventDefault();
			const button = $( this );

			button.attr( 'disabled', 'disabled' ); //Disable button while processing ajax call
			// Remove existing messages if exits
			$( '#as-container .notice' ).remove();

			const imageIds = slideshowImagesIds.val();
			const data = {
				images: imageIds,
				nonce: ashlinSlideshow.nonce,
				action: 'as_update_slideshow',
			};

			//Process ajax call to store image ids
			$.post( wp.ajax.settings.url, data ).done( function( response ) {
				if ( true === response.success ) {
					ashlinSlideshowDisplaySuccessMessage( response.data.message );
					// For update publish button after save to DB. Remove button when all item is removed.
					oldImageIds = imageIds;
					ashlinSlideshowUpdatePublishBlock();
				} else {
					ashlinSlideshowDisplayFailureMessage( response.data.message );
				}
			} ).fail( function() {
				ashlinSlideshowDisplayFailureMessage( ashlinSlideshow.failed_message );
			} ).always( function() {
				button.removeAttr( 'disabled' );
			} );
		} );

		/**
		 * For displaying success message
		 *
		 * @param {string} message Success message to display
		 */
		function ashlinSlideshowDisplaySuccessMessage( message ) {
			$( '#as-container > h1' ).after( `
				<div id="success-message" class="notice notice-success">
					<p>${ message }</p>
				</div>` );
		}

		/**
		 * For displaying failed message
		 *
		 * @param {string} message Failure message to display
		 */
		function ashlinSlideshowDisplayFailureMessage( message ) {
			$( '#as-container > h1' ).after( `
				<div id="error-message" class="notice notice-error">
					<p>${ message }</p>
				</div>` );
		}
	} );

}( jQuery ) );
