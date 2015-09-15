<ul>
    <li>
        <a href="{{ $item['path'] }}" class="{{ $item['class'] }}">
            @if (!empty($item['icon']))
                <i class="{{ $item['icon'] }}"></i>
            @endif
            <span>
                {{ $item['title'] }}
                @if (!empty($item['small_class']))
                    <small class="{{ $item['small_class'] }}">{{ $item['small_text'] }}</small>
                @endif
            </span>

            @if (isset($item['children']))
                <span class="caret"></span>
            @endif
        </a>
        @if (isset($item['children']))
            {!! \ToxicLemurs\MenuBuilder\models\Menu::generateMenuHtml($item['children'], true) !!}
        @endif
    </li>
</ul>