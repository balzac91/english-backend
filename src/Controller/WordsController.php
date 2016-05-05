<?php
namespace App\Controller;

use App\Model\Entity\TranslationType;
use Cake\Event\Event;
use Cake\Network\Exception\BadRequestException;
use Cake\ORM\TableRegistry;

class WordsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->Auth->allow(['get', 'getAll', 'proposeTranslation', 'answer']);
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

        if (!isset($this->request->data['polish']) || !isset($this->request->data['wordId'])) {
            throw new BadRequestException();
        }

        $sessionsTable = TableRegistry::get('Sessions');
        $session = $sessionsTable->get($this->request->data['sessionId']);

        $data = array();
        $data['english'] = null;
        $data['polish'] = $this->request->data['polish'];
        $data['user_id'] = $session->user_id;
        $data['word_id'] = $this->request->data['wordId'];

        $proposedTranslationsTable = TableRegistry::get('ProposedTranslations');
        $proposedTranslations = $proposedTranslationsTable->newEntity($data);
        if (!$proposedTranslationsTable->save($proposedTranslations)) {
            throw new BadRequestException();
        }

        $this->set([
            'data' => [],
            '_serialize' => ['data']
        ]);
    }

    public function answer()
    {
        $this->apiAuth();

        if (!isset($this->request->data['answers']) || !is_array($this->request->data['answers'])) {
            throw new BadRequestException();
        }

        $sessionsTable = TableRegistry::get('Sessions');
        $session = $sessionsTable->get($this->request->data['sessionId']);

        foreach ($this->request->data['answers'] as $item) {
            if (!isset($item['wordId']) || !isset($item['correct'])) {
                throw new BadRequestException();
            }

            $data = array();
            $data['word_id'] = $item['wordId'];
            $data['user_id'] = $session->user_id;
            $data['translation_type_id'] = TranslationType::$ENG_TO_POL;
            $data['correct'] = $item['correct'];

            $answersTable = TableRegistry::get('Answers');
            $answer = $answersTable->newEntity($data);
            if (!$answersTable->save($answer)) {
                throw new BadRequestException();
            }
        }

        $this->set([
            'data' => [],
            '_serialize' => ['data']
        ]);
    }
}
