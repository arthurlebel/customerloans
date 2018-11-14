<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contracts Controller
 *
 * @property \App\Model\Table\ContractsTable $Contracts
 *
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractsController extends AppController
{

    
     public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        
    }
        
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if ($user['user_type'] == "Customer") {
            if (in_array($action, ['view'])) {
                return true;
            }
        } else if ($user['user_type'] == "Collector" || "Admin") {
            if (in_array($action, ['view', 'edit', 'add'])) {
                return true;
            }
        }
  
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the contract belongs to the current user.
        $contract = $this->Contracts->findById($id)->first();

        return $contract->user_id === $user['id'];
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'LoanTypes', 'InterestRates', 'Payments']
        ];
        $contracts = $this->paginate($this->Contracts);

        $this->set(compact('contracts'));
    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => ['Users', 'LoanTypes', 'InterestRates', 'Payments']
        ]);

        $this->set('contract', $contract);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contract = $this->Contracts->newEntity();
        if ($this->request->is('post')) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            
            $contract->user_id = $this->Auth->user('id');
            
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $users = $this->Contracts->Users->find('list', ['limit' => 200]);
        $loanTypes = $this->Contracts->LoanTypes->find('list', ['limit' => 200]);
        $interestRates = $this->Contracts->InterestRates->find('list', ['limit' => 200]);
        $payments = $this->Contracts->Payments->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'users', 'loanTypes', 'interestRates', 'payments'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['post', 'put'])) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Contracts->save($contract)) {
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        
        $users = $this->Contracts->Users->find('list', ['limit' => 200]);
        $loanTypes = $this->Contracts->LoanTypes->find('list', ['limit' => 200]);
        $interestRates = $this->Contracts->InterestRates->find('list', ['limit' => 200]);
        $payments = $this->Contracts->Payments->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'users', 'loanTypes', 'interestRates', 'payments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contract = $this->Contracts->get($id);
        if ($this->Contracts->delete($contract)) {
            $this->Flash->success(__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    

}
