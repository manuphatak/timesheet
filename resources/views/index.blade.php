@extends('app')

@section('append.nav')
<div class="container-fluid time-entry">
    <div class="timepicker">
        <span class="timepicker-title label label-primary">Clock In</span>
        <timepicker ng-model="vm.clockIn" hour-step="1" minute-step="1"
                    show-meridian="true"></timepicker>
    </div>
    <div class="timepicker">
        <span class="timepicker-title label label-primary">Clock Out</span>
        <timepicker ng-model="vm.clockOut" hour-step="1" minute-step="1"
                    show-meridian="true"></timepicker>
    </div>
    <div class="time-entry-comment">
        <div class="navbar-form">
            <input class="form-control" ng-model="vm.comment"
                   placeholder="Enter a comment" />
            <button class="btn btn-primary"
                    ng-click="vm.logNewTime()">Log Time
            </button>
        </div>
    </div>
</div>

@stop

@section('content')
<div class="col-sm-8">
    <div class="well timeentry" ng-repeat="time in vm.timeentries">
        <div class="row">
            <div class="col-sm-8">
                <h4>
                    <span class="glyphicon glyphicon-user"></span>
                    @{{time.user_firstname}} @{{time.user_lastname}}
                </h4>

                <p>
                    <span class="glyphicon glyphicon-pencil"></span>
                    @{{time.comment}}
                </p>
            </div>
            <div class="col-sm-4 time-numbers">
                <h4><span class="glyphicon glyphicon-calendar"></span>
                    @{{time.end_time | date: 'mediumDate'}}
                </h4>

                <h2>
    <span class="label label-primary"
          ng-show="time.loggedTime.duration._data.hours > 0">
      @{{time.loggedTime.duration._data.hours}} hour<span ng-show="time.loggedTime.duration._data.hours > 1">s</span>
    </span>
                </h2>
                <h4><span class="label label-default">
    @{{time.loggedTime.duration._data.minutes}} minutes
  </span>

                </h4>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="well time-numbers">
        <h1><span class="glyphicon glyphicon-time"></span> Total Time</h1>

        <h1>
            <span class="label label-primary">@{{vm.totalTime.hours}} hours</span>
        </h1>

        <h3>
            <span class="label label-default">@{{vm.totalTime.minutes}} minutes</span>
        </h3>

    </div>
</div>
@stop


@section('footer')

@stop