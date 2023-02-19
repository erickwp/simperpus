<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bookshelfs_id',
        'code',
        'name',
        'author',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var int $length
     * @var int $start
     * @var string $sort
     * @var string $search
     *
     * @return array
     */
    public function getBook(int $length, int $start, string $sort, string $search): array
    {
        $result = DB::table(DB::raw('books b'))
            ->select(DB::raw('
                b.id,
                b.code,
                b.name,
                b.is_active,
                b.created_at,
                bs.name as bookshelfs
            '))
            ->leftJoin(DB::raw('bookshelfs bs'), 'bs.id', '=', 'b.bookshelfs_id');

        if(!empty($search)){
            $result = $result->where(function($where) use($search){
                $where->where(DB::raw('b.code'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('b.name'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('bs.name'), 'like', '%'.$search.'%');
            });
        }

        $result = $result->whereNull('b.deleted_at');

        return [
            'data' => $result->offset($start)->limit($length)->orderBy('b.id', $sort)->get(),
            'total' => $result->count('b.id')
        ];
    }
}
