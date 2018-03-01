<?php
/*Get Timestamp for our Timezone
Eastern ........... America/New_York
Central ........... America/Chicago
Mountain .......... America/Denver
Mountain no DST ... America/Phoenix
Pacific ........... America/Los_Angeles
Alaska ............ America/Anchorage
Hawaii ............ America/Adak
Hawaii no DST ..... Pacific/Honolulu*/

date_default_timezone_set("America/New_York");                  //setting the time zone to Eastern
echo date("Y-m-d H:i:s");

?>