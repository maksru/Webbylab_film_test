<?php
    return [
        '' => 'MovieController@indexAction',
        'upload' => 'MovieController@uploadAction',
        'update/([0-9]+)' => 'MovieController@updateAction/$1',
        'add' => 'MovieController@addAction',
        'edit/([0-9]+)' => 'MovieController@editAction/$1',
        'create' => 'MovieController@createAction',
        'searchTitle' => 'MovieController@searchTitleAction',
        'searchStars' => 'MovieController@searchNameAction',
        'delete/([0-9]+)' => 'MovieController@deleteAction/$1',
        'sort' => 'MovieController@sortAction',
        'allview/([0-9]+)' => 'MovieController@allViewsAction/$1',
    ];