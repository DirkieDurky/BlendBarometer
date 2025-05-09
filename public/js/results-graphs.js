console.log(lessonLevelPhysicalQuestions);
console.log(lessonLevelOnlineQuestions);

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
