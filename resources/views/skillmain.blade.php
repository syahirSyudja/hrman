@extends('layouts.main')

@section('title', 'HRM - Manage Skills')

@section('header')
    <h1 class="page-header">Add & Manage Skill Category</h1>
@endsection

@section('contents')
    <table class="table table-striped table-hover table-bordered tbl-manage">
        <thead>
            <tr>
                <th class="text-center numWidth">Id</th>
                <th>Skill Name</th>
                <th>Description</th>
                <th class="text-right actWidth"><a href="/skill/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($q_skill as $rec)
            <tr>
                <td class="text-center">{{ $rec->id }}</td>
                <td>{{ $rec->name }}</td>
                <td>{{ $rec->description, 0, 15 }}...</td>
                <td class="text-right">
                    {{ Form::open(['url' => '/skill/'.$rec->id, 'method' => 'DELETE']) }} 
                    {{ link_to('/skill/' . $rec->id . '/edit', 'Edit', ['class' => 'btn btn-warning']) }} 
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'method' => 'DELETE']) }} 
                    {{ Form::close() }} 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
