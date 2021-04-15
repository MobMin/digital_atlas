<div class="card">
    <canvas id="top-social-platforms-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
    <div class="card-body">
        <h3 class="card-title">{{ ucwords(trans('top-social-platforms::widget.title')) }}</h3>
        @if (!empty($data))
            <table class="table table-striped table-sm">
                <caption>{{ ucwords(trans('top-social-platforms::widget.averages_title')) }}</caption>
                <thead>
                    <tr>
                        <th>Platform</th>
                        <th>Average</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $platform)
                        <tr>
                            <td>{{ $platform['platform'] }}</td>
                            <td>{{ $platform['average'] }}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('top-social-platforms::widget.provided_by')) }} <a href="https://gs.statcounter.com/social-media-stats/" target="_blank" rel="nofollow">{{ trans('top-social-platforms::widget.stat_counter') }}</a></p>
    </div>
</div>
<script type="text/javascript">
var dynamicColors = function() {
   var r = Math.floor(Math.random() * 255);
   var g = Math.floor(Math.random() * 255);
   var b = Math.floor(Math.random() * 255);
   return "rgb(" + r + "," + g + "," + b + ")";
};
$(function() {
@if ($data != null)
    var topSocialPlatformsChart = $('#top-social-platforms-chart');
    new Chart(topSocialPlatformsChart, {
        "type": "line",
        "data": {
            "labels": @json($labels),
            "datasets": [
                @foreach ($data as $platform)
                    {
                        label: "{{$platform['platform']}}",
                        borderColor: dynamicColors(),
                        data:  @json($platform['stats']),
                        fill: false
                    },
                @endforeach
            ]
        },
        "options": {
            "tooltips": {
                "callbacks": {
                    "label": function(tooltipItems, data) {
                        var label = data.datasets[tooltipItems.datasetIndex].label;
                        var value = data.datasets[0].data[tooltipItems.index].toLocaleString();
                        return label + " " + value + '%';
                    }
                }
            }
        }
    });
@endif
});
</script>
