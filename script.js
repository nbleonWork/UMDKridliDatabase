//script.js
document.addEventListener('DOMContentLoaded', function () {
    const searchButton = document.getElementById('search-button');
    const nameInput = document.getElementById('name');
    const degreeInput = document.getElementById('degree');
    const yearInput = document.getElementById('year');
    const semesterInput = document.getElementById('semester');
    const resultsDiv = document.getElementById('results');

    // Function to populate years dynamically
    function populateYears() {
        const currentYear = new Date().getFullYear();
        const startYear = 2000; // Specify the starting year as needed
        for (let year = currentYear; year >= startYear; year--) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearInput.appendChild(option);
        }
    }

    // Call the function to populate years when the page loads
    populateYears();

    searchButton.addEventListener('click', function () {
        const searchParams = {
            name: nameInput.value,
            degree: degreeInput.value,
            year: yearInput.value,
            semester: semesterInput.value
        };

        // Simulating AJAX request and displaying results
        const dummyResults = [
            { name: 'John Doe', degree: 'Computer Science', year: '2016', semester: 'Spring', photo: 'john.jpg' },
            { name: 'Jane Smith', degree: 'Electrical Engineering', year: '2018', semester: 'Fall', photo: 'jane.jpg' }
            // Add more dummy results
        ];

        resultsDiv.innerHTML = ''; // Clear previous results

        dummyResults.forEach(result => {
            const graduateDiv = document.createElement('div');
            graduateDiv.classList.add('graduate');
            graduateDiv.innerHTML = `
                <h2>${result.name}</h2>
                <p>Degree: ${result.degree}</p>
                <p>Year: ${result.year} - ${result.semester}</p>
                <img src="${result.photo}" alt="${result.name} Photo">
                <!-- Add more details as needed -->
            `;
            resultsDiv.appendChild(graduateDiv);
        });
    });
});
