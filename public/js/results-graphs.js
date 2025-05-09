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

// console.log(lessonLevelDataAll);
const lessonLevelDataAllArray = [];
for (const [_, item] of Object.entries(lessonLevelDataAll)) {
    let section = [];
    for (const [_, item2] of Object.entries(item)) {
        section.push(parseInt(item2));
    }
    lessonLevelDataAllArray.push(section);
}
// console.log(lessonLevelDataAllArray);

for (let i = 0; i < lessonLevelSubcategories.length; i++) {
    const category = lessonLevelSubcategories[i];
    const categoryLabels = Object.values(lessonLevelPhysicalQuestions)[i];
    const categoryData = lessonLevelDataAllArray[i];
    // console.log(category);
    // console.log(categoryLabels);
    // console.log(categoryData);

    const graph = document.getElementById('physical-' + category.id);

    new Chart(graph, {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Punten gescoord',
                data: categoryData,
            }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
            },
            scales: {
                y: {
                    suggestedMin: 0,
                    suggestedMax: 2
                }
            }
        }
    });
}

for (let i = 0; i < lessonLevelSubcategories.length; i++) {
    const category = lessonLevelSubcategories[i];
    const categoryLabels = Object.values(lessonLevelOnlineQuestions)[i];
    const categoryData = lessonLevelDataAllArray[lessonLevelSubcategories.length + i];
    // console.log(category);
    // console.log(categoryLabels);
    // console.log(categoryData);

    const graph = document.getElementById('online-' + category.id);

    new Chart(graph, {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Punten gescoord',
                data: categoryData,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
            },
            scales: {
                y: {
                    suggestedMin: 0,
                    suggestedMax: 2
                }
            }
        }
    });
}
