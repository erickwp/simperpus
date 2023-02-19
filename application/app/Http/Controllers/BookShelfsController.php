<?php

namespace App\Http\Controllers;

use App\Models\Bookshelfs;
use Illuminate\Http\Request;

class BookShelfsController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return view
     */
    public function index(Request $request)
    {
        $data = $this->pagination($request);

        return view('bookshelfs.list', [
            'data' => $data
        ]);
    }

    /**
     * @return array
     */
    public function pagination(Request $request)
    {
        $length = 10;
        $start = ($request->get('p')) ? ((($request->get('p') - 1) * $length) + 1) : 0;
        $sort = ($request->get('sort')) ? $request->get('sort') : 'desc';
        $search = ($request->get('q')) ? $request->get('q') : '';

        $bookshelfsModel = new Bookshelfs();
        $data = $bookshelfsModel->getBookshelfs($length, $start, $sort, $search);

        return $data;
    }

    /**
     * @return view
     */
    public function add()
    {
        return view('bookshelfs.add');
    }

    /**
     * @return void
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:bookshelfs',
            'name' => 'required',
        ]);

        $code = $request->get('code');
        $name = $request->get('name');
        $description = $request->get('description');

        Bookshelfs::create([
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/bookshelfs');
    }

    /**
     * @return view
     */
    public function edit($id = null)
    {
        $data = Bookshelfs::findOrFail($id);

        return view('bookshelfs.edit', [
            'data' => $data
        ]);
    }

    /**
     * @return void
     */
    public function update(Request $request, $id = null)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
        ]);

        $bookshelfs = Bookshelfs::findOrFail($id);

        $code = $request->get('code');
        $name = $request->get('name');
        $description = $request->get('description');

        $bookshelfs->update([
            'code' => $code,
            'name' => $name,
            'description' => $description,
        ]);

        return redirect('/bookshelfs');
    }
}
