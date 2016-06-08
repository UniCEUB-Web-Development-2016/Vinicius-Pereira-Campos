angular.module("UpTeam").controller('UpTeamCtrl', ['$scope', '$http', function($scope, $http) {
  $scope.users;
  $scope.getTasks = function(){
    var taskUrl = 'http://localhost:75/UpTeam/task/?id=&name=&description=&estimate=&difficulty=&owner=1&createdby=&state=&project=&createdOn=';
    $http({
        method : "GET",
    }).then(function mySucces(response) {
        $scope.Tasks = response.data;
    }, function myError(response) {
        $scope.Tasks = response.statusText;
    });
}
  
}]);