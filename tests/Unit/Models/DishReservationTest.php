<?php

namespace Tests\Unit\Models;

use App\Models\Dish;
use App\Models\DishReservation as ModelsDishReservation;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class DishReservationTest extends ModelTestCase
{
    protected $dishReservation;

    public function setUp(): void
    {
        parent::setUp();
        $this->dishReservation = new ModelsDishReservation();
    }

    public function tearDown(): void
    {
        $this->dishReservation = null;
        parent::tearDown();
    }

    public function testTableName()
    {
        $this->assertEquals("dish_reservation", $this->dishReservation->getTable());
    }

    public function testRelation()
    {
        $relation = $this->dishReservation->dish();
        $this->assertBelongsToRelation($relation, new Dish());
    }
}
