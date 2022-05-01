<div class="card">
    @if(!$current->exists())
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('widget-median_age::widget.title')) }}</h3>
            <p>{{ trans('median_age::widget.missing_data') }}</p>
        </div>
    @else
        <canvas id="median_age-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
        <div class="card-body">
            <h3 class="card-title">{{ $current->year_reported }} {{ ucfirst(trans('median_age::widget.title')) }}</h3>
            <dl class="row">
                <dt class="col-sm-5">{{ ucfirst(trans('median_age::widget.title')) }}</dt>
                <dd class="col-sm-7">{{ number_format($current->total, 3) }}</dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('median_age::widget.provided_by')) }} <a href="https://data.worldbank.org/indicator/SE.ADT.LITR.ZS" target="_blank" rel="nofollow">{{ trans('median-age::widget.provider') }}</a></p>
    </div>
</div>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var median_ageChart = $('#median_age-chart');
    new Chart(median_ageChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('median_age::widget.title')) }}",
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
                            "labelString": "{{ ucwords(trans('median_age::widget.year')) }}"
                        }
                    }
                ],
                "yAxes": [
                    {
                        "scaleLabel": {
                            "display": true,
                            "labelString": "{{ ucwords(trans('median_age::widget.ages')) }}"
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
