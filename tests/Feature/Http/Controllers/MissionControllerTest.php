<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use App\Models\Mission;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MissionController
 */
final class MissionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $missions = Mission::factory()->count(3)->create();

        $response = $this->get(route('missions.index'));

        $response->assertOk();
        $response->assertViewIs('mission.index');
        $response->assertViewHas('missions');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('missions.create'));

        $response->assertOk();
        $response->assertViewIs('mission.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MissionController::class,
            'store',
            \App\Http\Requests\MissionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $name = $this->faker->name();

        $response = $this->post(route('missions.store'), [
            'user_id' => $user->id,
            'account_id' => $account->id,
            'name' => $name,
        ]);

        $missions = Mission::query()
            ->where('user_id', $user->id)
            ->where('account_id', $account->id)
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $missions);
        $mission = $missions->first();

        $response->assertRedirect(route('missions.index'));
        $response->assertSessionHas('mission.id', $mission->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $mission = Mission::factory()->create();

        $response = $this->get(route('missions.show', $mission));

        $response->assertOk();
        $response->assertViewIs('mission.show');
        $response->assertViewHas('mission');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $mission = Mission::factory()->create();

        $response = $this->get(route('missions.edit', $mission));

        $response->assertOk();
        $response->assertViewIs('mission.edit');
        $response->assertViewHas('mission');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MissionController::class,
            'update',
            \App\Http\Requests\MissionUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $mission = Mission::factory()->create();
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $name = $this->faker->name();

        $response = $this->put(route('missions.update', $mission), [
            'user_id' => $user->id,
            'account_id' => $account->id,
            'name' => $name,
        ]);

        $mission->refresh();

        $response->assertRedirect(route('missions.index'));
        $response->assertSessionHas('mission.id', $mission->id);

        $this->assertEquals($user->id, $mission->user_id);
        $this->assertEquals($account->id, $mission->account_id);
        $this->assertEquals($name, $mission->name);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $mission = Mission::factory()->create();

        $response = $this->delete(route('missions.destroy', $mission));

        $response->assertRedirect(route('missions.index'));

        $this->assertModelMissing($mission);
    }
}
