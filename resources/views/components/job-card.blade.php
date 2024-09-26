<div class="job-card">
    <a href="{{ route('jobs.show', $job->id) }}" class="job-card-link">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $job->position }} </h5>
                <p class="card-text">Company: {{ $job->company->name }}</p>
                <p class="card-text">{{ $job->description }}</p>
                <p class="card-text"><small class="text-muted">Location: {{ $job->location }}</small></p>
                <p class="card-text"><small class="text-muted">Salary: ${{ $job->salary }}</small></p>
                <p class="card-text"><small class="text-muted">{{ $job->type }}</small></p>
            </div>
        </div>
    </a>
</div>


