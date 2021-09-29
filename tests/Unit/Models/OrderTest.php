<?php

namespace Tests\Unit\Models;

use App\Models\Order as ModelsOrder;
use App\Models\Table;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class OrderTest extends ModelTestCase
{
    protected $order;

    public function setUp(): void
    {
        parent::setUp();
        $this->order = new ModelsOrder();
    }

    public function tearDown(): void
    {
        $this->order = null;
        parent::tearDown();
    }

    public function testRelation()
    {
        $relation = $this->order->reservations();
        $this->assertHasManyRelation($relation, $this->order);
        $relation = $this->order->receipts();
        $this->assertHasOneRelation($relation, $this->order);
        $relation = $this->order->tables();
        $this->assertBelongsToManyRelation($relation, $this->order, new Table());
        $relation = $this->order->user();
        $this->assertBelongsToRelation($relation, new User());
    }
}
