<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodsTable Test Case
 */
class FoodsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodsTable
     */
    protected $Foods;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Foods',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Foods') ? [] : ['className' => FoodsTable::class];
        $this->Foods = $this->getTableLocator()->get('Foods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Foods);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
