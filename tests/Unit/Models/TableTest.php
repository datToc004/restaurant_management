<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Order;
use App\Models\Table as ModelsTable;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class TableTest extends ModelTestCase
{
    protected $table;

    public function setUp(): void
    {
        parent::setUp();
        $this->table = new ModelsTable();
    }

    public function tearDown(): void
    {
        $this->table = null;
        parent::tearDown();
    }

    public function testFillable()
    {
        $fillable = [
            'name',
            'code',
            'description',
            'max',
            'img',
            'category_id',
            'status',
        ];
        $this->assertEquals($fillable, $this->table->getFillable());
    }

    public function testRelation()
    {
        $relation = $this->table->category();
        $this->assertBelongsToRelation($relation, new Category());
        $relation = $this->table->reservations();
        $this->assertHasManyRelation($relation, $this->table);
        $relation = $this->table->orders();
        $this->assertBelongsToManyRelation($relation, $this->table, new Order());
    }
}
