@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Task Listing</h1>
            <p><small>Manage your task listings. You can add, edit and delete your tasks.</small></p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal"><i
                    class="fa fa-plus"></i> Add Category</button>
            <a href="{{ route('tasks.create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                Task</a>


            <!-- profile picture -->
            <img src="lara.jpg" style="float:right;width:100px;height: 100px">

        </div>
    </div>

    <!-- Tasks Listing Table -->
    <div class="card my-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Manage Your Tasks
        </div>

        <div class="card-body">

            <!-- Search autocomplete using ajax or axios -->
            <div class="row">

                <form method="GET" action="{{ route('home') }}">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input name="search" class="form-control" type="search" placeholder="Search"
                                aria-label="Search" value="{{ request('search') }}">
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                        </div> --}}
                        <div class="col-md-4 form-group">
                            <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </form>


            </div>
            </br>
            <button type="button" style="float:right;" class="btn btn-success"
                onclick="window.location='{{ route('tasks.export') }}'">
                <i class="fa fa-list"></i> Export to Excel
            </button>

            <button type="button" id="deleteSelectedTasksButton" style="float:left;" class="btn btn-danger"
                data-toggle="modal" data-target="#confirmModal"><i class="fa fa-trash"></i> Delete</button>


            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Delete Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Are you sure you want to delete the selected tasks?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" id="confirmDeleteButton" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <form id="deleteTasksForm" method="POST" action="{{ route('tasks.bulkDelete') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="task_ids" id="task_ids">
            </form>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th width="90px">S No.</th>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Category Name</th>
                            <th>Task Image</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $index => $task)
                            <tr>
                                <td>
                                    <p><label><input type="checkbox" class="task-checkbox"
                                                data-id="{{ $task->id }}" /><span></span></label></p>
                                </td>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $task->taskname }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($task->startdate)->format('F j, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($task->enddate)->format('F j, Y') }}</td>
                                <td>{{ $task->category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $task->image) }}" style="width:70px;height:70px;">
                                </td>
                                <td><a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-success"><i
                                            class="fa fa-edit"></i> Edit Task</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="categoryForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="catname">Category Name</label>
                            <input type="text" class="form-control" name="name"
                                placeholder="Enter Name of Category" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Type some details about the task"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ URL::asset('js/custome.js') }}"></script>
@endpush
