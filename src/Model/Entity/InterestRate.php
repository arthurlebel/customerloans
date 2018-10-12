<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InterestRate Entity
 *
 * @property int $id
 * @property string $interest_rate
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Contract[] $contracts
 */
class InterestRate extends Entity
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
        'interest_rate' => true,
        'created' => true,
        'modified' => true,
        'contracts' => true
    ];
}
