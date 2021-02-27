<?php
// Add the details for your MySQL database
$dbserver = "localhost";   // The IP address or domain name of the database server
$database = "selfoss";              // The name of the database
$username = "selfoss";              // The username for the database
$dbpwd    = "selfosspass";       // The password for the database user
$dbcharset = "utf8mb4";		// The charset.  Specify if you want to override

$npName = "Juan's Daily Post";   // The name of your Newspaper
$font   = "blog-header-logo";       // Use either "blog-header-logo" or "blog-header-logo-old" for a more old-fashioned font for the title

$smar = 10;                         // The number of seconds to wait before an article is marked as read
$imto = 10;                         // The timeout for error/info messages to disappear
$artno = 15;                        // The number of articles to be shown left/right of an article
$artrf = 600;                       // Number of seconds to refresh the articles left/right

// The array holds various values. 
//   1. The term to display on the page with capitalized letters and possible spaces
//   2. The second used for the tags and should not contain spaces, should be all lower case and correspond to the tags used in Selfoss
//   3. The interval in seconds to refresh the tag
//   4. The number of characters to display, before the article is cut-off
//   5. The number of articles to show in the listing
//   There is one value for the Jumbotron with the value Top/top.
$tags = array (
    array ("World", "world", 600, 1024, 15),
    array ("US", "us", 600, 1024, 15),
    array ("Business", "biz", 600, 1024, 15),
    array ("Insurance", "insurance", 600, 1024, 15),
    array ("Swift", "swift", 600, 1024, 15),
    array ("Automation", "automation", 600, 1024, 15),
    array ("Politics", "politics", 600, 1024, 15),
    array ("Science", "science", 600, 1024, 15),
    array ("Technology", "technology", 600, 99999, 5),
    array ("Travel", "travel", 600, 99999, 5),
    array ("Movies & TV", "film", 600, 99999, 5),
    array ("Top", "top", 600, 1024, 5));

$jTags = "[";
foreach ($tags as $row) {
   $jTags = $jTags . "{ 'tag' : '" . $row[1] . "', 'itv' : " . $row[2] . ", 'mlen' : " . $row[3] . ", 'nrec' : " . $row[4] . ", 'name' : '" . $row[0] . "' },\r\n";
}
$jTags = substr($jTags, 0, strlen($jTags)-3) . "];\r\n";
?>
