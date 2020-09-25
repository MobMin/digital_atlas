<div class="card m-3">
    <div class="card-body">
        <h3 class="card-title">{{ ucwords(trans('maps::widget.title')) }}</h3>
        @if(empty($coords))
            <p class="map-warning">{{ ucwords(trans('google-map::widget.map_missing')) }}</p>
        @else
            <div id="country-map"></div>
            <p class="map-warning d-none">{{ ucwords(trans('google-map::widget.map_missing')) }}</p>
        @endif
    </div>
    <div class="card-footer text-muted">
        <p class="credit">{{ ucfirst(trans('maps::widget.provided_by')) }} <a href="https://leafletjs.com/" target="_blank" rel="nofollow">{{ trans('maps::widget.provider') }}</a> & <a href="https://www.openstreetmap.org/" target="_blank" rel="nofollow">{{ trans('maps::widget.open_street_maps') }}</a></p>
    </div>
</div>
<style media="screen">
    #country-map {
        height: 400px;
    }
</style>
<script type="text/javascript">
$(function() {
@if(!empty($coords))
    var mymap = L.map('country-map').setView([{{$coords[0]}},{{$coords[1]}}], 4);
    L.tileLayer("{{$settings['tile_provider']}}", {
        attribution: '&copy; {!!html_entity_decode($settings["tile_copyright"])!!}',
        maxZoom: {{$settings['zoom']}},
    }).addTo(mymap);
    $.ajax({
        url: "{{Request::root()}}/widgets/maps-data/{{strtolower($country['alpha_three_code'])}}.geo.json",
        method: 'GET',
        success: function(result) {
            L.geoJSON(result).addTo(mymap);
        },
        error: function() {
            $('#country-map').hide();
            $('p.map-warning').removeClass('d-none');
        }
    });
@endif
});
</script>
