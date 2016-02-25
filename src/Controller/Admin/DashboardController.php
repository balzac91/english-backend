<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Dashboard Controller
 */
class DashboardController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $adminMenu['dashboard'] = true;
        $this->set('adminMenu', $adminMenu);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

    }
}
