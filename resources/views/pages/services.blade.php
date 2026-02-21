@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<article class="seo-content" aria-hidden="false">
    <h1>Servicios de Audiología Profesional en Ciudad de México</h1>
    <p>En <a href="{{ route('about-us') }}">Audire Audiología</a> ofrecemos una amplia gama de servicios audiológicos para diagnosticar y tratar problemas de audición en pacientes de todas las edades.</p>
    <section>
        <h2>Audiometría Tonal Liminar</h2>
        <p>Estudio fundamental para evaluar la capacidad auditiva mediante tonos puros a diferentes frecuencias e intensidades.</p>
    </section>
    <section>
        <h2>Tamiz Auditivo Neonatal</h2>
        <p>Prueba de detección temprana de problemas auditivos en recién nacidos, esencial para el desarrollo del lenguaje.</p>
    </section>
    <section>
        <h2>Potenciales Evocados Auditivos</h2>
        <p>Estudio electrofisiológico que evalúa la integridad de la vía auditiva desde el oído hasta el cerebro.</p>
    </section>
    <section>
        <h2>Impedanciometría</h2>
        <p>Evaluación de la función del oído medio para detectar problemas de conducción del sonido.</p>
    </section>
    <section>
        <h2>Emisiones Otoacústicas</h2>
        <p>Prueba objetiva que evalúa la función de las células ciliadas externas del oído interno.</p>
    </section>
    <section>
        <h2>Adaptación de Auxiliares Auditivos</h2>
        <p>Proceso personalizado de selección, programación y ajuste de <a href="{{ route('products') }}">auxiliares auditivos</a> según las necesidades de cada paciente.</p>
    </section>
    <nav aria-label="Enlaces relacionados">
        <a href="{{ route('products') }}">Ver productos auditivos</a>
        <a href="{{ route('contact') }}">Agenda tu cita</a>
        <a href="{{ route('tips') }}">Tips de salud auditiva</a>
    </nav>
</article>
<services-section></services-section>
@endsection