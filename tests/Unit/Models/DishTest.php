<?php

namespace Tests\Unit\Models;

use App\Models\Dish as ModelsDish;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class DishTest extends ModelTestCase
{
    protected $dish;

    public function setUp(): void
    {
        parent::setUp();
        $this->dish = new ModelsDish();
    }

    public function tearDown(): void
    {
        $this->dish = null;
        parent::tearDown();
    }

    public function testFillable()
    {
        $fillable = [
            'name',
            'code',
            'description',
            'price',
            'img',
            'type',
        ];
        $this->assertEquals($fillable, $this->dish->getFillable());
    }

    public function testRelation()
    {
        $relation = $this->dish->comments();
        $this->assertHasManyRelation($relation, $this->dish);
    }
}
