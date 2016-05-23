@extends('layouts.app')
@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/sale.js', array('type' => 'text/javascript')) !!}
<!-- muestra mensaje que se a modificado o creado exitosamente-->
@include('alerts.success')


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seccion de Usuarios</h3>
            </div>
			<div class="box-body">
 


<div><a class="btn btn-success  pull-right " href="{!! URL::to('venta-show') !!}">
  <i class="fa fa-user-plus fa-lg"></i> Nuevo Usuario</a></div>

</td>












<div class="col-md-9">
        <div class="row">
                            
            {!! Form::open(array('url' => 'sales', 'class' => 'form-horizontal')) !!}
    
    <!--clientes-->
    <div class="col-md-7">
       <div class="form-group">
           {!!Form::label('Cliente ID',null,['class'=>'col-sm-4 control-label'])!!}
           <div class="col-sm-8">
           {!!Form::select('usu_nomrbe', $clientes, array('class' => 'form-control'))!!}
           </div>
       </div>
    <!--tipo de pago-->
        <div class="form-group">
        <label for="payment_type" class="col-sm-4 control-label">Tipo de pago</label>
        <div class="col-sm-8">
        {!! Form::select('payment_type', array('Cash' => 'Cash', 'Check' => 'Check', 'Debit Card' => 'Debit Card', 'Credit Card' => 'Credit Card'), array('class' => 'form-control')) !!}
        </div>
        </div>

    </div>
                            
        </div>
                           
    <table class="table table-bordered">
    <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Precio Total</th>
        <th>Eliminar</th>
    </tr>
     @foreach($mycart as $mycart)
      <tbody>
      <tr ng-repeat="newsaletemp in saletemp">
        <td>{{ $mycart->pro_id}}</td>
        <td>{{ $mycart->pro_descrip}}</td>
        <td>{{ $mycart->pro_precio1}}</td>
        <!--cantidad-->
        <td><input type="text" style="text-align:center" autocomplete="off" name="quantity" ng-change="updateSaleTemp(newsaletemp)" ng-model="newsaletemp.quantity" size="2"></td>
        <!--Precio Total-->
        <td>@{{newsaletemp.item.selling_price * newsaletemp.quantity | currency}}</td>
        <td><button class="btn btn-danger btn-xs" type="button" ng-click="removeSaleTemp(newsaletemp.id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    </tr>
    </tbody>
    @endforeach
    </table>

    <!--row-->
    <div class="row">


            <div class="col-md-6">
                <!--Agregar Pago-->
                <div class="form-group">
                    <label for="total" class="col-sm-4 control-label">Agregar Pago</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" class="form-control" id="add_payment" ng-model="add_payment"/>
                        </div>
                    </div>
                </div>
                <!--Comentario-->
                <div>&nbsp;</div>
                <div class="form-group">
                    <label for="employee" class="col-sm-4 control-label">Comentario</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="comments" id="comments" />
                    </div>
                </div>
            </div>


                <div class="col-md-6">
                <!--Total-->
                    <div class="form-group">
                        <label for="supplier_id" class="col-sm-4 control-label">Total</label>
                      <div class="col-sm-8">
                        <p class="form-control-static"><b>@{{sum(saletemp) | currency}}</b></p>
                      </div>
                    </div>                   
                <!--Monto a Pagar--> 
                    <div class="form-group">
                        <label for="amount_due" class="col-sm-4 control-label">Monto a Pagar</label>
                        <div class="col-sm-8">
                        <p class="form-control-static">@{{add_payment - sum(saletemp) | currency}}</p>
                        </div>
                    </div>
                    <!--Boton Completar Venta-->
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-block">Completar Venta</button>
                        </div>
                    </div>
                </div>
    </div><!--end Row-->
                            {!! Form::close() !!}                        

                    </div>


			     </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection