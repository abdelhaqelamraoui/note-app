<?php

require_once('controllers/NoteController.php');

$noteController = new NoteController();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
  $path = $_GET['path'] ?? false;
  if($path) {
    $args = explode('/', $path);
    $action = $args[0];
    $id = $args[1] ?? false;
    if($id) {
      // the id is passed in the path.
      // delete or getting a note with its id
      // call the action as a named method of the controller
      $noteController->$action($id);
    } else {
      // the id is not passed in the path
      // list the notes
      $noteController->$action();
    }
  } else {
    // show the list
    $noteController->list();
  }
  
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  if(isset($_POST['save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $noteController->addNote($title, $content);
  }

  if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $noteController->updateNote($id, $title, $content);
  }

  if(isset($_POST['yes'])) {
    $id = $_POST['id'];
    $noteController->deleteNote($id);
    header('Location: index.php');    
  }

}