<?php

namespace App\Models;

use App\FOOTMAN\Services\Model;

class Post extends Model
{
    public string $user_id = '';
    public string $title = '';
    public string $description = '';

    public static function tableName(): array
    {
        return [
            "table_name" => "posts", 
            "foriegn_key" => "user_id"
        ];
    }

    public function attributes(): array
    {
        // dd($this);
        // $att = [
        //     'id' => $this->id,
        //     'first_name' => $this->first_name,
        // ];
        
        // $attributes = [];

        /**
         * متد زیر اشاره گر به کلاس را گرفته و پراپرتی های 
         * کلاس را استخراج میکند
         */
        return get_object_vars($this);
        // dd($att);
        // dd($attributes);
        // dd($properties);
        // foreach ($properties as $attr => $property)
        //     $attributes[] = $property;
        // dd($properties[$attr]);
            // if (strpos($attr, 'field_') === 0)
            //     $attributes[] = substr($attr, strlen('field_'));

        // dd($attributes);
        // return $attributes;
    } 
    
}