@extends('layouts.main')

@section('title', 'Details - HRM')

@section('header')
    <h1 class="page-header">Employee Informations</h1>
@endsection

@section('contents')
    <div class="row">
        <div class="col-xs-4">
            <img src="/employee/{{ $employee->photo }}" alt="Employee's Photo" width="255" class="img-rounded">
        </div>
        <div class="col-xs-3">
            <h4><strong>Name</strong></h4>
            <h4 class="well well-sm">{{ $employee->first_name . ' ' . $employee->last_name }}</h4>
            <h4><strong>Employee's Skill</strong></h4>
            <h4 class="well well-sm">{{ $employee->skill->name }}</h4>
        </div>
        <div class="col-xs-5">
            <h4><strong>Profile</strong></h4>
            <h4 class="well well-sm">{{ $employee->profile }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <a href="/hr" class="btn btn-warning btn-lg">Back</a>
        </div>
        <div class="col-xs-4">
            <h4><strong>Division</strong></h4>
            <h4 class="well well-sm">{{ $employee->division->name }}</h4>
        </div>
    </div>
    <br>
    <div class="form-group form-group-lg row">
        <div class="col-xs-5">
        </div>
    </div>
@endsection