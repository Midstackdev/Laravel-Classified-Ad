@if (isset($category))

    <search :category-id="{{ $category->id }}" :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></search>
@else
    <search :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></search>
@endif
<hr>