(function () {
  'use strict';
  angular.module('timeTracker').factory('time', time);

  function time($resource) {
    var Time = $resource('data/time.json');
    return {}
  }
})();