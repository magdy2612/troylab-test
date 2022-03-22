<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
	public function only_logged_in_users_can_see_all_students(){
		$response = $this->get('/api/students');
		$this->assertOk(true);
	}

    public function listAllStudents(){
    	$response = $this->get('/');
        $this->assertTrue(true);
    }

    public function test_add_new_student(){
    	$formData = [
    		'name' => 'Ahmed',
    		'order' => 1
    	];
    	$this->json('POST','api/students',$formData)->assertStatus(201);
    }
}
