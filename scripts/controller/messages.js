jQuery.fn.extend({
    messages: function () {
        var templateName = 'message';
        var template;
        // faked ownId. that value should come from the back-end and be store in a variable accesible from the whole code.
        var ownId = '2';
        var element = $(this);
        var data;
        var messages = {};
        var id = null;
        var timeCharge;
        var charging = false;


        var init = function () {
            element.on('chargeMessages', getData);
            timeCharge = setInterval(getData, 3000);
        };

        var addMessage = function (message) {
            if (messages.hasOwnProperty(message['datetime']) === true) {
                return;
            }
            message['ownership'] = (message['sender'] === ownId) ? 'owner' : 'not-owner';
            messages[message['datetime']] = message;
            var renderedData = $.render(template, message);
            renderedData = $(renderedData);
            element.append(renderedData);
            renderedData.starbinds();
        };

        var getData = function () {
            if (charging === true) {
                return;
            }
            charging = true;
            $.get('/api/chat/' + ownId + '/' + id, function (answerData) {
                charging = false;
                data = JSON.parse(answerData).data;
                for (var message in data.messages) {
                    addMessage(data.messages[message]);
                }
            });
        };

        var load = function () {
            $.get('/html/' + templateName + '.html', function (data) {
                template = data;
                var matches = window.location.pathname.match(/\/chat\/(\d+)/);
                if (typeof(matches) !== 'object' || matches.length !== 2) {
                    throw 'Route not match for controller';
                }
                id = matches[1];
                getData();
            });
            init();
        };

        load();
    }
});