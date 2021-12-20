<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function hasRole($roles){
        foreach($roles as $role)
        {
            if($this->roles->contains('name', $role))
            {
                return true;
            }
        }
        return false;
    }

    public function attachRoles(int $roleId)
    {
        return $this->roles()->attach($roleId);
    }

    public function detachRoles()
    {
        return $this->roles()->detach();
    }

    public function syncRoles($role)
    {
        return $this->roles()->sync($role);
    }

    public function getRolesID($roles) //return 1 array cac roles
    {
        $getRoles = [];
        foreach($roles as $role)
        {
            $getRoles[] = $role;
        }
        return $getRoles;
    }

    public function saveUser(Request $data)
    {
        $user = $this->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if(empty($data['roles']))
        {
            $roles = [
                'client' => '4'
            ];
        }
        else
        {
            $roles = $this->getRolesID($data['roles']);
        }

        $user->roles()->attach($roles);

        return $user;
    }


    public function search(array $data)
    {
        $userName = array_key_exists('key', $data) ? $data['key'] : null;
        $role_id = array_key_exists('filter_role', $data) ? $data['filter_role'] : null;

        return $this
                    ->WhereHasRoles($role_id)
                    ->SearchUserName($userName)
                    ->latest('id')
                    ->paginate(array_key_exists('number', $data) ? $data['number'] : 3);
    }

    public function scopeSearchUserName($query, $userName)
    {
        return $query->where('name', 'like', '%' . $userName . '%');
    }

    public function scopeWhereHasRoles($query, $role_id)
    {
        return $role_id ? $query->WhereHas('roles', function (Builder $query) use ($role_id) {
            $query->where('roles.id', $role_id);
        })
        : null;
    }
}
