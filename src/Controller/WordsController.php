<?php
namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\BadRequestException;
use Cake\ORM\TableRegistry;

class WordsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['get', 'getAll']);
    }

    public function get()
    {
        $this->apiAuth();

        if (!isset($this->request->data['categoryId'])) {
            throw new BadRequestException();
        }

        $categoriesTable = TableRegistry::get('categories');

        if (!$categoriesTable->exists(['id' => $this->request->data['categoryId']])) {
            throw new BadRequestException();
        }

        $wordsTable = TableRegistry::get('words');
        $words = $wordsTable->find()
            ->select(['id', 'level_id', 'polish', 'english'])
            ->where(['category_id' => $this->request->data['categoryId']])
            ->order('RAND()')
            ->limit(10);

        $this->set([
            'data' => [
                'words' => $words
            ],
            '_serialize' => ['data']
        ]);
    }

    public function getAll()
    {
        $this->apiAuth();

        if (!isset($this->request->data['categoryId'])) {
            throw new BadRequestException();
        }

        $categoriesTable = TableRegistry::get('categories');

        if (!$categoriesTable->exists(['id' => $this->request->data['categoryId']])) {
            throw new BadRequestException();
        }

        $wordsTable = TableRegistry::get('words');
        $words = $wordsTable->find()
            ->select(['id', 'level_id', 'polish', 'english'])
            ->where(['category_id' => $this->request->data['categoryId']])
            ->orderAsc('english');

        $this->set([
            'data' => [
                'words' => $words
            ],
            '_serialize' => ['data']
        ]);
    }
}
