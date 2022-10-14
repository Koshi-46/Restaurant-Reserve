<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Shop extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->BelongsTo(Area::class);
    }
    public function genre()
    {
        return $this->BelongsTo(Genre::class);
    }

    public function nices()
    {
        return $this->hasMany('App\Models\Nice');
    }

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public static function doSearch($keyword, $area_id, $genre_id)
    {
        // $user_id = Auth::id();
        $query = self::query();
        if (!empty($keyword)) {
            $query->where('name', 'like binary', "%{$keyword}%");
        }
        if (!empty($area_id)) {
            $query->where('area_id', 'like binary', "%{$area_id}%");
        }
        if (!empty($genre_id)) {
            $query->where('genre_id', 'like binary', "%{$genre_id}%");
        }
        // $query->where('user_id', '=', $user_id);
        $results = $query->get();
        return $results;
    }

    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $nices = array();
        foreach ($this->nices as $nice) {
            array_push($nices, $nice->user_id);
        }

        if (in_array($id, $nices)) {
            return true;
        } else {
            return false;
        }
    }
}
