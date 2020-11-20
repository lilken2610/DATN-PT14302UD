// Set up the chart
var chart = new Highcharts.Chart({
    chart: {
        renderTo: 'top5',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: 'Top 10 sản phẩm bán chạy'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Đơn mua'
        }
    },
    tooltip: {
        headerFormat: '{point.name}',
        pointFormat: '<strong>{point.name}</strong> :{point.y} đơn',
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
    series: [{
        data: $('#top5').data('product')
    }]
});

function showValues() {
    $('#alpha-value').html(chart.options.chart.options3d.alpha);
    $('#beta-value').html(chart.options.chart.options3d.beta);
    $('#depth-value').html(chart.options.chart.options3d.depth);
}

// Activate the sliders
$('#sliders input').on('input change', function () {
    chart.options.chart.options3d[this.id] = parseFloat(this.value);
    showValues();
    chart.redraw(false);
});

showValues();
