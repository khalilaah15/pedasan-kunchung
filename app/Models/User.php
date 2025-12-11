<?php
// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'nama', 'nama_toko', 'email', 'password', 'role', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Pastikan method ini ada dan benar
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isSeller()
    {
        return $this->role === 'seller';
    }

    // Accessor untuk badge status
    public function getStatusBadgeAttribute()
    {
        return $this->status === 'active' 
            ? '<span class="badge bg-success">Active</span>' 
            : '<span class="badge bg-danger">Inactive</span>';
    }
}