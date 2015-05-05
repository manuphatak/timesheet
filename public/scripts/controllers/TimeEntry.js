(function () {
  "use strict";
  angular.module('timeTracker').controller('TimeEntry', TimeEntry);

  function TimeEntry(time) {
    var vm = this;
    vm.timeentries = [];

    time.getTime().then(
      function (results) {
        vm.timeentries = results;
        console.log(vm.timeentries);
      }, function (error) {
        console.log(error);
      })
  }
})();