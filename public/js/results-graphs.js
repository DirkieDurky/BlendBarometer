const partOnePhysicalGraph = document.getElementById('partOnePhysical');
const partOneDataPhysical = JSON.parse(sessionStorage.getItem("partOneDataPhysical"));

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
const partOneDataOnline = JSON.parse(sessionStorage.getItem("partOneDataOnline"));

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

const partTwoGraph = document.getElementById('partTwo');
const partTwoData = JSON.parse(sessionStorage.getItem("partTwoData"));

new Chart(partTwoGraph, {
    type: 'bar',
    data: {
        labels: partTwoCategories.map(c => c.name),
        datasets: [{
                label: 'Punten gescoord',
                data: partTwoData,
            }
        ]
    },
    options: {
        responsive: true,
    }
});
