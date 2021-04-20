<?php namespace Tests\Repositories;

use App\Models\Agama;
use App\Repositories\AgamaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AgamaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AgamaRepository
     */
    protected $agamaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->agamaRepo = \App::make(AgamaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_agama()
    {
        $agama = factory(Agama::class)->make()->toArray();

        $createdAgama = $this->agamaRepo->create($agama);

        $createdAgama = $createdAgama->toArray();
        $this->assertArrayHasKey('id', $createdAgama);
        $this->assertNotNull($createdAgama['id'], 'Created Agama must have id specified');
        $this->assertNotNull(Agama::find($createdAgama['id']), 'Agama with given id must be in DB');
        $this->assertModelData($agama, $createdAgama);
    }

    /**
     * @test read
     */
    public function test_read_agama()
    {
        $agama = factory(Agama::class)->create();

        $dbAgama = $this->agamaRepo->find($agama->id);

        $dbAgama = $dbAgama->toArray();
        $this->assertModelData($agama->toArray(), $dbAgama);
    }

    /**
     * @test update
     */
    public function test_update_agama()
    {
        $agama = factory(Agama::class)->create();
        $fakeAgama = factory(Agama::class)->make()->toArray();

        $updatedAgama = $this->agamaRepo->update($fakeAgama, $agama->id);

        $this->assertModelData($fakeAgama, $updatedAgama->toArray());
        $dbAgama = $this->agamaRepo->find($agama->id);
        $this->assertModelData($fakeAgama, $dbAgama->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_agama()
    {
        $agama = factory(Agama::class)->create();

        $resp = $this->agamaRepo->delete($agama->id);

        $this->assertTrue($resp);
        $this->assertNull(Agama::find($agama->id), 'Agama should not exist in DB');
    }
}
