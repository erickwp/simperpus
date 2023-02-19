<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelfs;
use Illuminate\Http\Request;

class BookController extends Controller
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

        return view('books.list', [
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

        $bookModel = new Book();
        $data = $bookModel->getBook($length, $start, $sort, $search);

        return $data;
    }

    /**
     * @return view
     */
    public function get($id = null)
    {
        $data = Book::findOrFail($id);
        $bookshelfs = Bookshelfs::findOrFail($data->bookshelfs_id);

        return view('books.detail', [
            'data' => $data,
            'bookshelfs' => $bookshelfs
        ]);
    }

    /**
     * @return view
     */
    public function add()
    {
        $bookshelfs = Bookshelfs::whereNull('deleted_at')->get();

        return view('books.add', [
            'bookshelfs' => $bookshelfs
        ]);
    }

    /**
     * @return void
     */
    public function insert(Request $request)
    {
        $this->validate($request, [
            'bookshelfs' => 'required',
            'code' => 'required|unique:books',
            'name' => 'required',
        ]);

        $bookshelfsId = $request->get('bookshelfs');
        $code = $request->get('code');
        $name = $request->get('name');
        $author = $request->get('author');
        $description = $request->get('description');

        Book::create([
            'bookshelfs_id' => $bookshelfsId,
            'code' => $code,
            'name' => $name,
            'author' => $author,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/books');
    }

    /**
     * @return view
     */
    public function edit($id = null)
    {
        $data = Book::findOrFail($id);

        $bookshelfs = Bookshelfs::whereNull('deleted_at')->get();

        return view('books.edit', [
            'data' => $data,
            'bookshelfs' => $bookshelfs
        ]);
    }

    /**
     * @return void
     */
    public function update(Request $request, $id = null)
    {
        $this->validate($request, [
            'bookshelfs' => 'required',
            'code' => 'required',
            'name' => 'required',
        ]);

        $book = Book::findOrFail($id);

        $bookshelfsId = $request->get('bookshelfs');
        $code = $request->get('code');
        $name = $request->get('name');
        $author = $request->get('author');
        $description = $request->get('description');

        $book->update([
            'bookshelfs_id' => $bookshelfsId,
            'code' => $code,
            'name' => $name,
            'author' => $author,
            'description' => $description,
        ]);

        return redirect('/books');
    }
}
