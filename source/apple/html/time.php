<?php


unLock('2023-01-28 17:09:00');
       echo "(2023-01-28 17:09:00) <br/>";
unLock('2023-01-29 07:09:00');
 echo "(2023-01-29 07:09:00) <br/>";
unLock('2023-01-28 23:09:00');
 echo "(2023-01-28 23:09:00) <br/>";
unLock('2023-03-20 05:09:00');
 echo "(2023-03-20 05:09:00) <br/>";
unLock('2023-02-22 11:09:00');
 echo "(2023-02-22 11:09:00) <br/>";

function unLock($endTime)
{
 $tz = 'Africa/Douala';
                          $timestamp = time();
                          $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
                          $dt->setTimestamp($timestamp); //adjust the object to correct timestamp/
                          //$dt->format('d.m.Y, H:i:s');


                          $genere=$dt->format('d/m/Y, H:i');
                          $phpdate=$dt->format('Y-m-d H:i:s');
	
if(!empty($endTime))
{
	
	if (preg_match("/^(\d{4})-(\d{2})-(\d{2}) ([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/", $endTime)) 
        {
			
$rem = strtotime($endTime) - strtotime($phpdate); //'2023-01-28 15:45:00'
if($rem<=0)
{
	echo "OPEN";
}
else
{
	
$day = floor($rem / 86400);
$hr  = floor(($rem % 86400) / 3600);
$min = floor(($rem % 3600) / 60);
$sec = ($rem % 60);

echo "Unlock in: <br\>";
if($day) echo "$day Days ";
if($hr) echo "$hr h ";
if($min) echo "$min min ";
if(isset($sec)) echo "$sec s ";

}

}
else
{
	echo "Invalite time given";
}


}
else
{
	echo "No time given";
}
}
  ?>