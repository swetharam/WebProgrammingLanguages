$(document).ready(function(){
		
    $("button").click(function(){
		var year_op = $( "#year-option" ).val();
		var gender_op = $( "#gender-option" ).val();
		$('#table').empty();
		$('#table').append('<tr><th>NAMES</th><th> RANKINGS</th><th>GENDER</th><th>YEAR</th></tr>').addClass('table');
			
		$.ajax({
			type: "GET",
			url: "babynames.php",
			dataType: 'json',    
			data: {
				year: year_op,
				gender: gender_op
			},
			// this has the main code for entering the table
			success: function (names) {
				if(Object.keys(names).length > 0) {
				var count = 0;
				var i = 0;
				while(count < 1000 && i<1000){
					$('#table').append('<tr><td>'+names[i][0]+'</td><td>'+names[i][1]+'</td><td>'+names[i][2]+'</td><td>'+names[i][3]+'</td></tr>').addClass('table');
						count++;
					i++;
				}
				
			
				}
		}
});
		
    });
});