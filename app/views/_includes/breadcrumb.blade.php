
<ol class="breadcrumb">
    <li><a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a></li>
@if (isset($breadcrumb))
@foreach ($breadcrumb as $path)
@if (isset($path['url']))
    <li><a href="{{ $path['url'] }}">{{ $path['label'] }}</a></li>
@else
    <li><span class="active">{{ $path['label'] }}</span></li>
@endif
@endforeach
@endif
</ol>
