 angular.module("UpTeam").controller("overviewTaskCtrl", function($scope, tasks, state, difficulty, project){
 	$scope.PageTitle = "Task";
 	$scope.tasks = tasks.data;
 	$scope.states = state.data;
 	$scope.difficulties = difficulty.data;
 	$scope.projects = project.data;
 });