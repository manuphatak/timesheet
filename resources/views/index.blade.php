@extends('app')

@section('append.nav')
    <div class="container time-entry">
        <div class="timepicker">
            <span class="timepicker-title label label-primary">Clock In</span>
            <timepicker ng-model="vm.clockIn"
                        hour-step="1"
                        minute-step="1"
                        show-meridian="true"></timepicker>
        </div>
        <div class="timepicker">
            <span class="timepicker-title label label-primary">Clock Out</span>
            <timepicker ng-model="vm.clockOut"
                        hour-step="1"
                        minute-step="1"
                        show-meridian="true"></timepicker>
        </div>
        <div class="time-entry-comment">
            <div class="navbar-form">
                <select name="user"
                        class="form-control"
                        ng-model="vm.timeEntryUser"
                        ng-options="user.first_name + ' ' + user.last_name for user in vm.users">
                    <option value="">-- Select a user --</option>
                </select>
                <input class="form-control"
                       ng-model="vm.comment"
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
        <div class="well vm"
             ng-repeat="time in vm.timeentries">
            <div class="row">
                <div class="col-sm-8">
                    <h4>
                        <span class="glyphicon glyphicon-user"></span>
                        @{{time.user.first_name}} @{{time.user.last_name}}
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

                    <h2><span class="label label-primary"
                              ng-show="time.loggedTime.duration._data.hours > 0">@{{time.loggedTime.duration._data.hours}}
                            hour<span ng-show="time.loggedTime.duration._data.hours > 1">s</span></span>
                    </h2>
                    <h4><span class="label label-default">@{{time.loggedTime.duration._data.minutes}}
                            minutes</span>

                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-xs"
                            ng-click="showEditDialog = true">
                        Edit
                    </button>
                    <button class="btn btn-default btn-xs"
                            ng-click="vm.deleteTimeEntry(time)">
                        Delete
                    </button>
                </div>
            </div>
            <div class="row edit-time-entry"
                 ng-show="showEditDialog===true">
                <h4>Edit Time Entry</h4>

                <div class="time-entry">
                    <div class="timepicker">
                        <span class="timepicker-title label label-primary">Clock In</span>
                        <timepicker ng-model="time.start_time"
                                    hour-step="1"
                                    minute-step="1"
                                    show-meridian="true"></timepicker>
                    </div>
                    <div class="timepicker">
                        <span class="timepicker-title label label-primary">Clock Out</span>
                        <timepicker ng-model="time.end_time"
                                    hour-step="1"
                                    minute-step="1"
                                    show-meridian="true"></timepicker>
                        <input ng-model="time.end_time" type="text">
                    </div>
                </div>
                <div class="col-sm-6">
                    <h5>User</h5>
                    <select name="user"
                            class="form-control"
                            ng-model="time.user"
                            ng-options="user.first_name + ' ' + user.last_name for user in vm.users track by user.id">
                        <option value="user.id"></option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <h5>Comment</h5>
                    <textarea class="form-control"
                              ng-model="time.comment">@{{time.comment}}</textarea>
                </div>
                <div class="edit-controls">
                    <button class="btn btn-primary btn-sm"
                            ng-click="vm.updateTimeEntry(time)">Save
                    </button>
                    <button class="btn btn-danger btn-sm"
                            ng-click="showEditDialog = false">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well time-numbers">
            <h1><span class="glyphicon glyphicon-time"></span> Total Time</h1>

            <h1>
            <span class="label label-primary">@{{vm.totalTime.hours}}
                hours</span>
            </h1>

            <h3>
            <span class="label label-default">@{{vm.totalTime.minutes}}
                minutes</span>
            </h3>

        </div>
    </div>
@stop


@section('footer')

@stop