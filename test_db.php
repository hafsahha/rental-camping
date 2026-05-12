<?php
try {
    $dsn = "mysql:host=gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com;port=4000;dbname=test";
    $user = "3p1sp9pXF2BdqED.root";
    $pass = "pPMfkfPvX7RYU0d6";
    $options = [
        PDO::MYSQL_ATTR_SSL_CA => true,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "KONEKSI BERHASIL!";
} catch (PDOException $e) {
    echo "KONEKSI GAGAL: " . $e->getMessage();
}