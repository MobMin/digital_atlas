<h3>Mobile Subscriptions</h3>

@if(!$current->exists())
    <p>{{ trans('mobile-subscriptions::widget.missing_data') }}</p>
@else
    <canvas id="mobile-subscriptions-chart" width="400" height="400" styles="width: 100%; height: auto;"></canvas>
    <h4>{{ $current->year_reported }} {{ ucfirst(trans('mobile-subscriptions::widget.title')) }}</h4>
    <dl class="row">
        <dt class="col-sm-3">{{ ucfirst(trans('mobile-subscriptions::widget.total')) }}</dt>
        <dd class="col-sm-9">{{ number_format($current->total) }} <span class="text-dark">(@readableInt($current->total))</span></dd>
    </dl>
@endif
<p class="credit">{{ ucfirst(trans('mobile-subscriptions::widget.provided_by')) }} <a href="https://data.worldbank.org/" target="_blank" rel="nofollow">{{ trans('mobile-subscriptions::widget.provider') }}</a></p>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var mobileSubsChart = $('#mobile-subscriptions-chart');
    new Chart(mobileSubsChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('mobile-subscriptions::widget.title')) }}",
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
