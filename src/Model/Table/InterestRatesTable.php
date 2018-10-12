<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InterestRates Model
 *
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\InterestRate get($primaryKey, $options = [])
 * @method \App\Model\Entity\InterestRate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InterestRate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InterestRate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InterestRate|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InterestRate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InterestRate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InterestRate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InterestRatesTable extends Table
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

        $this->setTable('interest_rates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Contracts', [
            'foreignKey' => 'interest_rate_id'
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
            ->scalar('interest_rate')
            ->maxLength('interest_rate', 255)
            ->requirePresence('interest_rate', 'create')
            ->notEmpty('interest_rate');

        return $validator;
    }
}
