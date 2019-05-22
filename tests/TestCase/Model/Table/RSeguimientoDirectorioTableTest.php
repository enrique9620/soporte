<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RSeguimientoDirectorioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RSeguimientoDirectorioTable Test Case
 */
class RSeguimientoDirectorioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RSeguimientoDirectorioTable
     */
    public $RSeguimientoDirectorio;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.r_seguimiento_directorio'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RSeguimientoDirectorio') ? [] : ['className' => 'App\Model\Table\RSeguimientoDirectorioTable'];
        $this->RSeguimientoDirectorio = TableRegistry::get('RSeguimientoDirectorio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RSeguimientoDirectorio);

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
