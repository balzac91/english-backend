<?php
namespace App\Controller;

use Cake\Core\Configure;

class LoginController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
        }

        $this->Flash->error(__('Your e-mail or password is incorrect.'));
    }

    public function logout () {
        $this->Flash->success(__('You are now logged out.'));
        return $this->redirect($this->Auth->logout());
    }
}
