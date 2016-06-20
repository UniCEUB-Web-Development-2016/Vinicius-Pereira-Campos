 angular.module("UpTeam").controller("createProjectCtrl", function($scope, projectAPI, team, $location){
 	$scope.PageTitle = "Project";
 	$scope.teams = team.data;

 	$scope.addProject = function(project){

 		projectAPI.setProject(project).success(function(data){
 			swal('Parabéns!','Projeto cadastrado com Sucesso!', 'success');
 			delete $scope.project;
 			$scope.projectForm.$setPristine();
 			$location.path("/projects");
 		}).error(function(data){
 			swal('Ops!','Desculpe, não conseguimos cadastrar o seu Projeto!', 'error');
 		});
 	};
 });