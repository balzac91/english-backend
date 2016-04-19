<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class CategoriesController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['get']);
    }

    public function get()
    {
        $this->apiAuth();

        $categoriesTable = TableRegistry::get('categories');
        $categories = $categoriesTable->find()
            ->select(['id', 'name'])
            ->orderAsc('name');

        $this->set([
            'data' => [
                'categories' => $categories
            ],
            '_serialize' => ['data']
        ]);
    }
}
