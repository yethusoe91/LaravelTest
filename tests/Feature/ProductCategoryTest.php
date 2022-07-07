<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ProductCategoryTest extends TestCase
{
    /**
    * A basic unit test example.
    *
    * @return void
    */
    public function a_user_can_read_single_task()
    {
        $task = factory('Product')->create();
        
        //When user visit the task's URI
        $response = $this->get('/tasks/'.$task->id);
        //He can see the task details
        $response->assertSee($task->title)
        ->assertSee($task->description);
    }
}
