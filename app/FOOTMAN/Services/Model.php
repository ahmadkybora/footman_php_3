<?php

namespace App\FOOTMAN\Services;

abstract class Model
{
    /**
     * در متدهای ابسترکت باید بدنه آنها داخل کلاس های فرزند اعمال شود
     * متد زیر نام جدول را میگیرد
     */
    abstract public static function tableName(): array;
    abstract public function attributes(): array;

    /**
     * اماده سازی برای کوئری زدن
     */
    public static function prepare($sql)
    {
        return App::$app->db->pdo->prepare($sql);
    }

    public static function query($sql)
    {
        return App::$app->db->pdo->query($sql);
    }

    /**
     * متد ذخیره کردن برای داده های هر مدل میباشد به نوی یک دیتا رپر است
     */
    public function save()
    {
        // Session::add("admin", "admin");
        // Session::add("username", "username");
        /**
         * بوسیله متد تیبل نیم اسم جدول را گرفته و همچنین بوسیله متد 
         * attributes
         * فیلدهای مورد نظر کلاس را گرفته 
         * و آنها را بایند میکنیم
         */
        /**
         * فراخوانی جدول
         */
        $tableName = $this->tableName()["table_name"];
        /**
         * فراخوانی فیلدها
         */
        $attributes = $this->attributes();
        // dd(array_keys($attributes));
        // foreach($attributes as $key => $val){
        //     dd(array_values($attributes));
        // }
        /**
         * متد 
         * array map
         * یک آرایه را میگیرد در پارامتر دوم و در پارامتر اول یک کال بک فانکشن
         * وجود دارد که ارایه های پارامتر اول به آن ارسال میشود
         */
        // function params ($attr)
        // {
        //     dd($attr);
        // }
        // $params = array_map(fn ($attr) => ":$attr", $attributes);
        // dd($params);
        /**
         * کوئری زدن
         */
        // dd(array_keys($attributes));
        // $sql = "INSERT INTO $tableName (" . implode(",",  array_keys($attributes)) . ") VALUES (
        //     " . implode(",", array_values($attributes)) . "
        // );";
//         $sql = "INSERT INTO $tableName (" . implode(",",  array_keys($attributes)) . ") VALUES (" . ":" . implode(",:",  array_keys($attributes)) . ")";
// dd($sql);
//         dd(implode(",:",  array_keys($attributes)));
//         foreach($attributes as $key => $val) {
//             dd($key);
//             $b = [];
//             // $b[] = ":" . $attribute;
//         }
//         // dd($b);
//         dd(array_values($attributes));

        // $b = implode(":",  array_values($attributes));
        // dd($b);
        // foreach($attributes as $key => $val) {
        //     $data [$key] = $val;
        //     // echo($key . " : " . $val . "<br/>");
        // }
        //         $data = [
        //     'username' => 'kybora',
        //     'first_name' => 'ahmad',
        //     'last_name' => 'montazeri',
        // ];
        // json($data);
        // die();
        // die();
        // $data = [
        //     'username' => 'kybora',
        //     'first_name' => 'ahmad',
        //     'last_name' => 'montazeri',
        // ];

        // $params = array_map(fn ($attr) => ":$attr", $attributes);

        // foreach($attributes as $key => $val) {
        //     $a = [];
        //     $a[] = ":" . array_values($attributes);
        //     // dd($attributes);
        //     // array_values($attributes);
        // }
        // dd($a);
        // $params = array_map("params", $attributes);
        //$sql = "INSERT INTO $tableName (" . implode(",",  array_keys($attributes)) . ") VALUES (:username, :first_name, :last_name)";
         /**
         * در قطعه کد زیر بوسیله نام جدول و تابع آماده سازی که در بالاس
         * داده ها گرفته شده و در دیتابیس ذخیره شده است
         */
        $sql = "INSERT INTO $tableName (" . implode(",",  array_keys($attributes)) . ") VALUES (" . ":" . implode(",:",  array_keys($attributes)) . ")";
        foreach($attributes as $key => $val) {
            $data [$key] = $val;
        }
        $this->prepare($sql)->execute($data);
        /**
         * 
         */
        // foreach($attributes as $attr) {
        //     dd($attributes);
        //     $statement->execute([
        //         ':username' => $attr
        //     ]);
        // }
        // foreach($attributes as $attribute) {
        //     $statement->bindValue(":$attribute", $this->{$attribute});
        // }

        // $this->prepare($sql);

        // $data = [
        //     'username' => 'kybora',
        //     'first_name' => 'ahmad',
        //     'last_name' => 'montazeri',
        // ];

        // $sql = "INSERT INTO $tableName (" . implode(",",  array_keys($attributes)) . ") VALUES (:username, :first_name, :last_name)";
        // $statement = $this->prepare($sql);
        // foreach ($attributes as $attribute)
        //     $statement->bindValue(":$attribute", $this->{$attribute});

        // $statement->execute($data);

        // $sql = "INSERT INTO $tableName (" . implode(",",  array_keys($attributes)) . ") VALUES (:kybora, :ahmad, :montazeri)";
        // $statement = $this->prepare($sql);
        // $datas = [
        //     'username' => array_values($attributes[0]),
        //     'first_name' => array_values($attributes[1]),
        //     'last_name' => array_values($attributes[2]),
        // ];
        // $statement->execute($datas);
        // dd($sql);
        // dd($sql);
        /**
         * آماده سازی کوئری
         */
        // $statement = $this->prepare($sql);
        // $statement = $this->query($sql);
        // dd($statement);
        /**
         * بایند کردن داده ها
         */
        // dd($statement);
        // foreach ($attributes as $attribute)
        //     $statement->bindValue(":$attribute", $this->{$attribute});

        /**
         * در نهایت تایید آنها و ذخیره در دیتابیس
         */
        // $statement->execute();
        // dd($statement);
        // return true;
    }

