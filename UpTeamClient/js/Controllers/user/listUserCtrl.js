 angular.module("UpTeam").controller("listTaskCtrl", function($scope, tasks){
 	$scope.PageTitle = "Task";
 	$scope.tasks = tasks.data;
 });