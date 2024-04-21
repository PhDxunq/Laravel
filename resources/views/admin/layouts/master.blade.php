@include('admin.layouts.header')
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-4">
                @include('admin.layouts.sidebar')
            </div>
            <div class="col-8">
                @yield('main')
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.footer')