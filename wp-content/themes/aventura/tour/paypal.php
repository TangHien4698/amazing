<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Aventura_PayPal' ) ) {
    class Aventura_PayPal
    {
        function Aventura_PPHttpPost($aventura_methodName_, $aventura_nvpStr_, $aventura_ApiUsername, $aventura_ApiPassword, $aventura_ApiSignature, $aventura_Mode)
        {
            /* Set up your API credentials, PayPal end point, and API version. */
            $aventura_API_UserName = urlencode($aventura_ApiUsername);
            $aventura_API_Password = urlencode($aventura_ApiPassword);
            $aventura_API_Signature = urlencode($aventura_ApiSignature);

            $aventura_paypalmode = ($aventura_Mode == 'sandbox') ? '.sandbox' : '';

            $aventura_API_Endpoint = "https://api-3t" . $aventura_paypalmode . ".paypal.com/nvp";
            $aventura_version = urlencode('109.0');

            /* Set the curl parameters. */
            $aventura_ch = curl_init();

            curl_setopt($aventura_ch, CURLOPT_URL, $aventura_API_Endpoint);
            curl_setopt($aventura_ch, CURLOPT_VERBOSE, 1);
            /* Turn off the server and peer verification (TrustManager Concept). */
            curl_setopt($aventura_ch, CURLOPT_SSL_VERIFYPEER, FALSE);

            curl_setopt($aventura_ch, CURLOPT_SSL_VERIFYHOST, FALSE);

            curl_setopt($aventura_ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($aventura_ch, CURLOPT_POST, 1);

            /* Set the API operation, version, and API signature in the request. */
            $aventura_nvpreq = "METHOD=$aventura_methodName_&VERSION=$aventura_version&PWD=$aventura_API_Password&USER=$aventura_API_UserName&SIGNATURE=$aventura_API_Signature$aventura_nvpStr_";

            /* Set the request as a POST FIELD for curl. */
            curl_setopt($aventura_ch, CURLOPT_POSTFIELDS, $aventura_nvpreq);
            $aventura_httpResponse = curl_exec($aventura_ch);

            /* Get response from the server. */
            if (!$aventura_httpResponse) {
                exit("$aventura_methodName_ failed: " . curl_error($aventura_ch) . '(' . curl_errno($aventura_ch) . ')');
            }

            /* Extract the response details. */
            $aventura_httpResponseAr = explode("&", $aventura_httpResponse);

            $aventura_httpParsedResponseAr = array();
            foreach ($aventura_httpResponseAr as $aventura_i => $aventura_value) {
                $aventura_tmpAr = explode("=", $aventura_value);
                if (sizeof($aventura_tmpAr) > 1) {
                    $aventura_httpParsedResponseAr[$aventura_tmpAr[0]] = $aventura_tmpAr[1];
                }
            }

            if ((0 == sizeof($aventura_httpParsedResponseAr)) || !array_key_exists('ACK', $aventura_httpParsedResponseAr)) {
                exit("Invalid HTTP Response for POST request($aventura_nvpreq) to $aventura_API_Endpoint.");
            }

            return $aventura_httpParsedResponseAr;
        }
    }
}

/*
 * check if paypal payment is enabled
 */
if ( ! function_exists( 'aventura_is_paypal_enabled' ) ) {
    function aventura_is_paypal_enabled() {
        global $aventura_options;
        return ! empty( $aventura_options['aventura_pay_paypal'] );
    }
}

/*
 * payment enabled status filter
 */
if ( ! function_exists( 'aventura_pp_is_payment_enabled' ) ) {
    function aventura_pp_is_payment_enabled( $aventura_status ) {
        return $aventura_status || aventura_is_paypal_enabled();
    }
}

add_filter( 'aventura_is_payment_enabled', 'aventura_pp_is_payment_enabled' );


/*  Credit Card */
function aventura_is_valid_card_number($aventura_toCheck) {
    if (!is_numeric($aventura_toCheck))
        return false;

    $aventura_number = preg_replace('/[^0-9]+/', '', $aventura_toCheck);
    $aventura_strlen = strlen($aventura_number);
    $aventura_sum = 0;

    if ($aventura_strlen < 13)
        return false;

    for ($aventura_i = 0; $aventura_i < $aventura_strlen; $aventura_i++) {
        $aventura_digit = substr($aventura_number, $aventura_strlen - $aventura_i - 1, 1);
        if ($aventura_i % 2 == 1) {
            $aventura_sub_total = $aventura_digit * 2;
            if ($aventura_sub_total > 9) {
                $aventura_sub_total = 1 + ($aventura_sub_total - 10);
            }
        } else {
            $aventura_sub_total = $aventura_digit;
        }
        $aventura_sum += $aventura_sub_total;
    }

    if ($aventura_sum > 0 AND $aventura_sum % 10 == 0)
        return true;

    return false;
}

function aventura_is_valid_card_type($aventura_toCheck) {
    $aventura_acceptable_cards = array(
        "Visa",
        "MasterCard",
        "Discover",
        "Amex"
    );

    return $aventura_toCheck AND in_array($aventura_toCheck, $aventura_acceptable_cards);
}

function aventura_is_valid_expiry($aventura_month, $aventura_year) {
    $aventura_now = time();
    $aventura_thisYear = (int) date('Y', $aventura_now);
    $aventura_thisMonth = (int) date('m', $aventura_now);

    if (is_numeric($aventura_year) && is_numeric($aventura_month)) {
        $aventura_thisDate = mktime(0, 0, 0, $aventura_thisMonth, 1, $aventura_thisYear);
        $aventura_expireDate = mktime(0, 0, 0, $aventura_month, 1, $aventura_year);

        return $aventura_thisDate <= $aventura_expireDate;
    }

    return false;
}

function aventura_is_valid_cvv_number($aventura_toCheck) {
    $aventura_length = strlen($aventura_toCheck);
    return is_numeric($aventura_toCheck) AND $aventura_length > 2 AND $aventura_length < 5;
}

add_filter( 'http_request_timeout', 'aventura_wp9838c_timeout_extend' );

function aventura_wp9838c_timeout_extend( $time )
{
    /* Default timeout is 5 */
    return 200;
}