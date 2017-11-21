$(document).ready(function () {
    $('#content').routing();
    $('#content').trigger('enroute');
});

jQuery.fn.extend({
    starbinds: function () {
        $(this).find('.click-link').click(function(){
            window.history.pushState(null, null, $(this).attr('href'));
            $('#content').trigger('enroute');
            return false;
        })
    }
});