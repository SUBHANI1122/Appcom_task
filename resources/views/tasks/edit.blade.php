@extends('layouts.app')
@section('title')
@lang('Edit Task')
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Task</h4>
                <form action="{{ route($route.'.update', ['task' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include($route.'.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection