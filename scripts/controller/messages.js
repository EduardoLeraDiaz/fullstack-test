jQuery.fn.extend({
    messages: function () {
        var templateName = 'message';
        var template;
        // faked ownId. that value should come from the back-end and be store in a variable accesible from the whole code.
        var ownId = '2';
        var element=$(this);
        var data;
        var messages = {};

        var init = function() {
            element.find('.chat').starbinds();
        };

        var addMessage = function(message) {
            if (messages.hasOwnProperty(message['datetime']) === false) {
                return;
            }
            messages[message['datetime']] = message;
        };

        var getData = function () {
            var matches = window.location.pathname.match(/\/chat\/(\d+)/);
            if (typeof(matches) === 'object' && matches.length === 2) {
                var id = matches[1];
                $.get('/api/chat/' + ownId + '/' + id , function (answerData) {
                    data = JSON.parse(answerData).data;
                    console.log(data.messages);
                    for (var message in data.messages) {
                        addMessage(data.messages[0]);
                    }
                    return;
/*                    var renderedData = $.render(template, data);
                    element= $('#content');
                    element.html($(renderedData));
                    init();*/

                });
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