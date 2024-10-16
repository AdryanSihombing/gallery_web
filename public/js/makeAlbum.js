$(document).ready(function() {
    var photo_ids = $('#selected_photos').val().split(',');

    photo_ids.forEach(function(id) {
        $('.photo-item[data-id="' + id + '"]').addClass('selected');
    });

    $('.photo-item').on('click', function() {
        $(this).toggleClass('selected');
        updateSelectedPhotos();
    });

    updateSelectedPhotos();

    function updateSelectedPhotos() {
        var selected = [];
        $('.photo-item.selected').each(function() {
            selected.push($(this).data('id'));
        });
        $('#selected_photos').val(selected.join(','));
        console.log($('#selected_photos').val());
    }
});
