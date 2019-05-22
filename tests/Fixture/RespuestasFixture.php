<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RespuestasFixture
 *
 */
class RespuestasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'bug_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'estadopeticion_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'usuarioid' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'descripcion' => ['type' => 'string', 'length' => 1024, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'users_id' => ['type' => 'uuid', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'users_id' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'bug_id' => ['type' => 'index', 'columns' => ['bug_id'], 'length' => []],
            'estadopeticion_id' => ['type' => 'index', 'columns' => ['estadopeticion_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'respuestas_ibfk_1' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'respuestas_ibfk_2' => ['type' => 'foreign', 'columns' => ['bug_id'], 'references' => ['bugs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'respuestas_ibfk_3' => ['type' => 'foreign', 'columns' => ['estadopeticion_id'], 'references' => ['estadopeticiones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => '3c6bc04a-f790-458b-a071-b1b1085e0180',
            'bug_id' => 'ad75d6c5-e0ce-49e2-8371-d4ae7fe94059',
            'estadopeticion_id' => '25fdb44f-a237-4de3-aecb-252c6641c91a',
            'usuarioid' => '34de10e2-bb8f-4b3e-b7b2-ffc201fe9dc5',
            'descripcion' => 'Lorem ipsum dolor sit amet',
            'users_id' => '39e365e4-06d1-4b36-9f7c-78c808b42de5',
            'created' => '2019-05-22 11:54:18',
            'modified' => '2019-05-22 11:54:18'
        ],
    ];
}
