@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<div class="seo-content" aria-hidden="false">
    <h1>Servicios de Audiología Profesional</h1>
    <p>En Audire ofrecemos una amplia gama de servicios audiológicos para diagnosticar y tratar problemas de audición en pacientes de todas las edades.</p>
    <h2>Audiometría Tonal Liminar</h2>
    <p>Estudio fundamental para evaluar la capacidad auditiva mediante tonos puros a diferentes frecuencias e intensidades.</p>
    <h2>Tamiz Auditivo Neonatal</h2>
    <p>Prueba de detección temprana de problemas auditivos en recién nacidos, esencial para el desarrollo del lenguaje.</p>
    <h2>Potenciales Evocados Auditivos</h2>
    <p>Estudio electrofisiológico que evalúa la integridad de la vía auditiva desde el oído hasta el cerebro.</p>
    <h2>Impedanciometría</h2>
    <p>Evaluación de la función del oído medio para detectar problemas de conducción del sonido.</p>
    <h2>Emisiones Otoacústicas</h2>
    <p>Prueba objetiva que evalúa la función de las células ciliadas externas del oído interno.</p>
    <h2>Adaptación de Auxiliares Auditivos</h2>
    <p>Proceso personalizado de selección, programación y ajuste de auxiliares auditivos según las necesidades de cada paciente.</p>
</div>
<services-section></services-section>
@endsection