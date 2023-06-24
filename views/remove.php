
<form action="router.php" method="post">
  Are you sure to delete [ <?=$note['title'] ?> ]?
  <br>
  <button name="yes">Yes</button>
  <button type="button" name="no"><a href=".">No</a></button>
  <input type="hidden" name="id" value="<?=$note['id']?>">
</form>