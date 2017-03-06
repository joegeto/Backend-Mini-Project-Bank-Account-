@extends('layouts.default')
@section('content')
    <head>
        <title>A/C Balance</title>
        <link rel="stylesheet" href="css/myapp.css">
    </head>
    <body>
    <div  class="container">
        <h1>Balance</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Nerd Level</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($attends as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->attend_level }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@stop