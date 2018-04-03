@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('success'))
            <div class="alert alert-success" style="font-size: 14px;">{{ Session::get('success') }} </div>
            @endif

            @if(Session::has('warning'))
            <div class="alert alert-warning">{{ Session::get('warning') }} </div>
            @endif

            <div class="card" style="margin-top: 174px;">
                <div class="card-header" style="font-size: 15px;">Create employee name</div>
                <div class="card-body" style="background-color: beige;">
                    <form action="{{ route('todo.store') }}" method="post">
                         {{ csrf_field() }}
                      <div class="form-group">
                        <input type="text" name="todo" value="{{ old('todo') }} " class="form-control {{ $errors->has('todo') ? ' is-invalid' : '' }}" style="font-size: 1.9rem;" placeholder="Enter the employee name here">
                        @if($errors->has('todo'))
                        <span class="invalid-feedback">{{ $errors->first('todo') }} </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-secondary btn-block">&#10010;</button>
                    </form>
                </div>
            </div>
    <table class="table table-bordered table-responsive" style="margin-top: 10px; background-color: beige;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created at</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->title }}
                <p>{{ $todo->todo }}</p>
                </td>
                <td>{{ $todo->created_at }}<br>
                <small>{{ $todo->created_at->diffForHumans() }}</small>
                </td>
                <td>
                        <form action="{{ route('todo.delete', $todo->id) }} " method="post">

                        <p>
                        <a href="{{ Route('todo.edit', $todo->id)}} " class="btn btn-secondary btn-sm" style="font-size: 14px;">Edit</a>
                    
                          {{ csrf_field() }}
                          {{ method_field("DELETE") }}
                          <button type="submit" class="btn btn-danger btn-sm" style="font-size: 14px;">Delete</button>
                        </form> 
                        </p><hr>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>