<h2>{{ $current->year_reported }} Population</h2>
<dl>
    <dt>Total</dt>
    <dd>{{ number_format($current->total) }}</dd>
    <dt>Men</dt>
    <dd>{{ number_format($current->men) }}</dd>
    <dt>Women</dt>
    <dd>{{ number_format($current->women) }}</dd>
    <dt>Density</dt>
    <dd>{{ number_format($current->density) }}</dd>
</dl>
