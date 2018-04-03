@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header" style="font-size: 21px;">Edit name</div>
                <div class="card-body">
                    <form action="{{ route('todo.update', $todo->id) }}" method="post">
                         {{ csrf_field() }}
                         {{ method_field('PUT') }}
                      <div class="form-group">
                        <input type="text" style="font-size: 15px;" name="todo" value="{{ old('todo', $todo->todo) }} " class="form-control {{ $errors->has('todo') ? ' is-invalid' : '' }}">
                        @if($errors->has('todo'))
                        <span class="invalid-feedback">{{ $errors->first('todo') }} </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-secondary btn-block" style="width: 79px;">Edit name</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
