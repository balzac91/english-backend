<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Table\LevelsTable;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

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
        $categories = TableRegistry::get('Categories');
        $categoriesNumber = $categories->find()->count();

        $levels = TableRegistry::get('Levels');
        $levelsNumber = $levels->find()->count();

        $words = TableRegistry::get('Words');
        $wordsNumber = $words->find()->count();

        $proposedTranslations = TableRegistry::get('ProposedTranslations');
        $proposedTranslationsNumber = $proposedTranslations->find()->count();

        $answers = TableRegistry::get('Answers');
        $answersNumber = $answers->find()->count();

        $this->set(compact('categoriesNumber', 'levelsNumber', 'wordsNumber', 'proposedTranslationsNumber', 'answersNumber'));
    }
}
