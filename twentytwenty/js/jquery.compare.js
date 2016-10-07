jQuery( document ).ready(function() {
    jQuery('.twentytwenty-container[data-orientation!="vertical"]').twentytwenty({
        default_offset_pct: 0.7
    });

    jQuery('.twentytwenty-container[data-orientation="vertical"]').twentytwenty({
        default_offset_pct: 0.3,
        orientation: 'vertical'
    });

    jQuery('.twentytwenty-container').height(jQuery('.twentytwenty-container img').height());
    jQuery('.twentytwenty-container').width(jQuery('.twentytwenty-container img').width());
});

