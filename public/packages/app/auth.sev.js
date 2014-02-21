(function() {

    define(function() {
        var SimpleAuth = function() {
            // Publish instance with simple login() and logout() APIs
            return {
                login: function(userName, password) {

                },
                logout: function() {

                },
                userSession: null
            };
        };

        // Publish the constructor function
        return SimpleAuth;
    });

}());