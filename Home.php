<!doctype html>
<html lang="en">
<h>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Marcin Czernek">
    <title>Document</title>
</head>
<body>

<style>
    .box{border: 6px solid #999;margin: 30px auto 0;padding: 20px;width: 1000px;height: 250px;overflow: scroll;}
    .box ul{margin: 0;padding: 0;list-style: none;}
    .box li{display: block;border-bottom: 1px dashed #ddd;margin-bottom: 5px;padding-bottom: 5px;}
    .box li:last-child{border-bottom: 0 dashed #ddd;}
    .box span{color: floralwhite;}
    body{
        background-image: url("Images/text.jpg");
        background-blend-mode: color-burn;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        color: white;
        h3 {
            color: #ffffff;
            font-family: "consolas", sans-serif;
            font-size: 18px ;
        }
    }

</style>

<h3>Witaj w księdze gości! </h3>
<div class="box">
    <ul>
        <?php
        include_once "connect.php";

        if (isset($_POST['name']) && ($_POST['entry'])){
            $ins = mysqli_query($con,sprintf("INSERT INTO entries (name, entry, entry_time) VALUES('$name','$entry',now())"));
            $name = $_POST['name'];
            $entry = $_POST['entry'];
        }
         $record = mysqli_query($con,"SELECT * FROM entries");
        while($data = mysqli_fetch_array($record)){
            ?>
            <li><b><?php echo $data['name']; ?><b> - <?php echo $data['entry'] ?> - <?php echo $data['entry_time']; ?></li>
        <?php
            }
        ?>

    </ul>
</div>

<h3>Zapisz się</h3>
<form method="post" action="Home.php">
<p>Napisz coś:<input type="text" name="entry"></p>
<p>Twoja nazwa:<input type="text" name="name"></p>
<input type="submit" value="Prześlij">
</form>
</body>
</html>