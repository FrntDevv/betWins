$(document).ready(function () {

	$('.updateMatchDetailsBtn').on('click', function(e){
	   e.preventDefault();
	   
	})

	$('.custom-select').on('change', function(){
		var contestId = $(this).find(":selected").attr('contest-id');
		if(contestId==5){
			var fieldName ='';
			var playerId1 = $('.mostRunTeam1 option:selected').attr('selected-id');
			var playerId2 = $('.mostRunTeam2 option:selected').attr('selected-id');
			if (playerId1&&playerId2>0) {
				updateMatch(contestId,playerId1,playerId2);
			}else{
				alert('Select second Team Player');
			}
		}else if(contestId==6){
			var playerId1 = $('.mostWicketTeam1 option:selected').attr('selected-id');
			var playerId2 = $('.mostWicketTeam2 option:selected').attr('selected-id');
			if (playerId1&&playerId2>0) {
				updateMatch(contestId,playerId1,playerId2);
			}else{
				alert('Select second Team Player');
			}
		}else{
			var fieldValue = $(this).find(":selected").attr('selected-id');
			updateMatchByTeam(contestId,fieldValue);
		}
		console.log(playerId1,playerId2);
	})
	// $('.bidAmount').on('change', function(){
	// 	var multiplier = $('.checkedMark').parent().find('multiplier').val();
	// 	alert(multiplier);
	// 	//var expextedAmount = 
	// });
	function updateMatch(contestId,playerId1,playerId2){
		$.ajax({
	       url:'index.php?update-match-result=true',
	       type:'post',
	       dataType:'json',
	       data:{
	           'updateMatchResult':true,
	           'contestId':contestId,
	           'playerId1':playerId1,
	           'playerId2':playerId2,
	       },
	       success:function(response){
	        if(response.success=='true'){
	            window.location.reload();
	        }else{
	           alert(response.message);
	           window.location.reload();
	        } 
	       }
	   })
	}
	function updateMatchByTeam(contestId,teamId){
		$.ajax({
	       url:'index.php?update-match-result=true',
	       type:'post',
	       dataType:'json',
	       data:{
	           'updateMatchResult':true,
	           'contestId':contestId,
	           'teamId':teamId
	       },
	       success:function(response){
	        if(response.success=='true'){
	            window.location.reload();
	        }else{
	           alert(response.message);
	           window.location.reload();
	        } 
	       }
	   })
	}
});