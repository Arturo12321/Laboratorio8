<?php
include_once 'CRUD.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Lab 7</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body>
        <center>
        <main id="form">
        <form method="post">
            <h1 class="fw-light">Biblioteca - Libros </h1>
             <table  Cellpadding="15" align=10>
                 <tr>
                     <td>
                         <input type="date" name="time"  placeholder="Año" value="<?php if(isset($_GET['edit'])) echo $getROW['time']; ?>">
                     </td>
                 </tr>
                 <tr>
                     <td>
                     <input type="text" name="autor"  placeholder="Autor"value="<?php if(isset($_GET['edit'])) echo $getROW['autor']; ?>">                
                     </td>
                 </tr>
                 <tr>
                    <td>
                        <input type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])) echo $getROW['titulo'];?>">
                    </td>
                 </tr>
                 <tr>
                     <td>
                         <input type="url" name="url" placeholder="Url" value="<?php if(isset($_GET['edit'])) echo $getROW['url']; ?> ">
                     </td>
                 </tr>
                 <tr>
                    <td>
                        <input type="text" name="esp" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])) echo $getROW['esp'];?>">
                    </td>
                 </tr>
                 <tr>
                    <td>
                        <input type="text" name="edito" placeholder="Editorial" value="<?php if(isset($_GET['edit'])) echo $getROW['edito'];?>">
                    </td>
                 </tr>

                 <tr>
                     <td>
                       <?php
                       if (isset($_GET['edit'])) {
                           ?>
                           <button type="submit" name="update">Editar</button>
                           <?php
                       }else{
                           ?>
                           <button type="submit" name="save">Registrar</button>
                            <?php
                       }
                       ?>  
                     </td>
                 </tr>

             </table>
        </form>
        </center>
        <br>
        <table  id="ps" Cellpadding="15" >
        <?php
                    $res = $MySQLiconn->query("SELECT * FROM data");
                    while ($row = $res->fetch_array()) {
                    ?> 
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['autor']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['url']; ?></td>
                        <td><?php echo $row['esp']; ?></td>
                        <td><?php echo $row['edito']; ?></td>
                        <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar Edición')">Editar</a></td>
                        <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar Eliminación')">Eliminar</a></td>

                    </tr>
                    <?php   
                    }
                    ?>  
        </table> 
        </main>
        
        
        
    </body>
</html>