<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity.
 *
 * @property int $id
 * @property int $word_id
 * @property \App\Model\Entity\Word $word
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $translation_type_id
 * @property \App\Model\Entity\TranslationType $translation_type
 * @property bool $correct
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Answer extends Entity
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
}
