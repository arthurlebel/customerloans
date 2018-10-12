<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contracts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\LoanTypesTable|\Cake\ORM\Association\BelongsTo $LoanTypes
 * @property \App\Model\Table\InterestRatesTable|\Cake\ORM\Association\BelongsTo $InterestRates
 * @property \App\Model\Table\PaymentsTable|\Cake\ORM\Association\BelongsTo $Payments
 *
 * @method \App\Model\Entity\Contract get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contract newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contract|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contract[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contract findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContractsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contracts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('LoanTypes', [
            'foreignKey' => 'loan_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('InterestRates', [
            'foreignKey' => 'interest_rate_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('start')
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->date('end')
            ->requirePresence('end', 'create')
            ->notEmpty('end');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->integer('amount_due')
            ->requirePresence('amount_due', 'create')
            ->notEmpty('amount_due');

        $validator
            ->scalar('payment_frequency')
            ->requirePresence('payment_frequency', 'create')
            ->notEmpty('payment_frequency');

        $validator
            ->date('payment_due_date')
            ->requirePresence('payment_due_date', 'create')
            ->notEmpty('payment_due_date');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['loan_type_id'], 'LoanTypes'));
        $rules->add($rules->existsIn(['interest_rate_id'], 'InterestRates'));
        $rules->add($rules->existsIn(['payment_id'], 'Payments'));

        return $rules;
    }
}
