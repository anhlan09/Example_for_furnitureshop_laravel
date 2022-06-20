<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ClassRepos
{
    public static function getAllClass()
    {
        $sql = 'select c.* ';
        $sql .= 'from classes as c ';
        $sql .= 'order by c.name';

        return DB::select($sql);
    }


    public static function getClassById($id)
    {
        $sql = 'select c.* ';
        $sql .= 'from classes as c ';
        $sql .= 'where c.id = ? ';

        return DB::select($sql, [$id]);
    }

    public static function insert($class)
    {
        $sql = 'insert into classes ';
        $sql .= '(name, StartDate, Size) ';
        $sql .= 'values (?, ?, ?) ';

        $result = DB::insert($sql, [$class->name, $class->StartDate, $class->Size]);
        if ($result){
            return DB::getPdo()->lastInsertID();
        }else{
            return -1;
        }
    }

    public static function update($class){
        $sql = 'update classes ';
        $sql .= 'set name = ?, StartDate = ?, Size = ? ';
        $sql .= 'where id = ? ';

        DB::update($sql, [$class->name, $class->StartDate, $class->Size, $class->id]);

    }
    public static function getClassByStudentId($studentid){
        $sql = 'select c.* ';
        $sql .= 'from classes as c ';
        $sql .= 'join students as s on c.id = s.classid ';
        $sql .= 'where s.id = ?';

        return DB::select($sql, [$studentid]);
    }

    public static function delete($id){
        $sql = 'delete from classes ';
        $sql .= 'where id = ? ';

        DB::delete($sql, [$id]);
    }
}
