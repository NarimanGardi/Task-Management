@extends('backend.app')
@section('title', __('Dashboard'))
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard {{ Auth()->user()->name }}</h4>
        </div>
    </div>
</div>
@endsection
