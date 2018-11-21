@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="5" rows="12">
    <twitter :initial-tweets="{{ json_encode($initialTweets) }}" position="a1:a12"></twitter>
    <uptime position="a1:a12"></uptime>
    <time-weather position="b1:b3" date-format="ddd DD/MM" time-zone="Asia/Jakarta" weather-city="Padang"></time-weather>
    <music position="d1:d3"></music>
    <calendar position="e1:e12"></calendar>
    <piket position="b8:b12"></piket>
    <announce position="c8:d12"></announce>
    <regulation position="b4:d7"></regulation>
    <hearable position="c1:c3"></hearable>
</dashboard>

@endsection
