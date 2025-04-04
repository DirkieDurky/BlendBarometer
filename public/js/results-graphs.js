const globalGraph = document.getElementById('global');
const globalDataPhysical = JSON.parse(sessionStorage.getItem("globalDataPhysical"));
const globalDataOnline = JSON.parse(sessionStorage.getItem("globalDataOnline"));

new Chart(globalGraph, {
    type: 'radar',
    data: {
        labels: ['Samenwerken', 'Onderzoeken', 'Informatie verwerven', 'Discussieren', 'Oefenen',
            'Produceren'
        ],
        datasets: [{
                label: 'Fysieke leeractiviteiten',
                data: globalDataPhysical,
            },
            {
                label: 'Online leeractiviteiten',
                data: globalDataOnline,
            }
        ]
    },
    options: {
        responsive: true,
    }
});

const physicalTeamworkGraph = document.getElementById('physicalTeamwork');
const physicalTeamworkData = JSON.parse(sessionStorage.getItem("physicalTeamworkData"));

new Chart(physicalTeamworkGraph, {
    type: 'bar',
    data: {
        labels: ['Post-it-sessie', 'Werkcollege', 'Mindmap op flipovervel', 'Groepsopdracht', 'Anders'],
        datasets: [{
                label: '# ingevuld',
                data: physicalTeamworkData,
            }]
    },
    options: {
        responsive: true,
    }
});

const physicalResearchGraph = document.getElementById('physicalResearch');
const physicalResearchData = JSON.parse(sessionStorage.getItem("physicalResearchData"));

new Chart(physicalResearchGraph, {
    type: 'bar',
    data: {
        labels: ['Informatie vergelijken', 'Expertmethode (Jigsaw)', 'Anders'],
        datasets: [{
                label: '# ingevuld',
                data: physicalResearchData,
            }]
    },
    options: {
        responsive: true,
    }
});

const physicalInformationGatheringGraph = document.getElementById('physicalInformationGathering');
const physicalInformationGatheringData = JSON.parse(sessionStorage.getItem("physicalInformationGatheringData"));

new Chart(physicalInformationGatheringGraph, {
    type: 'bar',
    data: {
        labels: ['Boek/artikel/Blog lezen', 'Hoorcollege', 'Anders'],
        datasets: [{
                label: '# ingevuld',
                data: physicalInformationGatheringData,
            }]
    },
    options: {
        responsive: true,
    }
});

const physicalDiscussingGraph = document.getElementById('physicalDiscussing');
const physicalDiscussingData = JSON.parse(sessionStorage.getItem("physicalDiscussingData"));

new Chart(physicalDiscussingGraph, {
    type: 'bar',
    data: {
        labels: ['Peerfeedback', 'Groepsdiscussie', 'Debat', 'Anders'],
        datasets: [{
                label: '# ingevuld',
                data: physicalDiscussingData,
            }]
    },
    options: {
        responsive: true,
    }
});

const physicalTrainingGraph = document.getElementById('physicalTraining');
const physicalTrainingData = JSON.parse(sessionStorage.getItem("physicalTrainingData"));

new Chart(physicalTrainingGraph, {
    type: 'bar',
    data: {
        labels: ['Puzzel maken', 'Spelform', 'Rollenspel', 'Anders'],
        datasets: [{
                label: '# ingevuld',
                data: physicalTrainingData,
            }]
    },
    options: {
        responsive: true,
    }
});

const physicalProducingGraph = document.getElementById('physicalProducing');
const physicalProducingData = JSON.parse(sessionStorage.getItem("physicalProducingData"));

new Chart(physicalProducingGraph, {
    type: 'bar',
    data: {
        labels: ['(Poster)presentatie', 'World cafe', 'Anders'],
        datasets: [{
                label: '# ingevuld',
                data: physicalProducingData,
            }]
    },
    options: {
        responsive: true,
    }
});
