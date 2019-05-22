<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActualizacionesAnexosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActualizacionesAnexosTable Test Case
 */
class ActualizacionesAnexosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActualizacionesAnexosTable
     */
    public $ActualizacionesAnexos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.actualizaciones_anexos',
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
        $config = TableRegistry::exists('ActualizacionesAnexos') ? [] : ['className' => 'App\Model\Table\ActualizacionesAnexosTable'];
        $this->ActualizacionesAnexos = TableRegistry::get('ActualizacionesAnexos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActualizacionesAnexos);

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
