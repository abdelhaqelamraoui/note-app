<?php



class MysqlDataProvider extends DataProvider {

  private $db = null;

  function __construct() {
    $this->db = new Database();
  }

  function __destruct() {
    unset($this->db);
  }

    
  function getNotes() {
    return $this->db->query('SELECT * FROM notes');
  }

  function getNoteById($id) {
    $res =  $this->db->query(
      'SELECT * FROM notes WHERE id = ?',
      [$id]
    );
    return $res[0];
  }

  function getNotesByTitlePattern($pattern) {
    return $this->db->query(
      'SELECT * FROM notes WHERE title LIKE ?',
      ['%'.$pattern.'%']
    );
  }

  function getNotesByContentPattern($pattern) {
    return $this->db->query(
      'SELECT * FROM notes WHERE content LIKE ?',
      ['%'.$pattern.'%']
    );
  }

  function deleteNote($id) {
    return $this->db->execute(
      'DELETE FROM notes WHERE id = ?',
      [$id]
    );
  }

  function addNote($title, $content) {
    return $this->db->execute(
      'INSERT INTO notes(title, content) VALUES(?, ?)',
      [$title, $content]
    );
  }

  function updateNote($id, $title, $content) {
    return $this->db->execute(
      'UPDATE notes SET title = ?, modification_date = CURDATE(),
      modification_time = CURTIME(), content = ? WHERE id = ?',
      [$title, $content, $id]
    );
  }

  function close() {
    $this->db->disconnect();
  }
}