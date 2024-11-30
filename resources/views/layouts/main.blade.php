<!doctype html>
<html lang="en">

@include('partials.head')

<body>

    @include('partials.header')

    <div class="main-wrapper ">
     
        @yield('content')

       @include('partials.footer')

    </div>

    @include('partials.scripts')

</body>

</html>