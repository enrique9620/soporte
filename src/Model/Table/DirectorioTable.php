<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Directorio Model
 *
 * @method \App\Model\Entity\Directorio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Directorio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Directorio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Directorio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Directorio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Directorio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Directorio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DirectorioTable extends Table
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

        $this->setTable('directorio');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('id_localidad', 'create')
            ->notEmpty('id_localidad');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('paterno', 'create')
            ->notEmpty('paterno');

        $validator
            ->requirePresence('materno', 'create')
            ->notEmpty('materno');

        $validator
            ->requirePresence('cargo', 'create')
            ->notEmpty('cargo');

        $validator
            ->requirePresence('correo', 'create')
            ->notEmpty('correo');

        $validator
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');

        $validator
            ->dateTime('ultima_actualizacion')
            ->allowEmpty('ultima_actualizacion', 'create');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo', 'create');

        return $validator;
    }
}
