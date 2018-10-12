<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InterestRatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InterestRatesTable Test Case
 */
class InterestRatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InterestRatesTable
     */
    public $InterestRates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.interest_rates',
        'app.contracts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InterestRates') ? [] : ['className' => InterestRatesTable::class];
        $this->InterestRates = TableRegistry::getTableLocator()->get('InterestRates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InterestRates);

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
