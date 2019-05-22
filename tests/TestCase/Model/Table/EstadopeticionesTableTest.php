<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadopeticionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadopeticionesTable Test Case
 */
class EstadopeticionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadopeticionesTable
     */
    public $Estadopeticiones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Estadopeticiones') ? [] : ['className' => 'App\Model\Table\EstadopeticionesTable'];
        $this->Estadopeticiones = TableRegistry::get('Estadopeticiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estadopeticiones);

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
}
