<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('dashboard', [
            'name' => session()->get('name'),
            'profile_picture' => session()->get('profile_picture')
        ]);
    }
}
