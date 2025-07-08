@extends('layouts.app')

@section('title', 'Todo')

@section('content')
    <div class="row">
        <div class="col-4">
            <form class="d-flex flex-column gap-2">
                <input class="form-control" placeholder="Insert task name">
                <button type="submit" class="btn btn-primary w-100">Add</button>
            </form>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Task</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>
                                        {{ $task->id  }}
                                    </td>
                                    <td>
                                        {{ $task->name }}
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
