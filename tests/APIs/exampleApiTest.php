<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\example;

class exampleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_example()
    {
        $example = factory(example::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/examples', $example
        );

        $this->assertApiResponse($example);
    }

    /**
     * @test
     */
    public function test_read_example()
    {
        $example = factory(example::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/examples/'.$example->id
        );

        $this->assertApiResponse($example->toArray());
    }

    /**
     * @test
     */
    public function test_update_example()
    {
        $example = factory(example::class)->create();
        $editedexample = factory(example::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/examples/'.$example->id,
            $editedexample
        );

        $this->assertApiResponse($editedexample);
    }

    /**
     * @test
     */
    public function test_delete_example()
    {
        $example = factory(example::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/examples/'.$example->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/examples/'.$example->id
        );

        $this->response->assertStatus(404);
    }
}
