<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Carbon\Carbon;
use Tests\TestCase;

class DetectSlaTest extends TestCase
{
    public function test_sla_is_throws_exception(): void {
        $ticket = new Ticket();
        $this->expectException(\Exception::class);
        $ticket->detectSLA('test');

    }

    public function test_with_low_prio(): void {
        $ticket = new Ticket();
        $now = Carbon::now();
        $date = $ticket->detectSLA('LOW');

        $hours = round($now->floatDiffInHours($date, false));
        $this->assertEquals(12, $hours);
    }


}
