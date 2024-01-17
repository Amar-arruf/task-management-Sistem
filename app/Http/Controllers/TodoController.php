<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Tests\Feature\TodoHttpTest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Todo::all();
        $res = [];
        foreach ($data as $key => $value) {
            array_push($res, $value);
        }

        return $res;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo 'form create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Todo::create([
            'deskripsi' => $request->post('deskripsi')
        ]);
        return redirect('/task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Todo::where('id_todo', intval($id))->get();
        $res = [];
        foreach ($data as $key => $value) {
            array_push($res, $value);
        }

        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Todo::find($id);

        return view('form_edit_todo', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Todo::where('id_todo', intval($id))
            ->update([
                'deskripsi' => $request->input('deskripsi')
            ]);
        return redirect('/task');
    }

    public function update_completed(Request $request,string $id)
    {   
        $data = $request->json()->all();
        $todo = Todo::findOrFail($id);

        $todo->update($data);
        return "status berhasil di update dengan ID" . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Todo::find($id);

        $res = $data->delete();
        return 'data berhasil dihapus dengan ID: ' . $id;
    }
}
