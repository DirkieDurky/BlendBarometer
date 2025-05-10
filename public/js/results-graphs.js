const lessonLevelPhysicalGraph = document.getElementById('lessonLevelPhysical');

new Chart(lessonLevelPhysicalGraph, {
    type: 'bar',
    data: {
        labels: lessonLevelSubcategories.map(c => c.name),
        datasets: [{
            label: 'Punten gescoord',
            data: lessonLevelDataPhysical,
        }
        ]
    },
    options: {
        responsive: true,
    }
});

const lessonLevelOnlineGraph = document.getElementById('lessonLevelOnline');

new Chart(lessonLevelOnlineGraph,{
    type: 'bar',
    data: {
        labels: lessonLevelSubcategories.map(c => c.name),
        datasets: [{
            label: 'Punten gescoord',
            data: lessonLevelDataOnline,
        }
        ]
    },
    options: {
        responsive: true,
        animation: {
            onComplete: function () {
                const base64Image = this.toBase64Image();
                console.log(base64Image);  // Log the base64 string

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Send the image to the backend with the CSRF token
                fetch('/SaveChart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Include the CSRF token
                },
                body: JSON.stringify({ image: base64Image })
                }).then(response => {
                console.log('Image sent to server');
                }).catch(error => {
                console.log('Error:', error);
                });
            }
        },
    }
});

const lessonLevelGraph = document.getElementById('lessonLevel');

new Chart(lessonLevelGraph, {
    type: 'radar',
    data: {
        labels: lessonLevelSubcategories.map(c => c.name),
        datasets: [{
            label: 'Fysieke leeractiviteiten',
            data: lessonLevelDataPhysical,
        },
        {
            label: 'Online leeractiviteiten',
            data: lessonLevelDataOnline,
        }
        ]
    },
    options: {
        responsive: true,
        scale: {
            r: {
                min: 0,
            }
        }
    }
});

const moduleLevelGraph = document.getElementById('moduleLevel');
const moduleLevelDataAsArray = [];

Object.keys(moduleLevelData).forEach(function (category) {
    // Sum the answers of each category
    let sum = 0;
    Object.keys(moduleLevelData[category]).forEach(function (key) {
        sum += parseInt(moduleLevelData[category][key]);
    });
    moduleLevelDataAsArray.push(sum);
});

new Chart(moduleLevelGraph, {
    type: 'bar',
    data: {
        labels: moduleLevelCategories.map(c => c.name),
        datasets: [{
            label: 'Punten gescoord',
            data: moduleLevelDataAsArray,
        }
        ]
    },
    options: {
        responsive: true,
    }
});
