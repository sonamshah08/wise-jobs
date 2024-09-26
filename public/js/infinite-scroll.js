document.addEventListener('DOMContentLoaded', function () {
    window.page = 2; // Initialize page number
    window.hasMorePages = true; // Flag to check if more pages are available
    window.filters = {}; // Global filters object
    let loading = false;
    const jobList = document.getElementById('job-list');
    const loadingIndicator = document.getElementById('loading');

    // Load jobs based on page and filters
    function loadJobs() {
        if (loading || !window.hasMorePages) return;
        loading = true;
        loadingIndicator.style.display = 'block';

        const params = new URLSearchParams();
        params.append('page', window.page);
        Object.entries(window.filters).forEach(([key, value]) => {
            if (value) params.append(key, value);
        });

        fetch('/jobs?' + params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.html) {
                // Append the new jobs to the job list
                jobList.insertAdjacentHTML('beforeend', data.html);
                window.hasMorePages = !!data.next_page;
                window.page++;
            } else {
                window.hasMorePages = false;
            }

            loadingIndicator.style.display = 'none';
            loading = false;
        })
        .catch(error => {
            console.error('Error loading more jobs:', error);
            loadingIndicator.style.display = 'none';
            loading = false;
        });
    }

    // Infinite scroll functionality
    function handleScroll() {
        const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
        if (scrollTop + clientHeight >= scrollHeight - 50) {
            loadJobs();
        }
    }

    // Trigger loading on scroll
    window.addEventListener('scroll', handleScroll);
});
