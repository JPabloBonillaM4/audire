@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<article class="seo-content" aria-hidden="false">
    <h1>Tips y Consejos de Salud Auditiva</h1>
    <p>Descubre consejos prácticos para cuidar tu salud auditiva. Nuestros especialistas de <a href="{{ route('about-us') }}">Audire Audiología</a> comparten información valiosa sobre prevención, cuidado y bienestar auditivo.</p>
    <section>
        <h2>Prevención de Pérdida Auditiva</h2>
        <p>Aprende cómo proteger tu audición en ambientes ruidosos, el uso correcto de protectores auditivos y hábitos saludables para mantener una buena salud auditiva. Visita nuestros <a href="{{ route('services') }}">servicios de audiología</a> para un diagnóstico profesional.</p>
    </section>
    <section>
        <h2>Cuidado de Auxiliares Auditivos</h2>
        <p>Consejos para el mantenimiento y limpieza de tus <a href="{{ route('products') }}">auxiliares auditivos</a>, prolongando su vida útil y asegurando un rendimiento óptimo.</p>
    </section>
    <nav aria-label="Enlaces relacionados">
        <a href="{{ route('services') }}">Servicios de audiología</a>
        <a href="{{ route('products') }}">Productos auditivos</a>
        <a href="{{ route('contact') }}">Consulta con un especialista</a>
    </nav>
</article>
<tips-section></tips-section>
@endsection