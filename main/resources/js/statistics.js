const statistics = new Vue({
    el: '#angelo',
    data: {
        canvas: null
    },
    mounted: function() {
        this.initChart();
        this.getStatistics();
    },
    methods: {
        initChart(arr) {
            var ctx = document.getElementById('myChart').getContext('2d');
            this.canvas = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: 'Ordini',
                        data: arr,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        getStatistics() {
            let year = document.getElementById('yearSelector').value;
            console.log(year);
            let id = document.getElementById('vendorId').value;
            let url = 'http://127.0.0.1:8000/get-time/' + id;
            axios.get(url).then(response => {
                let orderCreatedAt = [];
                response.data.forEach(element => {
                    orderCreatedAt.push(element.created_at.slice(0, 7));
                });
                let arr = [];
                for (let y = 1; y <= 12; y++) {
                    let count = 0;
                    for (let i = 0; i < orderCreatedAt.length; i++) {
                        if (y >= 10) {
                            m = y;
                            m.toString();
                        } else {
                            m = "0" + y.toString();

                        }
                        if (orderCreatedAt[i] == year + m) {
                            count++
                        }
                    }
                    arr.push(count);
                }
                console.log(arr);
                this.canvas.destroy();
                this.initChart(arr);
            });
        },
    },
});