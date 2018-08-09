<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_new_forum_threads()
    {
        $this->actingAs(factory(User::class)->create());

        /** @var Thread $thread */
        $thread = factory(Thread::class)->make();

        $this->post('/threads', $thread->toArray());

        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /** @test */
    public function an_authenticated_user_can_not_new_forum_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads', factory(Thread::class)->make()->toArray());

        $this->get('/threads/' . factory(Thread::class)->make()->id)
            ->assertSee(factory(Thread::class)->make()->title)
            ->assertSee(factory(Thread::class)->make()->body);
    }
}
