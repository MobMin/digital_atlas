<div class="card">
    @if(!$current->exists())
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('broadband-subscriptions::widget.title')) }}</h3>
            <p>{{ trans('broadband-subscriptions::widget.missing_data') }}</p>
        </div>
    @else
        <div class="chart-container card-img-top">
            <canvas id="broadband-subscriptions-chart"></canvas>
        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $current->year_reported }} {{ ucfirst(trans('broadband-subscriptions::widget.title')) }}</h3>
            <dl class="row">
                <dt class="col-sm-5">{{ ucfirst(trans('broadband-subscriptions::widget.total')) }}</dt>
                <dd class="col-sm-7">{{ number_format($current->total) }} <span class="text-dark">(@readableInt($current->total))</span></dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('broadband-subscriptions::widget.provided_by')) }} <a href="https://data.worldbank.org/indicator/IT.NET.BBND" target="_blank" rel="nofollow">{{ trans('broadband-subscriptions::widget.provider') }}</a></p>
    </div>
</div>
<script type="text/javascript">
$(function() {
@if($current->exists())
    var broadbandSubsChart = $('#broadband-subscriptions-chart');
    new Chart(broadbandSubsChart, {
        "type": "line",
        "data": {
            "labels": @json($statLabels),
            "datasets": [{
                "label":  "{{ ucfirst(trans('broadband-subscriptions::widget.title')) }}",
                "data": @json($statData),
                "fill": false,
                "borderColor": "{{$lineColor}}",
                "tension": 0.1
            }]
        },
        "options": {
            "maintainAspectRatio": false,
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
                        "text": "{{ ucwords(trans('broadband-subscriptions::widget.year')) }}"
                    }
                },
                "y": {
                    "beginAtZero": false,
                    "title": {
                        "display": true,
                        "text": "{{ ucwords(trans('broadband-subscriptions::widget.subscriptions')) }}"
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
