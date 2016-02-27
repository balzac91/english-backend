<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\InternalErrorException;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['profile']);
    }

    public function profile()
    {
        $sessionId = $this->apiAuth();

        $sessionsTable = TableRegistry::get('sessions');
        $session = $sessionsTable->get($sessionId, ['contain' => 'Users']);

        if (!$session || !$session->user) {
            throw new InternalErrorException();
        }

        $this->set([
            'data' => [
                'user' => $session->user
            ],
            '_serialize' => ['data']
        ]);
    }
}
