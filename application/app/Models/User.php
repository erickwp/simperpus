<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var int $length
     * @var int $start
     * @var string $sort
     * @var string $search
     *
     * @return array
     */
    public function getUser(int $length, int $start, string $sort, string $search): array
    {
        $result = DB::table(DB::raw('users u'))
            ->select(DB::raw('
                u.email,
                u.is_active,
                u.created_at,
                r.name as role,
                ui.name,
                ui.address,
                ui.phone
            '))
            ->leftJoin(DB::raw('roles r'), 'r.id', '=', 'u.role_id')
            ->leftJoin(DB::raw('user_informations ui'), 'ui.user_id', '=', 'u.id');

        if(!empty($search)){
            $result = $result->where(function($where) use($search){
                $where->where(DB::raw('u.email'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('r.name'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('ui.name'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('ui.address'), 'like', '%'.$search.'%')
                ->orWhere(DB::raw('ui.phone'), 'like', '%'.$search.'%');
            });
        }

        $result = $result->whereNull('u.deleted_at');

        return [
            'data' => $result->offset($start)->limit($length)->orderBy('u.id', $sort)->get(),
            'total' => $result->count('u.id')
        ];
    }
}
