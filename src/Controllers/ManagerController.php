<?php

namespace ATStudio\TranslationManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ManagerController extends Controller
{
    public function index()
    {
        $translations = json_decode(File::get(lang_path('fr.json')), associative: true);

        return view('tm::manager', compact('translations'));
    }

    public function update(Request $request)
    {
        $translations = $request->input('translations');

        File::put(lang_path('fr.json'), json_encode($translations));

        return redirect()->back();
    }
}
