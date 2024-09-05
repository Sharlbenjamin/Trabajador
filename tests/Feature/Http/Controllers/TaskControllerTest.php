<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Mission;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TaskController
 */
final class TaskControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $tasks = Task::factory()->count(3)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertOk();
        $response->assertViewIs('task.index');
        $response->assertViewHas('tasks');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('tasks.create'));

        $response->assertOk();
        $response->assertViewIs('task.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TaskController::class,
            'store',
            \App\Http\Requests\TaskStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();
        $mission = Mission::factory()->create();
        $name = $this->faker->name();
        $status = $this->faker->boolean();

        $response = $this->post(route('tasks.store'), [
            'user_id' => $user->id,
            'mission_id' => $mission->id,
            'name' => $name,
            'status' => $status,
        ]);

        $tasks = Task::query()
            ->where('user_id', $user->id)
            ->where('mission_id', $mission->id)
            ->where('name', $name)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $tasks);
        $task = $tasks->first();

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('task.id', $task->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.show', $task));

        $response->assertOk();
        $response->assertViewIs('task.show');
        $response->assertViewHas('task');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.edit', $task));

        $response->assertOk();
        $response->assertViewIs('task.edit');
        $response->assertViewHas('task');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TaskController::class,
            'update',
            \App\Http\Requests\TaskUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $task = Task::factory()->create();
        $user = User::factory()->create();
        $mission = Mission::factory()->create();
        $name = $this->faker->name();
        $status = $this->faker->boolean();

        $response = $this->put(route('tasks.update', $task), [
            'user_id' => $user->id,
            'mission_id' => $mission->id,
            'name' => $name,
            'status' => $status,
        ]);

        $task->refresh();

        $response->assertRedirect(route('tasks.index'));
        $response->assertSessionHas('task.id', $task->id);

        $this->assertEquals($user->id, $task->user_id);
        $this->assertEquals($mission->id, $task->mission_id);
        $this->assertEquals($name, $task->name);
        $this->assertEquals($status, $task->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $task = Task::factory()->create();

        $response = $this->delete(route('tasks.destroy', $task));

        $response->assertRedirect(route('tasks.index'));

        $this->assertModelMissing($task);
    }
}
