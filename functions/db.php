<?php
    function connect()
    {
        $config = file_get_contents("./app_setting.json");
        $config = json_decode($config, true);
        $host = $config['host'];
        $user = $config['user'];
        $pass = $config['password'];
        $db = $config['database'];
        $conn = new mysqli("$host", "$user", "$pass", "$db");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    