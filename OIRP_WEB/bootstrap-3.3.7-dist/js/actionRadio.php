<script>
	$(document).ready(function(){

		$("#scholarshipOptions").hide();
		$("#bilateralOptions").hide();
		$("#scholarloanrow").hide();
		$("#scholarloanrow1").hide();

		$('#proBilateral').click(function(){

			$("#bilateralOptions").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#scholarloanrow1").hide();
			$('#proText').prop('disabled', true);
			$("#1year").prop('disabled', false);
			$("#1sem").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);

			$('#scholarloanYes').click(function(){
				$("#scholarloanText").prop('disabled', false);
				document.getElementById('scholarshipText').value = " ";
			});

			var radioBilaOption = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioscholarBilaOption = "<?php echo $getSel_SCHOLARSHIP_LOAN?>";
			
			if(radioscholarBilaOption){
				$(':radio[name=scholarloan][value='+ radioscholarBila +']').prop('checked', true);
				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}
			}

			if(radioBilaOption){
				$(':radio[name=bilateral][value'+radioBilaOption+']').prop('checked', true);
			}
			
		});

		$('#proScholar').click(function(){
	        $("#scholarshipOptions").show();
	        $("#bilateralOptions").hide();
	        $("#scholarloanrow").hide();
			$("#scholarloanrow1").hide();
	        $("#proText").prop('disabled', true);
			$("#scholarshipAIMS").prop('disabled', false);
			$("#scholarshipSHARE").prop('disabled', false);
			$("#scholarshipOthers").prop('disabled', false);

			$('#scholarshipOthers').click(function(){
        	    $('#scholarshipText').prop('disabled', false);
			});

			var radioScholar = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioScholarOther = "<?php echo $getSel_TYPE_OF_FORM_OTHER?>";
			if(radioScholar == 'OTHERS'){
				$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
				$('#scholarshipText').prop('disabled', false);
			}else{
				$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
			}
        });

		$('#proOthers').click(function(){
        	$("#bilateralOptions").hide();
            $("#scholarshipOptions").hide();
			$("#scholarloanrow").hide();
            $("#scholarloanrow1").show();
        	$("#proText").prop('disabled', false);
			$("#scholarloanYes1").prop('disabled', false);
			$("#scholarloanNo1").prop('disabled', false);
			$('#scholarloanText1').prop('disabled', true);
			
			$('#scholarloanYes1').click(function(){
				$("#scholarloanText1").prop('disabled', false);
			});

			var radioOther = "<?php echo $getSel_TYPE_OF_PROGRAM?>";
			var radioOtherSholarLoan = "<?php echo $getSel_SCHOLARSHIP_LOAN1?>";
			
			if(radioOther == 'Others'){
				$("#scholarloanText1").prop('disabled', false);
			}
			
			if(radioOtherSholarLoan){
				$(':radio[name=scholarloan1][value='+ radioOtherSholarLoan +']').prop('checked', true);
				if(document.getElementById('scholarloanYes1').checked == true){
					$("#scholarloanText1").prop('disabled', false);
				}else{
					if(document.getElementById('scholarloanNo1').checked == true){
						$("#scholarloanText1").prop('disabled', true);
					}
				}
			}
        });

		var getProgType = "<?php echo $getSel_TYPE_OF_PROGRAM?>";
		if (getProgType) { // check if variable is empty or not
			$(":radio[name=type_program][value="+ getProgType +"]").prop('checked', true);
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

			var radioBilaOption = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioscholarBilaOption = "<?php echo $getSel_SCHOLARSHIP_LOAN?>";
			
			if(radioscholarBilaOption){
				$(':radio[name=scholarloan][value='+ radioscholarBilaOption +']').prop('checked', true);

				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}
			}

			if(radioBilaOption){
				$(':radio[name=bilateral][value'+ radioBilaOption +']').prop('checked', true);
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

			$('#scholarshipOthers').click(function(){
        	    $('#scholarshipText').prop('disabled', false);
			});

			var radioScholar = "<?php echo $getSel_TYPE_OF_FORM?>";
			if(radioScholar == 'OTHERS'){
				$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
				$('#scholarshipText').prop('disabled', false);
			}else{
				$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
			}
		}

		if(document.getElementById('proOthers').checked == true){
			document.getElementById('scholarshipText').value = " ";
			$("#bilateralOptions").hide();
            $("#scholarshipOptions").hide();
			$("#scholarloanrow").hide();
            $("#scholarloanrow1").show();
        	$("#proText").prop('disabled', false);
			$("#scholarloanYes1").prop('disabled', false);
			$("#scholarloanNo1").prop('disabled', false);

			$('#scholarloanYes1').click(function(){
				$("#scholarloanText1").prop('disabled', false);
			});

			var radioOther = "<?php echo $getSel_TYPE_OF_PROGRAM?>";
			var radioOtherSholarLoan = "<?php echo $getSel_SCHOLARSHIP_LOAN1?>";
			
			if(radioOther == 'Others'){
				$("#scholarloanText1").prop('disabled', false);
			}
			
			if(radioOtherSholarLoan){
				$(':radio[name=scholarloan1][value='+ radioOtherSholarLoan +']').prop('checked', true);
				if(document.getElementById('scholarloanYes1').checked == true){
					$("#scholarloanText1").prop('disabled', false);
				}else{
					if(document.getElementById('scholarloanNo1').checked == true){
						$("#scholarloanText1").prop('disabled', true);
					}
				}
			}
		}	
	});
</script>