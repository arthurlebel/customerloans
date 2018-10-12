<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LoanTypes Model
 *
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\LoanType get($primaryKey, $options = [])
 * @method \App\Model\Entity\LoanType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LoanType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LoanType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoanType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoanType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LoanType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LoanType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LoanTypesTable extends Table
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

        $this->setTable('loan_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->addBehavior('Translate', ['fields' => ['title', 'body']]);

        $this->hasMany('Contracts', [
            'foreignKey' => 'loan_type_id'
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
            ->scalar('loan_type')
            ->maxLength('loan_type', 255)
            ->requirePresence('loan_type', 'create')
            ->notEmpty('loan_type');

        return $validator;
    }
}
