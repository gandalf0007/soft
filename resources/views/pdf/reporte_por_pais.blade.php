<!DOCTYPE html>
<html lang="en">
<head>

{!!Html::style('css/bootstrap.min.css')!!}

	<meta charset="UTF-8">
	<title>Reporte Por Pais</title>
<style>
 
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    background-color: #ECF0F5;
}


</style>
	  
</head>
<body>


              <div class="box">
                  <h3 class="box-title">Reporte Por Pais - <?=  $date; ?></h3>
               
                  <table class="table">
                  <thead>
                     <tr>
                      <th style="width: 40px">id</th>
                      <th style="width: 20px">nombre</th>
                      <th style="width: 10px">telefono</th>
                    </tr>
                  </thead>
                    <tbody>
                  <?php foreach($data as $user){ ?>
                 
                    <tr>
                      <td ><?= $user->id; ?></td>
                      <td><?= $user->usu_nombre; ?></td>
                      <td><?= $user->usu_tel; ?></td>
                    </tr>
                    
                    <?php  } ?>
                    
                  </tbody>

                  </table>
                </div><!-- /.box-body -->
                
              

              
         


	
</body>
</html>


