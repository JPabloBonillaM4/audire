@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<article class="seo-content" aria-hidden="false">
    <h1>Audire Audiología - Especialistas en Salud Auditiva en Ciudad de México</h1>
    <p>Bienvenido a Audire Audiología, tu clínica especializada en diagnóstico, tratamiento y rehabilitación auditiva en Ciudad de México. Ofrecemos servicios profesionales de audiometría, tamiz auditivo neonatal, adaptación de auxiliares auditivos, potenciales evocados auditivos y más.</p>
    <section>
        <h2>Nuestros Servicios de Audiología</h2>
        <p>Contamos con tecnología de vanguardia para brindarte el mejor diagnóstico auditivo. Nuestros especialistas están comprometidos con tu salud auditiva.</p>
        <ul>
            <li><a href="{{ route('services') }}">Audiometría tonal liminar</a></li>
            <li><a href="{{ route('services') }}">Tamiz auditivo neonatal</a></li>
            <li><a href="{{ route('services') }}">Potenciales evocados auditivos</a></li>
            <li><a href="{{ route('services') }}">Impedanciometría</a></li>
            <li><a href="{{ route('services') }}">Emisiones otoacústicas</a></li>
            <li><a href="{{ route('services') }}">Adaptación de auxiliares auditivos</a></li>
        </ul>
    </section>
    <section>
        <h2>Productos y Auxiliares Auditivos</h2>
        <p>Descubre nuestra amplia gama de <a href="{{ route('products') }}">auxiliares auditivos</a> y accesorios de las mejores marcas del mercado.</p>
    </section>
    <section>
        <h2>Ubicación y Contacto</h2>
        <p>Visítanos en Av. Lindavista 251, 2do Piso, Lindavista Norte, 07300, Ciudad de México o en Calz. Ticoman 221, Local 3, Col. Residencial Zacatenco, 07369.</p>
        <p>Teléfono: <a href="tel:+525511621285">55 1162 1285</a></p>
    </section>
    <nav aria-label="Navegación principal">
        <a href="{{ route('about-us') }}">Conoce a nuestro equipo</a>
        <a href="{{ route('services') }}">Servicios de audiología</a>
        <a href="{{ route('products') }}">Productos auditivos</a>
        <a href="{{ route('tips') }}">Tips de salud auditiva</a>
        <a href="{{ route('contact') }}">Agenda tu cita</a>
    </nav>
</article>
<home-section></home-section>
@endsection