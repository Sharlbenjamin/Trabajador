<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Topic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TopicController
 */
final class TopicControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $topics = Topic::factory()->count(3)->create();

        $response = $this->get(route('topics.index'));

        $response->assertOk();
        $response->assertViewIs('topic.index');
        $response->assertViewHas('topics');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('topics.create'));

        $response->assertOk();
        $response->assertViewIs('topic.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TopicController::class,
            'store',
            \App\Http\Requests\TopicStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $topic = $this->faker->word();

        $response = $this->post(route('topics.store'), [
            'topic' => $topic,
        ]);

        $topics = Topic::query()
            ->where('topic', $topic)
            ->get();
        $this->assertCount(1, $topics);
        $topic = $topics->first();

        $response->assertRedirect(route('topics.index'));
        $response->assertSessionHas('topic.id', $topic->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $topic = Topic::factory()->create();

        $response = $this->get(route('topics.show', $topic));

        $response->assertOk();
        $response->assertViewIs('topic.show');
        $response->assertViewHas('topic');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $topic = Topic::factory()->create();

        $response = $this->get(route('topics.edit', $topic));

        $response->assertOk();
        $response->assertViewIs('topic.edit');
        $response->assertViewHas('topic');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TopicController::class,
            'update',
            \App\Http\Requests\TopicUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $topic = Topic::factory()->create();
        $topic = $this->faker->word();

        $response = $this->put(route('topics.update', $topic), [
            'topic' => $topic,
        ]);

        $topic->refresh();

        $response->assertRedirect(route('topics.index'));
        $response->assertSessionHas('topic.id', $topic->id);

        $this->assertEquals($topic, $topic->topic);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $topic = Topic::factory()->create();

        $response = $this->delete(route('topics.destroy', $topic));

        $response->assertRedirect(route('topics.index'));

        $this->assertModelMissing($topic);
    }
}
