<?php include_once "layout/header.php" ?>
    <div class="panel-body mt-4">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="input-group">
                    <form action="upload" method="post" enctype="multipart/form-data">
                        <div class="custom-file">
                            <input type="file" name="filename" class="custom-file-input" id="inputGroupFile04">
                            <label class="custom-file-label" for="inputGroupFile04">Выбрать файл</label>
                        </div>
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-success mt-1 col-md-12" value="Загрузить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php if (isset($_SESSION["create"])) { ?>
    <div class="alert alert-success" role="alert" id="message">Фильм добавлен</div>
    <?php unset($_SESSION["create"]);
} else if (isset($_SESSION["edit"])) {
    ?>
    <div class="alert alert-success" role="alert" id="message">Фильм изменен</div>
    <?php unset($_SESSION["edit"]);
}
?>
    <div id="wrapper">
        <div id="messages"></div>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Название <a href="/sort" class="sort glyphicon glyphicon-sort-by-alphabet">Отсортировать</a></th>
                <th width="5%">Год</th>
                <th width="5%">Формат</th>
                <th width="45%">Актеры</th>
                <th width="20%">Управление</th>
            </tr>
            </thead>
            <br>
            <?php foreach ($movies as $movie) { ?>
                <tr>
                    <th><?php echo $movie["id"] ?></th>
                    <th><a href="/allview/<?php echo $movie["id"]; ?>"><?php echo $movie["title"]; ?></a></th>
                    <td><?php echo $movie["year"]; ?></td>
                    <td><?php echo $movie["format"]; ?></td>
                    <td><?php echo $movie["stars"]; ?></td>
                    <td><a href="/edit/<?php echo $movie["id"]; ?>" class="btn btn-primary">Редактировать</a>
                        <a href="/delete/<?php echo $movie["id"]; ?>" class="btn btn-danger">Удалить</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php include_once "layout/footer.php" ?>