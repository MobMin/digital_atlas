<div class="card">
    @if ($data == null)
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('widget-joshua-project::widget.people_groups')) }}</h3>
            <p>{{ trans('widget-joshua-project::widget.missing_data') }}</p>
        </div>
    @else
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('widget-joshua-project::widget.people_groups')) }}</h3>
            <dl class="row">
                <dt class="col-sm-6">{{ ucwords(trans('widget-joshua-project::widget.total')) }}</dt>
                <dd class="col-sm-6">{{ number_format($data->total_people_groups) }}</dd>
                <dt class="col-sm-6">{{ ucwords(trans('widget-joshua-project::widget.total_unreached')) }}</dt>
                <dd class="col-sm-6">{{ number_format($data->total_unreached) }}</dd>
                <dt class="col-sm-6">{{ ucwords(trans('widget-joshua-project::widget.1040_window')) }}</dt>
                <dd class="col-sm-6">
                    @if ($data->in_1040)
                        {{ ucwords(trans('widget-joshua-project::widget.yes')) }}
                    @else
                        {{ ucwords(trans('widget-joshua-project::widget.no')) }}
                    @endif
                </dd>
            </dl>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('widget-joshua-project::widget.provided_by')) }} <a href="https://joshuaproject.net/countries/{{ $data['rog3'] }}" target="_blank" rel="nofollow">{{ trans('widget-joshua-project::widget.joshua_project') }}</a></p>
    </div>
</div>
<div class="card">
    @if ($data == null)
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('widget-joshua-project::widget.people_groups')) }}</h3>
            <p>{{ trans('widget-joshua-project::widget.missing_data') }}</p>
        </div>
    @else
        <canvas id="jpdata-chart" class="card-img-top" height="400" styles="width: 100%; height: auto;"></canvas>
        <div class="card-body">
            <h3 class="card-title">{{ ucwords(trans('widget-joshua-project::widget.religion')) }}</h3>
            <dl class="row">
                <dt class="col-sm-6">{{ ucwords(trans('widget-joshua-project::widget.main_religion')) }}</dt>
                <dd class="col-sm-6">{{ $data->primary_religion }}</dd>
            </dl>
            <table class="table table-striped">
                <caption>{{ ucwords(trans('widget-joshua-project::widget.percentages')) }}</caption>
                <tbody>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.buddhism')) }}</td>
                        <td>{{ $data->percent_buddhist }}%</td>
                    </tr>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.christian')) }} ({{ ucwords(trans('widget-joshua-project::widget.evangelical')) }})</td>
                        <td>{{ $data->percent_christian }}% ({{ $data->percent_evangelical }}%)</td>
                    </tr>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.hinduism')) }}</td>
                        <td>{{ $data->percent_hindu }}%</td>
                    </tr>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.islam')) }}</td>
                        <td>{{ $data->percent_islam }}%</td>
                    </tr>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.ethnic')) }}</td>
                        <td>{{ $data->percent_ethnic_religion }}%</td>
                    </tr>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.other')) }}</td>
                        <td>{{ $data->percent_other_religion }}%</td>
                    </tr>
                    <tr>
                        <td>{{ ucwords(trans('widget-joshua-project::widget.nonreligious')) }}</td>
                        <td>{{ $data->percent_non_religious }}%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('widget-joshua-project::widget.provided_by')) }} <a href="https://joshuaproject.net/countries/{{ $data['rog3'] }}" target="_blank" rel="nofollow">{{ trans('widget-joshua-project::widget.joshua_project') }}</a></p>
    </div>
</div>
<script type="text/javascript">
$(function() {
@if ($data != null)
    var jpDataChart = $('#jpdata-chart');
    new Chart(jpDataChart, {
        "type": "doughnut",
        "data": {
            "labels": [
                "{{ ucwords(trans('widget-joshua-project::widget.buddhism')) }}",
                "{{ ucwords(trans('widget-joshua-project::widget.christian')) }}",
                "{{ ucwords(trans('widget-joshua-project::widget.hinduism')) }}",
                "{{ ucwords(trans('widget-joshua-project::widget.islam')) }}",
                "{{ ucwords(trans('widget-joshua-project::widget.ethnic')) }}",
                "{{ ucwords(trans('widget-joshua-project::widget.other')) }}",
                "{{ ucwords(trans('widget-joshua-project::widget.nonreligious')) }}"
            ],
            "datasets": [
                {
                    "backgroundColor": ["{{ $colors['buddhism'] }}", "{{ $colors['christian'] }}", "{{ $colors['hinduism'] }}", "{{ $colors['islam'] }}", "{{ $colors['ethnic'] }}", "{{ $colors['other'] }}", "{{ $colors['non-religious'] }}"],
                    "data": [{{ $data->percent_buddhist }}, {{ $data->percent_christian }}, {{ $data->percent_hindu }}, {{ $data->percent_islam }}, {{ $data->percent_ethnic_religion }}, {{ $data->percent_other_religion }}, {{ $data->percent_non_religious }}]
                }
            ]
        },
        "options": {
            "tooltips": {
                "callbacks": {
                    "label": function(tooltipItems, data) {
                        return data.labels[tooltipItems.index] + " " + data.datasets[0].data[tooltipItems.index].toLocaleString() + '%';
                    }
                }
            }
        }
    });
@endif
});
</script>
