const partOnePhysicalGraph = document.getElementById('partOnePhysical');

new Chart(partOnePhysicalGraph, {
    type: 'bar',
    data: {
        labels: partOneCategories.map(c => c.name),
        datasets: [{
            label: 'Punten gescoord',
            data: partOneDataPhysical,
        }
        ]
    },
    options: {
        responsive: true,
    }
});

const partOneOnlineGraph = document.getElementById('partOneOnline');

new Chart(partOneOnlineGraph, {
    type: 'bar',
    data: {
        labels: partOneCategories.map(c => c.name),
        datasets: [{
            label: 'Punten gescoord',
            data: partOneDataOnline,
        }
        ]
    },
    options: {
        responsive: true,
    }
});

const partOneGraph = document.getElementById('partOne');

new Chart(partOneGraph, {
    type: 'radar',
    data: {
        labels: partOneCategories.map(c => c.name),
        datasets: [{
            label: 'Fysieke leeractiviteiten',
            data: partOneDataPhysical,
        },
        {
            label: 'Online leeractiviteiten',
            data: partOneDataOnline,
        }
        ]
    },
    options: {
        responsive: true,
    }
});

const partTwoDataAsArray = [];
const partTwoGraph = document.getElementById('partTwo');
Object.keys(partTwoData).forEach(function (category) {
    // Sum the answers of each category
    partTwoDataAsArray.push(partTwoData[category].reduce((partialSum, a) => partialSum + Number(a), 0));
});

new Chart(partTwoGraph, {
    type: 'bar',
    data: {
        labels: partTwoCategories.map(c => c.name),
        datasets: [{
            label: 'Punten gescoord',
            data: partTwoDataAsArray,
        }
        ]
    },
    options: {
        responsive: true,
    }
});
