<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{ ucwords(trans('twitter::widget.title')) }}</h3>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Tweet Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tweets as $val)
                    <tr>
                        <td><a href="http://twitter.com/search?q={{$val->tweet_name}}" target="_blank">{{$val->tweet_name}}</a></td>
                        @if($val->tweet_count > 0)
                            <td>{{number_format($val->tweet_count)}}</td>
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer text-muted">
        <p class="credit">
            {{ ucfirst(trans('twitter::widget.provided_by')) }}
            <a href="https://twitter.com/" target="_blank" rel="nofollow">{{ trans('twitter::widget.stat_counter') }}</a>
        </p>
    </div>
</div>
