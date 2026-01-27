@include('layouts.head')
<div id="app">
    {{-- Navbar --}}
    <navbar-component></navbar-component>
    @yield('content')
    {{-- Whatssapp contact --}}
    <whatsapp-contact></whatsapp-contact>
</div>
@include('layouts.foot')