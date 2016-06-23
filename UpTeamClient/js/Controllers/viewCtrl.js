angular.module("UpTeam").controller("viewCtrl", function($scope, $cookies, loginAPI){
  $scope.login = true;
  $scope.logout = function () {
    loginAPI.logOut().success(function (data) {
      location.assign("../index.html");
      }
    );
  };
  var formatDate = function (date) {
   var day = date.getDate();
   var month = date.getMonth();
   var year = date.getFullYear();
   return year + "-" + month + "-" + day;
 };
});
