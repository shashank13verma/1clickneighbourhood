<?php 
$hostname="localhost";
$user="root";
$pass="root";
$db_name="1clickneighbourhood";

$con=mysql_connect("$hostname","$user","$pass");
$db_selected=mysql_select_db("$db_name");

$per_page = 3; 

//get the total number of records ( rows ) for calulating pagination

$sql = "select * from society_pics";
$rs=mysql_query($sql);
$count=mysql_num_rows($rs);

//echo $count;
//calculate number of pages
$pages = ceil( $count / $per_page );
//echo $pages;

$page = isset( $_GET[ 'page' ] ) ? $_GET[ 'page' ] : 0 ;

//set the starting point 
$start = ( $page - 1 ) * $per_page;

//find the curpage - so you can set a class to highlight the navigaion
$curpag = ( $start == 0 ) ? 1 : ( $start / $per_page ) + 1 ; 

/*if (isset($_GET['curpag']) && is_numeric($_GET['curpag'])) {
	// cast var as int
	$curpag = (int) $_GET['curpag'];
} else {
	// default page num
	$curpag = 1;
} // end if*/

/*if ($curpag > $pages) {
	$curpag = $pages;
}
if ($curpag < 1) {
	// set current page to first page
	$curpag = 1;
} // e

$offset = ($curpag - 1) * per_page;
*/

//fetch the table contents
$sql = "select * from society_pics order by id limit $start, $per_page";
$rs = mysql_query( $sql );

		//display the table
		while( $row = mysql_fetch_array( $rs ))
		{?>
			<img src="view/socgallery/images/<?php echo $row['file_name'];?>" style="height:150px;width:180px;"/>
			
			<?php 
			echo $row['comments'];
		} 
	//	$range = 3;
		
		echo "</table>";
		echo '<div id="navig"><ul id="pages">';
		/*if ($curpag > 1) {
			echo " <a href='{$_SERVER['PHP_SELF']}?curpag=1'><<</a> ";
			$prevpage = $curpag - 1;
			echo " <a href='{$_SERVER['PHP_SELF']}?curpag=$prevpage'><</a> ";
			}*/
		/*	for ($x = ($curpag - $range); $x < (($curpag + $range) + 1); $x++) {
				// if it's a valid page number...
				if (($x > 0) && ($x <= $pages)) {
					// if we're on current page...
					if ($x == $curpag) {
						// 'highlight' it but don't make a link
						echo " [<b>$x</b>] ";
						// if not current page...
					} else {
					// make it a link
						echo " <a href='{$_SERVER['PHP_SELF']}?curpag=$x'>$x</a> ";
					} // end else
					} // end if
				} //*/
		for( $i = 1; $i <= $pages; $i++ )
		{
					if( $i == $curpag )
						echo '<li class="curpage" id="'.$i.'">'.$i.'</li>';
					else
						echo '<li id="'.$i.'">'.$i.'</li>';
		}
		echo '</ul></div></div>'; 

?>


