<!-- 게시글 작성 페이지 -->
<!-- post방식으로 write_ok.php에 전송 -->
<form enctype="multipart/form-data" method="post" action="./write_ok.php">
<h1>Write Board</h1>
<label>Title</label>
<input name="title" type="text">
<label>Content</label>
<input name="content" type="text">
<input type="file" name="file"/><br/>
<button type="submit" name="form">Write</button>
</form>
