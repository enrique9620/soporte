<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActualizacionesFixture
 *
 */
class ActualizacionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'string', 'length' => 512, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_importancia_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cat_tipoactualizacion_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'sistema_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'activo' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_actualizaciones_importancias1_idx' => ['type' => 'index', 'columns' => ['cat_importancia_id'], 'length' => []],
            'fk_actualizaciones_tipoactualizaciones1_idx' => ['type' => 'index', 'columns' => ['cat_tipoactualizacion_id'], 'length' => []],
            'sistema_id' => ['type' => 'index', 'columns' => ['sistema_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'actualizaciones_ibfk_1' => ['type' => 'foreign', 'columns' => ['cat_importancia_id'], 'references' => ['cat_importancias', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'actualizaciones_ibfk_2' => ['type' => 'foreign', 'columns' => ['cat_tipoactualizacion_id'], 'references' => ['cat_tipoactualizaciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'actualizaciones_ibfk_3' => ['type' => 'foreign', 'columns' => ['sistema_id'], 'references' => ['sistemas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'deb31591-a9f3-4e58-8031-0f4f1b165a5a',
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'fecha' => '2019-05-10',
            'created' => '2019-05-10 10:29:48',
            'modified' => '2019-05-10 10:29:48',
            'cat_importancia_id' => '2c55b20d-2c53-4b14-8e3b-94aa795ce01a',
            'cat_tipoactualizacion_id' => '1b83bdd1-19e3-42ca-ae13-01db52bf51b0',
            'sistema_id' => '46e14169-fb79-4364-bec2-367fbf1b7549',
            'activo' => 1
        ],
    ];
}
