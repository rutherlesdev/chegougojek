<?php

//echo "<pre>";print_r($_REQUEST);exit;
include_once('common.php');
$action = $_REQUEST['action'];
$eTransRequest = $_REQUEST['eTransRequest'];
$iUserId = $_REQUEST['iUserId'];
$eUserType = $_REQUEST['eUserType'];
$vHolderName = $_REQUEST['vHolderName'];
$vBankName = $_REQUEST['vBankName'];
$iBankAccountNo = $_REQUEST['iBankAccountNo'];
$BICSWIFTCode = $_REQUEST['BICSWIFTCode'];
$vBankBranch = $_REQUEST['vBankBranch'];
if ($eUserType == 'Driver') {
    $tblname = 'register_driver';
    $usercurr = 'Driver';
    $where = "WHERE iDriverId = '" . $iUserId . "'";
} else {
    $tblname = 'register_user';
    $usercurr = 'Passenger';
    $where = "WHERE iUserId = '" . $iUserId . "'";
}
$sql = "select vName, vLastName, vEmail, vCurrency" . $usercurr . " as sess_vCurrency, vPhone from " . $tblname . " " . $where;
$db_user = $obj->MySQLSelect($sql);
//$db_user[0]['sess_vCurrency'] = 'INR';
$sql = "select vName, Ratio from currency where vName = '" . $db_user[0]['sess_vCurrency'] . "'";
$db_currency = $obj->MySQLSelect($sql);

$sql = "select vName, Ratio from currency where eDefault = 'Yes'";
$db_currency_admin = $obj->MySQLSelect($sql);

$User_Available_Balance = $_REQUEST['User_Available_Balance'];
$fAmount = $_REQUEST['fAmount'];
//$fcheckamount = round($fAmount * $db_currency[0]['Ratio'],2);
$fcheckamount = round($fAmount, 2); //changed by SP withdraw request  for different currency wrong msg shown bc user enters in his currency only so no need to multiplied it from issue#329 on 03-10-2019

$withdrawalamtuser = $generalobj->get_currency_with_symbol($fAmount, $db_user[0]['sess_vCurrency']);
$withdrawalamtadmin = $generalobj->get_currency_with_symbol($fcheckamount, $db_currency_admin[0]['vName']);
$availableAmountOfUser = round($User_Available_Balance * $db_currency[0]['Ratio'], 2); // Added By HJ On 30-09-2019 For Solved Sheet Issue #http://mobileappsdemo.com/support-system/view.php?id=8131
// echo $fcheckamount.' > '.$availableAmountOfUser ;exit;
if ($action == 'send_equest') {
    //echo $fcheckamount.' > '.$availableAmountOfUser ;exit;
    if ($fcheckamount > $availableAmountOfUser) {
        /* $data['action'] = 0;
          $data['msg'] = 'Withdrawal Money is greater than Available Wallet Money'; */
        echo 0;
        exit;
    } else {
        /* Admin mail */
        $maildataadmin['User_Name'] = $db_user[0]['vName'] . " " . $db_user[0]['vLastName'];
        $maildataadmin['User_Phone'] = $db_user[0]['vPhone'];
        $maildataadmin['User_Email'] = $db_user[0]['vEmail'];
        $maildataadmin['Account_Name'] = $vHolderName;
        $maildataadmin['Bank_Name'] = $vBankName;
        $maildataadmin['Account_Number'] = $iBankAccountNo;
        $maildataadmin['BIC/SWIFT_Code'] = $BICSWIFTCode;
        $maildataadmin['Bank_Branch'] = $vBankBranch;
        $maildataadmin['Withdrawal_amount'] = $withdrawalamtadmin;
        $res = $generalobj->send_email_user("WITHDRAWAL_MONEY_REQUEST_Admin", $maildataadmin);

        //User Mail 
        $maildata['User_Name'] = $db_user[0]['vName'] . " " . $db_user[0]['vLastName'];
        $maildata['Withdrawal_amount'] = $withdrawalamtuser;
        $maildata['User_Email'] = $db_user[0]['vEmail'];
        $generalobj->send_email_user("WITHDRAWAL_MONEY_REQUEST_USER", $maildata);
        echo 1;
        exit;
    }
}
?>