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

console.log(moduleLevelCategories);

const moduleLevelCategoriesGraph = document.getElementById('moduleLevelCategoriesGraph');

let labels = [];
let data = [];
let colors = [];
for (const [key, value] of Object.entries(moduleLevelCategories)) {
    labels.push(key);
    data.push(value.length);
    colors.push('rgb(153, 153, 153)');
}

new Chart(moduleLevelCategoriesGraph, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: colors,
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
            }
        },
    },
    plugins: [ChartDataLabels],
});

const moduleLevelDataArray = [];
for (const [_, item] of Object.entries(moduleLevelData)) {
    for (const [_, item2] of Object.entries(item)) {
        moduleLevelDataArray.push(parseInt(item2));
    }
}

const moduleLevelDataGraph = document.getElementById('moduleLevelDataGraph');

labels = [];
// for (const [key, value] of Object.entries(moduleLevelCategories)) {
//     labels = labels.concat(value);
// }
for (let i = 0; i < moduleLevelDataArray.length; i++) {
    labels.push(i + 1);
}
data = [];
colors = [];
for (let i = 0; i < moduleLevelDataArray.length; i++) {
    data.push(1);
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
    colors.push(color);
}

new Chart(moduleLevelDataGraph, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: colors,
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
            }
        },
    },
    plugins: [ChartDataLabels],
});
