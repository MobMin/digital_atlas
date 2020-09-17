<h1>{{ $country->name }}</h1>
@asyncWidget('App\Widgets\Population\PopulationWidget', [], $country)
