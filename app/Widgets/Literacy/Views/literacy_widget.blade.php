<div class="card m-3">
    @if(!$current->exists())
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('literacy::widget.title')) }}</h3>
            <p>{{ trans('literacy::widget.missing_data') }}</p>
        </div>
    @else
        <canvas id="literacy-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
        <div class="card-body">
            <h3 class="card-title">{{ $current->year_reported }} {{ ucfirst(trans('literacy::widget.title')) }}</h3>
            <dl class="row">
                <dt class="col-sm-5">{{ ucfirst(trans('literacy::widget.total')) }}</dt>
                <dd class="col-sm-7">{{ number_format($current->total, 3) }}</dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('literacy::widget.provided_by')) }} <a href="https://data.worldbank.org/indicator/SE.ADT.LITR.ZS" target="_blank" rel="nofollow">{{ trans('literacy::widget.provider') }}</a></p>
    </div>
</div>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var literacyChart = $('#literacy-chart');
    new Chart(literacyChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('literacy::widget.title')) }}",
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
                            "labelString": "{{ ucwords(trans('literacy::widget.year')) }}"
                        }
                    }
                ],
                "yAxes": [
                    {
                        "scaleLabel": {
                            "display": true,
                            "labelString": "{{ ucwords(trans('literacy::widget.rates')) }}"
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
