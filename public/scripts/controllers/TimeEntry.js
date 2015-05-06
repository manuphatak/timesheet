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
        updateTotalTime(vm.timeentries);
        console.log(vm.timeentries);
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
        time.saveTime({
                        "user_id":    vm.timeEntryUser.id,
                        "start_time": vm.clockIn,
                        "end_time":   vm.clockOut,
                        "comment":    vm.comment
                      }).then(function (success) {
          getTimeEntries();
          console.log(success);
        }, function (error) {
          console.log(error);
        });
        getTimeEntries();

        vm.clockIn = moment();
        vm.clockOut = moment();


        vm.comment = "";
        vm.timeEntryUser = "";
      }
    }


  }
})();