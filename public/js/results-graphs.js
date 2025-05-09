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

const lessonLevelDataAllArray = [];
for (const [_, item] of Object.entries(lessonLevelDataAll)) {
    let section = [];
    for (const [_, item2] of Object.entries(item)) {
        section.push(parseInt(item2));
    }
    lessonLevelDataAllArray.push(section);
}

for (let i = 0; i < lessonLevelSubcategories.length; i++) {
    const category = lessonLevelSubcategories[i];
    const categoryLabels = Object.values(lessonLevelPhysicalQuestions)[i];
    const categoryData = lessonLevelDataAllArray[i];

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

// const moduleLevelDataArray = [];
// for (const [_, item] of Object.entries(moduleLevelData)) {
//     let section = [];
//     for (const [_, item2] of Object.entries(item)) {
//         section.push(parseInt(item2));
//     }
//     moduleLevelDataArray.push(section);
// }

// console.log(moduleLevelCategories);

const moduleLevelCategoriesGraph = document.getElementById('moduleLevelCategoriesGraph');

let outerLabels = [];
let outerData = [];
let outerColors = ['rgb(221, 221, 221)', 'rgb(235, 235, 235)', 'rgb(248, 248, 248)'];
for (const [key, value] of Object.entries(moduleLevelCategories)) {
    outerLabels.push(key);
    outerData.push(value.length);
}

const moduleLevelDataArray = [];
for (const [_, item] of Object.entries(moduleLevelData)) {
    for (const [_, item2] of Object.entries(item)) {
        moduleLevelDataArray.push(parseInt(item2));
    }
}

const moduleLevelDataGraph = document.getElementById('moduleLevelDataGraph');

innerLabels = [];
// for (const [key, value] of Object.entries(moduleLevelCategories)) {
//     labels = labels.concat(value);
// }
for (let i = 0; i < moduleLevelDataArray.length; i++) {
    innerLabels.push(i + 1);
}
innerData = [];
innerColors = [];
for (let i = 0; i < moduleLevelDataArray.length; i++) {
    innerData.push(1);
    let color;
    switch (moduleLevelDataArray[i]) {
        case 0:
            color = 'rgb(252, 34, 0)';
            break;
        case 1:
            color = 'rgb(248, 143, 0)';
            break;
        case 2:
            color = 'rgb(245, 208, 0)';
            break;
        case 3:
            color = 'rgb(56, 167, 114)';
            break;
    }
    innerColors.push(color);
}

new Chart(moduleLevelCategoriesGraph, {
    type: 'doughnut',
    data: {
        labels: outerLabels,
        datasets: [{
            data: outerData,
            backgroundColor: outerColors,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            datalabels: {
                color: 'black',
                labels: {
                    title: {
                        font: {
                            weight: 'bold'
                        }
                    },
                },
                formatter: function (value, context) {
                    return context.chart.data.labels[context.dataIndex];
                }
            },
            tooltip: {
                enabled: false
            }
        },
        cutout: '75%',
        radius: '80%',
    },
    plugins: [ChartDataLabels],
});

new Chart(moduleLevelDataGraph, {
    type: 'pie',
    data: {
        labels: innerLabels,
        datasets: [{
            data: innerData,
            backgroundColor: innerColors,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            datalabels: {
                color: 'white',
                labels: {
                    title: {
                        font: {
                            weight: 'bold'
                        }
                    },
                },
                formatter: function (value, context) {
                    return context.chart.data.labels[context.dataIndex];
                }
            },
            tooltip: {
                enabled: false
            },
        },
        radius: '60%',
    },
    plugins: [ChartDataLabels],
});
