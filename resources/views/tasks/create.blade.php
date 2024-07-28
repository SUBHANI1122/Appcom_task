@extends('layouts.app')
@section('title')
    @lang('Create Task')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Task</h4>
                    <form  action="{{route($route.'.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        @include($route.'.form')
                    </form>
                </div>
            </div>
        </div> 
    </div>
@endsection