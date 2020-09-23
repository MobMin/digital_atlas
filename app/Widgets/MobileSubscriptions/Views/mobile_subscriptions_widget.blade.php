<div class="card m-3">
    @if(!$current->exists())
        <div class="card-body">
            <h3 class="card-title">Mobile Subscriptions</h3>
            <p>{{ trans('mobile-subscriptions::widget.missing_data') }}</p>
        </div>
    @else
        <canvas id="mobile-subscriptions-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
        <div class="card-body">
            <h3 class="card-title">{{ $current->year_reported }} {{ ucfirst(trans('mobile-subscriptions::widget.title')) }}</h3>
            <dl class="row">
                <dt class="col-sm-5">{{ ucfirst(trans('mobile-subscriptions::widget.total')) }}</dt>
                <dd class="col-sm-7">{{ number_format($current->total) }} <span class="text-dark">(@readableInt($current->total))</span></dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('mobile-subscriptions::widget.provided_by')) }} <a href="https://data.worldbank.org/" target="_blank" rel="nofollow">{{ trans('mobile-subscriptions::widget.provider') }}</a></p>
    </div>
</div>
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
