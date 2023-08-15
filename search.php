<!-- Тут будут результаты поиска -->
<div class="search-results">
    <?php
        $search = $_GET['query'];
        $db_host = ''; // Хост базы данных
        $db_name = ''; // Имя базы данных
        $db_username = ''; // Имя пользователя
        $db_password = ''; // Пароль
        $database = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_username, $db_password);
        $query = $database->query("SELECT <столбик в базе данных, где хранятся имена пользователей> FROM <таблица с пользователями> WHERE <столбик в базе данных, где хранятся имена пользователей> LIKE '$search';");
        $result = $query->fetchAll();
        if ($result) {
            foreach ($result as $index => $user) { ?>
                <h3>По запросу "<?php echo $search; ?>" найдено несколько пользователей:</h3>
                <div class="result">
                    <div class="index">
                        <big><?php echo $index + 1; ?></big>
                    </div>
                    <div class="user">
                        <big><a href="/@/<?php echo $user; ?>"><?php echo $user; ?></a></big>
                    </div>
                </div>
            <?php }
        } else { ?>
            <h3>По запросу "<?php echo $search; ?>" ничего не найдено. <a href="/">На главную</a></h3>
    <?php } ?>
</div>