    /**
     * این متد برای دسترسی به ای دی است
     * بوسیله اراسل ای دی 
     */
    public static function findById($id)
    {
        $tableName = static::tableName()["table_name"];
        $sql = "SELECT * FROM $tableName WHERE id=:id";
        $statement = static::prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    /**
     * این متد برای دسترسی به ای دی است
     * بوسیله اراسل ای دی 
     */
    public static function findByUsername($username)
    {
        $tableName = static::tableName()["table_name"];
        $sql = "SELECT * FROM $tableName WHERE id=:id";
        $statement = static::prepare($sql);
        $statement->execute(['username' => $username]);
        return $statement->fetch();
    }

    /**
     * این متد برای دسترسی به ای دی است
     * بوسیله اراسل ای دی 
     */
    public static function findOrFail($id)
    {
        $tableName = static::tableName()["table_name"];
        $sql = "SELECT * FROM $tableName WHERE id=:id";
        $statement = static::prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetch();
    }

    /**
     * این متد بر اساس ای دی مقدار را پیدا کرده و از دیتابیس حذف میکند
     */
    public static function delete($id)
    {
        $tableName = static::tableName()["table_name"];
        $sql = "DELETE from $tableName WHERE id=:id";
        $statement = static::prepare($sql);
        $statement->execute(['id' => $id]);
    }

    public function update($id)
    {
        $tableName = $this->tableName()["table_name"];
        $attributes = $this->attributes();
        dd($attributes);
        foreach($attributes as $key => $val) {
            $data [] = "," . $key . "=:" . $val; 
        }
        dd($data);
        $sql = "UPDATE $tableName SET " . implode(",",  array_keys($attributes)) . " WHERE id=:id";
    }

    /**
     * این متد همه داده های
     * موجود در جدول را واکشی میکند
     */
    public static function all()
    {
        $tableName = static::tableName()["table_name"];
        $sql = "SELECT * FROM $tableName";
        $statement = static::query($sql);
        return $statement->fetchAll();
    } 
    
    /**
     * این متد کلید و مقدار میگیرد و در
     * دیتابیس مورد نظر ذخیره میکند
     */
    public static function create(array $data)
    {
        $tableName = static::tableName()["table_name"];
        $sql = "INSERT INTO $tableName (" . implode(",", array_keys($data)) .") VALUES (" . ":" . implode(",:", array_keys($data)) . ")";
        foreach($data as $key => $val) {
            $params [$key] = $val;
        }
        static::prepare($sql)->execute($params);
        return new self;
    }

    public static function where($column, $operator, $data)
    {
        $tableName = static::tableName()["table_name"];
        $sql = "SELECT * FROM $tableName WHERE $column $operator $data";
        // dd($sql);
        static::query($sql);
        // return new self;
    }

    public function whereNot()
    {
    }

    public function whereIn()
    {
    }
    /**
     * در اصل یک رابطه را بر میگرداند بوسیله ارسال اسم
     * جدول مورد نظر
     */
    public static function with($relationship)
    {
        $tableName = static::tableName()["table_name"];
        $foriegn_key = static::tableName()["foriegn_key"];
        $sql = "SELECT * FROM $tableName INNER JOIN $relationship ON $foriegn_key=$relationship.id";
        $statement = static::query($sql);
        return $statement->fetchAll();
    }

    public static function lastInsertId()
    {
        // return static::query($this->lastInsertId());
    }
} 