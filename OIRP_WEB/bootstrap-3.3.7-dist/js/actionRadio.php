<script>
	$(document).ready(function(){
		var bilaScholarloan = "<?php echo $getSel_SCHOLARSHIP_TEXT_OUTBOUND?>";

		$("#scholarshipOptions").hide();
		$("#bilateralOptions").hide();
		$("#scholarloanrow").hide();

		$('#proBilateral').click(function(){
			var radioscholarBila = "<?php echo $getSel_SCHOLARSHIP_OUTBOUND?>";

			$("#bilateralOptions").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#1year").prop('disabled', false);
			$("#1sem").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);

			// document.getElementById('scholarloanText').value = bilaScholarloan;
			if(document.getElementById('proBilateral').checked == true){

				if(radioscholarBila){
					$(':radio[name=scholarloan][value='+ radioscholarBila +']').prop('checked', true);
				}

				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}

				var radioBilaOption = "<?ph echo $getSel_APPLICATION_FORM?>";
				if(radioBilaOption){
					$(':radio[name=bilateral][value'+radioBilaOption+']').prop('checked', true);
				}
			}
		});

		$('#proScholar').click(function(){
	        $("#scholarshipOptions").show();
	        $("#bilateralOptions").hide();
	        $("#scholarloanrow").hide();
	        $("#proText").prop('disabled', true);
			$("#scholarshipAIMS").prop('disabled', false);
			$("#scholarshipSHARE").prop('disabled', false);
			$("#scholarshipOthers").prop('disabled', false);

			var radioScholar = "<?php echo $getSel_APPLICATION_FORM?>";
			if(radioScholar == 'AIMS' || radioScholar == 'SHARE'){
				if(radioScholar){
					$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
					document.getElementById('scholarshipText').value = " ";				
				}
			}else{
				if(radioScholar != 'AIMS' || radioScholar != 'SHARE'){
					$(':radio[id=scholarshipOthers]').prop('checked', true);
					if(document.getElementById('scholarshipOthers').checked == true){
						$("#scholarshipText").prop('disabled', false);
					}
				}
			}

			$('#scholarshipOthers').click(function(){
        	    $("#scholarshipText").prop('disabled', false);
			});
        });

		var getradio = "<?php echo $getSel_APPLICATION_TYPE_PROG?>";
		if (getradio) { // check if variable is empty or not
			$(":radio[name=type_program][value="+ getradio +"]").prop('checked', true);
		}

		if(document.getElementById('proBilateral').checked == true){
			document.getElementById('proText').value = " ";
			$("#bilateralOptions").show();
			$("#bilateralOptions1").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#proText").prop('disabled', true);
			$("#1year").prop('disabled', false);
			$("#1sem").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);

			var radioscholarBila = "<?php echo $getSel_SCHOLARSHIP_OUTBOUND?>";
			if(radioscholarBila){
				$(':radio[name=scholarloan][value='+ radioscholarBila +']').prop('checked', true);
			}

			if(document.getElementById('scholarloanYes').checked == true){
				$("#scholarloanText").prop('disabled', false);
			}

			var radioBilaOption = "<?ph echo $getSel_APPLICATION_FORM?>";
			if(radioBilaOption){
				$(':radio[name=bilateral][value'+radioBilaOption+']').prop('checked', true);
			}
		}
		
		if(document.getElementById('proScholar').checked == true){
			document.getElementById('proText').value = " ";
			$("#scholarshipOptions").show();
	        $("#bilateralOptions").hide();
	        $("#scholarloanrow").hide();
	        $("#proText").prop('disabled', true);
			$("#scholarshipAIMS").prop('disabled', false);
			$("#scholarshipSHARE").prop('disabled', false);
			$("#scholarshipOthers").prop('disabled', false);

			var radioScholar = "<?php echo $getSel_APPLICATION_FORM?>";
			if(radioScholar == 'AIMS' || radioScholar == 'SHARE'){
				if(radioScholar){
					$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
					document.getElementById('scholarshipText').value = " ";				
				}
			}else{
				if(radioScholar != 'AIMS' || radioScholar != 'SHARE'){
					$(':radio[id=scholarshipOthers]').prop('checked', true);
					if(document.getElementById('scholarshipOthers').checked == true){
						$("#scholarshipText").prop('disabled', false);
					}
				}
			}
		}	
	});
</script>