<?php
//변수 선언
 $servername = "localhost";
 $username = "root";
 $password = "apmsetup";
 $dbname = "mydatabase";

 //mysql 객체 선언
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결되지 않으면 종료
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//sql 구문
$sql = "SELECT id, title, author, created_at FROM posts";
$result = $conn->query($sql);

// 게시글이 없다면 NO post 출력
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //게시글 목록 출력
        echo "<a href='db_view_post.php?id=" . $row["id"] . "'>"; // 게시글 상세 보기 링크
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>Author: " . $row["author"] . "</p>";
        echo "</a><hr>";
    }
} else {
    echo "No posts yet";
}

$conn->close();
?>
