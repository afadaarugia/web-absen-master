<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Karyawan;

class KaryawanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_karyawan()
    {
        $karyawan = factory(Karyawan::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/karyawans', $karyawan
        );

        $this->assertApiResponse($karyawan);
    }

    /**
     * @test
     */
    public function test_read_karyawan()
    {
        $karyawan = factory(Karyawan::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/karyawans/'.$karyawan->id
        );

        $this->assertApiResponse($karyawan->toArray());
    }

    /**
     * @test
     */
    public function test_update_karyawan()
    {
        $karyawan = factory(Karyawan::class)->create();
        $editedKaryawan = factory(Karyawan::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/karyawans/'.$karyawan->id,
            $editedKaryawan
        );

        $this->assertApiResponse($editedKaryawan);
    }

    /**
     * @test
     */
    public function test_delete_karyawan()
    {
        $karyawan = factory(Karyawan::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/karyawans/'.$karyawan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/karyawans/'.$karyawan->id
        );

        $this->response->assertStatus(404);
    }
}
