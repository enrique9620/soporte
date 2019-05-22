<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PeticionesFixture
 *
 */
class PeticionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'bug_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'estadopeticion_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'string', 'length' => 1024, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'peticionescol' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'imagen' => ['type' => 'binary', 'length' => 4294967295, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_peticiones_estadopeticiones1_idx' => ['type' => 'index', 'columns' => ['estadopeticion_id'], 'length' => []],
            'fk_peticiones_bugs1_idx' => ['type' => 'index', 'columns' => ['bug_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_peticiones_bugs1' => ['type' => 'foreign', 'columns' => ['bug_id'], 'references' => ['bugs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_peticiones_estadopeticiones1' => ['type' => 'foreign', 'columns' => ['estadopeticion_id'], 'references' => ['estadopeticiones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '8c1341b8-78d4-4916-8156-ee0dc10e9721',
            'bug_id' => '5c6afe82-7bc1-4cd4-a558-833c100cfee9',
            'estadopeticion_id' => '9e8eeebb-08fd-4ae7-a2c6-9746a0b7c89e',
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'peticionescol' => 'Lorem ipsum dolor sit amet',
            'imagen' => 'Lorem ipsum dolor sit a',
            'created' => '2017-04-28 19:00:44',
            'modified' => '2017-04-28 19:00:44'
        ],
    ];
}
