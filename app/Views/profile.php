<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width:100%;
            height:100vh;
            display : flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="profile">
        <img src="<?=base_url('asset/img/image.jpg');?>" style="width : 200px;">
        <h1><?=$nama?></h1>
        <h1><?=$kelas?></h1>
        <h1><?=$npm?></h1>
    </div>
</body>
</html>