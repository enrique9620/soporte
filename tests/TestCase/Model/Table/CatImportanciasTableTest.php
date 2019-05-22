<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatImportanciasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatImportanciasTable Test Case
 */
class CatImportanciasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatImportanciasTable
     */
    public $CatImportancias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_importancias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatImportancias') ? [] : ['className' => 'App\Model\Table\CatImportanciasTable'];
        $this->CatImportancias = TableRegistry::get('CatImportancias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatImportancias);

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
