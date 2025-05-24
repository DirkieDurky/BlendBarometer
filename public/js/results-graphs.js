const lessonLevelGraph = document.getElementById('lessonLevel');

Chart.defaults.font.size = 16;
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
        },
        animation: {
            onComplete: function () {
                const base64Image = this.toBase64Image();

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Send the image to the backend with the CSRF token
                fetch('/SaveChart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ image: base64Image, name: 'radar' })
                }).then(response => {

                }).catch(error => {

                });
            }
        },
        scales: {
            r: {
                pointLabels: {
                    font: {
                        size: 16
                    }
                },
                angleLines: {
                    lineWidth: 2,
                },
                grid: {
                    lineWidth: 2,
                }
            }
        },
        scale: {
            ticks: {
                precision: 0
            }
        },
    }
});

let lessonLevelAriaLabel = ""
lessonLevelAriaLabel = "Algemene grafiek op lesniveau. Opgedeeld in fysieke leeractiviteiten en online leeractiviteiten. ";
lessonLevelAriaLabel += "Scores op gebied van fysieke leeractiviteiten: ";
for (let i = 0; i < lessonLevelSubcategories.length; i++) {
    const label = lessonLevelSubcategories.map(c => c.name)[i];
    const data = lessonLevelDataPhysical[i];
    lessonLevelAriaLabel += label + ": " + data + ". ";
}
lessonLevelAriaLabel += "Scores op gebied van online leeractiviteiten: ";
for (let i = 0; i < lessonLevelSubcategories.length; i++) {
    const label = lessonLevelSubcategories.map(c => c.name)[i];
    const data = lessonLevelDataOnline[i];

    lessonLevelAriaLabel += label + ": " + data + ". ";
}
lessonLevelGraph.ariaLabel = lessonLevelAriaLabel;

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
                },
            },
            scale: {
                ticks: {
                    precision: 0
                }
            },
            animation: {
                onComplete: function () {
                    const base64Image = this.toBase64Image();

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Send the image to the backend with the CSRF token
                    fetch('/SaveChart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({ image: base64Image, name: 'physical' + category.name })
                    }).then(response => {

                    }).catch(error => {

                    });
                }
            }
        }
    });
    let graphAriaLabel = "Fysieke leeractiviteiten - ";
    graphAriaLabel += category.name + ". Scores: ";

    for (let i = 0; i < categoryLabels.length; i++) {
        const label = categoryLabels[i];
        const data = categoryData[i];

        graphAriaLabel += label + ": " + data + ". ";
    }

    graph.ariaLabel = graphAriaLabel;
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
            },
            scale: {
                ticks: {
                    precision: 0
                }
            },
            animation: {
                onComplete: function () {
                    const base64Image = this.toBase64Image();

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Send the image to the backend with the CSRF token
                    fetch('/SaveChart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({ image: base64Image, name: 'online' + category.name })
                    }).then(response => {

                    }).catch(error => {

                    });
                }
            }
        }
    });
    let graphAriaLabel = "Online leeractiviteiten - ";
    graphAriaLabel += category.name + ". Scores: ";

    for (let i = 0; i < categoryLabels.length; i++) {
        const label = categoryLabels[i];
        const data = categoryData[i];

        graphAriaLabel += label + ": " + data + ". ";
    }

    graph.ariaLabel = graphAriaLabel;
}

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
    plugins: [ChartDataLabels],
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
        radius: '76%',
        animation: {
            onComplete: function () {
                const base64Image = this.toBase64Image();

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Send the image to the backend with the CSRF token
                fetch('/SaveChart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ image: base64Image, name: 'wheelOutside' })
                }).then(response => {
                }).catch(error => {
                });
            }
        }
    },
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
                enabled: false,
                position: 'nearest',
                external: externalTooltipHandler
            },
        },
        radius: '60%',
        animation: {
            onComplete: function () {
                const base64Image = this.toBase64Image();

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Send the image to the backend with the CSRF token
                fetch('/SaveChart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ image: base64Image, name: 'wheelInside' })
                }).then(response => {

                }).catch(error => {

                });
            }
        }
    },
    plugins: [ChartDataLabels],
});
