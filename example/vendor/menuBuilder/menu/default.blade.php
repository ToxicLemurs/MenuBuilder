<div class="nav-side-menu">
    <div class="brand">Brand Logo</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            {!! \ToxicLemurs\MenuBuilder\models\Menu::generateMenuHtml($menuTree) !!}
        </ul>
    </div>
</div>
