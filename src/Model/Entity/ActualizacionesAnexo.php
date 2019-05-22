<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActualizacionesAnexo Entity
 *
 * @property string $id
 * @property string $imagen_anterior
 * @property string $imagen_nueva
 * @property string $tipo
 * @property string $tamano
 * @property string $actualizaciones_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Actualizacione $actualizacione
 */
class ActualizacionesAnexo extends Entity
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
