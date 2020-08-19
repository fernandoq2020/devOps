<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function only_logged_in_users_can_see_ticket_list(){
        $respose = $this->get('/admin/tickets')->assertRedirect('/login');
    
    }

    /** @test */
    public function authenticated_agents_can_see_tickets(){
        
        $this->withoutExceptionHandling();
        //create an user
        
        $this->actingAs(factory(User::class)->create());

        $respose = $this->get('/admin/tickets')->assertOk();

    }

    /** @test */
    public function authorized_users_can_see_priorities(){
        $respose = $this->get('admin/priorities')->assertRedirect('/login');
    }


    /** @test */
    public function not_loged_users_can_see_tickets(){
        
        //$this->withoutExceptionHandling();
        //create an user
        
        //$this->actingAs(factory(User::class)->create());

        $respose = $this->get('/admin/tickets')->assertOk();

    }
    
    /** @test */
    public function user_creation_without_loggingin(){
        
        //$this->withoutExceptionHandling();
        $respose = $this->any('admin/users/create', [
            'email' => 'prueba@prueba.com',
            'password' => '1234567890',
            'name' => 'test'
            ]);

        $this->assertCount(1,User::all());

    }

}
