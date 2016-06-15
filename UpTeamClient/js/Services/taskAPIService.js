angular.module("UpTeam").factory ("taskAPI",function($http, config){
	var _getTasks = function(){
		return $http.get(config.baseUrl + "task/?id=&name="   
			+ "&description="  
			+ "&estimate=" 
			+ "&difficulty=" 
			+ "&owner=1" 
			+ "&createdBy=" 
			+ "&state=" 
			+ "&project=" 
			+ "&createdOn=" )
	};

	var _setTask = function(task){
		return $http.post(config.baseUrl + "task/?id=&name=" + task.name
			+ "&description='"  + task.description
			+ "'&estimate=" + task.estimate
			+ "&difficulty=" + task.difficulty
			+ "&owner=" + task.owner 
			+ "&createdBy=1"
			+ "&state=" + task.state
			+ "&project=" + task.project
			)
	};
	var _getTask = function(id){
		return $http.get(config.baseUrl + "task/?id=" + id)
	};
	var _updateTask = function (task) {
		return $http.put(config.baseUrl + "task/?id=" + task.Id 
			+ "&name=" + task.name
			+ "&description="  + task.description
			+ "&estimate=" + task.estimate
			+ "&difficulty=" + task.difficulty
			+ "&owner=" + task.owner 
			+ "&state=" + task.state)	
	};
	var _getDate = function () {
		var yyyy = today.getYear();
		if(dd<10){
			dd='0'+dd
		} 
		if(mm<10){
			mm='0'+mm
		} 
		var today = dd+'/'+mm+'/'+yyyy;
		return today;
	}
	return {
		getTasks: _getTasks,
		setTask: _setTask,
		getTask: _getTask,
		updateTask: _updateTask
	};
});