

<form action="router.php" method="post">
  Title <input type="text" name="title" value="<?=$note['title']?>">
  <br>
  Content <textarea name="content" cols="30" rows="10"><?=$note['content']?></textarea>
  <button name="update">Save</button>
  <input type="hidden" name="action" value="update">
  <input type="hidden" name="id" value="<?=$note['id']?>">
</form>