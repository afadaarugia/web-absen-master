<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Absensi;

class AbsensiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_absensi()
    {
        $absensi = factory(Absensi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/absensis', $absensi
        );

        $this->assertApiResponse($absensi);
    }

    /**
     * @test
     */
    public function test_read_absensi()
    {
        $absensi = factory(Absensi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/absensis/'.$absensi->id
        );

        $this->assertApiResponse($absensi->toArray());
    }

    /**
     * @test
     */
    public function test_update_absensi()
    {
        $absensi = factory(Absensi::class)->create();
        $editedAbsensi = factory(Absensi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/absensis/'.$absensi->id,
            $editedAbsensi
        );

        $this->assertApiResponse($editedAbsensi);
    }

    /**
     * @test
     */
    public function test_delete_absensi()
    {
        $absensi = factory(Absensi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/absensis/'.$absensi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/absensis/'.$absensi->id
        );

        $this->response->assertStatus(404);
    }
}
