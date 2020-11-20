$(document).ready(function () {
    Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Doanh Thu'
        },
        subtitle: {
            text: $('.year').data('year')
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'VNĐ'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y} VND'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<strong>Tháng {point.name}</strong><br/> {point.qty} đơn hàng <br/> Tổng:{point.y} VND'
        },
        // <span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total
        series: [
            {
                name: '<span style="color:red">Doanh thu</span>',
                colorByPoint: true,
                data: $('#chart').data('array')
            }
        ]
    });
});
