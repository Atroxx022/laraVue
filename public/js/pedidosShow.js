const opciones = async () => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `api/index`,
            type: 'GET',
            headers: {
                'Accept': 'application/json'
            },
            success: function(data){
                resolve(data)
            }
        })  
    })
}

const showPedido = async (criterio,criterio2,criterio3) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `api/pedidos/${criterio}&${criterio2}&${criterio3}`,
            type: 'GET',
            headers: {
                'Accept': 'application/json'
            },
            success: function(data){
                if(data.length === 0){
                    console.log('vacio')
                }
                resolve(data)
            }
        })
    })
}

const producto = async (id) => {
    console.log(id)
    return new Promise((resolve, reject)=>{
        $.ajax({
            url: `api/producto/${id}`,
            type: 'GET',
            headers: {
                'Accept': 'application/json'
            },
            success: function(data){
                resolve(data)
            }
        })
    })
}