<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('shared.head')

<body>
    {{-- @include('shared.header') --}}
    {{-- @include('shared.aside') --}}
    <main id="main" class="main">
        <h1 class="text-center text-info display-1"> Hello At Admin Panel  </h1>
        <h4 class="text-center">Cant View This page For all User Admin Only</h4>
    </main>

<form method="POST" action="{{route("newadmin.logout")}}">
@csrf
<button class="btn btn-info" type="submit">logout</button>
</form>
    @include('shared.footer')
    @include('shared.script')
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
</body>

</html>
