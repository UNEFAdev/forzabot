/*    
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Miembros de Canales'
    },
    xAxis: {
        categories: ['1750', '1800', '1850', '1900', '1950', '1999', '2050'],
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Miembros'
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
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
    },

    "series": [
        {
            "name": "Canal",
            "colorByPoint": true,
            "data": JSON.parse('<?php echo getCanalesStats(); ?>')
        }
    ]
  
});
*/


$.getJSON("telegram/stats/stats.php?general", function( data ) {
  var date_categories = [];
  var series = [];

  $.each( data, function( key, val ) {
    if (date_categories.indexOf(val.x) === -1) {
        date_categories.push(val.x);    
    }
  });

  var grouped = _.groupBy(data, function(item) {
    return item.canal_id;
  });

  console.log(typeof grouped, grouped);
  Object.keys(grouped).forEach(function(item, i, arr) {
    console.log(item, grouped[item][0].name)
    var aux = {};
    aux.name = grouped[item][0].name;
    aux.data = [];
    grouped[item].forEach( function(interno, pos, ar) {
        aux.data.push(interno.y)
    })
    series.push(aux);
  });
  
  console.log(date_categories);


Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Miembros de Canales'
    },
    xAxis: {
        categories: date_categories,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Miembros'
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ' miembros'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: series
});


 
});


