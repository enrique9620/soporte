<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Actualizacione Entity
 *
 * @property string $id
 * @property string $descripcion
 * @property \Cake\I18n\Time $fecha
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $cat_importancia_id
 * @property string $cat_tipoactualizacion_id
 * @property string $sistema_id
 * @property bool $activo
 *
 * @property \App\Model\Entity\CatImportancia $cat_importancia
 * @property \App\Model\Entity\CatTipoactualizacione $cat_tipoactualizacione
 * @property \App\Model\Entity\Sistema $sistema
 */
class Actualizacione extends Entity
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
