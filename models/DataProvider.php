<?php



abstract class DataProvider {

  abstract function getNotes();
  abstract function getNoteById($id);
  abstract function getNotesByTitlePattern($pattern);
  abstract function getNotesByContentPattern($pattern);
  abstract function deleteNote($id);
  abstract function addNote($title, $content);
  abstract function updateNote($id, $title, $content);
  abstract function close();
}