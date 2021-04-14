<div class="card m-3">
    <div class="card-body">
        <h3 class="card-title">{{ ucwords(trans('top-social-platforms::widget.title')) }}</h3>
        <table class="table table-striped table-sm">
            <caption>{{ ucwords(trans('top-social-platforms::widget.averages_title')) }}</caption>
            <thead>
                <tr>
                    <th>Platform</th>
                    <th>Average</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tableData as $platform)
                    <tr>
                        <td>{{ $platform['platform'] }}</td>
                        <td>{{ $platform['average'] }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('top-social-platforms::widget.provided_by')) }} <a href="https://gs.statcounter.com/social-media-stats/" target="_blank" rel="nofollow">{{ trans('top-social-platforms::widget.stat_counter') }}</a></p>
    </div>
</div>
