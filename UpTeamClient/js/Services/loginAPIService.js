angular.module("UpTeam").factory("loginAPI", function($http, config){
	var _signIn = function(user){
		return $http.post(config.baseUrl + "Login/?email=" + user.email + "&password=" + user.password);
	};
  var _logOut = function () {
    return $http.delete(config.baseUrl + "Login/");
  }
  var _islogged = function () {
    return $http.get(config.baseUrl + "Login/");
  }

	return {
		signIn: _signIn,
    logOut: _logOut,
    isLogged: _islogged
	};
});
