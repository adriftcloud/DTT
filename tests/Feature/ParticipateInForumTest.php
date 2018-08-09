<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function unauthenticated_user_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/threads/1/replies', []);
    }

    /** @test */
    function an_authenticated_user_may_participate_in_forum_thread()
    {

        $this->be(factory(User::class)->create());

        /** @var Thread $thread */
        $thread = factory(Thread::class)->create();

        /** @var Reply $reply */
        $reply = factory(Reply::class)->make();

        $this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

        $this->get('/threads/' . $thread->id)->assertSee($reply->body);

    }


}
