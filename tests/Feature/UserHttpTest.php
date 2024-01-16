<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserHttpTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_create(): void
    {
        $data = [
            'nama' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'imageurl' => 'https://url.image.com'
        ];

        $response = $this->post('/user-create', $data);

        $response->assertSeeText('user berhasil ditambahkan ke database');
    }

    public function test_user_retrieve(): void
    {
        $response = $this->get('/user-getuser/1');

        $response->assertStatus(200);
    }

    // public function test_edit_user(): void
    // {
    //     $data = [
    //         'nama' => 'admin',
    //         'email' => 'admin@contoh.com',
    //         'password' => 'admin',
    //         'imageurl' => 'https://url.image123.com'
    //     ];
    //     $response = $this->patch('/user-edit/1', $data);

    //     $response->assertSeeText('user berhasil di edit dengan ID: 1');
    // }

    // public function test_delete_user()
    // {
    //     $response = $this->delete('/user-delete/1');
    //     $response->assertSeeText('data berhasil di hapus dengan ID: 1');
    // }
}
