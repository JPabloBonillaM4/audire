@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<div class="seo-content" aria-hidden="false">
    <h1>Audire Audiología - Especialistas en Salud Auditiva</h1>
    <p>Bienvenido a Audire Audiología, tu clínica especializada en diagnóstico, tratamiento y rehabilitación auditiva. Ofrecemos servicios profesionales de audiometría, tamiz auditivo neonatal, adaptación de auxiliares auditivos, potenciales evocados auditivos y más.</p>
    <h2>Nuestros Servicios</h2>
    <p>Contamos con tecnología de vanguardia para brindarte el mejor diagnóstico auditivo. Nuestros especialistas están comprometidos con tu salud auditiva.</p>
    <h2>Productos Auditivos</h2>
    <p>Descubre nuestra amplia gama de auxiliares auditivos y accesorios de las mejores marcas del mercado.</p>
    <nav aria-label="Navegación principal">
        <a href="{{ route('about-us') }}">Nosotros</a>
        <a href="{{ route('services') }}">Servicios</a>
        <a href="{{ route('products') }}">Productos</a>
        <a href="{{ route('tips') }}">Tips</a>
        <a href="{{ route('contact') }}">Contacto</a>
    </nav>
</div>
<home-section></home-section>
@endsection