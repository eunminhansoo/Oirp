function search() {
	// Declare variables 
	var input, filter, table, tr, td, i;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table_in = document.getElementById("tbl_student_in");
	table_out = document.getElementById("tbl_student_out");
	tr_in = table_in.getElementsByTagName("tr");
	tr_out = table_out.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr_in.length; i++) {
		td = tr_in[i].getElementsByTagName("td")[0];
		td1 = tr_in[i].getElementsByTagName("td")[1];
		td2 = tr_in[i].getElementsByTagName("td")[2];
		td3 = tr_in[i].getElementsByTagName("td")[3];
		td4 = tr_in[i].getElementsByTagName("td")[4];
		if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr_in[i].style.display = "";
			} else {
				if (td1) {
					if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr_in[i].style.display = "";
					} else {
						if(td2){
							if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
								tr_in[i].style.display = "";
							} else{
								if(td3){
									if(td3.innerHTML.toUpperCase().indexOf(filter) > -1){
										tr_in[i].style.display = "";
									} else{
										if(td4){
											if(td4.innerHTML.toUpperCase().indexOf(filter) > -1){
												tr_in[i].style.display = "";
											} else{
												tr_in[i].style.display = "none";
											}
										}
									}
								}
							}
						}
					}
				}
			}
		} 
	}


			

 	for (i = 0; i < tr_out.length; i++) {
	    td = tr_out[i].getElementsByTagName("td")[0];
	    td1 = tr_out[i].getElementsByTagName("td")[1];
	    td2 = tr_out[i].getElementsByTagName("td")[2];
	    td3 = tr_out[i].getElementsByTagName("td")[3];
	    td4 = tr_out[i].getElementsByTagName("td")[4];

	    if (td) {
			if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
				tr_out[i].style.display = "";
			} else {
				if (td1) {
					if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr_out[i].style.display = "";
					} else {
						if(td2){
							if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
								tr_out[i].style.display = "";
							} else{
								if(td3){
									if(td3.innerHTML.toUpperCase().indexOf(filter) > -1){
										tr_out[i].style.display = "";
									} else{
										if(td4){
											if(td4.innerHTML.toUpperCase().indexOf(filter) > -1){
												tr_out[i].style.display = "";
											} else{
												tr_out[i].style.display = "none";
											}
										}
									}
								}
							}
						}
					}
				}
			}
		} 
 	}
}