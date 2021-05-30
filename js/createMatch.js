$(document).ready(function () {

	$('.createMatch').on('click', function(e){
	   e.preventDefault();
	   alert("asagasu");
	   var teamId1 = $('.team_one_side option:selected').attr('team-id');
	   var teamId2 = $('.team_other_side option:selected').attr('team-id');
	   var tournamentId = $('.tournamentSelect option:selected').attr('tournament-id');
	   $.ajax({
	       url:'index.php?create-match=true',
	       type:'post',
	       dataType:'json',
	       data:{
	           'createMatch':true,
	           'tournamentId':tournamentId,
	           'teamId1':teamId1,
	           'teamId2':teamId2
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
	});

	$('.tournamentSelect').on('change', function(e){
	   e.preventDefault();
	  	var tournamentId = $('.tournamentSelect option:selected').attr('tournament-id');
	   $.ajax({
	       url:'index.php?create-match=true',
	       type:'post',
	       dataType:'json',
	       data:{
	           'getTournamentTeams':true,
	           'tournamentId':tournamentId
	       },
	       success:function(response){
	       	var data = response;
	       	// var teams = JSON.parse(data);
	       	// console.log(teams);
	       	// return false;
	       	data.each(function(){
	       		var option = '<option></option>';
	       		option.html(teams.teamName);
	       		option.attr('team-id',id);
	       	})
	        
	       }
	   })
	})
	
});