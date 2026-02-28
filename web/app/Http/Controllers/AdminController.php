<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Mostrar el dashboard de administración
     */
    public function dashboard(): View|Factory|Application
    {
        $totalUsers = User::count();
        $adminUsers = User::where('role', 'admin')->count();
        $regularUsers = User::where('role', 'user')->count();
        
        $users = User::paginate(10);
        
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'adminUsers' => $adminUsers,
            'regularUsers' => $regularUsers,
            'users' => $users,
        ]);
    }

    /**
     * Mostrar lista de usuarios
     */
    public function users(): View|Factory|Application
    {
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }

    /**
     * Mostrar formulario de edición de usuario
     */
    public function editUser(User $user): View|Factory|Application
    {
        return view('admin.edit-user', compact('user'));
    }

    /**
     * Actualizar usuario
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')
                        ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Eliminar usuario
     */
    public function deleteUser(User $user): RedirectResponse
    {
        // Evitar eliminar el último admin
        if ($user->role === 'admin' && User::where('role', 'admin')->count() === 1) {
            return redirect()->route('admin.users')
                            ->with('error', 'No se puede eliminar el último administrador.');
        }

        $user->delete();

        return redirect()->route('admin.users')
                        ->with('success', 'Usuario eliminado correctamente.');
    }

    /**
     * Cambiar rol de usuario
     */
    public function toggleAdmin(User $user): RedirectResponse
    {
        // Evitar que el último admin pierda sus permisos
        if ($user->role === 'admin' && User::where('role', 'admin')->count() === 1) {
            return redirect()->route('admin.users')
                            ->with('error', 'No se puede cambiar el rol del último administrador.');
        }

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return redirect()->route('admin.users')
                        ->with('success', 'Rol del usuario actualizado correctamente.');
    }

    /**
     * Mostrar configuración del sistema
     */
    public function settings(): View|Factory|Application
    {
        $content = array_replace_recursive(
            config('institutional'),
            SiteSetting::getValue('institutional_content', [])
        );

        return view('admin.settings', compact('content'));
    }

    /**
     * Guardar configuración del sistema
     */
    public function saveSettings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'holding.name' => 'required|string|max:120',
            'holding.tagline' => 'required|string|max:180',
            'holding.description' => 'required|string|max:1200',
            'hero.badge' => 'required|string|max:120',
            'hero.title_line_1' => 'required|string|max:120',
            'hero.title_highlight' => 'required|string|max:120',
            'hero.description' => 'required|string|max:1200',
            'hero.cta_text' => 'required|string|max:120',
            'hero.cta_link' => 'required|string|max:255',
            'seo.title' => 'required|string|max:180',
            'seo.description' => 'required|string|max:255',
            'seo.keywords' => 'nullable|string|max:255',
            'contact.email' => 'required|email|max:150',
            'contact.phone' => 'required|string|max:120',
            'contact.location' => 'required|string|max:120',
            'contact.address' => 'nullable|string|max:255',
            'integrations.google_analytics_id' => ['nullable', 'regex:/^G-[A-Z0-9]+$/'],
            'slider.autoplay_ms' => 'required|integer|min:1500|max:20000',
            'slider.items_json' => 'required|string',
            'companies_json' => 'required|string',
            'sectors_json' => 'required|string',
            'statistics_json' => 'required|string',
            'values_json' => 'required|string',
        ], [
            'integrations.google_analytics_id.regex' => 'El ID de Google Analytics debe tener formato G-XXXXXXXXXX.',
        ]);

        $payload = [
            'holding' => $validated['holding'],
            'hero' => $validated['hero'],
            'seo' => array_merge(config('institutional.seo', []), $validated['seo']),
            'contact' => $validated['contact'],
            'integrations' => [
                'google_analytics_id' => $validated['integrations']['google_analytics_id'] ?? '',
            ],
            'slider' => [
                'enabled' => $request->boolean('slider.enabled'),
                'autoplay_ms' => $validated['slider']['autoplay_ms'],
                'items' => $this->decodeJsonArray($validated['slider']['items_json'], 'slider.items_json', 'slides del slider'),
            ],
            'companies' => $this->decodeJsonArray($validated['companies_json'], 'companies_json', 'empresas'),
            'sectors' => $this->decodeJsonArray($validated['sectors_json'], 'sectors_json', 'sectores'),
            'statistics' => $this->decodeJsonArray($validated['statistics_json'], 'statistics_json', 'estadísticas'),
            'values' => $this->decodeJsonArray($validated['values_json'], 'values_json', 'valores'),
        ];

        SiteSetting::putValue('institutional_content', $payload);

        return redirect()->route('admin.settings')
                        ->with('success', 'Configuración guardada correctamente.');
    }

    private function decodeJsonArray(string $json, string $fieldKey, string $fieldName): array
    {
        $decoded = json_decode($json, true);

        if (! is_array($decoded)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                $fieldKey => "El campo {$fieldName} debe ser un JSON válido.",
            ]);
        }

        return $decoded;
    }
}
