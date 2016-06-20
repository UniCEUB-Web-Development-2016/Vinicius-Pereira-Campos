angular.module("UpTeam").factory("teamAPI", function($http, config){
	var _getTeams = function(){
		return $http.get(config.baseUrl + "team/");
	};
	var _setTeam = function(team){
		return $http.post(config.baseUrl + "team/?name=" + team.name);
	};
	var _getTeam = function(id){
		return $http.get(config.baseUrl + "team/?id=" + id);
	};
	var _updateTeam = function (team) {
		return $http.put(config.baseUrl + "team/?id=" + team.Id + "&name=" + team.name );
	}
	var _deleteTeam = function (id) {
		return $http.delete(config.baseUrl + "team/?id="+ id)
	}
	return {
		getTeams: _getTeams,
		getTeam: _getTeam,
		setTeam: _setTeam,
		updateTeam: _updateTeam,
		deleteTeam: _deleteTeam
	};
});
