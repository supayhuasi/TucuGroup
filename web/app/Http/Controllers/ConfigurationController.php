<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ConfigurationController extends Controller
{
    /**
     * Mostrar el dashboard de configuración
     */
    public function dashboard(): View
    {
        $config = $this->getConfiguration();
        return view('configuration.dashboard', compact('config'));
    }

    /**
     * Guardar configuración de empresa
     */
    public function saveCompany(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_description' => 'required|string|max:1000',
            'hero_badge' => 'nullable|string|max:120',
            'hero_title_line_1' => 'required|string|max:255',
            'hero_title_highlight' => 'required|string|max:255',
            'hero_description' => 'required|string|max:1000',
            'hero_cta_text' => 'required|string|max:120',
            'hero_cta_link' => 'nullable|string|max:255',
            'company_phone' => 'required|string|max:20',
            'company_email' => 'required|email|max:255',
            'company_address' => 'required|string|max:500',
            'company_country' => 'required|string|max:100',
            'company_website' => 'nullable|url|max:255',
        ]);

        $validated['hero_cta_link'] = !empty($validated['hero_cta_link']) ? trim($validated['hero_cta_link']) : '#empresas';

        foreach ($validated as $key => $value) {
            SiteSetting::putValue($key, $value);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Datos de la empresa actualizados correctamente.');
    }

    /**
     * Guardar configuración de Google Analytics
     */
    public function saveAnalytics(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'google_analytics_id' => 'nullable|string|max:255',
            'google_analytics_enabled' => 'nullable|boolean',
        ]);

        $validated['google_analytics_enabled'] = $request->has('google_analytics_enabled');

        foreach ($validated as $key => $value) {
            SiteSetting::putValue($key, $value);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Configuración de Google Analytics actualizada.');
    }

    /**
     * Guardar configuración SMTP
     */
    public function saveSmtp(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'smtp_host' => 'required|string|max:255',
            'smtp_port' => 'required|integer|min:1|max:65535',
            'smtp_username' => 'required|string|max:255',
            'smtp_password' => 'nullable|string',
            'smtp_encryption' => 'required|in:tls,ssl',
            'smtp_from_address' => 'required|email|max:255',
            'smtp_from_name' => 'required|string|max:255',
        ]);

        // No sobrescribir la contraseña si está vacía
        if (empty($validated['smtp_password'])) {
            unset($validated['smtp_password']);
        }

        foreach ($validated as $key => $value) {
            SiteSetting::putValue($key, $value);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Configuración SMTP actualizada correctamente.');
    }

    /**
     * Guardar logo del sitio
     */
    public function saveLogo(Request $request): RedirectResponse
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);

        if ($request->hasFile('logo')) {
            // Eliminar logo anterior si existe
            $currentLogo = SiteSetting::getValue('site_logo');
            if ($currentLogo) {
                Storage::disk('public')->delete($currentLogo);
            }

            $path = $request->file('logo')->store('logos', 'public');
            SiteSetting::putValue('site_logo', $path);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Logo actualizado correctamente.');
    }

    /**
     * Guardar imagen del sitio
     */
    public function saveImage(Request $request): RedirectResponse
    {
        $request->validate([
            'image_type' => 'required|in:hero,banner,footer',
            'image' => 'required|image|mimes:jpeg,png,gif,webp|max:10240',
        ]);

        $type = $request->input('image_type');

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            $currentImage = SiteSetting::getValue("site_image_{$type}");
            if ($currentImage) {
                Storage::disk('public')->delete($currentImage);
            }

            $path = $request->file('image')->store('images', 'public');
            SiteSetting::putValue("site_image_{$type}", $path);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', "Imagen de {$type} actualizada correctamente.");
    }

    /**
     * Eliminar logo
     */
    public function deleteLogo(): RedirectResponse
    {
        $logo = SiteSetting::getValue('site_logo');
        if ($logo) {
            Storage::disk('public')->delete($logo);
            SiteSetting::putValue('site_logo', null);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Logo eliminado correctamente.');
    }

    /**
     * Eliminar imagen
     */
    public function deleteImage(string $type): RedirectResponse
    {
        $key = "site_image_{$type}";
        $image = SiteSetting::getValue($key);
        if ($image) {
            Storage::disk('public')->delete($image);
            SiteSetting::putValue($key, null);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', "Imagen de {$type} eliminada correctamente.");
    }

    /**
     * Guardar configuración de WhatsApp
     */
    public function saveWhatsapp(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'whatsapp_number' => 'required|string|max:20',
            'whatsapp_message' => 'nullable|string|max:500',
            'whatsapp_enabled' => 'nullable|boolean',
        ]);

        $validated['whatsapp_enabled'] = $request->has('whatsapp_enabled');

        foreach ($validated as $key => $value) {
            SiteSetting::putValue($key, $value);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Configuración de WhatsApp actualizada correctamente.');
    }

    /**
     * Guardar configuración de Footer
     */
    public function saveFooter(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'footer_about' => 'required|string|max:500',
            'footer_links' => 'nullable|string|max:1000',
            'footer_social_facebook' => 'nullable|url|max:255',
            'footer_social_instagram' => 'nullable|url|max:255',
            'footer_social_linkedin' => 'nullable|url|max:255',
            'footer_social_twitter' => 'nullable|url|max:255',
            'footer_copyright' => 'nullable|string|max:255',
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::putValue($key, $value);
        }

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Configuración del Footer actualizada correctamente.');
    }

    /**
     * Guardar configuración de Empresas
     */
    public function saveCompanies(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'companies_items' => 'required|array|min:1',
            'companies_items.*.id' => 'required|integer|min:1',
            'companies_items.*.name' => 'required|string|max:255',
            'companies_items.*.description' => 'required|string|max:1000',
            'companies_items.*.website' => 'required|string|max:255',
            'companies_items.*.icon' => 'required|string|max:100',
            'companies_items.*.color' => 'required|string|max:100',
            'companies_items.*.logo' => 'nullable|string|max:2048',
            'companies_items.*.logo_file' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'companies_items.*.status' => 'nullable|string|max:100',
        ]);

        $companies = [];

        foreach ($validated['companies_items'] as $index => $company) {
            $normalized = [
                'id' => (int) $company['id'],
                'name' => trim($company['name']),
                'description' => trim($company['description']),
                'website' => trim($company['website']),
                'icon' => trim($company['icon']),
                'color' => trim($company['color']),
            ];

            $currentLogo = !empty($company['logo']) ? trim($company['logo']) : null;

            if ($request->hasFile("companies_items.{$index}.logo_file")) {
                if ($currentLogo && str_starts_with($currentLogo, '/storage/')) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $currentLogo));
                }

                $storedPath = $request->file("companies_items.{$index}.logo_file")->store('company-logos', 'public');
                $normalized['logo'] = Storage::url($storedPath);
            } elseif ($currentLogo) {
                $normalized['logo'] = $currentLogo;
            }

            if (!empty($company['status'])) {
                $normalized['status'] = trim($company['status']);
            }

            $companies[] = $normalized;
        }

        SiteSetting::putValue('companies_config', $companies);

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Empresas actualizadas correctamente.');
    }

    /**
     * Guardar configuración de Sectores
     */
    public function saveSectors(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'sectors_items' => 'required|array|min:1',
            'sectors_items.*.id' => 'required|integer|min:1',
            'sectors_items.*.title' => 'required|string|max:255',
            'sectors_items.*.subtitle' => 'required|string|max:500',
            'sectors_items.*.icon' => 'required|string|max:100',
            'sectors_items.*.color' => 'required|string|max:100',
            'sectors_items.*.features_text' => 'required|string|max:2000',
        ]);

        $sectors = array_map(static function (array $sector): array {
            $features = preg_split('/\r\n|\r|\n/', (string) $sector['features_text']);
            $features = array_values(array_filter(array_map('trim', $features), static fn (string $item): bool => $item !== ''));

            return [
                'id' => (int) $sector['id'],
                'title' => trim($sector['title']),
                'subtitle' => trim($sector['subtitle']),
                'icon' => trim($sector['icon']),
                'color' => trim($sector['color']),
                'features' => $features,
            ];
        }, $validated['sectors_items']);

        SiteSetting::putValue('sectors_config', $sectors);

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Sectores actualizados correctamente.');
    }

    /**
     * Guardar configuración de Estadísticas
     */
    public function saveStatistics(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'statistics_items' => 'required|array|min:1',
            'statistics_items.*.number' => 'required|string|max:100',
            'statistics_items.*.label' => 'required|string|max:255',
        ]);

        $statistics = array_map(static function (array $stat): array {
            return [
                'number' => trim($stat['number']),
                'label' => trim($stat['label']),
            ];
        }, $validated['statistics_items']);

        SiteSetting::putValue('statistics_config', $statistics);

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Estadísticas actualizadas correctamente.');
    }

    /**
     * Guardar configuración de Valores
     */
    public function saveValues(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'values_items' => 'required|array|min:1',
            'values_items.*.title' => 'required|string|max:255',
            'values_items.*.description' => 'required|string|max:1000',
            'values_items.*.icon' => 'required|string|max:100',
            'values_items.*.color' => 'required|string|max:100',
        ]);

        $values = array_map(static function (array $value): array {
            return [
                'title' => trim($value['title']),
                'description' => trim($value['description']),
                'icon' => trim($value['icon']),
                'color' => trim($value['color']),
            ];
        }, $validated['values_items']);

        SiteSetting::putValue('values_config', $values);

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Valores actualizados correctamente.');
    }

    /**
     * Guardar configuración del Slider
     */
    public function saveSlider(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'slider_enabled' => 'nullable|boolean',
            'slider_autoplay_ms' => 'required|integer|min:1500|max:20000',
            'slider_items' => 'required|array|min:1',
            'slider_items.*.title' => 'required|string|max:255',
            'slider_items.*.subtitle' => 'required|string|max:500',
            'slider_items.*.image' => 'required|url|max:2048',
        ]);

        $sliderItems = array_map(static function (array $item): array {
            return [
                'title' => trim($item['title']),
                'subtitle' => trim($item['subtitle']),
                'image' => trim($item['image']),
            ];
        }, $validated['slider_items']);

        $sliderConfig = [
            'enabled' => $request->has('slider_enabled'),
            'autoplay_ms' => (int) $validated['slider_autoplay_ms'],
            'items' => $sliderItems,
        ];

        SiteSetting::putValue('slider_config', $sliderConfig);

        return redirect()->route('configuration.dashboard')
            ->with('success', 'Slider actualizado correctamente.');
    }

    /**
     * Obtener toda la configuración
     */
    private function getConfiguration(): array
    {
        return [
            // Empresa
            'company_name' => SiteSetting::getValue('company_name', 'Tucu Group'),
            'company_description' => SiteSetting::getValue('company_description', 'Descripción de la empresa'),
            'hero_badge' => SiteSetting::getValue('hero_badge', config('institutional.hero.badge', '')),
            'hero_title_line_1' => SiteSetting::getValue('hero_title_line_1', config('institutional.hero.title_line_1', '')),
            'hero_title_highlight' => SiteSetting::getValue('hero_title_highlight', config('institutional.hero.title_highlight', '')),
            'hero_description' => SiteSetting::getValue('hero_description', config('institutional.hero.description', '')),
            'hero_cta_text' => SiteSetting::getValue('hero_cta_text', config('institutional.hero.cta_text', 'Explorar Empresas')),
            'hero_cta_link' => SiteSetting::getValue('hero_cta_link', config('institutional.hero.cta_link', '#empresas')),
            'company_phone' => SiteSetting::getValue('company_phone', ''),
            'company_email' => SiteSetting::getValue('company_email', ''),
            'company_address' => SiteSetting::getValue('company_address', ''),
            'company_country' => SiteSetting::getValue('company_country', 'Argentina'),
            'company_website' => SiteSetting::getValue('company_website', ''),

            // Google Analytics
            'google_analytics_id' => SiteSetting::getValue('google_analytics_id', ''),
            'google_analytics_enabled' => SiteSetting::getValue('google_analytics_enabled', false),

            // SMTP
            'smtp_host' => SiteSetting::getValue('smtp_host', env('MAIL_HOST')),
            'smtp_port' => SiteSetting::getValue('smtp_port', env('MAIL_PORT')),
            'smtp_username' => SiteSetting::getValue('smtp_username', env('MAIL_USERNAME')),
            'smtp_encryption' => SiteSetting::getValue('smtp_encryption', env('MAIL_ENCRYPTION', 'tls')),
            'smtp_from_address' => SiteSetting::getValue('smtp_from_address', env('MAIL_FROM_ADDRESS')),
            'smtp_from_name' => SiteSetting::getValue('smtp_from_name', env('MAIL_FROM_NAME')),

            // Imágenes
            'site_logo' => SiteSetting::getValue('site_logo'),
            'site_image_hero' => SiteSetting::getValue('site_image_hero'),
            'site_image_banner' => SiteSetting::getValue('site_image_banner'),
            'site_image_footer' => SiteSetting::getValue('site_image_footer'),

            // WhatsApp
            'whatsapp_number' => SiteSetting::getValue('whatsapp_number', ''),
            'whatsapp_message' => SiteSetting::getValue('whatsapp_message', 'Hola, quisiera más información'),
            'whatsapp_enabled' => SiteSetting::getValue('whatsapp_enabled', false),

            // Footer
            'footer_about' => SiteSetting::getValue('footer_about', ''),
            'footer_links' => SiteSetting::getValue('footer_links', ''),
            'footer_social_facebook' => SiteSetting::getValue('footer_social_facebook', ''),
            'footer_social_instagram' => SiteSetting::getValue('footer_social_instagram', ''),
            'footer_social_linkedin' => SiteSetting::getValue('footer_social_linkedin', ''),
            'footer_social_twitter' => SiteSetting::getValue('footer_social_twitter', ''),
            'footer_copyright' => SiteSetting::getValue('footer_copyright', '© 2026 Tucu Group. Todos los derechos reservados.'),

            // Empresas y Sectores
            'companies' => SiteSetting::getValue('companies_config', config('institutional.companies', [])),
            'sectors' => SiteSetting::getValue('sectors_config', config('institutional.sectors', [])),

            // Estadísticas, valores y slider
            'statistics' => SiteSetting::getValue('statistics_config', config('institutional.statistics', [])),
            'values' => SiteSetting::getValue('values_config', config('institutional.values', [])),
            'slider' => SiteSetting::getValue('slider_config', config('institutional.slider', [])),
        ];
    }
}
