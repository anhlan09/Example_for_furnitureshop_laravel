<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class StudentRepos
{
    public static function getAllStudent() {
        $sql = 'select s.* ';
        $sql .= 'from students as s ';
        $sql .= 'order by s.name';

        return DB::select ($sql);
    }
    public static function getAllStudentWithClass() {
        $sql = 'select s.*, c.name as studentName ';
        $sql .= 'from students as s ';
        $sql .= 'join classes as c on s.classid = c.id ';
        $sql .= 'order by s.name';

        return DB::select ($sql);

    }
    public static function getStudentById($id){
        $sql = 'select s.* ';
        $sql .= 'from students as s ';
        $sql .= 'where s.id = ? ';

        return DB::select($sql, [$id]);
    }

    public static function insert($student){
        $sql = 'insert into students ';
        $sql .= '(name, email, contact, classid) ';
        $sql .= 'values (?, ?, ?, ?) ';

        $result =  DB::insert($sql, [$student->name, $student->email, $student->contact, $student->classid]);
        if($result){
            return DB::getPdo()->lastInsertId();
        } else {
            return -1;
        }
    }

    public static function update($student){
        $sql = 'update students ';
        $sql .= 'set name = ?, email = ?, contact = ?, classid = ? ';
        $sql .= 'where id = ? ';

        DB::update($sql, [$student->name, $student->email, $student->contact, $student->classid, $student->id]);

    }

    public static function delete($id){
        $sql = 'delete from students ';
        $sql .= 'where id = ? ';

        DB::delete($sql, [$id]);
    }

}
