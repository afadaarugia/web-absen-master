<?php namespace Tests\Repositories;

use App\Models\NamePosition;
use App\Repositories\NamePositionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NamePositionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NamePositionRepository
     */
    protected $namePositionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->namePositionRepo = \App::make(NamePositionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_name_position()
    {
        $namePosition = factory(NamePosition::class)->make()->toArray();

        $createdNamePosition = $this->namePositionRepo->create($namePosition);

        $createdNamePosition = $createdNamePosition->toArray();
        $this->assertArrayHasKey('id', $createdNamePosition);
        $this->assertNotNull($createdNamePosition['id'], 'Created NamePosition must have id specified');
        $this->assertNotNull(NamePosition::find($createdNamePosition['id']), 'NamePosition with given id must be in DB');
        $this->assertModelData($namePosition, $createdNamePosition);
    }

    /**
     * @test read
     */
    public function test_read_name_position()
    {
        $namePosition = factory(NamePosition::class)->create();

        $dbNamePosition = $this->namePositionRepo->find($namePosition->id);

        $dbNamePosition = $dbNamePosition->toArray();
        $this->assertModelData($namePosition->toArray(), $dbNamePosition);
    }

    /**
     * @test update
     */
    public function test_update_name_position()
    {
        $namePosition = factory(NamePosition::class)->create();
        $fakeNamePosition = factory(NamePosition::class)->make()->toArray();

        $updatedNamePosition = $this->namePositionRepo->update($fakeNamePosition, $namePosition->id);

        $this->assertModelData($fakeNamePosition, $updatedNamePosition->toArray());
        $dbNamePosition = $this->namePositionRepo->find($namePosition->id);
        $this->assertModelData($fakeNamePosition, $dbNamePosition->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_name_position()
    {
        $namePosition = factory(NamePosition::class)->create();

        $resp = $this->namePositionRepo->delete($namePosition->id);

        $this->assertTrue($resp);
        $this->assertNull(NamePosition::find($namePosition->id), 'NamePosition should not exist in DB');
    }
}
