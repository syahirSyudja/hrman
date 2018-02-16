@extends('layouts.main')

@section('title', 'Add Form - HRM')

@section('header')
    <h1 class="page-header">Employee Informations</h1>
@endsection

@section('contents')
    {{ isset($employee->id) ? Form::open(['action' => ['MainController@update', $employee->id], 'method' => 'PUT', 'files' => true]) : Form::open(['url' => '/hr', 'method' => 'POST', 'files' => true]) }}
        <div class="form-group form-group-lg row">
            <div class="col-xs-4">
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', isset($employee) ? $employee->first_name : null, ['class' => 'form-control', 'placeholder' => 'Employee First Name']) }}
                {{ $errors->first('first_name') }}
            </div>
            <div class="col-xs-4">
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', isset($employee) ? $employee->last_name : null, ['class' => 'form-control', 'placeholder' => 'Employee Last Name']) }}
                {{ $errors->first('last_name') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-5">
                {{ Form::label('profile', 'Profile') }}
                {{ Form::text('profile', isset($employee) ? $employee->profile : null, ['class' => 'form-control', 'placeholder' => 'About Employee, Profile']) }}
                {{ $errors->first('profile') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-5">
                {{ Form::label('photo', 'Photo') }}
                {{ Form::file('photo', ['class' => 'form-control']) }}
                {{ $errors->first('photo') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-4">
                {{ Form::label('id', 'Skill') }}
                {{ Form::select('skill_id', $skill, isset($employee) ? $employee->skill_id : null, ['class' => 'form-control','id' => 'id' , 'placeholder' => 'Please Select One']) }}
                {{ $errors->first('skill_id') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-5">
                {{ Form::label('id', 'Division') }}
                {{ Form::select('division_id', $division, isset($employee) ? $employee->division_id : null, ['class' => 'form-control','id' => 'id' , 'placeholder' => 'Please Select One']) }}
                {{ $errors->first('division_id') }}
                <br>
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-5">
                <button type="reset" name="reset" class="btn btn-danger btn-lg">Reset</button>
                <a href="/" class="btn btn-default btn-lg">Cancel</a>
                {{ Form::submit(isset($employee) ? 'Update' : 'Submit', ['class' => 'btn btn-lg btn-primary']) }}
            </div>
        </div>
    {{ Form::close() }}
@endsection