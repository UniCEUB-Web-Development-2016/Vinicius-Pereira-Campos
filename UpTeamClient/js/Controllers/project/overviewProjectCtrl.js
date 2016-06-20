 angular.module("UpTeam").controller("overviewProjectCtrl", function($scope, user, tasks, project){
 	$scope.PageTitle = "Project";
 	$scope.tasks = tasks.data;
 	$scope.projects = project.data;
 	$scope.users = user.data;
 });