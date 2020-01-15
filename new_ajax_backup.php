<?include_once("newcoms/function.php");
include_once("newcoms/Database.php");
include_once("newcoms/jdf.php");
error_reporting(E_ERROR | E_PARSE);
	$db_name=injection_replace($_POST['db_name']);
	$db_pass=injection_replace($_POST['db_pass']);
	$db_user=injection_replace($_POST['db_user']);
	$host=injection_replace($_POST['host']);
	$file_name=injection_replace($_POST['file_name']);
	include_once("new_Mysqldump.php");
	
	
use Ifsnop\Mysqldump as IMysqldump;

$dumpSettings = array(
    'compress' => IMysqldump\Mysqldump::NONE,
    'no-data' => false,
    'add-drop-table' => true,
    'single-transaction' => true,
    'lock-tables' => true,
    'add-locks' => true,
    'extended-insert' => false,
    'disable-keys' => true,
    'skip-triggers' => false,
    'add-drop-trigger' => true,
    'databases' => false,
    'add-drop-database' => false,
    'hex-blob' => true,
    'no-create-info' => false,
    'where' => ''
    );

    
$dumpSettings['default-character-set'] = IMysqldump\Mysqldump::UTF8MB4;

$dump = new IMysqldump\Mysqldump(
    "$db_name",
    "$db_user",
    "$db_pass",
    "localhost",
    "mysql",
    $dumpSettings);
$temp=md5(time());
$dump->start("db_backup/$file_name$temp.sql");
if(filesize("db_backup/$file_name$temp.sql")>100){
			$query1="insert into new_backup(date,name) 
			values (NOW(),'$file_name$temp')";
			$coms_conect->query($query1);
			echo 1;
}	

?>