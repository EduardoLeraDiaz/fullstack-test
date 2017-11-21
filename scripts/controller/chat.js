jQuery.fn.extend({
    chat: function () {
        var templateName = 'chat';
        var template;
        // faked ownId. that value should come from the back-end.
        var ownId = '2';
        var element;

        var init = function() {
            element.find('.chat').starbinds();
        };

        var getData = function () {
            var matches = window.location.pathname.match(/\/chat\/(\d+)/);
            if (typeof(matches) === 'object' && matches.length === 2) {
                var id = matches[1];
                $.get('/api/profile/'+id,function(answerData){
                    var data = JSON.parse(answerData).data;
                    var renderedData = $.render(template, data);
                    element= $('#content');
                    element.html($(renderedData));
                    element.find('.messages').messages();
                });
/*                $.get('/api/chat/' + ownId + '/' + id , function (answerData) {

                    $.get('/api/profile/'+id,function(answerData){
                        data.name= JSON.parse(answerData).data.name;
                        var renderedData = $.render(template, data);
                        element= $('#content');
                        element.html($(renderedData));

                    });
                });*/
                return;
            }
            throw 'Route not match for controller';
        };

        var load = function () {
            $.get('/html/' + templateName + '.html', function (data) {
                template = data;
                getData();
            });
        };

        load();
    }
});