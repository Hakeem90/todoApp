@extends('layout.master')

@section('content')
    <div class="row mt-5">

        <div class="col-md-6">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @else
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header">
                    Add Task
                </div>
                <div class="card-body">
                    <form action="{{ route('task.create') }}" method="post">
                        @csrf


                        <div class="form-group">
                            <label for="task">Task</label>
                            <input type="text" name="task" id="task" placeholder="Task"
                                class="form-control {{ $errors->has('task') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{ $errors->has('task') ? $errors->first('task') : '' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

    <div class="row mt-5">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    View Tasks
                </div>
                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($tasks as $task)
                            <tr>

                                <td>{{ $task->task }}</td>
                                {{-- <td><a href="{{ route('task.delete', $task->id) }}"><button
                                            class="btn btn-danger btn-sm">Delete</button></a></td> --}}

                                            <td><a href="{{ route('task.delete', $task->id) }}"><button
                                            class="btn btn-danger btn-sm">Delete</button></a></td>

                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>

        </div>

    </div>
@endsection
