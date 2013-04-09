<html>

<head>
	<title>Society Gallery</title>
	<link rel="stylesheet" href="css/style-pagination.css" type="text/css" >
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
	$( document ).ready(function() {
		
		//Display Loading Image - Animated Gif
	function display_anim( )
	{
		$( '#loading' ).fadeIn( 200,0 );
		$( '#loading' ).html( '<img src="images/ajax-loader.gif" />' );  
	}
	
	//Hide Loading Image
	function hide_anim( )
	{
		$( '#loading').fadeOut( 'slow' );
	};
	
	//initialise the table at the first run
	display_anim( );
	$( '#content' ).load( "view/socgallery/pagination.php?page=1", hide_anim( ) );

	//Page navigation Click
	$( document ).on( 'click', '#pages li',  function( ) {
			
		display_anim( );
		
		//get the id of clicked li
		var pageNum = $(this ).attr('id');
		
		//Loading Data
		$( "#content" ).load( "view/socgallery/pagination.php?page=" + pageNum, function( ) {
			
				//display the table with fadeIn effect.
				$( this ).hide( ).fadeIn( 500 );
				
				hide_anim( );
			
			});
	
	});
	
	
});
</script>
	
</head>
<body>
<div align="center">
	<div id="content" ></div> <!-- div for table display -->
	<div id="loading" ></div> <!-- div for loading animation ( gif image ) -->
	<div class="clr"></div>
</div>	
	
</body>
</html>
