<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.header')
</head>


<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.admin.wa')
            <div class="sidebar-wrapper active">
                @include('layouts.admin.sidebar')
                @include('layouts.admin.navbar')
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
