<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function nices()
    {
        return $this->hasMany('App\Models\Nice');
    }


    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }
    

    public function isLike($postId)
    {
      return $this->likes()->where('shop_id',$postId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($postId)
    {
      if($this->isLike($postId)){
        //もし既に「いいね」していたら何もしない
      } else {
        $this->likes()->attach($postId);
      }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($postId)
    {
      if($this->isLike($postId)){
        //もし既に「いいね」していたら消す
        $this->likes()->detach($postId);
      } else {
      }
    }

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
}
