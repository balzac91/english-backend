<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ProposedTranslations Controller
 *
 * @property \App\Model\Table\ProposedTranslationsTable $ProposedTranslations
 */
class ProposedTranslationsController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $adminProposedTranslations = true;
        $this->set('adminProposedTranslations', $adminProposedTranslations);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Words', 'Users']
        ];
        $proposedTranslations = $this->paginate($this->ProposedTranslations);

        $this->set(compact('proposedTranslations'));
        $this->set('_serialize', ['proposedTranslations']);
    }

    /**
     * View method
     *
     * @param string|null $id Proposed Translation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proposedTranslation = $this->ProposedTranslations->get($id, [
            'contain' => ['Words', 'Users']
        ]);

        $this->set('proposedTranslation', $proposedTranslation);
        $this->set('_serialize', ['proposedTranslation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proposedTranslation = $this->ProposedTranslations->newEntity();
        if ($this->request->is('post')) {
            $proposedTranslation = $this->ProposedTranslations->patchEntity($proposedTranslation, $this->request->data);
            if ($this->ProposedTranslations->save($proposedTranslation)) {
                $this->Flash->success(__('The proposed translation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The proposed translation could not be saved. Please, try again.'));
            }
        }
        $words = $this->ProposedTranslations->Words->find('list', ['limit' => 200]);
        $users = $this->ProposedTranslations->Users->find('list', ['limit' => 200]);
        $this->set(compact('proposedTranslation', 'words', 'users'));
        $this->set('_serialize', ['proposedTranslation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Proposed Translation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proposedTranslation = $this->ProposedTranslations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proposedTranslation = $this->ProposedTranslations->patchEntity($proposedTranslation, $this->request->data);
            if ($this->ProposedTranslations->save($proposedTranslation)) {
                $this->Flash->success(__('The proposed translation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The proposed translation could not be saved. Please, try again.'));
            }
        }
        $words = $this->ProposedTranslations->Words->find('list', ['limit' => 200]);
        $users = $this->ProposedTranslations->Users->find('list', ['limit' => 200]);
        $this->set(compact('proposedTranslation', 'words', 'users'));
        $this->set('_serialize', ['proposedTranslation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Proposed Translation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proposedTranslation = $this->ProposedTranslations->get($id);
        if ($this->ProposedTranslations->delete($proposedTranslation)) {
            $this->Flash->success(__('The proposed translation has been deleted.'));
        } else {
            $this->Flash->error(__('The proposed translation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
