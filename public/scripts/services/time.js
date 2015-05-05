(function () {
  'use strict';
  angular.module('timeTracker').factory('time', time);

  function time($resource) {
    var Time = $resource('api/time/:id', {}, {
      update: {
        method: 'PUT'
      }
    });

    function getTime() {
      return Time.query().$promise.then(function (results) {
        angular.forEach(results, function (result) {
          result.loggedTime = getTimeDiff(result.start_time, result.end_time);
        });
        return results;
      }, function (error) {
        console.log(error);
      });
    }

    function getTimeDiff(start_time, end_time) {
      var diff = moment(end_time).diff(moment(start_time));
      var duration = moment.duration(diff);
      return {
        duration: duration
      }
    }

    function getTotalTime(timeentries) {
      var totalMilliseconds = 0;
      angular.forEach(timeentries, function (key) {
        totalMilliseconds += key.loggedTime.duration._milliseconds;
      });
      return {
        hours:   Math.floor(moment.duration(totalMilliseconds).asHours()),
        minutes: moment.duration(totalMilliseconds).minutes()
      }
    }

    function saveTime(data) {
      return Time.save(data).$promise.then(function (success) {
        console.log(success);
      }, function (error) {
        console.log(error);
      });
    }

    return {
      getTime:      getTime,
      getTimeDiff:  getTimeDiff,
      getTotalTime: getTotalTime,
      saveTime:     saveTime
    }
  }
})();