<h3>Population</h3>
<canvas id="population-chart" width="400" height="400" styles="width: 100%; height: auto;"></canvas>
<h4>{{ $current->year_reported }} Stats</h4>
<dl class="row">
    <dt class="col-sm-3">Total</dt>
    <dd class="col-sm-9">{{ number_format($current->total) }}</dd>
    <dt class="col-sm-3">Men</dt>
    <dd class="col-sm-9">{{ number_format($current->men) }}</dd>
    <dt class="col-sm-3">Women</dt>
    <dd class="col-sm-9">{{ number_format($current->women) }}</dd>
    <dt class="col-sm-3">Density</dt>
    <dd class="col-sm-9">{{ number_format($current->density) }}</dd>
</dl>
<p class="credit">Data provided by <a href="https://www.un.org/" target="_blank" rel="nofollow">United Nations</a></p>
<script type="text/javascript">
$(function() {
    var popChart = $('#population-chart');
    new Chart(popChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "Population",
                "data": @json($statData),
                "fill": false,
                "borderColor": "rgb(75, 192, 192)",
                "lineTension": 0.1
            }]
        },
        "options": {
            "tooltips": {
                "callbacks": {
                    "label": function(tooltipItems, data) {
                        return data.labels[tooltipItems.index] + " " + data.datasets[0].data[tooltipItems.index].toLocaleString();
                    }
                }
            },
            "scales": {
                "yAxes": [
                    {
                        "ticks": {
                            "beginAtZero": false,
                            "callback": function(value, index, values) {
                              return value.toLocaleString();
                            }
                        }
                    }
                ]
            }
        }
    });
});
</script>
