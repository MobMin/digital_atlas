<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{ ucwords(trans('you-tube-popular-videos::widget.title')) }}</h3>
        @foreach ($videos as $video)
        @if($loop->last)
            <div>
        @else
            <div id="yt-most-popular-{{ $video->id }}" class="border-bottom mb-3">
        @endif
            
                <div class="text-center">
                    <a href="https://www.youtube.com/watch?v={{ $video->you_tube_id }}" rel="nofollow" alt="{{ trans('you-tube-popular-videos::widget.alt_video_link') }}" title="{{ trans('you-tube-popular-videos::widget.alt_video_link') }}" target="_blank" class="youtube-thumbnail">
                        <img src="{{ $video->thumbnail_url }}" class="img-fluid w-100" alt="{{ trans('you-tube-popular-videos::widget.alt_thumbnail_img') }}" />
                    </a>
                </div>
                <h5 class="mt-2">
                    <a href="https://www.youtube.com/watch?v={{ $video->you_tube_id }}" rel="nofollow" alt="{{ trans('you-tube-popular-videos::widget.alt_video_link') }}" title="{{ trans('you-tube-popular-videos::widget.alt_video_link') }}" target="_blank">
                        {{ $video->title }}
                    </a>
                </h5>
                <p>
                    {{ trans('you-tube-popular-videos::widget.channel') }}: 
                    <a href="https://www.youtube.com/channel/{{ $video->channel_id }}" rel="nofollow" alt="{{ trans('you-tube-popular-videos::widget.alt_channel_link') }}" title="{{ trans('you-tube-popular-videos::widget.alt_channel_link') }}" target="_blank">
                        {{ $video->channel_title }}
                    </a>
                </p>
            </div>
        @endforeach
    </div>
    <div class="card-footer text-muted">
        <p class="credit">{{ trans('you-tube-popular-videos::widget.provided_by') }} <a href="https://youtube.com" rel="nofollow" target="_blank">YouTube</a></p>
    </div>
</div>
<style>
    a.youtube-thumbnail:hover {
        opacity: .70;
    }
</style>