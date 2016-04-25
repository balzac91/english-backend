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

        $this->Auth->allow(['get', 'getAll', 'proposeTranslation']);
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

    public function proposeTranslation()
    {
        $this->apiAuth();

        if (!isset($this->request->data['english']) || !isset($this->request->data['wordId'])) {
            throw new BadRequestException();
        }

        $sessionsTable = TableRegistry::get('Sessions');
        $session = $sessionsTable->get($this->request->data['sessionId']);

        $proposedTranslationsTable = TableRegistry::get('ProposedTranslations');
        $proposedTranslations = $proposedTranslationsTable->newEntity();
        $proposedTranslations->english = null;
        $proposedTranslations->polish = $this->request->data['polish'];
        $proposedTranslations->user_id = $session->user_id;
        $proposedTranslations->word_id = $this->request->data['wordId'];
        $proposedTranslationsTable->save($proposedTranslations);

        $this->set([
            'data' => [],
            '_serialize' => ['data']
        ]);
    }
}
