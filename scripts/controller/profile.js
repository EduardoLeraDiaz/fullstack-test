jQuery.fn.extend({
    profile: function () {
        var templateName = 'profile';
        var template;
        var element;

        var init = function() {
            element.find('.add-friend,.remove-friend').click(function(){
                element.find('.profile').toggleClass('friend-added');
            });
            element.find('.profile').starbinds();
        };

        var getData = function () {
            var matches = window.location.pathname.match(/\/profile\/(\d+)/);
            if (typeof(matches) === 'object' && matches.length === 2) {
                var id = matches[1];
                $.get('/api/profile/' + id, function (answerData) {
                    var objData = JSON.parse(answerData).data;
                    var renderedData = $.render(template, objData);
                    $('#content').html($(renderedData));
                    element= $('#content')
                    init();
                });
                return;
            }
            throw 'Route not match for controller';
        };

        var load = function () {
            $.get('/html/' + templateName + '.html', function (data) {
                template = data;
                getData()
            });
        };

        load();
    }
});