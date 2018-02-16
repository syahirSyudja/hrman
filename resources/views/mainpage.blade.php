@extends('layouts.main')

@section('title', 'Human Resource Management')

@section('header')
    <h1 class="page-header">Add & Manage Human Resource</h1>
@endsection

@section('contents')
    <table class="table table-striped table-hover table-bordered tbl-manage">
        <thead>
            <tr>
                <th class="text-center numWidth">No.</th>
                <th>Name</th>
                <th>Division</th>
                <th>Skill</th>
                <th class="text-right actWidth"><a href="/hr/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($q_employee as $employee)
                <tr>
                    <td class="text-center">{{ $employee->id }}</td>
                    <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                    <td>{{ $employee->division->name }}</td>
                    <td>{{ $employee->skill->name }}</td>
                    <td class="text-right">
                        {{ Form::open(['url' => '/hr/'.$employee->id, 'method' => 'DELETE']) }} 
                        {{ link_to('/hr/' . $employee->id, 'View', ['class' => 'btn btn-success']) }} 
                        {{ link_to('/hr/' . $employee->id . '/edit', 'Edit', ['class' => 'btn btn-warning']) }} 
                        {{ Form::button('', ['type' => 'submit', 'class' => 'btn btn-danger glyphicon glyphicon-trash', 'method' => 'DELETE']) }} 
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
