@extends('layouts.main')

@section('title', 'HRM - Manage Division')

@section('header')
    <h1 class="page-header">Add & Manage Division</h1>
@endsection

@section('contents')
    <table class="table table-striped table-hover table-bordered tbl-manage">
        <thead>
            <tr>
                <th class="text-center numWidth">No.</th>
                <th>Division Name</th>
                <th>Description</th>
                <th class="text-right actWidth"><a href="/division/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($q_div as $rec)
                <tr>
                    <td class="text-center">{{ $rec->id }}</td>
                    <td>{{ $rec->name }}</td>
                    <td>{{ $rec->description, 0, 15 }}...</td>
                    <td class="text-right">
                        {{ Form::open(['url' => 'division/'.$rec->id, 'method' => 'DELETE']) }} 
                        {{ link_to('division/' . $rec->id . '/edit', 'Edit', ['class' => 'btn btn-warning']) }} 
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'method' => 'DELETE']) }} 
                        {{ Form::close() }} 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
