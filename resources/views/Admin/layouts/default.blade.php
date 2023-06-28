<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('Admin.includes.head')
</head>
@php
    $bodyClass = !empty($boxedLayout) ? 'boxed-layout' : '';
    $bodyClass .= !empty($paceTop) ? 'pace-top ' : '';
    $bodyClass .= !empty($bodyExtraClass) ? $bodyExtraClass . ' ' : '';
    $sidebarHide = !empty($sidebarHide) ? $sidebarHide : '';
    $sidebarTwo = !empty($sidebarTwo) ? $sidebarTwo : '';
    $sidebarSearch = !empty($sidebarSearch) ? $sidebarSearch : '';
    $topMenu = !empty($topMenu) ? $topMenu : '';
    $footer = !empty($footer) ? $footer : '';

    $pageContainerClass = !empty($topMenu) ? 'page-with-top-menu ' : '';
    $pageContainerClass .= !empty($sidebarRight) ? 'page-with-right-sidebar ' : '';
    $pageContainerClass .= !empty($sidebarLight) ? 'page-with-light-sidebar ' : '';
    $pageContainerClass .= !empty($sidebarWide) ? 'page-with-wide-sidebar ' : '';
    $pageContainerClass .= !empty($sidebarHide) ? 'page-without-sidebar ' : '';
    $pageContainerClass .= !empty($sidebarMinified) ? 'page-sidebar-minified ' : '';
    $pageContainerClass .= !empty($sidebarTwo) ? 'page-with-two-sidebar ' : '';
    $pageContainerClass .= !empty($contentFullHeight) ? 'page-content-full-height ' : '';

    $contentClass = !empty($contentFullWidth) || !empty($contentFullHeight) ? 'content-full-width ' : '';
    $contentClass .= !empty($contentInverseMode) ? 'content-inverse-mode ' : '';
@endphp

<body class="{{ $bodyClass }}">
    @include('Admin.includes.component.page-loader')

    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed {{ $pageContainerClass }}">
        @include('Admin.includes.header')
        @includeWhen($topMenu, 'Admin.includes.top-menu')

        @include('Admin.includes.sidebar')

        <div id="content" class="content {{ $contentClass }}">
            @yield('content')
        </div>

        @include('Admin.includes.component.scroll-top-btn')
    </div>
    @include('Admin.includes.page-js')
</body>

</html>
