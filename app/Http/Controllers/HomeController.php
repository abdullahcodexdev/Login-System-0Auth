<?php

namespace App\Http\Controllers;

use App\Services\UserAccountService;
use App\Support\AssetVersion;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(UserAccountService $accounts): View
    {
        return view('index', [
            'assetVersion' => AssetVersion::current(),
            'currentUser' => $this->currentUser($accounts),
        ]);
    }

    private function currentUser(UserAccountService $accounts): ?array
    {
        $currentUser = session('auth_user');
        if ($currentUser && ($storedAccount = $accounts->findForSession($currentUser))) {
            $currentUser = $accounts->sessionUser($storedAccount);
            session(['auth_user' => $currentUser]);
        }

        return $currentUser;
    }
}
