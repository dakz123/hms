@extends('layouts.app')
@section('title','About Us')

{{$message}}
{{$amount}}
<ul>
@foreach($friuts as $fruit)
<li>{{$fruit}}</li>

@endforeach
</ul>
@if(1==0)
<li>yes</li>
@else
<li>no</li>
@endif