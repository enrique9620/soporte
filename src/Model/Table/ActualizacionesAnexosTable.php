<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActualizacionesAnexos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Actualizaciones
 *
 * @method \App\Model\Entity\ActualizacionesAnexo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActualizacionesAnexo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActualizacionesAnexo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActualizacionesAnexo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActualizacionesAnexo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActualizacionesAnexo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActualizacionesAnexo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActualizacionesAnexosTable extends Table
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

        $this->setTable('actualizaciones_anexos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Actualizaciones', [
            'foreignKey' => 'actualizaciones_id'
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
            ->requirePresence('imagen_anterior', 'create')
            ->notEmpty('imagen_anterior');

        $validator
            ->requirePresence('imagen_nueva', 'create')
            ->notEmpty('imagen_nueva');

        $validator
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->requirePresence('tamano', 'create')
            ->notEmpty('tamano');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['actualizaciones_id'], 'Actualizaciones'));

        return $rules;
    }
}
