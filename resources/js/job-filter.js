document.addEventListener('alpine:init', () => {
    Alpine.data('jobFilter', () => ({
        position_type: '',
        salary: '',
        company: '',
        location: '',
        async filterJobs() {
            try {
                const response = await fetch(`/jobs?position_type=${this.position_type}&salary=${this.salary}&company=${this.company}&location=${this.location}&page=1`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }

                const data = await response.json();

                // Update job list with new data
                document.getElementById('job-list').innerHTML = data.html;

                // Reset global variables for infinite scroll
                window.page = 2;
                window.hasMorePages = data.next_page ? true : false;
                window.filters = {
                    position_type: this.position_type,
                    salary: this.salary,
                    company: this.company,
                    location: this.location
                };

            } catch (error) {
                console.error('Error loading jobs:', error);
            }
        }
    }));
});
