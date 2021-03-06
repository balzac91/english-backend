<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TranslationType Entity.
 *
 * @property int $id
 * @property string $name
 * @property \App\Model\Entity\Answer[] $answers
 */
class TranslationType extends Entity
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
        '*' => true,
        'id' => false,
    ];

    public static $ENG_TO_POL = 1;
    public static $POL_TO_ENG = 2;
}
