<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.head')
<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                @include('layouts.admin.sidebar')
            </div>
        </div>
        <div id="main">
            @include('layouts.admin.navbar')

            <div class="main-content container-fluid">
                @yield('content')
            </div>

            @include('layouts.admin.footer')
        </div>
    </div>

    @include('layouts.admin.scripts')
</body>
</html>
