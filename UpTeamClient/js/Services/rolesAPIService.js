angular.module("UpTeam").factory("rolesAPI", function($http, config){
	var _getRoles = function(){
		return $http.get(config.baseUrl + "roles/");
	};
	return {
		getRoles: _getRoles
	};
});
