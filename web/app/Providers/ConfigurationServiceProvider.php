<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;

class ConfigurationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Fusionar configuración guardada con la configuración por defecto
        $this->mergeConfigurationWithDatabase();
    }

    private function mergeConfigurationWithDatabase(): void
    {
        // Obtener configuración de empresas y sectores de la BD si existen
        $companies = SiteSetting::getValue('companies_config');
        $sectors = SiteSetting::getValue('sectors_config');

        // Si existen en BD, reemplazar la configuración
        if ($companies) {
            config(['institutional.companies' => $companies]);
        }

        if ($sectors) {
            config(['institutional.sectors' => $sectors]);
        }

        // Actualizar otros datos de configuración también
        $institutionalData = [
            'holding' => [
                'name' => SiteSetting::getValue('company_name', config('institutional.holding.name')),
                'tagline' => config('institutional.holding.tagline'),
                'description' => SiteSetting::getValue('company_description', config('institutional.holding.description')),
                'years_founded' => config('institutional.holding.years_founded'),
            ],
        ];

        config(['institutional' => array_merge(config('institutional'), $institutionalData)]);
    }
}
