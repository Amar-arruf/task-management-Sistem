<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class taskKategoryHttpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_task_category(): void
    {
        $data = [
            'nama_kategori' => 'testing'
        ];
        $response = $this->post('/task-kategori-create', $data);

        $response->assertSeeText('data berhasil ditambahkan');
    }

    public function test_mengambil_data(): void
    {
        $response = $this->get('/task-kategoris');

        $response->assertStatus(200);
    }

    // public function test_edit_data(): void
    // {
    // $data = [
    //     'nama_kategori' => 'testing'
    // ];
    //     $response = $this->patch('/task-kategori-edit/1',$data);
    //     $response->assertSeeText('data berhasil di ubah dengan id: 1');
    // }

    // public function test_hapus_data(): void
    // {
    //     $response = $this->delete('/task-kategori-delete/1');
    //     $response->assertSeeText('data berhasil dihapus dengan id: 1');
    // }
}
