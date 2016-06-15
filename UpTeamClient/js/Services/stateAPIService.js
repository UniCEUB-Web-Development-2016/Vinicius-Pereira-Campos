angular.module("UpTeam").factory("stateAPI", function($http, config){
	var _getStates = function(){
		return $http.get(config.baseUrl + "state/");
	};
	return {
		getStates: _getStates
	};
});
