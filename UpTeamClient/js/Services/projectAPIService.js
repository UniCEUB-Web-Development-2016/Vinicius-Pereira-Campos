angular.module("UpTeam").factory("projectAPI", function($http, config){
	var _getProjects = function(){
		return $http.get(config.baseUrl + "Project/")
	};
	
	return {
		getProjects: _getProjects
	};
});
