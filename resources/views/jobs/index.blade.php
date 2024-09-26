@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Job Filters -->
        <x-job-filter></x-job-filter>

        <!-- Job Listings -->
        <div id="job-list" class="row g-3">
            @foreach($jobs as $job)
                <div class="col-md-6 mb-3">
                    <x-job-card :job="$job"></x-job-card>
                </div>
            @endforeach
        </div>

        <!-- Loading Spinner -->
        <div id="loading" class="text-center my-4" style="display: none;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
   @vite(['resources/js/infinite-scroll.js', 'resources/js/job-filter.js'])

@endpush

