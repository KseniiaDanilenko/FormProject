<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'description',
    ];

    public static function userExists(array $data): bool
    {
        return self::where('firstname', $data['firstname'])
            ->where('lastname', $data['lastname'])
            ->exists();
    }

    public static function createUser(array $data): User
    {
        return self::create($data);
    }
}
