<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                @php
                    $menu = $adminlte->menu('sidebar');
                    $menuSuperAdmin = array();
                    $menuKeuangan = array();
                    $menuKasir = array();
                    foreach($menu as $x => $val) {
                        if ($val['isSuperAdmin'] === true) {
                            array_push($menuSuperAdmin,$val);
                        }
                        if ($val['isKeuangan'] === true) {
                            array_push($menuKeuangan,$val);
                        }
                        if ($val['isKasir'] === true) {
                            array_push($menuKasir,$val);
                        }
                    }
                @endphp
                {{-- Configured sidebar links --}}
                @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                    @each('adminlte::partials.sidebar.menu-item',$menuKasir , 'item')
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                    @each('adminlte::partials.sidebar.menu-item',$menuKeuangan , 'item')
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                    @each('adminlte::partials.sidebar.menu-item',$menuSuperAdmin , 'item')
                @endif
            </ul>
        </nav>
    </div>

</aside>
