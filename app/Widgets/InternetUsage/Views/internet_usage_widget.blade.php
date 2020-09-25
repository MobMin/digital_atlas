<div class="card m-3">
    @if(!$current->exists())
        <div class="card-body">
            <h3 class="card-title">{{ trans('internet-usage::widget.title') }}</h3>
            <p>{{ trans('internet-usage::widget.missing_data') }}</p>
        </div>
    @else
        <canvas id="internet-usage-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
        <div class="card-body">
            <h3 class="card-title">{{ $current->year_reported }} {{ ucfirst(trans('internet-usage::widget.title')) }}</h3>
            <dl class="row">
                <dt class="col-sm-5">{{ ucfirst(trans('internet-usage::widget.percentage')) }}</dt>
                <dd class="col-sm-7">{{ $current->percentage }}%</dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('internet-usage::widget.provided_by')) }} <a href="https://data.worldbank.org/indicator/IT.NET.USER.ZS" target="_blank" rel="nofollow">{{ trans('internet-usage::widget.provider') }}</a></p>
    </div>
</div>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var internetUsageChart = $('#internet-usage-chart');
    new Chart(internetUsageChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('internet-usage::widget.title')) }}",
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
                        return data.labels[tooltipItems.index] + " " + data.datasets[0].data[tooltipItems.index].toLocaleString() + '%';
                    }
                }
            },
            "scales": {
                "xAxes": [
                    {
                        "scaleLabel": {
                            "display": true,
                            "labelString": "{{ ucfirst(trans('internet-usage::widget.year')) }}"
                        }
                    }
                ],
                "yAxes": [
                    {
                        "scaleLabel": {
                            "display": true,
                            "labelString": "{{ ucfirst(trans('internet-usage::widget.percentage')) }}"
                        },
                        "ticks": {
                            "beginAtZero": false,
                            "callback": function(value, index, values) {
                              return value.toLocaleString() + '%';
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
