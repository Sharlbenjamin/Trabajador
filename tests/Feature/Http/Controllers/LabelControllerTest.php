<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LabelController
 */
final class LabelControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $labels = Label::factory()->count(3)->create();

        $response = $this->get(route('labels.index'));

        $response->assertOk();
        $response->assertViewIs('label.index');
        $response->assertViewHas('labels');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('labels.create'));

        $response->assertOk();
        $response->assertViewIs('label.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LabelController::class,
            'store',
            \App\Http\Requests\LabelStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();

        $response = $this->post(route('labels.store'), [
            'name' => $name,
        ]);

        $labels = Label::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $labels);
        $label = $labels->first();

        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHas('label.id', $label->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $label = Label::factory()->create();

        $response = $this->get(route('labels.show', $label));

        $response->assertOk();
        $response->assertViewIs('label.show');
        $response->assertViewHas('label');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $label = Label::factory()->create();

        $response = $this->get(route('labels.edit', $label));

        $response->assertOk();
        $response->assertViewIs('label.edit');
        $response->assertViewHas('label');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LabelController::class,
            'update',
            \App\Http\Requests\LabelUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $label = Label::factory()->create();
        $name = $this->faker->name();

        $response = $this->put(route('labels.update', $label), [
            'name' => $name,
        ]);

        $label->refresh();

        $response->assertRedirect(route('labels.index'));
        $response->assertSessionHas('label.id', $label->id);

        $this->assertEquals($name, $label->name);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $label = Label::factory()->create();

        $response = $this->delete(route('labels.destroy', $label));

        $response->assertRedirect(route('labels.index'));

        $this->assertModelMissing($label);
    }
}
