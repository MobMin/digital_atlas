<div class="card">
    @if(!$current->exists())
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('urban-population::widget.title')) }}</h3>
            <p>{{ trans('urban-population:widget.missing_data') }}</p>
        </div>
    @else
        <canvas id="urban-population-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
        <div class="card-body">
            <h3 class="card-title">{{ $current->year_reported }} {{ ucfirst(trans('urban-population::widget.title')) }}</h3>
            <dl class="row">
                <dt class="col-sm-5">{{ ucfirst(trans('urban-population::widget.total')) }}</dt>
                <dd class="col-sm-7">{{ number_format($current->total, 3) }}%</dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('urban-population::widget.provided_by')) }} <a href="https://data.worldbank.org/indicator/SP.URB.TOTL.IN.ZS" target="_blank" rel="nofollow">{{ trans('urban-population::widget.provider') }}</a></p>
    </div>
</div>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var urbanPopulationChart = $('#urban-population-chart');
    new Chart(urbanPopulationChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('urban-population::widget.title')) }}",
                "data": @json($statData),
                "fill": false,
                "borderColor": "{{$lineColor}}",
                "tension": 0.1
            }]
        },
        "options": {
            "plugins": {
                "tooltip": {
                    "callbacks": {
                        "label": function(context) {
                            return context.label + " " + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            "scales": {
                "x": {
                    "title": {
                        "display": true,
                        "text": "{{ ucwords(trans('urban-population::widget.year')) }}"
                    }
                },
                "y": {
                    "beginAtZero": false,
                    "title": {
                        "display": true,
                        "text": "{{ ucwords(trans('urban-population::widget.xaxis')) }}"
                    },
                    "ticks": {
                        "callback": function(value, index, values) {
                          return value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
@endif
});
</script>
