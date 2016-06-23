angular.module("UpTeam").factory("userAPI", function($http, config){
	var _getUsers = function(){
		return $http.get(config.baseUrl + "User/");
	};
	var _setUser = function (user) {
			return $http.post(config.baseUrl + "User/?name=" + user.name + "&password=" + user.password + "&email=" + user.email + "&role=" + user.role + "&birthday=" + user.birthday );
	};
	return {
		getUsers: _getUsers,
		setUser: _setUser
	};
});
