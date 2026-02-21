<?php

namespace App\Http\Controllers;

class GeneralController extends Controller
{
    /**
     * SEO metadata for each page.
     */
    private function getSeoData(): array
    {
        return [
            'home' => [
                'title'       => 'Audire Audiología | Especialistas en Salud Auditiva',
                'description' => 'Audire Audiología: especialistas en diagnóstico, tratamiento y rehabilitación auditiva. Auxiliares auditivos, audiometrías, tamiz neonatal y más. ¡Agenda tu cita!',
                'keywords'    => 'audiología, auxiliares auditivos, audiometrías, salud auditiva, tamiz auditivo neonatal, aparatos auditivos, pérdida auditiva',
            ],
            'about-us' => [
                'title'       => 'Nosotros - Conoce a Audire Audiología | Especialistas en Audición',
                'description' => 'Conoce a Audire Audiología, nuestro equipo de especialistas en salud auditiva comprometidos con mejorar tu calidad de vida a través de soluciones auditivas personalizadas.',
                'keywords'    => 'audire audiología, especialistas audición, equipo audiología, sobre nosotros, clínica auditiva',
            ],
            'services' => [
                'title'       => 'Servicios de Audiología | Audiometrías, Tamiz Neonatal | Audire',
                'description' => 'Descubre nuestros servicios de audiología: audiometrías, tamiz auditivo neonatal, adaptación de auxiliares auditivos, potenciales evocados y más. Diagnóstico profesional.',
                'keywords'    => 'servicios audiología, audiometría tonal, tamiz auditivo neonatal, potenciales evocados auditivos, impedanciometría, emisiones otoacústicas',
            ],
            'products' => [
                'title'       => 'Productos y Auxiliares Auditivos | Audire Audiología',
                'description' => 'Encuentra los mejores auxiliares auditivos y productos para la salud auditiva. Marcas líderes, tecnología de vanguardia y asesoría personalizada en Audire.',
                'keywords'    => 'auxiliares auditivos, aparatos auditivos, productos audiología, audífonos, protección auditiva, accesorios auditivos',
            ],
            'tips' => [
                'title'       => 'Tips y Consejos de Salud Auditiva | Audire Audiología',
                'description' => 'Consejos y tips para cuidar tu salud auditiva. Aprende sobre prevención de pérdida auditiva, cuidado de auxiliares auditivos y bienestar auditivo con Audire.',
                'keywords'    => 'tips salud auditiva, consejos audición, prevención pérdida auditiva, cuidado auditivo, bienestar auditivo',
            ],
            'contact' => [
                'title'       => 'Contacto | Agenda tu Cita en Audire Audiología',
                'description' => 'Contáctanos para agendar tu cita de audiología. Estamos para ayudarte con diagnóstico y tratamiento auditivo. Llámanos o envíanos un mensaje.',
                'keywords'    => 'contacto audiología, agendar cita audición, teléfono audire, dirección audire, cita audiometría',
            ],
        ];
    }

    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $seo = $this->getSeoData()['home'];
        return view('pages.home', compact('seo'));
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        $seo = $this->getSeoData()['about-us'];
        return view('pages.about-us', compact('seo'));
    }

    /**
     * Show the services page.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        $seo = $this->getSeoData()['services'];
        return view('pages.services', compact('seo'));
    }

    /**
     * Show the products page.
     *
     * @return \Illuminate\View\View
     */
    public function products()
    {
        $seo = $this->getSeoData()['products'];
        return view('pages.products', compact('seo'));
    }

    /**
     * Show the tips page.
     *
     * @return \Illuminate\View\View
     */
    public function tips()
    {
        $seo = $this->getSeoData()['tips'];
        return view('pages.tips', compact('seo'));
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $seo = $this->getSeoData()['contact'];
        return view('pages.contact', compact('seo'));
    }
}
