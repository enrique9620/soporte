<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AsignadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AsignadosTable Test Case
 */
class AsignadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AsignadosTable
     */
    public $Asignados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.asignados',
        'app.users',
        'app.bugs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Asignados') ? [] : ['className' => 'App\Model\Table\AsignadosTable'];
        $this->Asignados = TableRegistry::get('Asignados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Asignados);

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
