<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskHttpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {
        $data = [
            'id_user' => 2,
            'id_kategori' => 2,
            'judul_tugas' => 'testing',
            'pemberi_tugas' => 'test',
            'deskripsi' => 'testing test',
            'id_todo' => 1,
            'status' => 'not started',
            'progress' => 0,
            'date' => date('Y-m-d')
        ];
        $response = $this->post('/task-create', $data);

        $response->assertSeeText('data berhasil ditambahkan');
    }

    public function test_read(): void
    {
        $response = $this->get('/task/1');
        $response->assertStatus(200);
    }

    public function test_edit(): void
    {
        $data = [
            'id_kategori' => 2,
            'judul_tugas' => 'testing',
            'pemberi_tugas' => 'test test',
            'deskripsi' => 'testing',
            'id_todo' => 1,
            'status' => 'progress',
            'progress' => 20,
        ];

        $response = $this->patch('/task-edit/2', $data);
        $response->assertSeeText('edit task berhasil di update berdasrkan id_user: 1');
    }

    public function test_hapus(): void
    {
        $response = $this->delete('/task-delete/3');

        $response->assertSeeText('data task berhasil di hapus');
    }
}
