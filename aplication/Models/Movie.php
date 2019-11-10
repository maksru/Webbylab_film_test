<?php

namespace aplication\Models;
use core\Database;

class Movie
{
    /**
     * Вывод все фильмов
     */
    public static function allFind() {
        $db = new Database();
        $db = $db->getDb();
        $sql = "SELECT * FROM movies";
        $sth = $db->prepare($sql);
        $sth->execute();
        $allMovies = $sth->fetchAll();
        return $allMovies;
    }

    /**
     * Добавление в базу данных.
     */
    public static function insert(string $title, int $year, string $format, array $stars) {
        $db = new Database();
        $db = $db->getDb();
        $stars = implode(', ', $stars);
        $sql = "INSERT INTO movies (`title`, `year`, `format`, `stars`) VALUES ('$title', '$year', '$format', '$stars')";
        $sth = $db->prepare($sql);
        $sth->execute();
    }

    /**
     * Удаление поля.
     */
    public static function delete(int $id) {
        $db = new Database();
        $db = $db->getDb();
        $sql = "DELETE FROM `movies` WHERE `id` = '$id' ";
        $sth = $db->prepare($sql);
        $sth->execute();
    }

    /**
     * Нахождение фильма
     */
    public static function findOne(int $id) {
        $db = new Database();
        $db = $db->getDb();
        $sql = "SELECT * FROM movies WHERE `id` = '$id' LIMIT 1";
        $sth = $db->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    /**
     * Поиск фильмов
     */
    public static function findFields(string $word, string $field) {
        $db = new Database();
        $db = $db->getDb();
        $sql = "SELECT * FROM movies WHERE `$field` LIKE '%$word%' ";
        $sth = $db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * Редактирование фильма
     */
    public static function edit(int $id, string $title, int $year, string $format, array $stars)
    {
        $db = new Database();
        $db = $db->getDb();
        $stars = implode(', ', $stars);
        $sql = "UPDATE `movies` SET `id`='$id',`title`='$title',`year`='$year',`format`='$format',`stars`='$stars' WHERE `id` = '$id'";
        $sth = $db->prepare($sql);
        $sth->execute();
    }
}