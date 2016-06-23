 angular.module("UpTeam").controller("loginCtrl", function($scope, $cookies, loginAPI, rolesAPI, userAPI){
   $scope.login = true;
   $scope.signIn = function (user) {
     loginAPI.signIn(user).success(function (data) {
       if (data["isLogged"]) {
         $cookies.put("isLogged",true);
         $cookies.put("user", data);
         location.assign("view/index.html");
       }else {
         swal('Oops', "Your E-mail or password is invalid...", 'error');
         delete $scope.user;
       }
     });
   };
   var formatDate = function (date) {
		var day = date.getDate();
		var month = date.getMonth();
		var year = date.getFullYear();
		return year + "-" + month + "-" + day;
	}
   $scope.register = function (user) {
     user.birthday = formatDate(user.birthday);
     userAPI.setUser(user).success(function(data){
       swal('Congrats','Successfuly Sign Up!', 'success');
       $scope.login = true;
     });
   };
   $scope.showRegister = function () {
     $scope.login = false;
     rolesAPI.getRoles().success(function (data) {
       $scope.roles = data;
     });
   }
 });
