<div class="c-sidebar-brand d-md-down-none">
    <img class="c-sidebar-brand-full" src="{{ asset('assets/brand/coreui-base-white.svg') }}" width="118" height="46"
         alt="CoreUI Logo">
    <img class="c-sidebar-brand-minimized" src="assets/brand/coreui-signet-white.svg" width="118" height="46"
         alt="CoreUI Logo">
</div>

<ul class="c-sidebar-nav ps ps--active-y">

    <!-- link -->
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->routeIs("dm.admin.home") ? "c-active" : "" }}" href="#">
            <i class="cil-speedometer c-sidebar-nav-icon"></i>
            Dashboard
        </a>
    </li>

    <!-- title -->
    <li class="c-sidebar-nav-title">
        Create
    </li>

    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ request()->routeIs("dm.admin.posts.*") ? "c-active" : "" }}" href="{{ route("dm.admin.posts.index") }}">
            <i class="cil-pencil c-sidebar-nav-icon"></i>
            Posts
        </a>
    </li>

    <!-- dropdown -->
{{--    <li class="c-sidebar-nav-dropdown">--}}
{{--        <a class="c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--            <i class="cil-user c-sidebar-nav-icon"></i>--}}
{{--            Posts--}}
{{--        </a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--            <li class="c-sidebar-nav-item">--}}
{{--                <a class="c-sidebar-nav-link" href="#">Hello</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </li>--}}

</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
