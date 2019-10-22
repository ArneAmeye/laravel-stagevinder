<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Company extends User implements Authenticatable, Searchable
{
    use Notifiable;

    protected $guard = 'companies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_picture', 'background_picture',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('companies.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
