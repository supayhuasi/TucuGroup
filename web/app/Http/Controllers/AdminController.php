<?php

namespace App\Http\Controllers;

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
        return view('admin.settings');
    }

    /**
     * Guardar configuración del sistema
     */
    public function saveSettings(Request $request): RedirectResponse
    {
        // Aquí puedes guardar configuraciones en la BD o en archivos
        // Por ahora solo retornamos un mensaje de éxito
        
        return redirect()->route('admin.settings')
                        ->with('success', 'Configuración guardada correctamente.');
    }
}
