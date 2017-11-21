jQuery.fn.extend({
    routing: function () {
        var defaultRoute = '/profile/1';
        var routes = {
            '/profile/\\d+':'profile',
            '/chat/\\d+':'chat'
        };

        var enrouting = function (event) {
            var uri = window.location.pathname;
            for (var route in routes) {
                if (routes.hasOwnProperty(route)) {
                    var pattern = new RegExp(route,'g');
                    var result = uri.match(pattern);
                    var controller = routes[route];
                    if(result !== null) {
                        $('.content')[controller]();
                        return;
                    }
                }
            }
            window.history.pushState(null, null, defaultRoute);
            $('#content').trigger('enroute');
        };

        // Bind events
        this.on('enroute', enrouting);
    }
});


