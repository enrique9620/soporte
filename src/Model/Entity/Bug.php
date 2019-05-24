<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bug Entity
 *
 * @property string $id
 * @property string $sistema_id
 * @property string $users_id
 * @property string $estdopeticiones_id
 * @property string $asunto
 * @property string $descripcion
 * @property string $usuarioid
 * @property string $username
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 * @property string $sistemaoperativo
 * @property string $navegador
 * @property \Cake\I18n\FrozenTime $fecha_inicio
 * @property \Cake\I18n\FrozenTime $fecha_fin
 * @property bool $leido
 * @property int $activo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Sistema $sistema
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\BugAnexo[] $bug_anexo
 * @property \App\Model\Entity\Respuesta[] $respuestas
 */
class Bug extends Entity
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
