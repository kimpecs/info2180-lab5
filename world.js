document.addEventListener('DOMContentLoaded', function () {
    const lookupButton = document.getElementById('lookup');
    const lookupCitiesButton = document.getElementById('lookupCities'); 
    const countryInput = document.getElementById('country');
    const resultDiv = document.getElementById('result');

    lookupButton.addEventListener('click', function () {
        const country = countryInput.value.trim();

        if (country !== '') {
            const url = `world.php?country=${encodeURIComponent(country)}`;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    resultDiv.innerHTML = data;
                })
                .catch(error => {
                    console.error('There was an error fetching the data:', error);
                    resultDiv.innerHTML = 'An error occurred. Please try again.';
                });
        } else {
            resultDiv.innerHTML = 'Please enter a country name.';
        }
    });

    lookupCitiesButton.addEventListener('click', function () {
        const country = countryInput.value.trim();

        if (country !== '') {
            const url = `world.php?country=${encodeURIComponent(country)}&lookup=cities`; 

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    resultDiv.innerHTML = data;
                })
                .catch(error => {
                    console.error('There was an error fetching the data:', error);
                    resultDiv.innerHTML = 'An error occurred. Please try again.';
                });
        } else {
            resultDiv.innerHTML = 'Please enter a country name.';
        }
    });
});
