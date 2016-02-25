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

        $adminDashboard = true;
        $this->set('adminDashboard', $adminDashboard);
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
