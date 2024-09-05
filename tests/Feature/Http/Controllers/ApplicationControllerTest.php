<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ApplicationController
 */
final class ApplicationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $applications = Application::factory()->count(3)->create();

        $response = $this->get(route('applications.index'));

        $response->assertOk();
        $response->assertViewIs('application.index');
        $response->assertViewHas('applications');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('applications.create'));

        $response->assertOk();
        $response->assertViewIs('application.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ApplicationController::class,
            'store',
            \App\Http\Requests\ApplicationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $company = $this->faker->company();

        $response = $this->post(route('applications.store'), [
            'user_id' => $user->id,
            'account_id' => $account->id,
            'company' => $company,
        ]);

        $applications = Application::query()
            ->where('user_id', $user->id)
            ->where('account_id', $account->id)
            ->where('company', $company)
            ->get();
        $this->assertCount(1, $applications);
        $application = $applications->first();

        $response->assertRedirect(route('applications.index'));
        $response->assertSessionHas('application.id', $application->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $application = Application::factory()->create();

        $response = $this->get(route('applications.show', $application));

        $response->assertOk();
        $response->assertViewIs('application.show');
        $response->assertViewHas('application');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $application = Application::factory()->create();

        $response = $this->get(route('applications.edit', $application));

        $response->assertOk();
        $response->assertViewIs('application.edit');
        $response->assertViewHas('application');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ApplicationController::class,
            'update',
            \App\Http\Requests\ApplicationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $application = Application::factory()->create();
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $company = $this->faker->company();

        $response = $this->put(route('applications.update', $application), [
            'user_id' => $user->id,
            'account_id' => $account->id,
            'company' => $company,
        ]);

        $application->refresh();

        $response->assertRedirect(route('applications.index'));
        $response->assertSessionHas('application.id', $application->id);

        $this->assertEquals($user->id, $application->user_id);
        $this->assertEquals($account->id, $application->account_id);
        $this->assertEquals($company, $application->company);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $application = Application::factory()->create();

        $response = $this->delete(route('applications.destroy', $application));

        $response->assertRedirect(route('applications.index'));

        $this->assertModelMissing($application);
    }
}
