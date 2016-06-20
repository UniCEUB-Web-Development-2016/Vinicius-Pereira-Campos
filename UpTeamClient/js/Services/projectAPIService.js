angular.module("UpTeam").factory("projectAPI", function($http, config){
	var _getProjects = function(){
		return $http.get(config.baseUrl + "Project/")
	};
	var _getProject = function(id){
		console.log($http.get(config.baseUrl + "Project/?id=" + id));
	};
	var _setProject = function(project){
		return $http.post(config.baseUrl + "Project/?name='" + project.name 
											+ "'&team=" + project.team 
											+"&estimatedDeadline="+ project.estimatedDeadline
											+ "&description='" + project.description 
											+ "'")
	};
	
	return {
		getProjects: _getProjects,
		getProject: _getProject,
		setProject: _setProject
	};
});
