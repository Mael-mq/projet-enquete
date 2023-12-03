window.addEventListener('DOMContentLoaded',function(){
    function updateGraphes(graphe, id){
        fetch("../../api/question?q=" + id).then(response => response.json()).then(data => {
            let tab = [];
            let reps = [];
            data.forEach(function(element){
                tab.push(element.nombre_reponses);
                reps.push(element.texte_reponse);
            });
            graphe.config.data.datasets[0].data = tab;
            graphe.config.data.labels = reps;
            graphe.config.data.datasets[0].label = data[0].texte_question;
            graphe.update();
        })
    };

    // Données des graphes
    const dataq4 = {
        labels: [],
        datasets: [{
            label: 'Question 4',
            data: [],
            backgroundColor: '#DBE6FF',
            borderColor: '#DBE6FF',
            borderWidth: 1
        }]
    };
    const dataq6 = {
        labels: [],
        datasets: [{
            label: 'Question 6',
            data: [],
            backgroundColor: '#4358A6',
            borderColor: '#4358A6',
            borderWidth: 1
        }]
    };
    const dataq8 = {
        labels: [],
        datasets: [{
            label: 'Question 8',
            data: [],
            backgroundColor: '#C0D3FF',
            borderColor: '#C0D3FF',
            borderWidth: 1
        }]
    };
    const dataq9 = {
        labels: [],
        datasets: [{
            label: 'Question 9',
            data: [],
            backgroundColor: '#DBE6FF',
            borderColor: '#DBE6FF',
            borderWidth: 1
        }]
    };
    const dataq10 = {
        labels: [],
        datasets: [{
            label: 'Question 10',
            data: [],
            backgroundColor: '#4358A6',
            borderColor: '#4358A6',
            borderWidth: 1
        }]
    };
    const dataq11 = {
        labels: [],
        datasets: [{
            label: 'Question 11',
            data: [],
            backgroundColor: '#C0D3FF',
            borderColor: '#C0D3FF',
            borderWidth: 1
        }]
    };
    const dataq12 = {
        labels: [],
        datasets: [{
            label: 'Question 12',
            data: [],
            backgroundColor: '#DBE6FF',
            borderColor: '#DBE6FF',
            borderWidth: 1
        }]
    };
    const dataq13 = {
        labels: [],
        datasets: [{
            label: 'Question 13',
            data: [],
            backgroundColor: '#4358A6',
            borderColor: '#4358A6',
            borderWidth: 1
        }]
    };

    // Configuration des graphes
    const configq4 = {
        type: 'bar',
        data: dataq4,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq6 = {
        type: 'bar',
        data: dataq6,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq8 = {
        type: 'bar',
        data: dataq8,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq9 = {
        type: 'bar',
        data: dataq9,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq10 = {
        type: 'bar',
        data: dataq10,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq11 = {
        type: 'bar',
        data: dataq11,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq12 = {
        type: 'bar',
        data: dataq12,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const configq13 = {
        type: 'bar',
        data: dataq13,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };

    // Création des graphes
    const graphq4 = new Chart(
        document.getElementById('q4'),
        configq4
    );
    const graphq6 = new Chart(
        document.getElementById('q6'),
        configq6
    );
    const graphq8 = new Chart(
        document.getElementById('q8'),
        configq8
    );
    const graphq9 = new Chart(
        document.getElementById('q9'),
        configq9
    );
    const graphq10 = new Chart(
        document.getElementById('q10'),
        configq10
    );
    const graphq11 = new Chart(
        document.getElementById('q11'),
        configq11
    );
    const graphq12 = new Chart(
        document.getElementById('q12'),
        configq12
    );
    const graphq13 = new Chart(
        document.getElementById('q13'),
        configq13
    );

    updateGraphes(graphq4, 4);
    updateGraphes(graphq6, 6);
    updateGraphes(graphq8, 8);
    updateGraphes(graphq9, 9);
    updateGraphes(graphq10, 10);
    updateGraphes(graphq11, 11);
    updateGraphes(graphq12, 12);
    updateGraphes(graphq13, 13);
});