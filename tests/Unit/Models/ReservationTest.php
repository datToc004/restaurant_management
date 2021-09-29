<?php

namespace Tests\Unit\Models;

use App\Models\Dish;
use App\Models\DishReservation;
use App\Models\Reservation as ModelsReservation;
use PHPUnit\Framework\TestCase;
use Tests\Unit\ModelTestCase;

class ReservationTest extends ModelTestCase
{
    protected $reservation;

    public function setUp(): void
    {
        parent::setUp();
        $this->reservation = new ModelsReservation();
    }

    public function tearDown(): void
    {
        $this->reservation = null;
        parent::tearDown();
    }

    public function testRelation()
    {
        $relation = $this->reservation->dishes();
        $this->assertBelongsToManyRelation($relation, $this->reservation, new Dish());
        $relation = $this->reservation->dishReservations();
        $this->assertHasManyRelation($relation, $this->reservation);
    }
}
