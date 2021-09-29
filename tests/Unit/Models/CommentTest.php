<?php

namespace Tests\Unit\Models;

use App\Models\Comment as ModelsComment;
use App\Models\User;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class CommentTest extends ModelTestCase
{
    protected $comment;

    public function setUp(): void
    {
        parent::setUp();
        $this->comment = new ModelsComment();
    }

    public function tearDown(): void
    {
        $this->comment = null;
        parent::tearDown();
    }

    public function testFillable()
    {
        $fillable = [
            'note',
            'dish_id',
            'user_id',
        ];
        $this->assertEquals($fillable, $this->comment->getFillable());
    }

    public function testRelation()
    {
        $relation = $this->comment->user();
        $this->assertBelongsToRelation($relation, new User());
    }
}
