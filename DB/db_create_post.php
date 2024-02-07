<?php
//post 요청인지 확인
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //변수 선언
    $servername = "localhost";
    $username = "root";
    $password = "apmsetup";
    $dbname = "mydatabase";

    //sql 객체 생성
    $conn = new mysqli($servername, $username, $password, $dbname);

    //연결되지 않으면 종료
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //입력받은 제목,글,저자
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_POST["author"];

    //sql에 추가하기
    $sql = "INSERT INTO posts (title, content, author) VALUES ('$title', '$content', '$author')";

    //쿼리에 추가되었는지 확인하기
    if ($conn->query($sql) === TRUE) {
        echo "Post created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h2>Create a new post</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="content">Content:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <label for="author">Author:</label>
        <input type="text" name="author" required><br>

        <input type="submit" value="Create Post">
    </form>
</body>
</html>
