<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.head')

<body>
    <div class="container">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="col-6 py-3">
                <form class="text-center" action=@yield('route') method="POST" enctype="multipart/form-data">
                    @csrf
                    @yield('form-content')
                </form>
            </div>
        </div>
    </div>
</body>

</html>
