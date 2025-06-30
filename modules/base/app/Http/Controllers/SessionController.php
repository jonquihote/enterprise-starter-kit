<?php

namespace Enterprise\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Enterprise\Base\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class SessionController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('base::session.create');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return Redirect::route('base::screens.dashboard');
    }
}
