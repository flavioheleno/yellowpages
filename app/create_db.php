<?php

/*
	This script is responsible to create and pre-fill the database (just a CREATE TABLE and a couple of INSERTs)
*/

echo "Database creation script\n";
try {
	$file = __DIR__.'/yellowpages.sqlite3';
	echo "Checking previous database existance..\n";
	if (file_exists($file)) {
		echo "File found, will replace it\n";
		unlink($file);
	} else
		echo "File not found, moving ahead with database creation\n";
	require_once __DIR__.'/db.class.php';
	$sql = new DB($file);
	echo "Database created\n";
	$sql->exec('CREATE TABLE `phonelist` (`firstname` TEXT, `lastname` TEXT, `phonenumber` TEXT PRIMARY KEY)');
	echo "Table created\n";
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Chandra\', \'Aubert\', \'8554217161\'), (\'Tanisha\', \'Thiessen\', \'8113103557\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Javier\', \'Crosbie\', \'8554122389\'), (\'Earlene\', \'Likes\', \'8224513843\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Loraine\', \'Mccubbin\', \'8334882397\'), (\'Clare\', \'Bochenek\', \'8112608395\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Nannie\', \'Riney\', \'8112850603\'), (\'Lilia\', \'Gregorio\', \'8552027008\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Marcie\', \'Look\', \'8444809496\'), (\'Julio\', \'Jaren\', \'8335277129\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Hugh\', \'Callaham\', \'8221167850\'), (\'Clinton\', \'Sabat\', \'8117844082\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tabatha\', \'Belizaire\', \'8114769676\'), (\'Lance\', \'Selders\', \'8115360507\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Odessa\', \'Selvey\', \'8556665455\'), (\'Sofia\', \'Brannock\', \'8993215743\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Milagros\', \'Silvernail\', \'8993041419\'), (\'Javier\', \'Demery\', \'8996021866\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Malinda\', \'Rexrode\', \'8224262878\'), (\'Eve\', \'Biron\', \'8116688207\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lonnie\', \'Sterns\', \'8996273666\'), (\'Lonnie\', \'Kleven\', \'8556482612\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Clare\', \'Kielbasa\', \'8448394725\'), (\'Saundra\', \'Row\', \'8112936491\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Carlene\', \'Belfield\', \'8337004262\'), (\'Sharron\', \'Harting\', \'8229240612\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Cody\', \'Gaskell\', \'8449102600\'), (\'Mallory\', \'Basaldua\', \'8225729216\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Cody\', \'Olivieri\', \'8229653720\'), (\'Dona\', \'Asper\', \'8445653226\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lance\', \'Borgman\', \'8331204985\'), (\'Rosalinda\', \'Fredericksen\', \'8556847558\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Darryl\', \'Alers\', \'8111718316\'), (\'Julio\', \'Corbell\', \'8558463308\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tania\', \'Stukes\', \'8990121944\'), (\'Kurt\', \'Janke\', \'8225706513\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Hugh\', \'Banton\', \'8220728280\'), (\'Clinton\', \'Rauscher\', \'8330311408\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Allie\', \'Hogge\', \'8115411911\'), (\'Neva\', \'Starbuck\', \'8448845878\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Noemi\', \'Constante\', \'8990212060\'), (\'Lonnie\', \'Lage\', \'8220717659\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Erik\', \'Cowher\', \'8118156920\'), (\'Hugh\', \'Bedsole\', \'8222380930\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Melisa\', \'Hadaway\', \'8444297874\'), (\'Clinton\', \'Shack\', \'8226295098\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tyrone\', \'Bowland\', \'8443168765\'), (\'Julianne\', \'Dankert\', \'8440093484\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tanisha\', \'Denardo\', \'8224228828\'), (\'Kurt\', \'Henricksen\', \'8558527261\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tyrone\', \'Liakos\', \'8999797086\'), (\'Roslyn\', \'Ehrman\', \'8448321152\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tameka\', \'Nigh\', \'8339165288\'), (\'Nita\', \'Billick\', \'8991745303\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Hillary\', \'Escudero\', \'8118718679\'), (\'Max\', \'Wadkins\', \'8228432813\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Katy\', \'Cabrales\', \'8440520170\'), (\'Kathrine\', \'Tindle\', \'8224066629\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lakisha\', \'Barroso\', \'8225894337\'), (\'Karina\', \'Bridwell\', \'8993798265\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Zelma\', \'Schoenberger\', \'8449775256\'), (\'Jamie\', \'Loisel\', \'8990279486\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Kathrine\', \'Kovar\', \'8554789460\'), (\'Julio\', \'Bruning\', \'8444041184\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lenore\', \'Stlawrence\', \'8110954684\'), (\'Julianne\', \'Yann\', \'8554073783\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lorrie\', \'Witherite\', \'8338884459\'), (\'Karina\', \'Stocking\', \'8999817694\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Darcy\', \'Gobert\', \'8557805624\'), (\'Jessie\', \'Marcinek\', \'8117579614\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tyrone\', \'Boman\', \'8992995302\'), (\'Max\', \'Ciampa\', \'8996244736\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Jamie\', \'Dunworth\', \'8331157114\'), (\'Kelly\', \'Kovacich\', \'8996282235\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Julio\', \'Honey\', \'8227414248\'), (\'Javier\', \'Jacobi\', \'8221853833\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Loraine\', \'Mroz\', \'8996999860\'), (\'Melisa\', \'Petrillose\', \'8557006306\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Julio\', \'Hands\', \'8442213366\'), (\'Darren\', \'Spade\', \'8226705240\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Liza\', \'Caraveo\', \'8116316788\'), (\'Althea\', \'Ollison\', \'8448511413\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Jamie\', \'Vancamp\', \'8222825459\'), (\'Laurie\', \'Olsen\', \'8998651037\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Hillary\', \'Hoak\', \'8550529864\'), (\'Fernando\', \'Gotto\', \'8334749826\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Guy\', \'Mcquire\', \'8441221095\'), (\'Eve\', \'Lague\', \'8992271573\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Hugh\', \'Meadors\', \'8224376241\'), (\'Lonnie\', \'Lauber\', \'8116167146\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Jamie\', \'Jenning\', \'8446965339\'), (\'Louisa\', \'Man\', \'8447271142\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Carmella\', \'Mccullar\', \'8446422171\'), (\'Kenya\', \'Westendorf\', \'8552845277\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tanisha\', \'Birkett\', \'8446627331\'), (\'Darryl\', \'Washam\', \'8333997781\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lonnie\', \'Mellin\', \'8558655871\'), (\'Jami\', \'Grunwald\', \'8441252759\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Julianne\', \'Tinkler\', \'8331146005\'), (\'Clare\', \'Fromm\', \'8111928665\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Loraine\', \'Concannon\', \'8442291011\'), (\'Lonnie\', \'Lovitt\', \'8228855638\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Jessie\', \'Hamil\', \'8112454860\'), (\'Erik\', \'Swims\', \'8228757190\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Guy\', \'Pett\', \'8996359823\'), (\'Harriett\', \'Flavin\', \'8448435755\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Nelson\', \'Spoto\', \'8220114002\'), (\'Alejandra\', \'Grief\', \'8448148057\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Noreen\', \'Faller\', \'8998259272\'), (\'Althea\', \'Mcclard\', \'8996206876\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Nannie\', \'Dagley\', \'8445263398\'), (\'Hillary\', \'Beachum\', \'8554430755\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Nelson\', \'Driskill\', \'8226091284\'), (\'Nelson\', \'Dacruz\', \'8551394455\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Sharron\', \'Pawlik\', \'8550706299\'), (\'Margery\', \'Metzgar\', \'8559575338\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lonnie\', \'Napoles\', \'8447728286\'), (\'Lance\', \'Kingrey\', \'8223856472\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Mathew\', \'Retzlaff\', \'8224968939\'), (\'Tania\', \'Gualtieri\', \'8116529604\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Kelly\', \'Toles\', \'8444954170\'), (\'Darren\', \'Schultze\', \'8220612889\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Tanisha\', \'Cusumano\', \'8220281450\'), (\'Allie\', \'Rollin\', \'8333333358\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Ray\', \'Cranfill\', \'8333006047\'), (\'Tameka\', \'Whittenberg\', \'8113526185\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Emilia\', \'Munns\', \'8442852976\'), (\'Christian\', \'Sieren\', \'8443711117\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Guy\', \'Lowrance\', \'8994981532\'), (\'Mathew\', \'Dyar\', \'8996394258\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Kenya\', \'Knick\', \'8221341944\'), (\'Marcie\', \'Maddocks\', \'8990324759\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Erik\', \'Defoor\', \'8550649407\'), (\'Fernando\', \'Reilley\', \'8445608632\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lonnie\', \'Musto\', \'8115262851\'), (\'Karina\', \'Dupler\', \'8556758955\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Louisa\', \'Guild\', \'8228888094\'), (\'Ericka\', \'Baehr\', \'8223797933\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Jessie\', \'Fonda\', \'8330231149\'), (\'Erik\', \'Albertini\', \'8557760251\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Lenore\', \'Groll\', \'8555755513\'), (\'Ashlee\', \'Taormina\', \'8442656730\')');
	$sql->exec('INSERT INTO `phonelist` (`firstname`, `lastname`, `phonenumber`) VALUES (\'Marcie\', \'Kincannon\', \'8556349795\'), (\'Brian\', \'Livemor\', \'8226425578\')');
	echo "Data inserted successfully\n";
} catch (Exception $e) {
	echo 'Exception: '.$e->getMessage()."\n";
}
echo "Leaving..\n";
