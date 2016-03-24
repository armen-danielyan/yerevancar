(function($) {
    $(function() {
        $('#manage_gallery').click(function() {
            var gallerysc = '[gallery ids="' + $('#product_gallery_ids').val() + '"]';
            wp.media.gallery.edit(gallerysc).on('update', function(g) {
                var id_array = [];
                $.each(g.models, function(id, img) { id_array.push(img.id); });
                $('#product_gallery_ids').val(id_array.join(","));
            });
        });

        $('#manage_galleryfull').click(function() {
            var galleryfullsc = '[gallery ids="' + $('#product_galleryfull_ids').val() + '"]';
            wp.media.gallery.edit(galleryfullsc).on('update', function(g) {
                var id_array = [];
                $.each(g.models, function(id, img) { id_array.push(img.id); });
                $('#product_galleryfull_ids').val(id_array.join(","));
            });
        });
    });
})(jQuery);