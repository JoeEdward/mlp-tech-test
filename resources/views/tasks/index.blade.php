@extends('layouts.app')

@section('title', 'Todo')

@section('content')
    <div class="row">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        @error('error')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="row">
        <div class="col-lg-4 cols-12 mb-2">
            <form class="d-flex flex-column gap-2" action="{{route('tasks.store')}}" method="post">
                @csrf

                <input value="{{old('name')}}" name="name" class="form-control" placeholder="Insert task name">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>

        <div class="col-lg-8 cols-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Task</td>
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tasks as $task)
                                <tr style="text-decoration-thickness: 2px !important;" class="{{ $task->is_complete ? 'text-decoration-line-through' : '' }}">
                                    <td>
                                        {{ $task->id  }}
                                    </td>
                                    <td>
                                        {{ $task->name }}
                                    </td>
                                    <td>
                                        @if(!$task->is_complete)
                                            <div class="d-flex gap-1 justify-content-end">
                                                <form action="{{ route('tasks.complete', ['task' => $task]) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-success">&#10003;</button>
                                                </form>
                                                <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-danger">&#10005</button>
                                                </form>
                                            </div>

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
