<h3>{{ $current->year_reported }} Population</h3>
<dl class="row">
    <dt class="col-sm-3">Total</dt>
    <dd class="col-sm-9">{{ number_format($current->total) }}</dd>
    <dt class="col-sm-3">Men</dt>
    <dd class="col-sm-9">{{ number_format($current->men) }}</dd>
    <dt class="col-sm-3">Women</dt>
    <dd class="col-sm-9">{{ number_format($current->women) }}</dd>
    <dt class="col-sm-3">Density</dt>
    <dd class="col-sm-9">{{ number_format($current->density) }}</dd>
</dl>
