<!DOCTYPE html>
<html>
@include('templates.partials_user.head')

<body data-spy="scroll" data-target="#navbar-scroll">

    <div id="top"></div>

    <!-- NAVIGATION -->
    @include('templates.partials_user.top_nav')

    <div class="page-content">
        @yield('content')
    </div>
    <!-- footer -->
    @include('templates.partials_user.footer')

    @include('templates.partials_user.scripts')
</body>
</html>