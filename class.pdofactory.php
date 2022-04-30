<?php
global $PDOS;

class PDOFactory {
	public static function GetPDO( $strDSN, $strUser, $strPass, $arParms) {
		
		$strKey = md5(serialize(array( $strDSN, $strUser, $strPass, $arParms)));
		
		if (!($strKey instanceof PDO)) {
			echo "ok";
			$GLOBALS["PDOS"][ $strKey] = new PDO( $strDSN, $strUser, $strPass, $arParms);
		};
		
		return($GLOBALS["PDOS"][$strKey]);
	}
}
?>
