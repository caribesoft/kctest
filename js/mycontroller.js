/////////////////////////////////
//  MYCONTROLLER		 	 ///
// Author: Victor Rodriguez  //
// Date : 14/01/2021        //   
/////////////////////////////

   $.ajaxSetup ({
		cache: false
	});

   	$(".log_err").hide();

   	// LOGIN VALIDATION ///
	$(".validate_login").click(function(e){
			var user 	 = $("#username").val();
			var passcode = $("#passcode").val();
				
			$( "input[type='text']" ).change(function() {
					$(".campo").css("border","2px solid #EEE");				
			});

			$( "input[type='password']" ).change(function() {
					$(".campo").css("border","2px solid #EEE");				
			});

			if(user == ''){
					$("#username").css("border","2px solid #FF0000").focus();
					return false;
			}
			if(passcode == ''){
					$("#passcode").css("border","2px solid #FF0000").focus();
					return false;
			}
				
			e.preventDefault();
				$.ajax({
					url: "./control.php",
					 data: "user=" + user + "&passcode=" + passcode + "",
			 		 dataType: 'json',   
					 type: "POST",
						cache: false,
						success: function(data){
							if(data == 'ERROR'){
								var message = '<span style="color:#FF0000;font-size:14px"><strong>X</strong> INVALID USER OR PASSWORD!</span>';
								$(".log_err").html(message).fadeIn(500);
							}else{
								window.location.href = 'students.html';	
							}	
					   }
				});
		});

     	
     	// GET THE TOTAL NUMBER OF RECORDS ///
     	async function getCount(){
     			const response = await fetch('getcount.php')
				const conteo = await response.json()
				return conteo;
		}	
			
		// GENERATE DATA & PAGINATION ////  
		(async function() {
			try {
				getCount()
				.then((conteo) => {
						var total = conteo.records;
						var limit = conteo.limit;
						totalofPages = total / limit; // number of rows per page
						
						var pag = $('#pagination').simplePaginator({
							totalPages: totalofPages,
							maxButtonsVisible: 3,
							currentPage: 1,
							nextLabel: 'Next',
							prevLabel: 'Prev',
							firstLabel: 'First',
							lastLabel: 'Last',
							clickCurrentPage: true,
							pageChange: function(page) {
								$("#content").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
					            $.ajax({
									url:"load_data.php",
									method:"GET",
									dataType: "json",		
									data:{page:	page},
									success:function(responseData){
										$('#content').html(responseData.html);
										
									}
								});
							}
						});
				});

			} catch (e) {
				console.log('Error: ${e}')
			}

		})()

		/// SAVE USER AND PASSWORD LOCALLY
		   $(function() {
 
                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember').attr('checked', 'checked');
                    $('#username').val(localStorage.usrname);
                    $('#passcode').val(localStorage.pass);
                } else {
                    $('#remember').removeAttr('checked');
                    $('#username').val('');
                    $('#passcode').val('');
                }
 
                $('#remember').click(function() {
 
                    if ($('#remember').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#username').val();
                        localStorage.pass = $('#passcode').val();
                        localStorage.chkbx = $('#remember').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });

      