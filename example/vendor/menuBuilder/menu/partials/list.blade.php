@if ($child === true)
    <li @if(Request::path() === $item['path']) class="active" @endif>
@else
    <li @if (isset($item['children'])) data-toggle="collapse" data-target="#menu-item-{{ $item['id'] }}" class="collapsed active" @endif>
@endif
    <a href="{{ $item['path'] }}">
        @if (!empty($item['class']))
            <i class="{{ $item['class'] }}"></i>
        @endif
        {{ $item['title'] }}
        @if (isset($item['children']))
            <span class="arrow"></span>
        @endif
    </a>
</li>

@if (isset($item['children']))
    <ul class="sub-menu collapse" id="menu-item-{{ $item['id'] }}">
        {!! \ToxicLemurs\MenuBuilder\models\Menu::generateMenuHtml($item['children'], true) !!}
    </ul>
@endif
