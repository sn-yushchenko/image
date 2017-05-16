<!DOCTYPE html>
<html>

<head>
    <title>Test 4</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="/image/Test4/style.css">
    <script type='text/javascript' src="/image/Test4/ajax.js"></script>

</head>

<body>
    <div class="user">
        <div class="test">TEST</div>
        <button id="new">Добавить пользователя</button><br/>
         <form id="userForm" action="#" method="post">
            <input id="name" type="text" placeholder="Name" name="name">
            <input id="email" type="text" placeholder="email" name="email">
            <select id="country">
                <?php foreach($arr as $key=>$value): ?>
                <option> <?php echo $value['country_name']; ?></option>
                <?php endforeach; ?>
            </select>
             <input type="button" id="sub" value="Добавить">
        </form>
         <button id="list">Список пользователей</button>
        <div id="res"></div>
    </div>
</body>

</html>