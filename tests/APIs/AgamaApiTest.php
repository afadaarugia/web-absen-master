<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Agama;

class AgamaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_agama()
    {
        $agama = factory(Agama::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/agamas', $agama
        );

        $this->assertApiResponse($agama);
    }

    /**
     * @test
     */
    public function test_read_agama()
    {
        $agama = factory(Agama::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/agamas/'.$agama->id
        );

        $this->assertApiResponse($agama->toArray());
    }

    /**
     * @test
     */
    public function test_update_agama()
    {
        $agama = factory(Agama::class)->create();
        $editedAgama = factory(Agama::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/agamas/'.$agama->id,
            $editedAgama
        );

        $this->assertApiResponse($editedAgama);
    }

    /**
     * @test
     */
    public function test_delete_agama()
    {
        $agama = factory(Agama::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/agamas/'.$agama->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/agamas/'.$agama->id
        );

        $this->response->assertStatus(404);
    }
}
