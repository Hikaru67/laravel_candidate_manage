<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gửi mail</title>
    <style>
        .content{
            color: #0000ff;
        }
    </style>
</head>
<body>
<h3>Dear <?php echo e($receiverName); ?></h3>
<div class="content">
    <?php for($i=0; $i<count($body); $i++): ?>
        <span><?php echo e($body[$i]); ?></span>
        <br>
    <?php endfor; ?>
</div>
</body>
</html>
<?php /**PATH /home/hikaru/learn-php/candidate-manage/laravel-candidate-manage/resources/views/mails.blade.php ENDPATH**/ ?>