<?php
header("Content-Type: application/json");
include('connection.php');

function validate_name($data)
{
    if (empty($data)) {
        throw new Exception("Name is required");
    }

    return $data;
}

function validate_email($data)
{
    if (empty($data)) {
        throw new Exception("Email is required");
    }

    return $data;
}

function validate_photo($data)
{
    if (empty($data)) {
        throw new Exception("Photo is required");
    }

    return $data;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $data = [];
    try {
        $resp = 200;
        $name = validate_name($_POST['name']);
        $email = validate_email($_POST['email']);
        $photo = validate_photo($_FILES['photo']);

        $initname = $_FILES["photo"]["name"];
        $extension = end(explode(".", $initname));
        $namefile = generateRandomString();
        $namefile .= ".{$extension}";

        $fileTemp = $_FILES["photo"]["tmp_name"];
        // baca tipe file
        $fileType = $_FILES["photo"]["type"];
        // baca filesize
        $fileSize = $_FILES["photo"]["size"];
        // proses upload file ke folder /upload
        move_uploaded_file($fileTemp, '../upload/'.$namefile);

        mysqli_query($conn, "INSERT INTO user (name, email, photo) VALUES ('$name', '$email', '$namefile')");
        // mysqli_query($conn, "INSERT INTO bpkb (id, tahun, kode_satker, update_on, published, $jenisdok) VALUES('', $tahun, '$kd', CURRENT_TIMESTAMP, 'publshed', '$namefile')");
    } catch (Throwable $t) {
        $resp = 500;
        $data['message'] = $t->getMessage();
        $data['status'] = false;
        $data['result'] = [];
    }

    $json = json_encode($data);
    http_response_code($resp);

    echo $json;
}