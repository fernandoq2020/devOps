<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function only_logged_in_users_can_see_ticket_list(){
        $respose = $this->get('/admin/tickets')->assertRedirect('/login');
    
    }

}
