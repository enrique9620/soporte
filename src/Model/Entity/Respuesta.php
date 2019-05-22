<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Respuesta Entity
 *
 * @property string $id
 * @property string $bug_id
 * @property string $estadopeticion_id
 * @property string $usuarioid
 * @property string $descripcion
 * @property string $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Bug $bug
 * @property \App\Model\Entity\Estadopeticione $estadopeticione
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\RespuestaAnexo[] $respuesta_anexos
 */
class Respuesta extends Entity
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
        'id' => false
    ];
}
