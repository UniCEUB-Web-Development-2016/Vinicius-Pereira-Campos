angular.module("UpTeam").config(function($routeProvider) {
	$routeProvider.when("/tasks/list", {
		templateUrl: "view/listTasks.html",
		controller:"listTaskCtrl",
		resolve:{
			tasks: function(taskAPI){
				return taskAPI.getTasks();
			}
		}
	});

	$routeProvider.when("/tasks/create",{
		templateUrl:"view/createTasks.html",
		controller:"createTaskCtrl",
		resolve:{
			user: function(userAPI){
				return userAPI.getUsers();
			},
			state: function(stateAPI){
				return stateAPI.getStates();
			},
			difficulty: function(difficultyAPI){
				return difficultyAPI.getDifficulties();
			},
			project: function(projectAPI){
				return projectAPI.getProjects();
			}
		}
	});

	$routeProvider.when("/tasks/details/:id",{
		templateUrl:"view/detailTasks.html",
		controller:"detailsTaskCtrl",
		resolve:{
			task: function(taskAPI, $route){
				return taskAPI.getTask($route.current.params.id);
			},
			state: function(stateAPI){
				return stateAPI.getStates();
			},
			user: function(userAPI){
				return userAPI.getUsers();
			},
			difficulty: function(difficultyAPI){
				return difficultyAPI.getDifficulties();
			},
			project: function(projectAPI){
				return projectAPI.getProjects();
			}
		}
	});
});