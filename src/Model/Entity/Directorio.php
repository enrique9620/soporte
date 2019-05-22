<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Directorio Entity
 *
 * @property string $id
 * @property string $id_localidad
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 * @property string $cargo
 * @property string $correo
 * @property string $telefono
 * @property \Cake\I18n\Time $ultima_actualizacion
 * @property bool $activo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Directorio extends Entity
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

    protected function _getNombreCompleto(){
      return $this->_properties['nombre'] . ' ' . $this->_properties['paterno'].' '.$this->_properties['materno'];
    }
}
