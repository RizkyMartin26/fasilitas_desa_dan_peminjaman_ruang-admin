<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.header')
    @include('layouts.admin.css')
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
            <div id="app">
                <div id="main">
                    @yield('content')
                </div>
            </div>
            @include('layouts.admin.footer')
            @include('layouts.admin.script')
        </div>
    </div>
</body>

</html>
