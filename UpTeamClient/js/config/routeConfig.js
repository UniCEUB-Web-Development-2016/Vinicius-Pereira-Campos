angular.module("UpTeam").config(function($routeProvider) {
	$routeProvider.when("/tasks/list", {
		templateUrl: "task/listTasks.html",
		controller:"listTaskCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			tasks: function(taskAPI){
				return taskAPI.getTasks();
			}
		}
	});

	$routeProvider.when("/tasks", {
		templateUrl: "task/overviewTasks.html",
		controller:"overviewTaskCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			tasks: function(taskAPI){
				return taskAPI.getTasks();
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

	$routeProvider.when("/tasks/create",{
		templateUrl:"task/createTasks.html",
		controller:"createTaskCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
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
		templateUrl:"task/detailTasks.html",
		controller:"detailsTaskCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
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

	$routeProvider.when("/projects", {
		templateUrl: "project/overviewProject.html",
		controller:"overviewProjectCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			tasks: function(taskAPI){
				return taskAPI.getTasks();
			},
			project: function(projectAPI){
				return projectAPI.getProjects();
			},
			user: function(userAPI){
				return userAPI.getUsers();
			}

		}
	});

	$routeProvider.when("/projects/create",{
		templateUrl: "project/createProject.html",
		controller: "createProjectCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			team: function(teamAPI){
				return teamAPI.getTeams();
			}
		}
	});

	$routeProvider.when("/projects/details/:id",{
		templateUrl: "project/detailProject.html",
		controller: "detailsProjectCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			project: function(projectAPI, $route){
				return projectAPI.getProject($route.current.params.id);
			},
			teams: function(teamAPI){
				return teamAPI.getTeams();
			}
		}
	});

	$routeProvider.when("/teams",{
		templateUrl:"team/overviewTeam.html",
		controller:"overviewTeamCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			teams: function(teamAPI){
				return teamAPI.getTeams();
			}
		}
	});

	$routeProvider.when("/teams/create",{
		templateUrl:"team/createTeam.html",
		controller:"createTeamCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			}
		}
	});

	$routeProvider.when("/teams/details/:id",{
		templateUrl: "team/detailTeam.html",
		controller: "detailsTeamCtrl",
		resolve:{
			login: function (loginAPI) {
				return loginAPI.isLogged();
			},
			team: function (teamAPI, $route) {
				return teamAPI.getTeam($route.current.params.id);
			}
		}
	});


});
