<!-- //회원가입 페이지 -->
<!DOCTYPE>

<html>
<head>
        <meta charset='utf-8'>
</head>
<body>

        <div align="center">
                <p>회원가입</p>
                <!-- id,pw,email값을 get방식으로 join_action.php에 넘겨줌 -->
                <form method='get' action='./join_action.php'>
                        <p>ID: <input type="text" name="id"></p>
                        <p>PW: <input type="password" name="pw"></p>
                        <p>Email: <input type="email" name="email"></p>
                        <input type="submit" value="회원가입">
                </form>
        </div>
</body>
</html>
