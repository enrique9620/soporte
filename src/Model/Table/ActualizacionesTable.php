<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Actualizaciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CatImportancias
 * @property \Cake\ORM\Association\BelongsTo $CatTipoactualizaciones
 * @property \Cake\ORM\Association\BelongsTo $Sistemas
 *
 * @method \App\Model\Entity\Actualizacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Actualizacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Actualizacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Actualizacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Actualizacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Actualizacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Actualizacione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActualizacionesTable extends Table
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

        $this->setTable('actualizaciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('CatImportancias', [
            'foreignKey' => 'cat_importancia_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CatTipoactualizaciones', [
            'foreignKey' => 'cat_tipoactualizacion_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sistemas', [
            'foreignKey' => 'sistema_id',
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
            ->allowEmpty('descripcion');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        // $validator
        //     ->boolean('activo')
        //     ->requirePresence('activo', 'create')
        //     ->notEmpty('activo');

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
        $rules->add($rules->existsIn(['cat_importancia_id'], 'CatImportancias'));
        $rules->add($rules->existsIn(['cat_tipoactualizacion_id'], 'CatTipoactualizaciones'));
        $rules->add($rules->existsIn(['sistema_id'], 'Sistemas'));

        return $rules;
    }
}
