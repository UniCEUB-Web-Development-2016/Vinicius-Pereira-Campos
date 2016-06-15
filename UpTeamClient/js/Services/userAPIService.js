angular.module("UpTeam").factory("userAPI", function($http, config){
	var _getUsers = function(){
		return $http.get(config.baseUrl + "User/")
	};
	
	return {
		getUsers: _getUsers
	};
});
