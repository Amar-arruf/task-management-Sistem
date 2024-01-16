<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoHttpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {
        $data = [
            'deskripsi' => "Testing TodoList"
        ];

        $response = $this->post('/todos', $data);

        $response->assertSeeText('data berhasil di tambahkan');
    }

    public function test_read(): void
    {
        $response  = $this->get('/todos');

        $response->assertStatus(200);
    }

    // public function test_edit(): void
    // {
    //     $data = [
    //         'deskripsi' => "Testing Todo"
    //     ];
    //     $response = $this->patch('/todos/1');
    //     $response->assertSeeText('data berhasil di update dengan id 1');
    // }

    // public function test_hapus(): void
    // {
    //     $response = $this->delete('/todos/1');

    //     $response->assertSeeText('data berhasil dihapus dengan ID: 1');
    // }
}
