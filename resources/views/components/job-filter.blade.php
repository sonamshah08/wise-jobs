<!-- resources/views/components/job-filter.blade.php -->
<form x-data="jobFilter()" @submit.prevent="filterJobs" class="mb-4 job-filter">
    <div class="row">
        <!-- Position Type -->
        <div class="col-md-3">
            <select x-model="position_type" id="position_type" class="form-select">
                <option value="">Position Type</option>
                <option value="remote">Remote</option>
                <option value="onsite">On site</option>
                <option value="hybrid">Hybrid</option>
            </select>
        </div>

        <!-- Salary -->
        <div class="col-md-2">
            <input type="number" x-model="salary" id="salary" class="form-control" placeholder="Salary">
        </div>

        <!-- Company -->
        <div class="col-md-2">
            <input type="text" x-model="company" id="company" class="form-control" placeholder="Company Name">
        </div>

        <!-- Location -->
        <div class="col-md-2">
            <input type="text" x-model="location" id="location" class="form-control" placeholder="City or State">
        </div>

        <div class="col-md-1">
        <button type="submit" class="btn btn-primary">Search</button>
        </div>


    </div>

</form>


@push('scripts')
    <script src="{{ asset('js/job-filter.js') }}"></script>
@endpush
