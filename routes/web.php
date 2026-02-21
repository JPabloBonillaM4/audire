<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;

Route::get('/', [GeneralController::class, 'home'])->name('home');
Route::get('/nosotros', [GeneralController::class, 'aboutUs'])->name('about-us');
Route::get('/servicios', [GeneralController::class, 'services'])->name('services');
Route::get('/productos', [GeneralController::class, 'products'])->name('products');
Route::get('/tips', [GeneralController::class, 'tips'])->name('tips');
Route::get('/contacto', [GeneralController::class, 'contact'])->name('contact');

// Sitemap XML
Route::get('/sitemap.xml', function () {
    $pages = [
        ['url' => url('/'),            'priority' => '1.0', 'changefreq' => 'weekly'],
        ['url' => url('/nosotros'),    'priority' => '0.8', 'changefreq' => 'monthly'],
        ['url' => url('/servicios'),   'priority' => '0.9', 'changefreq' => 'monthly'],
        ['url' => url('/productos'),   'priority' => '0.9', 'changefreq' => 'monthly'],
        ['url' => url('/tips'),        'priority' => '0.7', 'changefreq' => 'weekly'],
        ['url' => url('/contacto'),    'priority' => '0.8', 'changefreq' => 'monthly'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($pages as $page) {
        $xml .= "  <url>\n";
        $xml .= "    <loc>{$page['url']}</loc>\n";
        $xml .= "    <lastmod>" . now()->toDateString() . "</lastmod>\n";
        $xml .= "    <changefreq>{$page['changefreq']}</changefreq>\n";
        $xml .= "    <priority>{$page['priority']}</priority>\n";
        $xml .= "  </url>\n";
    }

    $xml .= '</urlset>';

    return response($xml, 200, [
        'Content-Type' => 'application/xml',
    ]);
})->name('sitemap');