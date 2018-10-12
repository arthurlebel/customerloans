<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $start
 * @property \Cake\I18n\FrozenDate $end
 * @property int $loan_type_id
 * @property int $interest_rate_id
 * @property int $amount
 * @property int $amount_due
 * @property int $payment_id
 * @property string $payment_frequency
 * @property \Cake\I18n\FrozenDate $payment_due_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\LoanType $loan_type
 * @property \App\Model\Entity\InterestRate $interest_rate
 * @property \App\Model\Entity\Payment $payment
 */
class Contract extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'start' => true,
        'end' => true,
        'loan_type_id' => true,
        'interest_rate_id' => true,
        'amount' => true,
        'amount_due' => true,
        'payment_id' => true,
        'payment_frequency' => true,
        'payment_due_date' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'loan_type' => true,
        'interest_rate' => true,
        'payment' => true
    ];
}
