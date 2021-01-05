<?php


$conn = mysqli_connect( 'localhost', 'root', 'mysql', 'ems' );

if( !$conn ){
    die( 'Unable to connect' );
}
