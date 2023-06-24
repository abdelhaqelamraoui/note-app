
<a href="router.php?path=add">Add</a>
<br>
<table>
  <?php if(!empty($notes)): ?>
    <?php foreach($notes as $note): ?>
      <tr>
        <td><?= $note['title'] ?></td>
        <td><a href="router.php?path=update/<?=$note['id']?>">update</a></td>
        <td><a href="router.php?path=delete/<?=$note['id']?>">Remove</a></td>
      </tr>
    <?php endforeach ?>
  <?php else: ?>
    <tr>
      <td>Your saved notes will appear here !</td>
    </tr>
  <?php endif ?>
</table>