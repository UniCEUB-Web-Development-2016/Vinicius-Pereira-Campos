angular.module("UpTeam").factory("difficultyAPI", function($http, config){
	var _getDifficulties = function(){
		return $http.get(config.baseUrl + "difficulty/");
	};
	
	return {
		getDifficulties: _getDifficulties
	};
});
