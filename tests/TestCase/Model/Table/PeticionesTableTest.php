<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeticionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeticionesTable Test Case
 */
class PeticionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeticionesTable
     */
    public $Peticiones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.peticiones',
        'app.bugs',
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
        $config = TableRegistry::exists('Peticiones') ? [] : ['className' => 'App\Model\Table\PeticionesTable'];
        $this->Peticiones = TableRegistry::get('Peticiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Peticiones);

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
