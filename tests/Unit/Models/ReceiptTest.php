<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use App\Models\Receipt as ModelsReceipt;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class ReceiptTest extends ModelTestCase
{
    protected $receipt;

    public function setUp(): void
    {
        parent::setUp();
        $this->receipt = new ModelsReceipt();
    }

    public function tearDown(): void
    {
        $this->receipt = null;
        parent::tearDown();
    }

    public function testRelation()
    {
        $relation = $this->receipt->order();
        $this->assertBelongsToRelation($relation, new Order());
    }
}
