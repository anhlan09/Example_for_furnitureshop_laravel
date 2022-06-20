<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class TeacherRepos
{
    public static function getAllTeacher() {
        $sql = 'select t.* ';
        $sql .= 'from teachers as t ';
        $sql .= 'order by t.Name';

        return DB::select ($sql);
    }

    public static function getTeacherById($id){
        $sql = 'select t.* ';
        $sql .= 'from teachers as t ';
        $sql .= 'where t.id = ? ';

        return DB::select($sql, [$id]);
    }

    public static function insert($teacher){
        $sql = 'insert into teachers ';
        $sql .= '(Name, DOB, SSID) ';
        $sql .= 'values (?, ?, ?) ';

        $result =  DB::insert($sql, [$teacher->Name, $teacher->DOB, $teacher->SSID]);
        if($result){
            return DB::getPdo()->lastInsertId();
        } else {
            return -1;
        }
    }

    public static function update($teacher){
        $sql = 'update teachers ';
        $sql .= 'set Name = ?, DOB = ?, SSID = ? ';
        $sql .= 'where id = ? ';

        DB::update($sql, [$teacher->Name, $teacher->DOB, $teacher->SSID, $teacher->id]);

    }
    public static function delete($id){
        $sql = 'delete from teachers ';
        $sql .= 'where id = ? ';

        DB::delete($sql, [$id]);
    }


    public static function getTeachersByClassId($classId)
    {
        $sql = 'select ct.classesId, t.id, t.Name, t.SSID ';
        $sql .= 'from teachers as t ';
        $sql .= 'join classes_teachers as ct on t.id = ct.teachersId ';
        $sql .= 'where ct.classesId = ? ';

        return DB::select($sql, [$classId]);
    }

    public static function insertClassTeacherRelationship($classId, $selectedT)
    {
        foreach ($selectedT as $tId) {
            $sql = 'insert into classes_teachers ';
            $sql .= '(classesId, teachersId) ';
            $sql .= 'values (?, ?) ';

            DB::insert($sql, [$classId, $tId]);
        }
    }

    public static function deleteClassTeacherRelationship($classId)
    {

        $sql = 'delete from classes_teachers ';
        $sql .= 'where classesId = ? ';

        DB::delete($sql, [$classId]);

    }
}
