(function () {
  "use strict";

  angular.module('timeTracker').controller('TimeEntry', TimeEntry);

  function TimeEntry(time, user, $scope) {
    var vm = this;
    vm.timeentries = [];
    vm.totalTime = {};
    vm.users = [];

    vm.clockIn = new Date();
    vm.clockOut = new Date();

    getTimeEntries();

    getUsers();

    function getUsers() {
      user.getUsers().then(function (result) {
        vm.users = result;
      }, function (error) {
        console.log(error);
      });
    }

    function getTimeEntries() {
      time.getTime().then(function (results) {
        vm.timeentries = results;
        console.log(vm.timeentries);
        updateTotalTime(vm.timeentries);
      }, function (error) {
        console.log(error);
      });

      function updateTotalTime(timeentries) {
        vm.totalTime = time.getTotalTime(timeentries);
      }

      vm.logNewTime = function () {
        if (vm.clockOut < vm.clockIn) {
          alert("You can't clock out before you clock in!");
          return;
        }

        if (vm.clockOut - vm.clockIn === 0) {
          alert("Your time entry has to be greater than zero!");
          return;
        }

        vm.timeentries.push({
                              "user_id":        2,
                              "user_firstname": "Manu",
                              "user_lastname":  "Phatak",
                              "start_time":     vm.clockIn,
                              "end_time":       vm.clockOut,
                              "loggedTime":     time.getTimeDiff(vm.clockIn,
                                                                 vm.clockOut),
                              "comment":        vm.comment
                            });
        updateTotalTime(vm.timeentries);
        vm.comment = "";
      }
    }


  }
})();