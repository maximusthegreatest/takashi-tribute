$(function() {

$('.title').mouseenter(function(){
	$('#landing').toggleClass('filter');

	var colors = [
	'#83ff49', '#ff8500', '#ff55bf', '#33f1ff', '#feee1c'
	];
	//this splits each letter into an array letters
	var letters = $('#innertitle').text().trim().split("");
	$('#innertitle').empty();
	var content = '';
	//give each letter in array a span with style of one from color array
	for(var i = 0; i < letters.length; i++) {
		var color = colors[Math.floor(Math.random() * colors.length)];
		content += '<span style="color: '+ color + '">' + letters[i] + '</span>';
	}

	//console.log(content);

	$('#innertitle').append(content);

});


$('.title').mouseleave(function(){
	$('#innertitle').empty();
	$('#landing').toggleClass('filter');
	$('#innertitle').append('Takashi Murakami');

});


function slideWork() {
  $( "#fadeWork1" ).slideDown( "slow", function() {
    // Animation complete.
  });

  // $(".workdiv").removeClass('noshow');
  // $(".workdiv").addClass('inline');

}

slideWork();


$('.switch').click(function(){
	
	//if #fadeWork1 is displayed && fadework2 !displayed {
		//then slidetoggle #fadework1 and slideToggle fadework2 on delay

	//if #fadeWork2 is displayed && fadework1 !displayed {
		//then slidetoggle #fadework2 and slideToggle fadework1 on delay


		



	if( $('#fadeWork1').is(':visible') && !$('#fadeWork2').is(':visible')){
		$('#fadeWork1').slideToggle("slow", function(){
		//slide it up
		});
		$('#fadeWork2').delay( 800 ).slideToggle("slow", function(){
		//slide down the second class
		});

	}

	else if( $('#fadeWork2').is(':visible') && !$('#fadeWork1').is(':visible')){
		
		$('#fadeWork2').slideToggle("slow", function(){
		//slide it up
		});
		$('#fadeWork1').delay( 800 ).slideToggle("slow", function(){
		//slide down the second class
		});

	}
});




});