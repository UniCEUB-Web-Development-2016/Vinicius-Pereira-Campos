 angular.module("UpTeam").controller("overviewTeamCtrl", function($scope, teams){
 	$scope.PageTitle = "Teams";
 	$scope.teams = teams.data;
 });