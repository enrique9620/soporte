<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BugsFixture
 *
 */
class BugsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'sistema_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'users_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'estdopeticiones_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'asunto' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => 'Sin asunto', 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'descripcion' => ['type' => 'string', 'length' => 1024, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'usuarioid' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'username' => ['type' => 'string', 'length' => 65, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nombre' => ['type' => 'string', 'length' => 512, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'telefono' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'correo' => ['type' => 'string', 'length' => 65, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sistemaoperativo' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'navegador' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha_inicio' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'fecha_fin' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'leido' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'activo' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_bugs_sistemas_idx' => ['type' => 'index', 'columns' => ['sistema_id'], 'length' => []],
            'users_id' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'estdopeticiones_id' => ['type' => 'index', 'columns' => ['estdopeticiones_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'bugs_ibfk_1' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'bugs_ibfk_2' => ['type' => 'foreign', 'columns' => ['estdopeticiones_id'], 'references' => ['estadopeticiones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_bugs_sistemas' => ['type' => 'foreign', 'columns' => ['sistema_id'], 'references' => ['sistemas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
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
            'id' => '8242c9b3-b106-4547-b2cf-25bac5ef2d06',
            'sistema_id' => '5f858d3c-ad6c-4434-905f-814909bbfd9a',
            'users_id' => 'd1c8bc2c-8b50-4111-b54c-ad6a719ec5c3',
            'estdopeticiones_id' => '1231975b-5bb3-4325-8ab2-36c7bae514ff',
            'asunto' => 'Lorem ipsum dolor sit amet',
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'usuarioid' => 'f8fee876-f158-46f7-a80e-0cc4712b17d2',
            'username' => 'Lorem ipsum dolor sit amet',
            'nombre' => 'Lorem ipsum dolor sit amet',
            'telefono' => 'Lorem ip',
            'correo' => 'Lorem ipsum dolor sit amet',
            'sistemaoperativo' => 'Lorem ipsum dolor sit amet',
            'navegador' => 'Lorem ipsum dolor sit amet',
            'fecha_inicio' => '2019-05-24 11:39:29',
            'fecha_fin' => '2019-05-24 11:39:29',
            'leido' => 1,
            'activo' => 1,
            'created' => '2019-05-24 11:39:29',
            'modified' => '2019-05-24 11:39:29'
        ],
    ];
}
