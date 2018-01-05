<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelefonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelefonesTable Test Case
 */
class TelefonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TelefonesTable
     */
    public $Telefones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.telefones',
        'app.clientes',
        'app.enderecos',
        'app.cidades',
        'app.estados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Telefones') ? [] : ['className' => TelefonesTable::class];
        $this->Telefones = TableRegistry::get('Telefones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Telefones);

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
