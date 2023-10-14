@extends('layouts.header')

@section('content1')

<div id="formConsult">
    <div class="card" style="margin:50px 60px 10px 60px; height: 500px !important" v-if="mensaje !== '' || pedidos.length === 0 ">
        <div class="card-body">
            <h1 style="padding-bottom: 60px;" v-text='mensaje'></h1>
            <form action="" method="post" v-on:submit="enviar">
                <label for="">Codigo de pedido</label>
                <input class="form-control" type="text" v-model="criterio1" placeholder="DIGITE CODIGO DEL PEDIDO">
                <br>
                <label for="">Tipo de documento</label>
                <select class="form-control" name="" id="" v-model="criterio2">
                    <option value="">SELECCIONE TIPO DOCUMENTO</option>
                    <option value="C.C.">C.C.</option>
                </select>
                <br>
                <label for="">Documento del cliente</label><br>
                <input class="form-control" type="text" v-model="criterio3" placeholder="DIGITE DOCUMENTO DEL CLIENTE">
                <br>
                <button class="btn btn-primary" type="submit">Consultar</button>
            </form>
        </div>
    </div>
    <div class="card" style="margin:50px 60px 10px 60px; height: 500px !important" v-else>
        <div class="card-body">
            <div v-if="pedidos.length === 0 ">
            </div>
            <div v-else>
                <ul class="list-group">
                    <li class="list-group-item" v-for='(pedido, index) in pedidos'>
                        <strong v-text='index' v-if="index !== 'producto'">:</strong> <span v-if="index !== 'producto'" v-text='pedido'></span>
                        <span v-if="index === 'producto'">
                            <table class="table table-dark">
                                <tr>
                                    <td scope="col">Nombre del producto</td>
                                    <td scope="col">Referencia</td>
                                    <td scope="col">Cantidad</td>
                                </tr>
                                <tr>
                                    <td v-for="pro in prductosArr"><span v-text='pro'></span></td>
                                </tr>
                            </table>
                        </span>
                    </li>
                </ul>
                <br><br>
                <button v-on:click="nuevaConsulta" class="btn btn-success" type="submit">Nueva consulta</button>
            </div>
        </div>
    </div>
    
</div>
@endsection