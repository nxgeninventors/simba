const HttpService = (function () {
    /**
     * Generalized API call maker
     * @param {*} config
     * @param {*} data
     * @returns Promise
     */
    function makeApiCall(config, data = []) {
        if (typeof config == "undefined" || typeof config.url == "undefined")
            return;

        config.method ??= "GET";
        config.dataType ??= "json";

        var headers = { "X-CSRF-TOKEN": $("#_token").val() };

        return new Promise((resolve, reject) => {
            $.ajax({
                url: config.url,
                method: config.method,
                dataType: config.dataType,
                data: data,
                headers: headers,
                success: function (res) {
                    resolve(res);
                },
                error: function (error) {
                    reject(error);
                },
            });
        });
    }

    return {
        makeApiCall: makeApiCall,
    };
})();

export default HttpService;
