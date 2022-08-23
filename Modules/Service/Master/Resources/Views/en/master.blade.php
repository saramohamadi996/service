
<!DOCTYPE html>
<html lang="en">
@include('Master::en.layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('Master::en.layouts.preloader')
@include('Master::en.layouts.navbar')
    @include('Master::en.layouts.sidebar')
    <div class="content-wrapper">
        @include('Master::en.layouts.header')
        <section class="content">
        @yield('content')
        </section>
    </div>
@include('Master::en.layouts.footer')
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>
@include('Master::en.layouts.foot')
</body>
{{--@include('sweet::alert')--}}
</html>

