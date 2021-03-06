<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentTypes Controller
 *
 * @property \App\Model\Table\PaymentTypesTable $PaymentTypes
 *
 * @method \App\Model\Entity\PaymentType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentTypesController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['autocomplete', 'findPaymentTypes', 'add', 'edit', 'delete']);
                
    }
    
        /**
     * findPaymentTypes method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findPaymentTypes() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->PaymentTypes->find('all', array(
                'conditions' => array('payment_types.payment_type LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocomplete() {
        
    }
    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if ($user['user_type'] == "Admin") {
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
        $paymentTypes = $this->paginate($this->PaymentTypes);

        $this->set(compact('paymentTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentType = $this->PaymentTypes->get($id, [
            'contain' => []
        ]);

        $this->set('paymentType', $paymentType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentType = $this->PaymentTypes->newEntity();
        if ($this->request->is('post')) {
            $paymentType = $this->PaymentTypes->patchEntity($paymentType, $this->request->getData());
            if ($this->PaymentTypes->save($paymentType)) {
                $this->Flash->success(__('The payment type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment type could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentType = $this->PaymentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentType = $this->PaymentTypes->patchEntity($paymentType, $this->request->getData());
            if ($this->PaymentTypes->save($paymentType)) {
                $this->Flash->success(__('The payment type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment type could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentType = $this->PaymentTypes->get($id);
        if ($this->PaymentTypes->delete($paymentType)) {
            $this->Flash->success(__('The payment type has been deleted.'));
        } else {
            $this->Flash->error(__('The payment type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
