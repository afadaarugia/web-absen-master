<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sektor;

class SektorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sektor()
    {
        $sektor = factory(Sektor::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sektors', $sektor
        );

        $this->assertApiResponse($sektor);
    }

    /**
     * @test
     */
    public function test_read_sektor()
    {
        $sektor = factory(Sektor::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sektors/'.$sektor->id
        );

        $this->assertApiResponse($sektor->toArray());
    }

    /**
     * @test
     */
    public function test_update_sektor()
    {
        $sektor = factory(Sektor::class)->create();
        $editedSektor = factory(Sektor::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sektors/'.$sektor->id,
            $editedSektor
        );

        $this->assertApiResponse($editedSektor);
    }

    /**
     * @test
     */
    public function test_delete_sektor()
    {
        $sektor = factory(Sektor::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sektors/'.$sektor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sektors/'.$sektor->id
        );

        $this->response->assertStatus(404);
    }
}
