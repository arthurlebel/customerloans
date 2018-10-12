<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InterestRates Controller
 *
 * @property \App\Model\Table\InterestRatesTable $InterestRates
 *
 * @method \App\Model\Entity\InterestRate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InterestRatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $interestRates = $this->paginate($this->InterestRates);

        $this->set(compact('interestRates'));
    }

    /**
     * View method
     *
     * @param string|null $id Interest Rate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $interestRate = $this->InterestRates->get($id, [
            'contain' => ['Contracts']
        ]);

        $this->set('interestRate', $interestRate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $interestRate = $this->InterestRates->newEntity();
        if ($this->request->is('post')) {
            $interestRate = $this->InterestRates->patchEntity($interestRate, $this->request->getData());
            if ($this->InterestRates->save($interestRate)) {
                $this->Flash->success(__('The interest rate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The interest rate could not be saved. Please, try again.'));
        }
        $this->set(compact('interestRate'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Interest Rate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $interestRate = $this->InterestRates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $interestRate = $this->InterestRates->patchEntity($interestRate, $this->request->getData());
            if ($this->InterestRates->save($interestRate)) {
                $this->Flash->success(__('The interest rate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The interest rate could not be saved. Please, try again.'));
        }
        $this->set(compact('interestRate'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Interest Rate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $interestRate = $this->InterestRates->get($id);
        if ($this->InterestRates->delete($interestRate)) {
            $this->Flash->success(__('The interest rate has been deleted.'));
        } else {
            $this->Flash->error(__('The interest rate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
