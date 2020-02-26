<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Banner extends Model
{
    /** @var string Tabela referente a model */
    protected $table = 'banners';

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function find($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            return Banner::all();
        }

        if ($options && empty($campos)) {
            $banner = Banner::where($options)->get();
        }

        if ($campos && empty($options)) {
            $banner = Banner::all($campos);
        }

        if (count($banner) == 0) {
            return false;
        }

        return $banner;
    }

    public function findFirst($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            $banner = Banner::get()->first();
        }

        if ($options && empty($campos)) {
            $banner = Banner::where($options)->get()->first();
        }

        if ($campos && empty($options)) {
            $banner = Banner::get($campos)->first();
        }

        return $banner;
    }
}
