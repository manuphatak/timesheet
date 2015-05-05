<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
    <title>Time Tracker</title>
</head>
<body ng-app="timeTracker" ng-controller="TimeEntry as vm">
@include('partials.nav')

<div class="container">
    @yield('content')
</div>

@include('partials.scripts')
</body>
</html>