<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TablapruebaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TablapruebaTable Test Case
 */
class TablapruebaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TablapruebaTable
     */
    public $Tablaprueba;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tablaprueba'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tablaprueba') ? [] : ['className' => 'App\Model\Table\TablapruebaTable'];
        $this->Tablaprueba = TableRegistry::get('Tablaprueba', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tablaprueba);

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
