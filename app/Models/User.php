<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role_id',
        'alamat_ktp',
        'alamat',
        'kecamatan',
        'kabupaten_id',
        'provinsi_id',
        'nomor_telepon_rumah',
        'nomor_telepon_hp',
        'kewarganegaraan',
        'kewarganegaraan_country',
        'tanggal_lahir',
        'tempat_lahir_ijasah',
        'kabupaten_lahir',
        'provinsi_lahir',
        'tempat_lahir_luar_negeri',
        'jenis_kelamin',
        'status_menikah',
        'agama_id',
        'profile_picture',
        'video_perkenalan',
        'status_pendaftaran',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    /**
     * Get the provinsi associated with the user.
     */
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    /**
     * Get the agama associated with the user.
     */
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    /**
     * Get the kabupaten_lahir associated with the user.
     */
    public function kabupatenLahir()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_lahir');
    }

    /**
     * Get the provinsi_lahir associated with the user.
     */
    public function provinsiLahir()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_lahir');
    }

}
