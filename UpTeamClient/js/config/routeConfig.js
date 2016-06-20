angular.module("UpTeam").config(function($routeProvider) {
	$routeProvider.when("/tasks/list", {
		templateUrl: "view/task/listTasks.html",
		controller:"listTaskCtrl",
		resolve:{
			tasks: function(taskAPI){
				return taskAPI.getTasks();
			}
		}
	});

	$routeProvider.when("/tasks", {
		templateUrl: "view/task/overviewTasks.html",
		controller:"overviewTaskCtrl",
		resolve:{
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
		templateUrl:"view/task/createTasks.html",
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
		templateUrl:"view/task/detailTasks.html",
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

	$routeProvider.when("/projects", {
		templateUrl: "view/project/overviewProject.html",
		controller:"overviewProjectCtrl",
		resolve:{
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
		templateUrl: "view/project/createProject.html",
		controller: "createProjectCtrl",
		resolve:{
			team: function(teamAPI){
				return teamAPI.getTeams();
			}
		}
	});

	$routeProvider.when("/projects/details/:id",{
		templateUrl: "view/project/detailProject.html",
		controller: "detailsProjectCtrl",
		resolve:{
			project: function(projectAPI, $route){
				return projectAPI.getProject($route.current.params.id);
			},
			teams: function(teamAPI){
				return teamAPI.getTeams();
			}
		}
	});

	$routeProvider.when("/teams",{
		templateUrl:"view/team/overviewTeam.html",
		controller:"overviewTeamCtrl",
		resolve:{
			teams: function(teamAPI){
				return teamAPI.getTeams();
			}
		}
	});

	$routeProvider.when("/teams/create",{
		templateUrl:"view/team/createTeam.html",
		controller:"createTeamCtrl"
	});

	$routeProvider.when("/teams/details/:id",{
		templateUrl: "view/team/detailTeam.html",
		controller: "detailsTeamCtrl",
		resolve:{
			team: function (teamAPI, $route) {
				return teamAPI.getTeam($route.current.params.id);
			}
		}
	});


});