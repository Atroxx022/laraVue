const formCon = new Vue({
    el: '#formConsult',
    data: {
        criterio1: '',
        criterio2: '',
        criterio3: '',
        mensaje: 'Por favor indique criterio de busqueda',
        pedidos: [],
        prductosArr: ''
    },
    mounted() {
        opciones()
            .then(datos => {
                this.options = datos
            })
    },
    methods: {
        nuevaConsulta: function(){
            this.criterio1 = ''
            this.criterio2 = ''
            this.criterio3 = ''
            this.mensaje = 'Por favor indique criterio de busqueda'
            this.pedidos = []
            this.prductosArr = ''
        },
        enviar: function(event){
            if(this.criterio1 == '' || this.criterio2 == '' || this.criterio3 == ''){
                event.preventDefault();
                this.mensaje = "Debe llenar todos los campos";
            }else{
                event.preventDefault();
                this.mensaje = "";
                showPedido(this.criterio1, this.criterio2, this.criterio3)
                    .then(datos => {
                        // console.log(datos['pedido'])
                        this.pedidos = datos['pedido'][0]
                        if(!this.pedidos){
                            console.log('vacio')
                            this.mensaje = "No hay datos con esa informacion";
                        }else{
                            console.log('leno')
                            this.mensaje = "";
                        }
                        producto(datos['pedido'][0]['producto'])
                            .then(datos2 => {
                                this.prductosArr = datos2[0]
                            })
                    })
            }
        }   
    }
})