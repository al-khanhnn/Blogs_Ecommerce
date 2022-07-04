<h1>HomePage</h1>

<p>
<?php
foreach($categories as $key => $category){
    echo $category['title'].'<br/>';
}
?>
</p>