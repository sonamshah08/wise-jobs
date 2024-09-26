@foreach($jobs as $job)
    <div class="col-md-6 mb-3">
        <x-job-card :job="$job"></x-job-card>
    </div>
@endforeach
