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
        // Obtener configuración de contenido de la BD si existen
        $companies = SiteSetting::getValue('companies_config');
        $sectors = SiteSetting::getValue('sectors_config');
        $statistics = SiteSetting::getValue('statistics_config');
        $values = SiteSetting::getValue('values_config');
        $slider = SiteSetting::getValue('slider_config');

        // Si existen en BD, reemplazar la configuración
        if ($companies) {
            config(['institutional.companies' => $companies]);
        }

        if ($sectors) {
            config(['institutional.sectors' => $sectors]);
        }

        if ($statistics) {
            config(['institutional.statistics' => $statistics]);
        }

        if ($values) {
            config(['institutional.values' => $values]);
        }

        if ($slider) {
            config(['institutional.slider' => $slider]);
        }

        // Actualizar otros datos de configuración también
        $institutionalData = [
            'holding' => [
                'name' => SiteSetting::getValue('company_name', config('institutional.holding.name')),
                'tagline' => config('institutional.holding.tagline'),
                'description' => SiteSetting::getValue('company_description', config('institutional.holding.description')),
                'years_founded' => config('institutional.holding.years_founded'),
            ],
            'hero' => [
                'badge' => SiteSetting::getValue('hero_badge', config('institutional.hero.badge')),
                'title_line_1' => SiteSetting::getValue('hero_title_line_1', config('institutional.hero.title_line_1')),
                'title_highlight' => SiteSetting::getValue('hero_title_highlight', config('institutional.hero.title_highlight')),
                'description' => SiteSetting::getValue('hero_description', config('institutional.hero.description')),
                'cta_text' => SiteSetting::getValue('hero_cta_text', config('institutional.hero.cta_text')),
                'cta_link' => SiteSetting::getValue('hero_cta_link', config('institutional.hero.cta_link')),
            ],
        ];

        config(['institutional' => array_merge(config('institutional'), $institutionalData)]);
    }
}
