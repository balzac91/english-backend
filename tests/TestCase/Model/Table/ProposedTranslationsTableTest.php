<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProposedTranslationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProposedTranslationsTable Test Case
 */
class ProposedTranslationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProposedTranslationsTable
     */
    public $ProposedTranslations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.proposed_translations',
        'app.words',
        'app.categories',
        'app.levels',
        'app.users',
        'app.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProposedTranslations') ? [] : ['className' => 'App\Model\Table\ProposedTranslationsTable'];
        $this->ProposedTranslations = TableRegistry::get('ProposedTranslations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProposedTranslations);

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
