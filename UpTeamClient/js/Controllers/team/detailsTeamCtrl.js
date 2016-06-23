 angular.module("UpTeam").controller("detailsTeamCtrl", function($scope, team, teamAPI,$location){
 	$scope.PageTitle = "Team";
 	$scope.team = team.data;

 	$scope.updateTeam = function(team){
 		teamAPI.updateTeam(team).success(function(data) {
 			swal('Ben Feitus Feitus!', 'Team Alterada Com Sucesso!', 'success');
 			$location.path("/teams");
 		}).error(function (data) {
 			swal('Oopa!', 'Desculpe, mas não conseguimos atualzar a Team!', 'error')
 		})
 	};
 	$scope.deleteTeam = function (teamId) {
 		swal({
 			title: 'Are you sure?',
 			text: "You are deleting your team!",
 			type: 'warning',
 			showCancelButton: true,
 			confirmButtonColor: '#3085d6',
 			cancelButtonColor: '#d33',
 			confirmButtonText: 'Yes, delete it!'
 		}).then(function() {
 			teamAPI.deleteTeam(teamId).success(function (data) {
 				swal(
 				'Deleted!',
 				'Your team has been deleted.',
 				'success'
 				);
 				$location.path("/teams");
 			}).error(function (data) {
 				swal(
 				'Ooops!',
 				'Sorry, we can\'t delete your team.',
 				'error'
 				);
 			});
 			
 		});
 	};
 });