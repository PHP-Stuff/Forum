<?php
session_start();
if(isset($_SESSION['LOGGED_IN'])) {
  if($_GET['topic'] ?? null) {
    $topics = json_decode(file_get_contents("topics.json"),true);
    if(!array_key_exists($_GET['topic'], $topics)) {
      http_response_code(400);
      echo "That topic does not exist.";
    } else if($topics[$_GET['topic']][0]['author'] !== $_SESSION['user']) {
      http_response_code(401);
      echo "You didn't create that topic so you can't delete it.";
    } else {
      unset($topics[$_GET['topic']]);
      file_put_contents("topics.json",json_encode($topics));
      echo "Topic deleted.";
    }
  } else {
    echo "Please specify a topic to delete.";
  }
} else {
  echo "Please sign in.";
}
?>