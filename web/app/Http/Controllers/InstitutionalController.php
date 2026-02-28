<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class InstitutionalController extends Controller
{
    public function index(): View|Factory|Application
    {
        $content = array_replace_recursive(
            config('institutional'),
            SiteSetting::getValue('institutional_content', [])
        );

        return view('institutional', [
            'content' => $content,
        ]);
    }
}
