$(document).ready(function() {
    $('#kodeGL').change(function(){
        var kodeGL = $(this).val();

        console.log(kodeGL);
        
        //ajax request
        $.ajax({
            url: '/get-nama-barang/'+kodeGL,
            type: 'GET',
            dataType: 'json',
            
            success: function(response){
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }
                 
                if(len > 0){
                    var namaBarang = $('#namaBarang');

                    // Clear existing options
                    namaBarang.empty();
                    var option = "<option selected disabled value=''>--Pilih--</option>";
                        $('#namaBarang').append(option);
                    //read data and create <option>
                    for(var i = 0; i <len;i++){
                        var namaBarang = response['data'][i].namaBarang;
                        var kodeBarang = response['data'][i].kodeBarang;
                        console.log(kodeBarang);
                        var option = "<option value='"+namaBarang+"'>"+namaBarang+"</option>";
                        $('#namaBarang').append(option);
                        
                    }
                }
            }
        })

    })

    $('#namaBarang').on('input',function(){
        var namaBarang = $(this).val();

        

        
        //ajax request
        $.ajax({
            url: '/get-saldo-barang/'+namaBarang,
            type: 'GET',
            dataType: 'json',
            
            success: function(response){

                console.log(response['data']);
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }
                 
                if(len > 0){
                    var saldo = $('#saldo');

                    // Clear existing options
                    saldo.empty();

                    var saldo = response['data'][0].saldo;
                    console.log(saldo);
                    $('#saldo').val(saldo);

                    var kodeBarang = response['data'][0].kodeBarang;
                    console.log(kodeBarang);
                    $('#kodeBarang').val(kodeBarang);

                }
            }
        })

    })


    //request souvenir

    $('#kodeGL').change(function(){
        var kodeGL = $(this).val();

        
        
        //ajax request
        $.ajax({
            url: '/get-nama-barang-souvenir/'+kodeGL,
            type: 'GET',
            dataType: 'json',
            
            success: function(response){

                console.log(response);
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }
                 
                if(len > 0){
                    var namaBarang = $('#namaBarang');

                    // Clear existing options
                    namaBarang.empty();
                    var option = "<option selected disabled value=''>--Pilih--</option>";
                        $('#namaBarang').append(option);
                    //read data and create <option>
                    for(var i = 0; i <len;i++){
                        var namaBarang = response['data'][i].namaBarang;
                        var kodeBarang = response['data'][i].kodeBarang;
                        console.log(kodeBarang);
                        var option = "<option value='"+namaBarang+"'>"+namaBarang+"</option>";
                        $('#namaBarang').append(option);
                        
                    }
                }
            }
        })

    })

    $('#namaBarang').on('input',function(){
        var namaBarang = $(this).val();

        

        
        //ajax request
        $.ajax({
            url: '/get-saldo-barang-souvenir/'+namaBarang,
            type: 'GET',
            dataType: 'json',
            
            success: function(response){

                console.log(response['data']);
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }
                 
                if(len > 0){
                    var saldo = $('#saldo');

                    // Clear existing options
                    saldo.empty();

                    var saldo = response['data'][0].saldo;
                    console.log(saldo);
                    $('#saldo').val(saldo);

                    var kodeBarang = response['data'][0].kodeBarang;
                    console.log(kodeBarang);
                    $('#kodeBarang').val(kodeBarang);

                }
            }
        })

    })
})




