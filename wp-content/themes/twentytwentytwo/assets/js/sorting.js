/* global twentytwentytwoGetHexLum */

( function() {
	jQuery(document).ready(function(){
        jQuery(document).on('click', '.js-filter-item > a', function(e){
            e.preventDefault();

            var category_type = jQuery(this).data('type');
            var category_topic = jQuery(this).data('topic');

            jQuery.ajax({
                url: wp_ajax.ajax_url,
                data: { action: 'filter', type: category_type, topic: category_topic  },
                type: 'post',
                success: function(result) {
                    jQuery('.js-filter').html(result);
                },
                error: function(result) {
                    console.warn(result);
                }
            });
        });
    });
}() );
