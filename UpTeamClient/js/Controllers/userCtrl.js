angular.module("UpTeam").controller("userCtrl", function($scope){
	$scope.carregarUsers = function(){
 			userAPI.getUsers().success(function(data){
 				$scope.users = data;
 			});
 		};
 	});