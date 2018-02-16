@extends('layouts.main')

@section('title', 'Add Form - Skill')

@section('header')
    <h1 class="page-header">Division Informations</h1>
@endsection

@section('contents')
    {{ isset($division->id) ? Form::open(['action' => ['DivisionController@update', $division->id], 'method' => 'PUT']) : Form::open(['url' => 'division', 'method' => 'POST']) }}
        <div class="form-group form-group-lg row">
            <div class="col-xs-4">
                {{ Form::label('name', 'Division Name') }}
                {{ Form::text('name', isset($division) ? $division->name : null, ['placeholder' => 'Division Name', 'class' => 'form-control'] ) }}
                {{ $errors->first('name') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-6">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', isset($division) ? $division->description : null, ['placeholder' => 'Describe here...','rows' => '5', 'class' => 'form-control'] ) }}
                {{ $errors->first('description') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-4">
                {{ Form::label('divstat', 'Status') }}
                {{ Form::select('is_active', ['1' => 'Active', '0' => 'Not Active'], isset($division) ? $division->is_active : null, ['class' => 'form-control','id' => 'divstat' , 'placeholder' => 'Is Active ?']) }}
                {{ $errors->first('is_active') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-5">
                <button type="reset" name="reset" class="btn btn-danger btn-lg">Reset</button>
                <a href="/division" class="btn btn-default btn-lg">Cancel</a>
                {{ Form::submit(isset($division) ? 'Update' : 'Submit', ['class' => 'btn btn-lg btn-primary']) }}
            </div>
        </div>
    {{ Form::close() }}
@endsection