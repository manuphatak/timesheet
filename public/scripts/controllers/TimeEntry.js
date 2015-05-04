(function () {
  "use strict";
  angular.module('timeTracker').controller('TimeEntry', TimeEntry);

  function TimeEntry($time) {
    var vm = $this;
    vm.timeentries = [];
  }
})();