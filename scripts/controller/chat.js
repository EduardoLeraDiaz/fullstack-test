jQuery.fn.extend({
    chat: function () {
        var templateName = 'chat';
        var template;

        // faked ownId. that value should come from the back-end.
        var ownId = '2';

        var element;
        var id;

        var sendMessage = function (event) {
            if (event.which === 13) {
                if ($(this).val().trim().length > 0) {
                    $.ajax({
                        url: '/api/chat/' + ownId + '/' + id,
                        method: 'POST',
                        data: element.find('.input-message').serialize(),
                        success: function () {
                            element.trim('chargeMessages');
                        }
                    });
                    $(this).val('');
                }
            }
        };

        var init = function () {
            element.find('.chat').starbinds();
            element.find('.input-message').keypress(sendMessage);
        };

        var getData = function () {
            var matches = window.location.pathname.match(/\/chat\/(\d+)/);
            if (typeof(matches) === 'object' && matches.length === 2) {
                id = matches[1];
                $.get('/api/profile/' + id, function (answerData) {
                    var data = JSON.parse(answerData).data;
                    var renderedData = $.render(template, data);
                    element = $('#content');
                    element.html($(renderedData));
                    element.find('.messages').messages();
                    init();
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