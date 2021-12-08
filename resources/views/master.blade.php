    <!DOCTYPE html>
    <html lang="en">

        @include('partials.head')

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">

                @include('partials.nav-bar')
                @include('partials.side-bar')

                   @yield('content')

                @include('partials.footer')

        </body>
    </html>
