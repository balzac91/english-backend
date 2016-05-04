<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TranslationTypes Controller
 *
 * @property \App\Model\Table\TranslationTypesTable $TranslationTypes
 */
class TranslationTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $translationTypes = $this->paginate($this->TranslationTypes);

        $this->set(compact('translationTypes'));
        $this->set('_serialize', ['translationTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Translation Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $translationType = $this->TranslationTypes->get($id, [
            'contain' => ['Answers']
        ]);

        $this->set('translationType', $translationType);
        $this->set('_serialize', ['translationType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $translationType = $this->TranslationTypes->newEntity();
        if ($this->request->is('post')) {
            $translationType = $this->TranslationTypes->patchEntity($translationType, $this->request->data);
            if ($this->TranslationTypes->save($translationType)) {
                $this->Flash->success(__('The translation type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The translation type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('translationType'));
        $this->set('_serialize', ['translationType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Translation Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $translationType = $this->TranslationTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $translationType = $this->TranslationTypes->patchEntity($translationType, $this->request->data);
            if ($this->TranslationTypes->save($translationType)) {
                $this->Flash->success(__('The translation type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The translation type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('translationType'));
        $this->set('_serialize', ['translationType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Translation Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $translationType = $this->TranslationTypes->get($id);
        if ($this->TranslationTypes->delete($translationType)) {
            $this->Flash->success(__('The translation type has been deleted.'));
        } else {
            $this->Flash->error(__('The translation type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
