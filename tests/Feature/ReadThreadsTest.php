<?php

namespace Tests\Feature;


use App\Models\Reply;
use App\Models\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var Thread
     */
    var $thread;

    public function setUp()
    {
        parent::setUp();
        $this->thread = factory('App\Models\Thread')->create();
    }

    /** @test */
    public function a_user_can_browse_threads()
    {
        $this->get('/threads')->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_read_a_single_thread()
    {
        $this->get('/threads/' . $this->thread->id)->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_read_replies_that_are_associated_with_a_thread()
    {
        /** @var Reply $reply */
        $reply = factory('App\Models\Reply')->create(['thread_id' => $this->thread->id]);

        $this->get('/threads/' . $this->thread->id)->assertSee($reply->body);
    }
}
