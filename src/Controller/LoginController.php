<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use App\Model\Entity\Role;

class LoginController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['logout']);
        $this->viewBuilder()->layout('login');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['role_id'] === Role::$ADMIN) {
                    $this->Auth->config('loginRedirect', [
                        'controller' => 'Users',
                        'action' => 'add',
                        'prefix' => 'index'
                    ]);
                }

                $this->Auth->setUser($user);
                $this->Flash->success(__('You are now logged in.'));
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Your e-mail or password is incorrect.'));
        }
    }

    public function logout()
    {
        $this->Flash->success(__('You are now logged out.'));
        return $this->redirect($this->Auth->logout());
    }
}
