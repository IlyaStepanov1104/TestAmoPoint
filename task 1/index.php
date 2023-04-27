<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1 (AmoPoint)</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="flex">
    <form class="flex" action="#" method="post" enctype="multipart/form-data">
        <label class="input-file">
            <input type="file" name="file">
            <span>Choose file</span>
        </label>
        <input type="input" class="form__field" placeholder="Symbol" name="symbol" id='symbol' required />
        <input class="btn-2" type="button" value="Upload">
    </form>

    <?php
    function save_file($file, $sep) {
        if ($file['error'] != 0) {
            echo '<svg xmlns="http://www.w3.org/2000/svg" id="test_circle" 
            width="200px" height="200px">
            <circle cx="100" cy="100" r="50" stroke="black" stroke-width="2" fill="red" />
          </svg>';
            return;
        }
        $file_url = basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $file_url)) {
            echo '<svg xmlns="http://www.w3.org/2000/svg" id="test_circle" 
            width="200px" height="200px">
            <circle cx="100" cy="100" r="50" stroke="black" stroke-width="2" fill="green" />
          </svg>';
            print_content($file_url, $sep);
        }
    }

    function print_content($file_url, $sep)
    {
        $file = file_get_contents($file_url);
        $file = explode($sep, $file);
        echo '<table>';
        foreach ($file as $row){
            echo '<tr><td class="count">'.strlen($row).'</td><td class="text">'.$row.'</td></tr>';
        }
        echo '</table>';
    }


    if (isset($_POST['symbol']) && isset($_FILES['file'])) {
        save_file($_FILES['file'], $_POST['symbol']);
    }
    ?>
</div>
</body>
</html>