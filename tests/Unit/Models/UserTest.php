<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use App\Models\User as ModelsUser;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class UserTest extends ModelTestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = new ModelsUser();
    }

    public function tearDown(): void
    {
        $this->user = null;
        parent::tearDown();
    }

    public function testFillable()
    {
        $fillable = [
            'name',
            'phone',
            'sex',
            'address',
            'email',
            'password',
        ];
        $this->assertEquals($fillable, $this->user->getFillable());
    }

    public function testHidden()
    {
        $hidden = [
            'password',
            'remember_token',
        ];
        $this->assertEquals($hidden, $this->user->getHidden());
    }

    public function testCast()
    {
        $casts = [
            'email_verified_at' => 'datetime',
            'id' => 'int'
        ];
        $this->assertEquals($casts, $this->user->getCasts());
    }

    public function testRelation()
    {
        $relation = $this->user->orders();
        $this->assertHasManyRelation($relation, $this->user);
        $relation = $this->user->role();
        $this->assertBelongsToRelation($relation, new Role());
    }
}
