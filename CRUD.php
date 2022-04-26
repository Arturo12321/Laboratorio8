<?php
include_once 'db.php';

/* Codigo para insertar(insert) data */
if(isset($_POST['save']))
{
    $time = $MySQLiconn->real_escape_string($_POST['time']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);
    $esp = $MySQLiconn->real_escape_string($_POST['esp']);
    $edito = $MySQLiconn->real_escape_string($_POST['edito']);

    $SQL = $MySQLiconn->query("INSERT INTO data(time,autor,titulo,url,esp,edito) VALUES('$time','$autor','$titulo','$url','$esp','$edito') ");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

/* Codigo para eliminar(delete) data */

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['del']);
    header("Location: index.php");   
}
/* codigo para actulizar(update) data */

        if(isset($_GET['edit']))
        {
            $SQL = $MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['edit']);
            $getROW = $SQL->fetch_array();
        }
        if(isset($_POST['update']))
        {
            $SQL = $MySQLiconn->query("UPDATE data SET time='".$_POST['time']."',autor='".$_POST['autor']."',titulo='".$_POST['titulo']."',url='".$_POST['url']."',esp='".$_POST['esp']."', edito='".$_POST['edito']."' WHERE   id=".$_GET['edit']);
            header("Location: index.php");
        }
?>
