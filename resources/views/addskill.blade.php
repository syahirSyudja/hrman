@extends('layouts.main')

@section('title', 'Add Form - Skill')

@section('header')
    <h1 class="page-header">Skill Informations</h1>
@endsection

@section('contents')
    {{ isset($skill->id) ? Form::open(['action' => ['SkillController@update', $skill->id], 'method' => 'PUT']) : Form::open(['url' => 'skill', 'method' => 'POST']) }}
        <div class="form-group form-group-lg row">
            <div class="col-xs-4">
                {{ Form::label('name', 'Skill Name') }}
                {{ Form::text('name', isset($skill) ? $skill->name : null, ['placeholder' => 'Skill Name', 'class' => 'form-control'] ) }}
                {{ $errors->first('name') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-6">
                {{ Form::label('skilldesc', 'Description') }}
                {{ Form::textarea('description', isset($skill) ? $skill->description : null, ['placeholder' => 'Describe here...', 'rows' => '5', 'id' => 'skilldesc', 'class' => 'form-control'] ) }}
                {{ $errors->first('description') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-4">
                {{ Form::label('skillstat', 'Status') }}
                {{ Form::select('is_active', ['1' => 'Active', '0' => 'Not Active'], isset($skill) ? $skill->is_active : null, ['class' => 'form-control','id' => 'skillstat' , 'placeholder' => 'Is Active ?']) }}
                {{ $errors->first('is_active') }}
            </div>
        </div>
        <div class="form-group form-group-lg row">
            <div class="col-xs-5">
                <button type="reset" name="reset" class="btn btn-danger btn-lg">Reset</button>
                <a href="/skill" class="btn btn-default btn-lg">Cancel</a>
                {{ Form::submit(isset($skill) ? 'Update' : 'Submit', ['class' => 'btn btn-lg btn-primary']) }}
            </div>
        </div>
    {{ Form::close() }}
@endsection