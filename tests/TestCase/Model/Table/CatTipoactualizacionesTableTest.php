<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatTipoactualizacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatTipoactualizacionesTable Test Case
 */
class CatTipoactualizacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatTipoactualizacionesTable
     */
    public $CatTipoactualizaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_tipoactualizaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatTipoactualizaciones') ? [] : ['className' => 'App\Model\Table\CatTipoactualizacionesTable'];
        $this->CatTipoactualizaciones = TableRegistry::get('CatTipoactualizaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatTipoactualizaciones);

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
