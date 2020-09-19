<h3>People Groups</h3>
<dl class="row">
    <dt class="col-sm-6">Total</dt>
    <dd class="col-sm-6">{{ number_format($data->total_people_groups) }}</dd>
    <dt class="col-sm-6">Total Unreached</dt>
    <dd class="col-sm-6">{{ number_format($data->total_unreached) }}</dd>
    <dt class="col-sm-6">In 10/40 Window?</dt>
    <dd class="col-sm-6">
        @if ($data->in_1040)
            Yes
        @else
            No
        @endif
    </dd>
</dl>
<h3>Religion</h3>
<dl class="row">
    <dt class="col-sm-6">Main Religion</dt>
    <dd class="col-sm-6">{{ $data->primary_religion }}</dd>
</dl>
<table class="table table-striped">
    <caption>Religion Percentages</caption>
    <tbody>
        <tr>
            <td>Buddhist</td>
            <td>{{ $data->percent_buddhist }}%</td>
        </tr>
        <tr>
            <td>Christian (Evangelical)</td>
            <td>{{ $data->percent_christian }}% ({{ $data->percent_evangelical }}%)</td>
        </tr>
        <tr>
            <td>Hindu</td>
            <td>{{ $data->percent_hindu }}%</td>
        </tr>
        <tr>
            <td>Islam</td>
            <td>{{ $data->percent_islam }}%</td>
        </tr>
        <tr>
            <td>Ethnic</td>
            <td>{{ $data->percent_ethnic_religion }}%</td>
        </tr>
        <tr>
            <td>Other</td>
            <td>{{ $data->percent_other_religion }}%</td>
        </tr>
        <tr>
            <td>Non-Religious</td>
            <td>{{ $data->percent_non_religious }}%</td>
        </tr>
    </tbody>
</table>
<p class="credit">Data provided by <a href="https://joshuaproject.net/countries/{{ $data['rog3'] }}" target="_blank" rel="nofollow">Joshua Project</a></p>
