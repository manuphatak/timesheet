(function () {
  'use strict';
  angular.module('timeTracker').factory('time', time);

  function time($resource) {
    var Time = $resource('data/time.json');

    function getTime() {
      return Time.query().$promise.then(
        function (results) {
          return results;
        }, function (error) {
          console.log(error);
        })
    }

    return {
      getTime: getTime
    }
  }
})();