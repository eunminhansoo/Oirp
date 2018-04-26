<script>
	$(document).ready(function(){
		document.getElementById('scholarshipText').value = " ";
		$("#bilateralOptions").hide();
		$('#scholarshipOptions').hide();
		$("#scholarloanrow").hide();
		$("#scholarloanrow1").hide();
		$("#scholarloanrow2").hide();

		$("#proScholar").click(function(){
			$("#scholarshipOptions").show();
	        $("#bilateralOptions").hide();
	        $("#scholarloanrow").hide();
			$("#scholarloanrow1").hide();
	        $("#proText").prop('disabled', true);
			$("#scholarshipAIMS").prop('disabled', false);
			$("#scholarshipSHARE").prop('disabled', false);
			$("#scholarshipUMAP").prop('disabled', false);
			$("#scholarshipOthers").prop('disabled', false);
			$(':radio[name=scholarloan1]').prop('checked', false);
			$(':radio[name=bilateral]').prop('checked', false);
			$(':radio[name=scholarloan]').prop('checked', false);

			$('#scholarshipOthers').click(function(){
        	    $('#scholarshipText').prop('disabled', false);
        	    $("#sharediv").hide();
    			$("#countrydiv").show();
			});

			$('#scholarshipAIMS').click(function(){
				 $('#scholarshipText').prop('disabled', true);
        	    $("#sharediv").hide();
    			$("#countrydiv").show();
			});

			$('#scholarshipSHARE').click(function(){
        	    $('#scholarshipText').prop('disabled', true);
			});

			$('#scholarshipUMAP').click(function(){
				$('#scholarshipText').prop('disabled', true);
        	    $("#sharediv").hide();
    			$("#countrydiv").show();
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

		$('#ShortStudy').click(function(){

			$("#bilateralOptions").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#scholarloanrow1").hide();
			$("#sharediv").hide();
			$("#countrydiv").show();
			$('#proText').prop('disabled', true);
			$("#1sem").prop('disabled', false);
			$("#othersBi").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);
			
			$(':radio[name=scholarship]').prop('checked', false);
			$(':radio[name=scholarloan1]').prop('checked', false);

			$('#othersBi').click(function(){
				$("#biText").prop('disabled', false);
			});

			$('#1sem').click(function(){
				$("#biText").prop('disabled', true);
				document.getElementById('biText').value = " ";
			});

			$('#scholarloanYes').click(function(){
				$("#scholarloanText").prop('disabled', false);
				document.getElementById('scholarshipText').value = " ";
			});

			var radioBilaOption = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioBilaOther = "<?php echo $getSel_TYPE_OF_FORM_OTHER ?>"
			var radioscholarBilaOption = "<?php echo $getSel_SCHOLARSHIP_LOAN?>";
			
			if(radioscholarBilaOption){
				$(':radio[name=scholarloan][value='+ radioscholarBilaOption +']').prop('checked', true);

				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}
			}

			if(radioBilaOption == "1 Sem"){
				radioBilaOption = "1sem";
				if(radioBilaOption){
					$(':radio[name=bilateral][id='+radioBilaOption+']').prop('checked', true);
				}
			}else if(radioBilaOption == "Others"){
				if(radioBilaOption){
					$(':radio[name=bilateral][value='+radioBilaOption+']').prop('checked', true);
				}
				$("#biText").prop('disabled', false);
			}

		});
		$('#StudyTour').click(function(){

			$("#bilateralOptions").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#scholarloanrow1").hide();
			$("#sharediv").hide();
			$("#countrydiv").show();
			$('#proText').prop('disabled', true);
			$("#1sem").prop('disabled', false);
			$("#othersBi").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);
			
			$(':radio[name=scholarship]').prop('checked', false);
			$(':radio[name=scholarloan1]').prop('checked', false);

			$('#othersBi').click(function(){
				$("#biText").prop('disabled', false);
			});

			$('#1sem').click(function(){
				$("#biText").prop('disabled', true);
				document.getElementById('biText').value = " ";
			});

			$('#scholarloanYes').click(function(){
				$("#scholarloanText").prop('disabled', false);
				document.getElementById('scholarshipText').value = " ";
			});

			var radioBilaOption = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioBilaOther = "<?php echo $getSel_TYPE_OF_FORM_OTHER ?>"
			var radioscholarBilaOption = "<?php echo $getSel_SCHOLARSHIP_LOAN?>";
			
			if(radioscholarBilaOption){
				$(':radio[name=scholarloan][value='+ radioscholarBilaOption +']').prop('checked', true);

				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}
			}

			if(radioBilaOption == "1 Sem"){
				radioBilaOption = "1sem";
				if(radioBilaOption){
					$(':radio[name=bilateral][id='+radioBilaOption+']').prop('checked', true);
				}
			}else if(radioBilaOption == "Others"){
				if(radioBilaOption){
					$(':radio[name=bilateral][value='+radioBilaOption+']').prop('checked', true);
				}
				$("#biText").prop('disabled', false);
			}
		});
		$('#ServiceLearning').click(function(){

			$("#bilateralOptions").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#scholarloanrow1").hide();
			$("#sharediv").hide();
			$("#countrydiv").show();
			$('#proText').prop('disabled', true);
			$("#1sem").prop('disabled', false);
			$("#othersBi").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);
			
			$(':radio[name=scholarship]').prop('checked', false);
			$(':radio[name=scholarloan1]').prop('checked', false);

			$('#othersBi').click(function(){
				$("#biText").prop('disabled', false);
			});

			$('#1sem').click(function(){
				$("#biText").prop('disabled', true);
				document.getElementById('biText').value = " ";
			});

			$('#scholarloanYes').click(function(){
				$("#scholarloanText").prop('disabled', false);
				document.getElementById('scholarshipText').value = " ";
			});

			var radioBilaOption = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioBilaOther = "<?php echo $getSel_TYPE_OF_FORM_OTHER ?>"
			var radioscholarBilaOption = "<?php echo $getSel_SCHOLARSHIP_LOAN?>";
			
			if(radioscholarBilaOption){
				$(':radio[name=scholarloan][value='+ radioscholarBilaOption +']').prop('checked', true);

				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}
			}

			if(radioBilaOption == "1 Sem"){
				radioBilaOption = "1sem";
				if(radioBilaOption){
					$(':radio[name=bilateral][id='+radioBilaOption+']').prop('checked', true);
				}
			}else if(radioBilaOption == "Others"){
				if(radioBilaOption){
					$(':radio[name=bilateral][value='+radioBilaOption+']').prop('checked', true);
				}
				$("#biText").prop('disabled', false);
			}
		});

		var getProgType = "<?php echo $getSel_TYPE_OF_PROGRAM?>";
		if (getProgType) { // check if variable is empty or not
			$(":radio[name=type_program][value="+ getProgType +"]").prop('checked', true);
		}

		if(document.getElementById('proScholar').checked == true){
			$("#scholarshipOptions").show();
	        $("#bilateralOptions").hide();
	        $("#scholarloanrow").hide();
			$("#scholarloanrow1").hide();
	        $("#proText").prop('disabled', true);
			$("#scholarshipAIMS").prop('disabled', false);
			$("#scholarshipSHARE").prop('disabled', false);
			$("#scholarshipUMAP").prop('disabled', false);
			$("#scholarshipOthers").prop('disabled', false);
			$(':radio[name=scholarloan1]').prop('checked', false);
			$(':radio[name=bilateral]').prop('checked', false);
			$(':radio[name=scholarloan]').prop('checked', false);

			$('#scholarshipOthers').click(function(){
        	    $('#scholarshipText').prop('disabled', false);
        	    $("#sharediv").hide();
    			$("#countrydiv").show();
			});

			$('#scholarshipAIMS').click(function(){
				 $('#scholarshipText').prop('disabled', true);
        	    $("#sharediv").hide();
    			$("#countrydiv").show();
			});

			$('#scholarshipSHARE').click(function(){
        	    $('#scholarshipText').prop('disabled', true);
			});

			$('#scholarshipUMAP').click(function(){
				$('#scholarshipText').prop('disabled', true);
        	    $("#sharediv").hide();
    			$("#countrydiv").show();
			});

			var radioScholar = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioScholarOther = "<?php echo $getSel_TYPE_OF_FORM_OTHER?>";
			if(radioScholar == 'OTHERS'){
				$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
				$('#scholarshipText').prop('disabled', false);
				document.getElementById('scholarshipText').value = radioScholarOther ;
			}else{
				$(':radio[name=scholarship][value='+ radioScholar +']').prop('checked', true);
				$('#scholarshipText').prop('disabled', true);
			}
		}

		if(document.getElementById('ShortStudy').checked == true || document.getElementById('StudyTour').checked == true || document.getElementById('ServiceLearning').checked == true){
			$("#bilateralOptions").show();
			$("#scholarshipOptions").hide();
			$("#scholarloanrow").show();
			$("#scholarloanrow1").hide();
			$("#sharediv").hide();
			$("#countrydiv").show();
			$('#proText').prop('disabled', true);
			$("#1sem").prop('disabled', false);
			$("#othersBi").prop('disabled', false);
			$("#shortStudy").prop('disabled', false);
			$("#scholarloanYes").prop('disabled', false);
			$("#scholarloanNo").prop('disabled', false);
			
			$(':radio[name=scholarship]').prop('checked', false);
			$(':radio[name=scholarloan1]').prop('checked', false);

			$('#othersBi').click(function(){
				$("#biText").prop('disabled', false);
			});

			$('#1sem').click(function(){
				$("#biText").prop('disabled', true);
				document.getElementById('biText').value = " ";
			});

			$('#scholarloanYes').click(function(){
				$("#scholarloanText").prop('disabled', false);
				document.getElementById('scholarshipText').value = " ";
			});

			var radioBilaOption = "<?php echo $getSel_TYPE_OF_FORM?>";
			var radioBilaOther = "<?php echo $getSel_TYPE_OF_FORM_OTHER ?>"
			var radioscholarBilaOption = "<?php echo $getSel_SCHOLARSHIP_LOAN?>";
			
			if(radioscholarBilaOption){
				$(':radio[name=scholarloan][value='+ radioscholarBilaOption +']').prop('checked', true);

				if(document.getElementById('scholarloanYes').checked == true){
					$("#scholarloanText").prop('disabled', false);
				}
			}

			if(radioBilaOption == "1 Sem"){
				radioBilaOption = "1sem";
				if(radioBilaOption){
					$(':radio[name=bilateral][id='+radioBilaOption+']').prop('checked', true);
				}
			}else if(radioBilaOption == "Others"){
				if(radioBilaOption){
					$(':radio[name=bilateral][value='+radioBilaOption+']').prop('checked', true);
					document.getElementById('biText').value = radioBilaOther;
				}
				$("#biText").prop('disabled', false);
			}
		}
	});
</script>