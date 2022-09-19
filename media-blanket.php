<?php

/****
*Media blanket test 
*
*****/

///Vars

$api = 'https://leads.supadata.co.uk/submit-lead';
$api_dev = 'https://dev-leads.supadata.co.uk/submit-lead';
$first = 'BrianTest';
$last = 'BrianTest';
$aff_pass = "XfXaQWmUWjhhBZKWv0gwHTa";
$aff_id = '161';
$dev = 1;
$test_lead = true;
$purpose = 'other';
$loan_amount = $_POST['loanamount'];
$loan_term = $_POST['loanterm'];
$title = $_POST['title'];
$dob = $_POST['dateofbirth'];
$m_status = $_POST['m_status'];
$no_deps = 0;
$house_no = 52;
$flat_no = 0;
$house_name = '';
$flat_no = '';
$street_name = '';
$city = '';
$county = '';
$post_code = '';
$residential_status = '';
$address_move_in_date = '';
$mobile_number = '';
$mobile_phone_type = '';
$home_number = '';
$work_number = '';
$email_address = '';
$employment_status = '';
$payment_frequency = '';
$payment_method = '';
$monthly_income = '';
$next_pay_date = '';
$following_pay_date = '';
$job_title = '';
$employer_name = '';
$employer_industry = '';
$employment_start_date = '';
$expenditure_housing = '';
$expenditure_credit = '';
$expenditure_transport = '';
$expenditure_food = '';
$expenditure_utilities = '';
$expenditure_other = '';
$bank_name = '';
$bank_account_number = '';
$bank_sort_code = '';
$bank_card_type = '';
$consent_email_sms = '';
$consent_credit_search = '';
$consent_financial = '';
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$guarantor = $_POST['guarantor'];
$consent_email = '';
$consent_sms = '';


if ( $dev == TRUE ) {
	
	$url = $api_dev;
	
}else{
	
	$url = $api;
	
}

//Building the array for Json

$data = array( 
"test_lead" => $test_lead,
 "aff_id" => $aff_id,
 "aff_password" => $aff_pass,
 "sub_id"  => "101245",
 "referring_website"  => "www.money-loans.co.uk",
 "loan_purpose"  => $purpose,
 "loan_amount"  => $loan_amount,
 "loan_term"  => $loan_term,
 "guarantor" => $guarantor,
 "title"  => $title,
 "first_name"  => $first,
 "middle_name"  => "test",
 "last_name"  => $last,
 "date_of_birth"  => $dob,
 "marital_status"  => $m_status,
 "number_of_dependents"  => $no_deps,
 "house_number"  => $house_no,
 "house_name"  => "clifford house",
 "flat_number"  => 2,
 "street_name"  => "clifford avenue",
 "city"  => "manchester",
 "county"  => "greater manchester",
 "post_code"  => "m3 2hw",
 "residential_status"  => "private_tenant",
 "address_move_in_date"  => "08-03-2016",
 "mobile_number"  => "07824516323",
 "mobile_phone_type"  => "contract",
 "home_number"  => "01617110415",
 "work_number"  => "01617110415",
 "email_address"  => "test@mediablanket.co.uk",
 "employment_status"  => "full_time",
 "payment_frequency"  => "weekly",
 "payment_method"  => "uk_direct_deposit",
 "monthly_income"  => 1250,
 "next_pay_date"  => "19-09-2022",
 "following_pay_date"  => "26-09-2022",
 "job_title"  => "webmaster",
 "employer_name"  => "mediablanket",
 "employer_industry"  => "health",
 "employment_start_date"  => "03-01-2017",
 "expenditure_housing"  => 50.75,
 "expenditure_credit"  => 50.75,
 "expenditure_transport"  => 50.75,
 "expenditure_food"  => 50.75,
 "expenditure_utilities"  => 50.75,
 "expenditure_other"  => 50.75,
 "bank_name"  => "rbs",
 "bank_account_number"  => "12345678",
 "bank_sort_code"  => "12-34-56",
 "bank_card_type"  => "visa_debit",
 "consent_email" => true,
 "consent_email_sms"  => false,
 "consent_credit_search"  => true,
 "consent_financial"  => true,
 "consent_call" => false,
 "consent_sms" => false,
 "user_agent" => $user_agent,
"ip_address" => $ip_address

);

//Encode Json array and send to media blanket api

error_log( print_r($data, TRUE) );

$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
		array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); //curl error SSL certificate problem, verify that the CA cert is OK

$result		= curl_exec($curl);
$response	= json_decode($result);
//var_dump($response);
curl_close($curl);

//Parse response for URL and redirect

header("Location: ".$response->redirect_uri);
die();


?>
