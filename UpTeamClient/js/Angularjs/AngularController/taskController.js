 angular.module("UpTeam").controller("TaskCtrl", function($scope, $http){
  $scope.PageTitle = "Tasks";
  $scope.addTask = function(task){
    $http.post("http://localhost:75/UpTeam/task/?id=&name=" + task.name 
      + "&description=" + task.description 
      + "&estimate=" + task.estimate 
      + "&difficulty=" + task.difficulty 
      + "&owner=" + task.owner 
      + "&createdBy=" + task.createdby 
      + "&state=" + task.state 
      + "&project=" + task.project 
      + "&createdOn=" + task.createdOn).success(function(data){
       swal('Parabéns!','Task Cadastrada Com Sucesso!', 'success');
       carregarTasks();
        delete $scope.task;

      });
  };
  var carregarTasks = function(){
    $http.get("http://localhost:75/UpTeam/task/?id=&name=&description=&estimate=&difficulty=&owner=1&createdby=&state=&project=&createdOn=").success(function(data){
      console.log(data);
    });
  };
   var buscaTask = function(id){
    $http.get("http://localhost:75/UpTeam/task/?id=" + id + "&name=&description=&estimate=&difficulty=&owner=&createdby=&state=&project=&createdOn=").success(function(data){
      $scope.task = data;
    });

  };
  $scope.setCreate = function(){
    $scope.create = true;
    $scope.list = false;
    $scope.details = false;
  }
  $scope.setList = function(){
  	carregarTasks();
   	$scope.create = false;
   	$scope.details = false;
    $scope.list = true; 
    
  }
  $scope.setDetails = function(id){
  $scope.create = false;
    $scope.list = false;
    $scope.details = true; 	
    buscaTask(id);
  };

});