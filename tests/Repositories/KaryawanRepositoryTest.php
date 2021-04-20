<?php namespace Tests\Repositories;

use App\Models\Karyawan;
use App\Repositories\KaryawanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KaryawanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KaryawanRepository
     */
    protected $karyawanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->karyawanRepo = \App::make(KaryawanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_karyawan()
    {
        $karyawan = factory(Karyawan::class)->make()->toArray();

        $createdKaryawan = $this->karyawanRepo->create($karyawan);

        $createdKaryawan = $createdKaryawan->toArray();
        $this->assertArrayHasKey('id', $createdKaryawan);
        $this->assertNotNull($createdKaryawan['id'], 'Created Karyawan must have id specified');
        $this->assertNotNull(Karyawan::find($createdKaryawan['id']), 'Karyawan with given id must be in DB');
        $this->assertModelData($karyawan, $createdKaryawan);
    }

    /**
     * @test read
     */
    public function test_read_karyawan()
    {
        $karyawan = factory(Karyawan::class)->create();

        $dbKaryawan = $this->karyawanRepo->find($karyawan->id);

        $dbKaryawan = $dbKaryawan->toArray();
        $this->assertModelData($karyawan->toArray(), $dbKaryawan);
    }

    /**
     * @test update
     */
    public function test_update_karyawan()
    {
        $karyawan = factory(Karyawan::class)->create();
        $fakeKaryawan = factory(Karyawan::class)->make()->toArray();

        $updatedKaryawan = $this->karyawanRepo->update($fakeKaryawan, $karyawan->id);

        $this->assertModelData($fakeKaryawan, $updatedKaryawan->toArray());
        $dbKaryawan = $this->karyawanRepo->find($karyawan->id);
        $this->assertModelData($fakeKaryawan, $dbKaryawan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_karyawan()
    {
        $karyawan = factory(Karyawan::class)->create();

        $resp = $this->karyawanRepo->delete($karyawan->id);

        $this->assertTrue($resp);
        $this->assertNull(Karyawan::find($karyawan->id), 'Karyawan should not exist in DB');
    }
}
