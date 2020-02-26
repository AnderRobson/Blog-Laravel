<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Publication extends Model
{
    /** @var string Tabela referente a model */
    protected $table = 'publications';

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function find($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            return Publication::all();
        }

        if ($options && empty($campos)) {
            $publication = Publication::where($options)->get();
        }

        if ($campos && empty($options)) {
            $publication = Publication::all($campos);
        }

        if (count($publication) == 0) {
            return false;
        }

        return $publication;
    }

    public function findFirst($campos = [] , $options = [])
    {
        if (empty($campos) && empty($options)) {
            $publication = Publication::get()->first();
        }

        if ($options && empty($campos)) {
            $publication = Publication::where($options)->get()->first();
        }

        if ($campos && empty($options)) {
            $publication = Publication::get($campos)->first();
        }

        return $publication;
    }
}
