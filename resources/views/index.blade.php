@include('layouts.head')
<div id="app">
    {{-- Loader --}}
    <loader-component></loader-component>
    {{-- Navbar --}}
    <navbar-component></navbar-component>
    @yield('content')
    {{-- Footer --}}
    <footer-component></footer-component>
    {{-- Whatssapp contact --}}
    <whatsapp-contact></whatsapp-contact>
</div>
@include('layouts.foot')