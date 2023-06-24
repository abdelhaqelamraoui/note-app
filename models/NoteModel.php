<?php

require_once('models/DataProvider.php');
require_once('models/Database.php');
require_once('models/MysqlDataProvider.php');

class NoteModel {

  private DataProvider $dp;

  function __construct() {
    $this->dp = new MysqlDataProvider();
  }

  function __destruct() {
    $this->dp->close();
    unset($this->dp);
  }

  function getNotes() {
    return $this->dp->getNotes();
  }

  function getNoteById($id) {
    return $this->dp->getNoteById($id);
  }

  function getNotesByTitlePattern($pattern) {
    return $this->dp->getNotesByTitlePattern($pattern);
  }

  function getNotesByContentPattern($pattern) {
    return $this->dp->getNotesByContentPattern($pattern);
  }

  function deleteNote($id) {
    return $this->dp->deleteNote($id);
  }

  function addNote($title, $content) {
    return $this->dp->addNote($title, $content) ;
  }

  function updateNote($id, $title, $content) {
    return $this->dp->updateNote($id, $title, $content);
  }

}