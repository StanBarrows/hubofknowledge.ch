<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','role:administrator']);
    }

    public function index()
    {
        $readme = null;

        try {

            $readme = File::get(base_path('README.md'));;
        }
        catch (\Exception $exception)
        {
            Log::error('App\Http\Controllers\DocumentationController');
        }

        return view('documentation.index', compact('readme'));
    }

}
