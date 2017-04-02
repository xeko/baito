jQuery(document).ready(function ($) {
    var file_frame;
    $('#cover_image_button').on('click', function (event) {
        event.preventDefault();
        if (file_frame) {
            file_frame.open();
            return;
        }
        // Create the media frame.                            
//        file_frame = wp.media.frames.file_frame = wp.media({
        file_frame = wp.media.frames.wp_media_frame = wp.media({
            title: $(this).data('File upload'),
            button: {
                text: 'Upload'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();
            // set it in hidden input
            $('.element-upload').val(attachment.id);

            $('#cover_image_button').parent().find('.image').find('img').remove();
            $('#cover_image_button').parent().find('.image').prepend('<img src="' + attachment.url + '" style="max-width: 100px; margin-top: 8px;" />').fadeIn();
            $('#cover_image_button').parent().find('.after-upload').css('display', 'inline-block');
        });

        // Finally, open the modal
        file_frame.open();
    });

    $('.remove-image').on('click', function (e) {
        e.preventDefault();
        $(this).parent().find('.element-upload').val('');
        $(this).parent().find('img').remove();
        $(this).css('display', 'none');
    });

});