<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RSeguimientoDirectorio Model
 *
 * @method \App\Model\Entity\RSeguimientoDirectorio get($primaryKey, $options = [])
 * @method \App\Model\Entity\RSeguimientoDirectorio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RSeguimientoDirectorio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RSeguimientoDirectorio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RSeguimientoDirectorio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RSeguimientoDirectorio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RSeguimientoDirectorio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RSeguimientoDirectorioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('r_seguimiento_directorio');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Directorio', [
            'foreignKey' => 'id_directorio',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Users', [
            'foreignKey' => 'id_usuario',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('id_usuario', 'create')
            ->notEmpty('id_usuario');

        $validator
            ->requirePresence('id_directorio', 'create')
            ->notEmpty('id_directorio');

        $validator
            ->requirePresence('comentario', 'create')
            ->notEmpty('comentario');

        $validator
            ->allowEmpty('archivo');

        return $validator;
    }
}
