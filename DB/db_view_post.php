<?php
//변수 선언
 $servername = "localhost";
 $username = "root";
 $password = "apmsetup";
 $dbname = "mydatabase";

 //sql객체 생성
$conn = new mysqli($servername, $username, $password, $dbname);

//연결되지않으면 종료
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) //ID 가 들어왔는지 확인
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id = $id"; // ID 따라서 Database 확인
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>" . $row["title"] . "</h2>"; //제목
        echo "<p>Author: " . $row["author"] . "</p>"; // 저자
        echo "<p>" . $row["content"] . "</p>"; // 상세정보
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
