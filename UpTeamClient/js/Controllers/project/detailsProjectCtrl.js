 angular.module("UpTeam").controller("detailsProjectCtrl", function($scope, project, teams, projectAPI,$location){
 	$scope.PageTitle = "Project";
 	$scope.project = project.data;
 	$scope.teams = teams.data;
 	$scope.updateProject = function(project){
 		projectAPI.updateProject(project).success(function(data) {
 			swal('Ben Feitus Feitus!', 'Project Alterado Com Sucesso!', 'success');
 			$location.path("/projects");
 		}).error(function (data) {
 			swal('Oopa!', 'Desculpe, mas não conseguimos atualzar o Project!', 'error')
 		})
 	};
 });