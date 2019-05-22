<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActualizacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActualizacionesTable Test Case
 */
class ActualizacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActualizacionesTable
     */
    public $Actualizaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.actualizaciones',
        'app.cat_importancias',
        'app.cat_tipoactualizaciones',
        'app.sistemas',
        'app.bugs',
        'app.users',
        'app.asignados',
        'app.bug_anexo',
        'app.respuestas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Actualizaciones') ? [] : ['className' => 'App\Model\Table\ActualizacionesTable'];
        $this->Actualizaciones = TableRegistry::get('Actualizaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Actualizaciones);

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
