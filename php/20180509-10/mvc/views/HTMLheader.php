?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Uždavinys 1</title>
      <style>
         table, h1, h2, form {
         text-align: center;
         margin: auto;
         }
         code h2 {
         text-align: left;
         }
         h1, h2, h3, td, th {
         padding: 12px;
         }
      </style>
   </head>
   <body>
      <h1>Sąlyga:</h1>
      <code>
         <h2> <ul>
<li>Sukuriam programai atskirą katalogą</li>
<li>Atskiriame kodą kuris skirtas darbui su duomenų baze ir sudedame jį į katalogą
models.</li>
<li>Atskiriame kodą kuris generuoja html ir patalpiname jį į katalogą views.</li>
<li>Likęs kodas atsakingas už atitinkamų lentelių ar formų modelių ir vaizdinių
koordinavimą įdedamas į atitinkamus failus ir patalpinamas į katalogą controllers.</li>
<li>Likęs kodas paliekamas pagrindiniame index.php, kuris atsako už atitinkamo
kontrolieriaus užkrovimą.</li>
</ul>
         </h2>
         <hr>
      </code>
      <form name="automobiliai" method="POST">
      <input type="hidden" name="automobiliai">
          <button name="automobiliai">Automobiliai</button>
      </form>
      <table>
         <tr>
            <td>
               Metų filtras:
            </td>
            <td>
               <form method='POST'>
                  <input type="text" name="metai">
                  <button type="submit">Metai</button>
            </td>
         </tr>
         </form>
         <tr>
            <td>
               Mėnesių filtras:
            </td>
            <td>
               <form method='POST'>
                  <input type="text" name="menuo">
                  <button type="submit">Mėnuo</button>
            </td>
         </tr>
         </form>
      </table>
      <p></p>
<?php