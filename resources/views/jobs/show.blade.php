<!-- resources/views/job-detail.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container job-detail-container">
    <div class="job-details">
        <h1 class="job-title">{{ $job->position }}</h1>
        <div class="company-info">
            <h2 class="company-name">{{ $job->company->name }}</h2>
            <p class="location">{{ $job->location }}</p>
        </div>
        <div class="job-description">
            <h3 class="section-title">Job Description</h3>
            <p class="description-text">{{ $job->description }}</p>
        </div>
        <div class="job-requirements">
            <h3 class="section-title">Preferred Skills</h3>
            <p class="requirements-text">{{ $job->preferred_skills }}</p>
        </div>
        <div class="job-benefits">
            <h3 class="section-title">Mandatory Skills</h3>
            <p class="benefits-text">{{ $job->mandatory_skills }}</p>
        </div>
    </div>
    <div class="apply-now">
        <h3 class="apply-title">Apply Now</h3>
        <p>Please, let {{ $job->company->name }}  know you found this job on Wise Publishing. This helps us grow</p>
        <a href="#" class="btn btn-primary">Apply Now</a>
    </div>
</div>
@endsection
