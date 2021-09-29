<?php

namespace Tests\Unit\Models;

use App\Models\Category as ModelsCategory;
use Tests\Unit\ModelTestCase;

class CategoryTest extends ModelTestCase
{
    protected $category;

    public function setUp(): void
    {
        parent::setUp();
        $this->category = new ModelsCategory();
    }

    public function tearDown(): void
    {
        $this->category = null;
        parent::tearDown();
    }

    public function testFillable()
    {
        $fillable = [
            'name',
        ];
        $this->assertEquals($fillable, $this->category->getFillable());
    }

    public function testRelation()
    {
        $relation = $this->category->tables();
        $this->assertHasManyRelation($relation, $this->category);
    }
}
