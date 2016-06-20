 angular.module("UpTeam").controller("createTeamCtrl", function($scope, teamAPI, $location){
 	$scope.PageTitle = "Team";


 	$scope.addTeam = function(team){

 		teamAPI.setTask(team).success(function(data){
 			swal('Parabéns!','Team Cadastrada Com Sucesso!', 'success');
 			delete $scope.team;
 			$scope.teamForm.$setPristine();
 			$location.path("/teams");
 		}).error(function(data){
 			swal('Ops!','Desculpe, não conseguimos cadastrar a sua team!', 'error');
 		});
 	};
 });