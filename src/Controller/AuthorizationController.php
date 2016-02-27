<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Role;

class AuthorizationController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['login', 'logout']);
    }

    public function login()
    {
        if (!isset($this->request->data['email']) || !isset($this->request->data['password'])) {
            throw new BadRequestException();
        }

        $user = $this->Auth->identify();

        if (!$user || $user['role_id'] !== Role::$USER) {
            throw new UnauthorizedException();
        }

        $sessionsTable = TableRegistry::get('Sessions');

        $currentDateTime = new Time();
        $currentDateTime->addHours(1);

        $session = $sessionsTable->newEntity([
            'user_id' => $user['id'],
            'valid_to' => $currentDateTime
        ]);

        if (!$sessionsTable->save($session)) {
            throw new InternalErrorException();
        }

        $this->set([
            'data' => [
                'sessionId' => $session->id,
                'user' => $user
            ],
            '_serialize' => ['data']
        ]);
    }

    public function logout()
    {
        $sessionId = $this->apiAuth();

        $sessionsTable = TableRegistry::get('Sessions');
        $session = $sessionsTable->get($sessionId);

        if (!$session) {
            throw new InternalErrorException();
        }

        $session->valid_to = new Time();

        if (!$sessionsTable->save($session)) {
            throw new InternalErrorException();
        }

        $this->set([
            'data' => [],
            '_serialize' => ['data']
        ]);
    }
}
