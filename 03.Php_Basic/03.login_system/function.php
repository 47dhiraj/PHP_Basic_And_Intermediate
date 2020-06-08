<?php
function debug($variable)
{
    echo'<pre>';
print_r($rows);
echo'</pre>';
}
function dd($variable){//debug and die
    debug($variable);
    die();
}
