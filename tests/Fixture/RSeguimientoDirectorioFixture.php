<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RSeguimientoDirectorioFixture
 *
 */
class RSeguimientoDirectorioFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'r_seguimiento_directorio';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_usuario' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'id_directorio' => ['type' => 'string', 'length' => 36, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'comentario' => ['type' => 'text', 'length' => 4294967295.0, 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'archivo' => ['type' => 'binary', 'length' => 4294967295.0, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'id_directorio' => ['type' => 'index', 'columns' => ['id_directorio'], 'length' => []],
            'id_usuario' => ['type' => 'index', 'columns' => ['id_usuario'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'r_seguimiento_directorio_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_directorio'], 'references' => ['directorio', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'r_seguimiento_directorio_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_usuario'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '7d2f65b1-a884-4fde-b3a0-663235f71793',
            'id_usuario' => 'Lorem ipsum dolor sit amet',
            'id_directorio' => 'Lorem ipsum dolor sit amet',
            'comentario' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'archivo' => 'Lorem ipsum dolor sit a',
            'created' => '2018-03-29 20:53:52',
            'modified' => '2018-03-29 20:53:52'
        ],
    ];
}
