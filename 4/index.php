<?php
/**
 * @param $user_ids
 *
 * @return mixed
 *
 * Проблемы данной реализации:
 *
 * 1. Нет никакой проверки что на самом деле пришло ф функцию, считатю что подобной функции логичнее на вход принимать массив, а не строку
 * 2. Коннекты и запросы к БД в цикле.
 * 3. Расширении mysql уже давно deprecated
 * 4. Отсутствует защита от SQL-иньекций
 * 5. Цыкл while вовсе не обязателен т.к во id мы должны каждый раз получать только одну строку
 * 6. Функция возвращает либо массив, либо NULL в последнем случае мы получим варнинг что в foreach передан неверный элемент.
 * 7. Еще не нравится то что ссылки мы формируем припомощи php, хотя можно делать при помощи html
 * 8. Также дополню что параметры для коннекта к БД "захардкожены" и в случае их
 *  изменений придется изменять их непосредственно в функции, а подобных функций может быть очень много, да и вообще считаю неверным конектится к БД в нутри функции
 * лучше передавать ссылку на коннект или использовать коннект по умолчанию
 */
/*
function load_users_data($user_ids) {

    $user_ids = explode(',', $user_ids);

    foreach ($user_ids as $user_id) {

        $db = mysqli_connect("localhost", "root", "123123", "database");

        $sql = mysqli_query($db, "SELECT * FROM users WHERE id=$user_id");

        while($obj = $sql->fetch_object()){

            $data[$user_id] = $obj->name;

        }

        mysqli_close($db);

    }

    return $data;
}

// Как правило, в $_GET['user_ids'] должна приходить строка

// с номерами пользователей через запятую, например: 1,2,17,48

$data = load_users_data($_GET['user_ids']);

foreach ($data as $user_id=>$name) {

    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";

}
*/

/** @var PDO $db */
$db = new PDO('mysql:host=db-test.obed.ru;dbname=obed;port=;charset=UTF-8', 'obed_developer', 'BuSfbLDvkp');

if ($db->errorCode()) {
    throw new Exception('Connect error: ' . $db->errorInfo());
}

/**
 * @param array $userIds
 * @param PDO $db
 *
 * @return array
 */
function loadUsersData(array $userIds, PDO $db)
{
    /** @var array $return */
    $return = array();

    /** @var PDOStatement $stmt */
    $stmt = $db->prepare('SELECT id, name FROM `users` WHERE id = :id');

    foreach ($userIds as $id) {
        $stmt->execute(array(
            ':id' => $id,
        ));

        /** @var array $user */
        $user = $stmt->fetch();

        if (!$user) {
            continue;
        }

        $return[$user['id']] = $user['name'];
    }

    return $return;
}?>

<?foreach (loadUsersData(array(1,2,3,4,5,6,7,8), $db) as $user_id=>$name): ?>
<a href="/show_user.php?id=<?= $user_id?>"><?= $name?></a>
<? endforeach; ?>