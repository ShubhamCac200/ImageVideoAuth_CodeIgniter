<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find(session()->get('id'));

        return view('profile', ['user' => $user]);
    }

    public function update()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        helper(['form', 'url']);
        $userModel = new UserModel();
        $userId = session()->get('id');
        $user = $userModel->find($userId);

        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'profile_picture' => 'is_image[profile_picture]|max_size[profile_picture,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        // Handle profile picture upload
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);
            $data['profile_picture'] = $fileName;
        }

        $userModel->update($userId, $data);
        session()->set($data); // Update session data

        return redirect()->to('/profile')->with('success', 'Profile updated successfully!');
    }

    public function changePassword()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        helper(['form', 'url']);
        $userModel = new UserModel();
        $userId = session()->get('id');
        $user = $userModel->find($userId);

        $validation = $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min_length[6]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if (!password_verify($this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        $newPassword = password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT);
        $userModel->update($userId, ['password' => $newPassword]);

        return redirect()->to('/profile')->with('success', 'Password changed successfully!');
    }
}
