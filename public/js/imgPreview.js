const input_image = $('#image');
const image_preview = $('#image-preview');

const null_label = $('#null-label');
const preview_label = $('#preview-label');

input_image.on('change', function () {
    const reader = new FileReader();
    reader.readAsDataURL(input_image[0].files[0]);
    reader.onload = (e) => {
        image_preview.attr('src', e.target.result);
    }

    null_label.hide();
    preview_label.removeClass('hidden').addClass('block');
});

