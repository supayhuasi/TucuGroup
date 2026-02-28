<?php

/**
 * Ejemplos de uso de la configuración institucional
 * 
 * Este archivo muestra cómo usar la configuración en controllers, 
 * vistas y otros lugares de la aplicación.
 */

// ========================================
// En un Controller
// ========================================

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class InstitutionalController extends Controller
{
    public function index()
    {
        // Obtener configuración
        $holding = config('institutional.holding');
        $companies = config('institutional.companies');
        $sectors = config('institutional.sectors');
        $values = config('institutional.values');
        $statistics = config('institutional.statistics');
        $contact = config('institutional.contact');

        return view('institutional', [
            'holding' => $holding,
            'companies' => $companies,
            'sectors' => $sectors,
            'values' => $values,
            'statistics' => $statistics,
            'contact' => $contact,
        ]);
    }

    // Ejemplo: Obtener una empresa específica
    public function getCompany($id)
    {
        $companies = config('institutional.companies');
        $company = collect($companies)->firstWhere('id', $id);
        
        return response()->json($company ?? ['error' => 'Company not found'], 
            $company ? 200 : 404);
    }

    // Ejemplo: Obtener estadísticas
    public function getStatistics()
    {
        return response()->json(config('institutional.statistics'));
    }
}

// ========================================
// En una Vista (Blade)
// ========================================

// Obtener configuración en una vista
@php
    $holding = config('institutional.holding');
    $companies = config('institutional.companies');
@endphp

<h1>{{ $holding['name'] }}</h1>
<p>{{ $holding['description'] }}</p>

@foreach($companies as $company)
    <div class="company-card">
        <h3>{{ $company['name'] }}</h3>
        <p>{{ $company['description'] }}</p>
        <a href="{{ $company['website'] }}">Ver más</a>
    </div>
@endforeach

// ========================================
// Modificar configuración en tiempo de ejecución
// ========================================

// Cambiar un valor de configuración
Config::set('institutional.contact.email', 'newemail@tucugroup.com.ar');

// Obtener el valor modificado
$email = config('institutional.contact.email');

// ========================================
// Usar configuración en rutas
// ========================================

// En routes/web.php
Route::get('/', function () {
    return view('institutional', [
        'meta' => config('institutional.seo'),
    ]);
})->name('home');

Route::get('/companies', function () {
    return response()->json(config('institutional.companies'));
})->name('companies.index');

Route::get('/sectors', function () {
    return response()->json(config('institutional.sectors'));
})->name('sectors.index');

// ========================================
// Crear Helper personalizado
// ========================================

// En app/Helpers/InstitutionalHelper.php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class InstitutionalHelper
{
    public static function getHolding()
    {
        return config('institutional.holding');
    }

    public static function getCompany($id)
    {
        return collect(config('institutional.companies'))
            ->firstWhere('id', $id);
    }

    public static function getCompanies()
    {
        return config('institutional.companies');
    }

    public static function getSectors()
    {
        return config('institutional.sectors');
    }

    public static function getValues()
    {
        return config('institutional.values');
    }

    public static function getStatistics()
    {
        return config('institutional.statistics');
    }

    public static function getContact()
    {
        return config('institutional.contact');
    }

    public static function getSocialLink($platform)
    {
        return config("institutional.social.{$platform}");
    }

    public static function getPrimaryColor()
    {
        return config('institutional.colors.primary');
    }
}

// Registrar el helper en composer.json
// "autoload": {
//     "classmap": ["database/seeds", "database/factories"],
//     "psr-4": {
//         "App\\": "app/",
//         "Database\\Factories\\": "database/factories/",
//         "Database\\Seeders\\": "database/seeders/"
//     },
//     "files": ["app/Helpers/InstitutionalHelper.php"]
// }

// Usar el helper
// InstitutionalHelper::getHolding()
// InstitutionalHelper::getCompany(1)

// ========================================
// Usar en una vista Blade con el helper
// ========================================

@php
    use App\Helpers\InstitutionalHelper;
@endphp

<h1>{{ InstitutionalHelper::getHolding()['name'] }}</h1>

@foreach(InstitutionalHelper::getCompanies() as $company)
    <div class="company">
        <h2>{{ $company['name'] }}</h2>
        <p>{{ $company['description'] }}</p>
    </div>
@endforeach

// ========================================
// Usar Middleware personalizado
// ========================================

// En app/Http/Middleware/ShareInstitutionalData.php

namespace App\Http\Middleware;

use Closure;

class ShareInstitutionalData
{
    public function handle($request, Closure $next)
    {
        view()->share([
            'institutional_holding' => config('institutional.holding'),
            'institutional_contact' => config('institutional.contact'),
            'institutional_social' => config('institutional.social'),
            'institutional_colors' => config('institutional.colors'),
        ]);

        return $next($request);
    }
}

// Registrar en app/Http/Kernel.php
// protected $middleware = [
//     ...
//     \App\Http\Middleware\ShareInstitutionalData::class,
// ];

// ========================================
// API JSON para consumo externo
// ========================================

// En routes/api.php

Route::prefix('institutional')->group(function () {
    Route::get('/holding', fn() => response()->json(config('institutional.holding')));
    Route::get('/companies', fn() => response()->json(config('institutional.companies')));
    Route::get('/sectors', fn() => response()->json(config('institutional.sectors')));
    Route::get('/values', fn() => response()->json(config('institutional.values')));
    Route::get('/statistics', fn() => response()->json(config('institutional.statistics')));
    Route::get('/contact', fn() => response()->json(config('institutional.contact')));
    Route::get('/seo', fn() => response()->json(config('institutional.seo')));
});

// Ejemplo de uso:
// GET /api/institutional/companies
// GET /api/institutional/sectors
// GET /api/institutional/values

// ========================================
// Tests
// ========================================

// En tests/Feature/InstitutionalPageTest.php

namespace Tests\Feature;

use Tests\TestCase;

class InstitutionalPageTest extends TestCase
{
    public function test_institutional_page_loads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('institutional');
    }

    public function test_institutional_configuration_exists()
    {
        $holding = config('institutional.holding');
        $this->assertNotNull($holding);
        $this->assertEquals('Tucu Group', $holding['name']);
    }

    public function test_companies_are_configured()
    {
        $companies = config('institutional.companies');
        $this->assertCount(3, $companies);
        $this->assertEquals('Tucu Roller', $companies[0]['name']);
    }

    public function test_contact_information_exists()
    {
        $contact = config('institutional.contact');
        $this->assertNotNull($contact['email']);
        $this->assertNotNull($contact['phone']);
    }
}
