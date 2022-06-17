<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')

<body>
    {{-- <div class="container-fluid background-image-form ">
        <div class="row ">
            <div class="col-12 py-3"> --}}
    @yield('form-content')
    {{-- </div>
        </div>
    </div> --}}
    @yield('script-content')
</body>

</html>
