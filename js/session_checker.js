////////////////////////////////
//  session_checker			///
// Autor: Victor Rodriguez  //
// Fecha : 14/01/2021      //   
////////////////////////////

   $.ajaxSetup ({
		cache: false
	});

   ///  SESSION CHECKUP // 
   (async function() {
            try {
                console.log("Verify session")
                $.ajax({
                    url: 'seguridad.php',
                    type: 'get',
                    dataType: 'JSON',
                    success: function(data){
                        console.log("data ", data)
                        if(data == 'OK'){
                            return
                        }else{
                            document.write("<div class='container' style='text-align:center;margin-top:100px'>Please Log-in first<br>");
                            document.write('<a href="index.html">Click Here</a></div>');
                            //window.location.href = 'index.html';    
                        }
                    },
                    
                });
            } catch (e) {
                console.log('Error: ${e}')
            }
        })()
        
