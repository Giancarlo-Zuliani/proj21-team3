const statistics = new Vue({
    el: '#angelo',
    data: {
        canvas: null,
        canvasPie: null,
        //CHARTS COLORS
        chartsColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
        chartsBorder: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
        totalSales: '0',
    },
    mounted: function() {
        this.initChart();
        this.getItemsStats();
        this.getStatistics();
    },
    methods: {
        //INIT LINEAR CHART
        initChart(arr) {
            var ctx = document.getElementById('myChart').getContext('2d');
            this.canvas = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
                    datasets: [{
                        label: 'Piatti venduti',
                        data: arr,
                        backgroundColor: this.chartsColor,
                        borderColor: this.chartsBorder,
                        borderWidth: 5
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMax: 10
                            }
                        }]
                    }
                }
            });
        },
        //INIT PIE CHART
        initPie(nameArr, countArr) {
            var ctx = document.getElementById('myPie').getContext('2d');
            this.canvasPie = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: nameArr,
                    datasets: [{
                        label: 'Piatti venduti',
                        data: countArr,
                        backgroundColor: this.chartsColor,
                        borderColor: this.chartsBorder,
                        borderWidth: 1
                    }]
                }
            });
        },
        //GET DATAS BY YEAR
        getStatistics() {
            let year = document.getElementById('yearSelector').value;
            let id = document.getElementById('vendorId').value;
            let url = 'http://127.0.0.1:8000/get-time/' + id;
            axios.get(url).then(response => {
                let orderCreatedAt = [];
                response.data.forEach(element => {
                    orderCreatedAt.push(element.created_at.slice(0, 7));
                });
                let arr = [];
                let m;
                for (let y = 1; y <= 12; y++) {
                    y > 9 ? m = y : m = "0" + y.toString();
                    let count = 0;
                    for (let i = 0; i < orderCreatedAt.length; i++) {
                        if (orderCreatedAt[i] == year + m)
                            count++
                    }
                    arr.push(count);
                }
                this.canvas.destroy();
                this.initChart(arr);
            });
        },

        //GET SALES DATAS FOR PIE CHART
        getItemsStats() {
            let id = document.getElementById('vendorId').value;
            let url = 'http://127.0.0.1:8000/getItemStats/' + id;
            axios.get(url).then(response => {
                let nameArr = response.data.nameArr;
                let countArr = response.data.countArr;
                let totalSales = response.data.total_sales.toFixed(2);
                this.totalSales = totalSales;
                //INIT NEW PIE CHART
                this.initPie(nameArr, countArr);
            });
        }
    },
});