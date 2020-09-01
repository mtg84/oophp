<?php 

require APPROOT . '/views/inc/header.php';

echo '<h1>' . $data['title'] . '</h1>'; 

foreach($data['posts'] as $post){
    echo '<p>' .$post->title . '</p>';
}

require APPROOT . '/views/inc/footer.php';