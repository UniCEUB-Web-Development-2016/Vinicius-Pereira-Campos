 angular.module("UpTeam").controller("detailsTaskCtrl", function($scope, task, taskAPI,$location){
 	$scope.PageTitle = "Task";
 	$scope.task = task.data;
 	$scope.updateTask = function(task){
 		taskAPI.updateTask(task).success(function(data) {
 			swal('Ben Feitus Feitus!', 'Task Alterada Com Sucesso!', 'success');
 			$location.path("/tasks/list");
 		}).error(function (data) {
 			swal('Oopa!', 'Desculpe, mas não conseguimos atualzar a Task!', 'error')
 		})
 	};
 });