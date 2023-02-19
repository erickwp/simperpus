<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Bookshelfs extends Model
{
    use HasFactory;

    protected $table = 'bookshelfs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
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
    public function getBookshelfs(int $length, int $start, string $sort, string $search): array
    {
        $result = DB::table(DB::raw('bookshelfs'))
            ->select(DB::raw('
                id,
                code,
                name,
                description,
                is_active,
                created_at
            '));

        if(!empty($search)){
            $result = $result->where(function($where) use($search){
                $where->where(DB::raw('code'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('name'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('description'), 'like', '%'.$search.'%');
            });
        }

        $result = $result->whereNull('deleted_at');

        return [
            'data' => $result->offset($start)->limit($length)->orderBy('id', $sort)->get(),
            'total' => $result->count('id')
        ];
    }
}
