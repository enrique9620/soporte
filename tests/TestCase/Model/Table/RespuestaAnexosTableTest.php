<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RespuestaAnexosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RespuestaAnexosTable Test Case
 */
class RespuestaAnexosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RespuestaAnexosTable
     */
    public $RespuestaAnexos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.respuesta_anexos',
        'app.respuestas',
        'app.bugs',
        'app.sistemas',
        'app.users',
        'app.asignados',
        'app.bug_anexo',
        'app.estadopeticiones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RespuestaAnexos') ? [] : ['className' => RespuestaAnexosTable::class];
        $this->RespuestaAnexos = TableRegistry::get('RespuestaAnexos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RespuestaAnexos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
