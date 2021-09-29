<?php

namespace Tests\Unit\Models;

use App\Models\Role as ModelsRole;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class RoleTest extends ModelTestCase
{
    protected $role;

    public function setUp(): void
    {
        parent::setUp();
        $this->role = new ModelsRole();
    }

    public function tearDown(): void
    {
        $this->role = null;
        parent::tearDown();
    }

    public function testFillable()
    {
        $fillable = [
            'name',
            'description',
        ];
        $this->assertEquals($fillable, $this->role->getFillable());
    }

    public function testRelation()
    {
        $relation = $this->role->users();
        $this->assertHasManyRelation($relation, $this->role);
    }
}
