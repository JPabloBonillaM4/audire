@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<article class="seo-content" aria-hidden="false">
    <h1>Contacto - Agenda tu Cita en Audire Audiología</h1>
    <p>¿Necesitas una consulta audiológica? Contáctanos para agendar tu cita. Nuestro <a href="{{ route('about-us') }}">equipo de especialistas</a> está listo para atenderte y brindarte la mejor solución auditiva.</p>
    <section>
        <h2>Información de Contacto</h2>
        <p>Teléfono: <a href="tel:+525511621285">55 1162 1285</a></p>
        <p>Agenda tu cita de audiología hoy mismo. Estamos disponibles para atenderte y resolver todas tus dudas sobre salud auditiva.</p>
    </section>
    <section>
        <h2>Sucursal Lindavista</h2>
        <address>Av. Lindavista 251, 2do Piso, Lindavista Norte, CP 07300, Ciudad de México, CDMX, México</address>
    </section>
    <section>
        <h2>Sucursal Zacatenco</h2>
        <address>Calz. Ticoman 221, Local 3, Col. Residencial Zacatenco, CP 07369, Alcaldía Gustavo A. Madero, Ciudad de México</address>
    </section>
    <nav aria-label="Enlaces relacionados">
        <a href="{{ route('services') }}">Conoce nuestros servicios</a>
        <a href="{{ route('products') }}">Productos auditivos</a>
        <a href="{{ route('home') }}">Volver al inicio</a>
    </nav>
</article>
<contact-section></contact-section>
@endsection