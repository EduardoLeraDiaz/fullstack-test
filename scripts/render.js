$.render = function (template, data) {
    for (var key in data) {
        if (data.hasOwnProperty(key)) {
            var pattern = new RegExp('{{'+key+'}}','g');
            template = template.replace(pattern, data[key])
        }
    }

    return template
};

