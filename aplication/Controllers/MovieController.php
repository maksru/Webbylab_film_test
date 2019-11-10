<?php

namespace aplication\Controller;
use aplication\Models\Movie;
use core\Router;
use core\View;

class MovieController {
    /**
     * Вывод главной страницы, с выводом всех элементов из базы данных.
     */
    public function indexAction() {
        $movies = Movie::allFind();
        return View::view('index', $movies);
    }

    /**
     * Переход на страницу создания нового фильма
     */
    public function createAction() {
        return View::view('create');
    }

    /**
     * Поиск названию.
     */
    public function searchTitleAction() {
        $searchTitle = htmlspecialchars($_POST["searchTitle"], ENT_QUOTES, "UTF-8");
        $movies = Movie::findFields($searchTitle, 'title');
        return View::view('index', $movies);
    }

    /**
     * Поиск актера
     */
    public function searchNameAction() {
        $searchStars = htmlspecialchars($_POST["searchStars"], ENT_QUOTES, "UTF-8");
        $movies = Movie::findFields($searchStars, 'stars');
        return View::view('index', $movies);
    }

    /**
     * Добавление нового фильма
     */
    public function addAction() {
        $_SESSION["create"] = "true";
        $stars = array();
        foreach ($_POST["stars"] as $star) {
            if (!empty($star)) {
                array_push($stars, htmlspecialchars($star, ENT_QUOTES, "UTF-8"));
            }
        }
        $title = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
        Movie::insert($title, (int)$_POST["year"], $_POST["format"], $stars);
        header("Location: /");
    }

    /**
     * Функция удаления фильма.
     */
    public function deleteAction($id)  {
        Movie::delete($id);
        header("Location: /");
    }

    /**
     * Возвращает страницу с редактированием.
     */
    public function editAction(int $id)  {
        $movie = Movie::findOne($id);
        $movie["stars"] = explode(', ', $movie["stars"]);
        return View::view('edit', $movie);
    }

    /**
     * Обновление поля.
     */
    public function updateAction(int $id) {
        $_SESSION["edit"] = "true";
        $stars = array();
        foreach ($_POST["stars"] as $star) {
            if (!empty($star)) {
                array_push($stars, htmlspecialchars($star, ENT_QUOTES, "UTF-8"));
            }
        }
        $title = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
        Movie::edit($id, $title, (int)$_POST["year"], $_POST["format"], $stars);
        header("Location: /");
    }

    /**
     * Сортировка фильмов по названию фильмов в алфавитном порядке.
     */
    public function sortAction() {
        $movies = Movie::allFind();
        usort($movies, function($a, $b) {
            return $a['title'] <=> $b['title'];
        });

        return View::view('index', $movies);
    }

    /**
     * Общая информаци о фильме.
     */
    public function allViewsAction (int $id) {
        $movie = Movie::findOne($id);
        $movie["stars"] = explode(', ', $movie["stars"]);
        return View::view('allview', $movie);
    }

    /**
     * Загрузка и считывание файла.
     */
    public function uploadAction() {
        if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
            $fileName = $_FILES['filename']['name'];
            $splitName = explode('.', $fileName);
            $fileType = $splitName[count($splitName) - 1];
            if ($fileType == 'txt' && $_FILES['filename']['size'] != 0) {
                $text = file_get_contents($_FILES["filename"]["tmp_name"], true);
                $movies = explode("\n\n", trim($text));
                foreach ($movies as $movie) {
                    $fields = array_chunk(explode("\n", $movie), 5);
                    foreach ($fields as $field) {
                        array_pop($field);
                        foreach ($field as $data) {
                            list($key, $value) = explode(": ", $data);
                            $key = str_replace(' ', '_', strtolower($key));
                            if ($key == 'stars') {
                                $value = explode(", ", htmlspecialchars($value, ENT_QUOTES, "UTF-8"));
                            }
                            $movieArr[$key] = $value;
                        }

                        if (count($movieArr) != 4) {
                            return View::error("Фильм не содержит необходимые поля");
                        }

                        if (count($movieArr) == 4) {
                            $title = htmlspecialchars($movieArr["title"], ENT_QUOTES, "UTF-8");
                            $year = (int)$movieArr["release_year"];
                            $format = trim($movieArr["format"]);
                            $stars = $movieArr["stars"];
                            Movie::insert($title, $year, $format, $stars);
                        }
                    }
                }
            } else {
                return View::error("Файлы типа $fileType не поддерживаются");
            }
        }
        header("Location: /");
    }
}