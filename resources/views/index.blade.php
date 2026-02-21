@include('layouts.head')
<div id="app">
    {{-- Loader --}}
    <loader-component></loader-component>
    {{-- Navbar --}}
    <navbar-component></navbar-component>
    {{-- Main content with semantic landmark --}}
    <main role="main">
        @yield('content')
    </main>
    {{-- Footer --}}
    <footer-component></footer-component>
    {{-- Whatssapp contact --}}
    <whatsapp-contact></whatsapp-contact>
</div>
{{-- Fallback for users/bots without JavaScript --}}
<noscript>
    <div style="padding: 2rem; text-align: center; font-family: sans-serif;">
        <h1>Audire Audiología</h1>
        <p>Para una mejor experiencia, por favor habilita JavaScript en tu navegador.</p>
        <p>Somos especialistas en salud auditiva: audiometrías, auxiliares auditivos, tamiz neonatal y más.</p>
        <p>Teléfono: <a href="tel:+525511621285">55 1162 1285</a></p>
        <p>Sucursal Lindavista: Av. Lindavista 251, 2do Piso, Lindavista Norte, CP 07300, CDMX</p>
        <p>Sucursal Zacatenco: Calz. Ticoman 221, Local 3, Col. Residencial Zacatenco, CP 07369, CDMX</p>
        <nav>
            <a href="/">Inicio</a> |
            <a href="/nosotros">Nosotros</a> |
            <a href="/servicios">Servicios</a> |
            <a href="/productos">Productos</a> |
            <a href="/tips">Tips</a> |
            <a href="/contacto">Contacto</a>
        </nav>
    </div>
</noscript>
@include('layouts.foot')