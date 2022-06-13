

<?php
if(isset($_POST['choix']))
{
    if($_COOKIE['votant'] && $_COOKIE['vote'])
    {
        $vote=$_COOKIE['vote'];
?>
<script type='text/javascript'>
    alert('vous avez deja voté pour le <?php echo $vote ?>!');
    </script>

  <?php 
  } else
   $vote=$_COOKIE['vote'];
   setcookie('votant','true',time()+24*60*86400);
   setcookie('vote',"{$_POST['choix']}",time()+24*60*86400);

   if(file_exists('sondage.txt')){
       if($id_file=fopen(('ssondage.txt','a')))
       {
           flock($id_file,2);
           fwrite($id_file,$_POST['choix'].'<br>');
           flock($id_file,3);
           flock($id_file);
       }
       else{
           echo 'file inaccessible';
       }
   }
   else
 {
 $id_file=fopen("sondage.txt","w");
 fwrite($id_file,$_POST['choix']."\n");
 fclose($id_file);
}
?>
<script type='text/javascript'>
    alert(' <?php echo $vote ?>!');
    </script>

















<!DOCTYPE html>
<html>
    <head>
        <title>mon test </title>
</head>
<body>
    <h1>bienvenue sur mon site </h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <fieldset>
        <legend>votez pour votre technomlogie internet preferée </legend>
        <table><tbody>
            <tr>
                <td>choix 1: PHP/MYSQL/JAVASCRIPT</td>
                <td>
                    <input type="radio" name='choix' value='PHP et MYSQL'/>
                </td>
            </tr>
            <tr>
                <td> choix 2: ASP.NET </td>
                <td>
                    <input type="radio" name='choix' value='ASP.NET' />
                </td>
            </tr>
            <tr>
                <td>choix 3: JSP </td>
                <td>
                    <input type="radio" name='choix' value='JSP' />
                </td>
            </tr>
            <tr>
                <td>votez !</br></td>
                <td>
                    <input type='submit' value='envoyez' />
                </td>
            </tr>
</tbody>
</table>
</fieldset>
</form>
</body>
</html>