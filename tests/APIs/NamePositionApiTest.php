<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\NamePosition;

class NamePositionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_name_position()
    {
        $namePosition = factory(NamePosition::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/name_positions', $namePosition
        );

        $this->assertApiResponse($namePosition);
    }

    /**
     * @test
     */
    public function test_read_name_position()
    {
        $namePosition = factory(NamePosition::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/name_positions/'.$namePosition->id
        );

        $this->assertApiResponse($namePosition->toArray());
    }

    /**
     * @test
     */
    public function test_update_name_position()
    {
        $namePosition = factory(NamePosition::class)->create();
        $editedNamePosition = factory(NamePosition::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/name_positions/'.$namePosition->id,
            $editedNamePosition
        );

        $this->assertApiResponse($editedNamePosition);
    }

    /**
     * @test
     */
    public function test_delete_name_position()
    {
        $namePosition = factory(NamePosition::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/name_positions/'.$namePosition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/name_positions/'.$namePosition->id
        );

        $this->response->assertStatus(404);
    }
}
