<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.header')

<body>
    <div id="app">
        @include('layouts.admin.navbar')
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                @include('layouts.admin.sidebar')
            </div>
        </div>
        <div class="main-content container-fluid">
            @yield('content')
        </div>
        @include('layouts.admin.footer')
        @include('layouts.admin.script')
    </div>
    </div>
</body>

</html>
