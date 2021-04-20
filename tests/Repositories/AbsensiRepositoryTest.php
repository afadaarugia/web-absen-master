<?php namespace Tests\Repositories;

use App\Models\Absensi;
use App\Repositories\AbsensiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AbsensiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AbsensiRepository
     */
    protected $absensiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->absensiRepo = \App::make(AbsensiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_absensi()
    {
        $absensi = factory(Absensi::class)->make()->toArray();

        $createdAbsensi = $this->absensiRepo->create($absensi);

        $createdAbsensi = $createdAbsensi->toArray();
        $this->assertArrayHasKey('id', $createdAbsensi);
        $this->assertNotNull($createdAbsensi['id'], 'Created Absensi must have id specified');
        $this->assertNotNull(Absensi::find($createdAbsensi['id']), 'Absensi with given id must be in DB');
        $this->assertModelData($absensi, $createdAbsensi);
    }

    /**
     * @test read
     */
    public function test_read_absensi()
    {
        $absensi = factory(Absensi::class)->create();

        $dbAbsensi = $this->absensiRepo->find($absensi->id);

        $dbAbsensi = $dbAbsensi->toArray();
        $this->assertModelData($absensi->toArray(), $dbAbsensi);
    }

    /**
     * @test update
     */
    public function test_update_absensi()
    {
        $absensi = factory(Absensi::class)->create();
        $fakeAbsensi = factory(Absensi::class)->make()->toArray();

        $updatedAbsensi = $this->absensiRepo->update($fakeAbsensi, $absensi->id);

        $this->assertModelData($fakeAbsensi, $updatedAbsensi->toArray());
        $dbAbsensi = $this->absensiRepo->find($absensi->id);
        $this->assertModelData($fakeAbsensi, $dbAbsensi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_absensi()
    {
        $absensi = factory(Absensi::class)->create();

        $resp = $this->absensiRepo->delete($absensi->id);

        $this->assertTrue($resp);
        $this->assertNull(Absensi::find($absensi->id), 'Absensi should not exist in DB');
    }
}
