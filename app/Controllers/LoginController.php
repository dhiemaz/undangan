<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        log_message('info', 'LoginController::login attempt '. ' - ' . json_encode(['username' => $username, 'password' => '*******']), ['username' => $username]);

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            log_message('info', 'LoginController::login attempt success '. ' - ' . json_encode(['username' => $username, 'password' => '*******']), ['username' => $username]);
            // Set session data
            $session->set([
                'username' => $user['username'],
                'isLoggedIn' => true,
            ]);
            return redirect()->to('/backstage/dashboard'); // Redirect to backstage
        } else {
            log_message('error', 'LoginController::login attempt failed '. ' - ' . json_encode(['username' => $username, 'password' => '*******']), ['username' => $username]);
            $session->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/backstage');
        }
    }

    public function logout()
    {
        log_message('error', 'LoginController::user is logout ');
        session()->destroy();
        return redirect()->to('/backstage');
    }
}
