<?php namespace Tests\Repositories;

use App\Models\Sektor;
use App\Repositories\SektorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SektorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SektorRepository
     */
    protected $sektorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sektorRepo = \App::make(SektorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sektor()
    {
        $sektor = factory(Sektor::class)->make()->toArray();

        $createdSektor = $this->sektorRepo->create($sektor);

        $createdSektor = $createdSektor->toArray();
        $this->assertArrayHasKey('id', $createdSektor);
        $this->assertNotNull($createdSektor['id'], 'Created Sektor must have id specified');
        $this->assertNotNull(Sektor::find($createdSektor['id']), 'Sektor with given id must be in DB');
        $this->assertModelData($sektor, $createdSektor);
    }

    /**
     * @test read
     */
    public function test_read_sektor()
    {
        $sektor = factory(Sektor::class)->create();

        $dbSektor = $this->sektorRepo->find($sektor->id);

        $dbSektor = $dbSektor->toArray();
        $this->assertModelData($sektor->toArray(), $dbSektor);
    }

    /**
     * @test update
     */
    public function test_update_sektor()
    {
        $sektor = factory(Sektor::class)->create();
        $fakeSektor = factory(Sektor::class)->make()->toArray();

        $updatedSektor = $this->sektorRepo->update($fakeSektor, $sektor->id);

        $this->assertModelData($fakeSektor, $updatedSektor->toArray());
        $dbSektor = $this->sektorRepo->find($sektor->id);
        $this->assertModelData($fakeSektor, $dbSektor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sektor()
    {
        $sektor = factory(Sektor::class)->create();

        $resp = $this->sektorRepo->delete($sektor->id);

        $this->assertTrue($resp);
        $this->assertNull(Sektor::find($sektor->id), 'Sektor should not exist in DB');
    }
}
