@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<article class="seo-content" aria-hidden="false">
    <h1>Nosotros - Conoce a Audire Audiología en Ciudad de México</h1>
    <p>En Audire Audiología somos un equipo de especialistas comprometidos con mejorar la calidad de vida de nuestros pacientes a través de soluciones auditivas personalizadas. Contamos con años de experiencia en el campo de la audiología clínica en Ciudad de México.</p>
    <section>
        <h2>Nuestra Misión</h2>
        <p>Brindar atención audiológica integral con los más altos estándares de calidad, utilizando tecnología de vanguardia para el diagnóstico y tratamiento de problemas auditivos.</p>
    </section>
    <section>
        <h2>Nuestro Equipo</h2>
        <p>Nuestro equipo está formado por audiólogos certificados y profesionales de la salud auditiva con amplia experiencia clínica.</p>
    </section>
    <nav aria-label="Enlaces relacionados">
        <a href="{{ route('services') }}">Conoce nuestros servicios</a>
        <a href="{{ route('products') }}">Ver productos auditivos</a>
        <a href="{{ route('contact') }}">Agenda tu cita</a>
    </nav>
</article>
<about-us-section></about-us-section>
@endsection