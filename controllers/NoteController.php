<?php

require_once('models/NoteModel.php');

class NoteController {

  private $noteModel;
  function __construct() {
    $this->noteModel = new NoteModel();
  }

  function __destruct() {
  }

  // data function 
  function addNote($title, $content) {
    $this->noteModel->addNote($title, $content);
    header('Location: index.php');
  }

  function updateNote($id, $title, $content) {
    $this->noteModel->updateNote($id, $title, $content);
    header('Location: index.php');
  }

  function deleteNote($id) {
    $this->noteModel->deleteNote($id);
  }

  // view functons
  function list() {
    $notes = $this->noteModel->getNotes();
    $viewName = 'list';
    include('views/layout.php');
  }

  function add() {
    $viewName = 'add';
    include('views/layout.php');
  }

  function update($id) {
    $note = $this->noteModel->getNoteById($id);
    $viewName = 'update';
    include('views/layout.php');;
  }

  function delete($id) {
    $note = $this->noteModel->getNoteById($id);
    $viewName = 'remove';
    include('views/layout.php');
  }

}