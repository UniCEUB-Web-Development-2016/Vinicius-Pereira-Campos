 angular.module("UpTeam").controller("createTaskCtrl", function($scope, taskAPI, user, state, difficulty, project, $location){
 	$scope.PageTitle = "Task";
 	$scope.users = user.data;
 	$scope.states = state.data;
 	$scope.difficulties = difficulty.data;
 	$scope.projects = project.data;

 	$scope.addTask = function(task){

 		taskAPI.setTask(task).success(function(data){
 			swal('Parabéns!','Task Cadastrada Com Sucesso!', 'success');
 			delete $scope.task;
 			$scope.taskForm.$setPristine();
 			$location.path("/tasks/list");
 		}).error(function(data){
 			swal('Ops!','Desculpe, não conseguimos cadastrar a sua task!', 'error');
 		});
 	};
 });