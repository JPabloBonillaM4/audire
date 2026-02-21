@extends('index')
@section('content')
{{-- SSR content visible to search engines --}}
<article class="seo-content" aria-hidden="false">
    <h1>Productos y Auxiliares Auditivos en Ciudad de México</h1>
    <p>Descubre nuestra amplia selección de auxiliares auditivos y productos para la salud auditiva. Trabajamos con las mejores marcas del mercado para ofrecerte soluciones tecnológicas de vanguardia.</p>
    <section>
        <h2>Auxiliares Auditivos</h2>
        <p>Ofrecemos diversos tipos de auxiliares auditivos: retroauriculares (BTE), intracanales (ITC), completamente en canal (CIC) y de receptor en canal (RIC), adaptados a cada necesidad.</p>
    </section>
    <section>
        <h2>Accesorios y Protección Auditiva</h2>
        <p>Complementa tu experiencia auditiva con accesorios de conectividad, protectores auditivos personalizados y productos de mantenimiento.</p>
    </section>
    <nav aria-label="Enlaces relacionados">
        <a href="{{ route('services') }}">Conoce nuestros servicios</a>
        <a href="{{ route('contact') }}">Solicita asesoría personalizada</a>
        <a href="{{ route('tips') }}">Tips para cuidar tus auxiliares</a>
    </nav>
</article>
<products-section></products-section>
@endsection