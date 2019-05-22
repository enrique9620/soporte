<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Peticione Entity
 *
 * @property string $id
 * @property string $bug_id
 * @property string $estadopeticion_id
 * @property string $descripcion
 * @property string $peticionescol
 * @property string|resource $imagen
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Bug $bug
 * @property \App\Model\Entity\Estadopeticione $estadopeticione
 */
class Peticione extends Entity
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
