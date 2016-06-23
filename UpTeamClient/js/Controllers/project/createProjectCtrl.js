 angular.module("UpTeam").controller("createProjectCtrl", function($scope, $cookies, login, projectAPI, team, $location){
console.log(login.data);
   if(login.data){
     $cookies("isLogged", login.data);
   }else {
     $cookies.remove("isLogged");
     location.assign("../index.html")
   }
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
