<?php 
    
    $names = array('Andre', 'Brad', 'Charles', 'Michael');

    $count = 0;

    while($count < count($names)) {
        echo "<li>Hi, my name is $names[$count]</li>";
        $count++;
    }
?>

