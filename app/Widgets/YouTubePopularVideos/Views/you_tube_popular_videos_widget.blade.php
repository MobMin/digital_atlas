<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{ ucwords(trans('you-tube-popular-videos::widget.title')) }}</h3>
        <div id="yt-most-popular-list" class="d-none">
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
        <div id="yt-most-popular-carousel">
            <div class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($videos as $video)
                        <div class="carousel-item{{$loop->first ? ' active' : '' }}" data-yt-id="{{ $video->you_tube_id }}" data-yt-channel-id="{{ $video->channel_id }}" data-yt-title="{{ $video->title }}" data-yt-channel-title="{{ $video->channel_title }}">
                            <img src="{{ $video->thumbnail_url }}" class="img-fluid w-100" alt="{{ trans('you-tube-popular-videos::widget.alt_thumbnail_img') }}" />
                        </div>
                    @endforeach
                </div>
                <a class="yt-carousel-control-prev carousel-control-prev" href="#" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ trans('you-tube-popular-videos::widget.previous') }}</span>
                </a>
                <a class="yt-carousel-control-next carousel-control-next" href="#" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ trans('you-tube-popular-videos::widget.next') }}</span>
                </a>
            </div>
        </div>
        <div id="yt-carousel-details"></div>
    </div>
    <div class="card-footer text-muted">
        <p class="credit">{{ trans('you-tube-popular-videos::widget.provided_by') }} <a href="https://youtube.com" rel="nofollow" target="_blank">YouTube</a></p>
    </div>
    <div id="yt-template-slide-details" class="d-none">
        <h5 class="mt-2" id="yt-template-title">
            <a href="" rel="nofollow" alt="{{ trans('you-tube-popular-videos::widget.alt_video_link') }}" title="{{ trans('you-tube-popular-videos::widget.alt_video_link') }}" target="_blank">
            </a>
        </h5>
        <p id="yt-template-channel">
            {{ trans('you-tube-popular-videos::widget.channel') }}: 
            <a href="" rel="nofollow" alt="{{ trans('you-tube-popular-videos::widget.alt_channel_link') }}" title="{{ trans('you-tube-popular-videos::widget.alt_channel_link') }}" target="_blank">
            </a>
        </p>
    </div>
</div>
<style>
    a.youtube-thumbnail:hover {
        opacity: .70;
    }
</style>
<script type="text/javascript">
    /**
     *  Add the slide details
     * 
     * @param  {object} $active - The active JQuery element
     *
     * @return void
     */
    function ytAddSlideDetails($active) {
        var $template = $('#yt-template-slide-details');
        $template.find('#yt-template-title > a')
            .attr('href', 'https://www.youtube.com/watch?v=' + $active.data('yt-id'))
            .text($active.data('yt-title'));
        $template.find('#yt-template-channel > a')
            .attr('href', 'https://www.youtube.com/channel/' + $active.data('yt-channel-id'))
            .text($active.data('yt-channel-title'));
        $('#yt-carousel-details').html($template.html());
    }
    $(function() {
        var $slider = $('#yt-most-popular-carousel .carousel').carousel({interval: false});
        ytAddSlideDetails($slider.find('.carousel-item.active').eq(0));
        $slider.bind('slid.bs.carousel', function() {
            ytAddSlideDetails($slider.find('.carousel-item.active').eq(0));
        });
        $('.yt-carousel-control-next').on('click', function(event) {
            event.stopPropagation();
            $slider.carousel('next');
            return false;
        });
        $('.yt-carousel-control-prev').on('click', function(event) {
            event.stopPropagation();
            $slider.carousel('prev');
            return false;
        });
    });
</script>