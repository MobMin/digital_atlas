<h3>{{ ucfirst(trans('widget-population::widget.population')) }}</h3>

@if(!$current->exists())
    <p>{{ trans('widget-population::widget.missing_data') }}</p>
@else
    <canvas id="population-chart" width="400" height="400" styles="width: 100%; height: auto;"></canvas>
    <h4>{{ $current->year_reported }} {{ ucfirst(trans('widget-population::widget.stats')) }}</h4>
    <dl class="row">
        <dt class="col-sm-3">{{ ucfirst(trans('widget-population::widget.total')) }}</dt>
        <dd class="col-sm-9">{{ number_format($current->total) }} <span class="text-dark">({{ $current->readable_total }})</span></dd>
        <dt class="col-sm-3">{{ ucfirst(trans('widget-population::widget.men')) }}</dt>
        <dd class="col-sm-9">{{ number_format($current->men) }} <span class="text-dark">({{ $current->readable_men }})</span></dd>
        <dt class="col-sm-3">{{ ucfirst(trans('widget-population::widget.women')) }}</dt>
        <dd class="col-sm-9">{{ number_format($current->women) }} <span class="text-dark">({{ $current->readable_women }})</span></dd>
        <dt class="col-sm-3">{{ ucfirst(trans('widget-population::widget.density')) }}</dt>
        <dd class="col-sm-9">{{ number_format($current->density) }}</dd>
    </dl>
@endif
<p class="credit">{{ ucfirst(trans('widget-population::widget.provided_by')) }} <a href="https://www.un.org/" target="_blank" rel="nofollow">{{ trans('widget-population::widget.united_nations') }}</a></p>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var popChart = $('#population-chart');
    new Chart(popChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('widget-population::widget.population')) }}",
                "data": @json($statData),
                "fill": false,
                "borderColor": "{{$lineColor}}",
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
                "xAxes": [
                    {
                        "scaleLabel": {
                            "display": true,
                            "labelString": "Year"
                        }
                    }
                ],
                "yAxes": [
                    {
                        "scaleLabel": {
                            "display": true,
                            "labelString": "People"
                        },
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
@endif
});
</script>
