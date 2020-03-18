<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! session_id() ) {
    session_start();
}

require get_template_directory() . '/tour/class.order.php';
require get_template_directory() . '/tour/session_tour.php';
require get_template_directory() . '/tour/paypal.php';

/*
aventura_get_date_format
aventura_sanitize_date
aventura_strtotime
aventura_get_phptime
*/

if ( ! function_exists( 'aventura_get_date_format' ) ) {
    function aventura_get_date_format( $aventura_language='' ) {
        global $aventura_options;
        if ( isset( $aventura_options['date_format'] ) ) {
            if ( $aventura_language == 'php' ) {
                switch ( $aventura_options['date_format'] ) {
                    case 'dd/mm/yyyy':
                        return 'd/m/Y';
                        break;
                    case 'yyyy-mm-dd':
                        return 'Y-m-d';
                        break;
                    case 'mm/dd/yyyy':
                    default:
                        return 'm/d/Y';
                        break;
                }
            } else {
                return $aventura_options['date_format'];
            }
        } else {
            if ( $aventura_language == 'php' ) {
                return 'm/d/Y';
            } else {
                return 'mm/dd/yyyy';
            }
        }
    }
}

function aventura_site_date_format() {
    return apply_filters( 'aventura_site_date_format', get_option( 'date_format' ) );
}

/*
 * get site date format
 */
if ( ! function_exists( 'aventura_sanitize_date' ) ) {
    function aventura_sanitize_date( $aventura_input_date ) {
        $aventura_date_obj = date_create_from_format( aventura_get_date_format('php'), $aventura_input_date );
        if ( ! $aventura_date_obj ) {
            return '';
        }
        return sanitize_text_field( $aventura_input_date );
    }
}

/*
 * function to make it enable d/m/Y strtotime
 */
if ( ! function_exists( 'aventura_strtotime' ) ) {
    function aventura_strtotime( $aventura_input_date ) {
        if ( aventura_get_date_format('php') == 'd/m/Y' ) {
            $aventura_input_date = str_replace( '/', '-', $aventura_input_date );
        }
        return strtotime( $aventura_input_date);
    }
}

/*
 * function to make it enable d/m/Y strtotime
 */
if ( ! function_exists( 'aventura_get_phptime' ) ) {
    function aventura_get_phptime( $aventura_input_date ) {
        if ( ! aventura_strtotime( $aventura_input_date ) ) {
            return '';
        }
        $aventura_return_value =  date( aventura_get_date_format('php'), aventura_strtotime( $aventura_input_date ) );
        return $aventura_return_value;
    }
}

if ( ! function_exists( 'aventura_getCurrency' ) ) :
    function aventura_getCurrency(){
        global $aventura_options;
        $aventura_currency = ((!isset($aventura_options['aventura_currency_options'])) || empty($aventura_options['aventura_currency_options'])) ? 'USD' : $aventura_options['aventura_currency_options'];
        $aventura_currency_symbol = '';
        switch( $aventura_currency ) {
            case 'ALL':
                $aventura_currency_symbol = 'L';
                break;

            case 'DZD':
                $aventura_currency_symbol = 'د.ج';
                break;

            case 'AFN':
                $aventura_currency_symbol = '؋';
                break;

            case 'ARS':
                $aventura_currency_symbol = '$';
                break;

            case 'AUD':
                $aventura_currency_symbol = '$';
                break;

            case 'AZN':
                $aventura_currency_symbol = 'AZN';
                break;

            case 'BSD':
                $aventura_currency_symbol = '$';
                break;

            case 'BHD':
                $aventura_currency_symbol = '.د.ب';
                break;

            case 'BBD':
                $aventura_currency_symbol = '$';
                break;

            case 'BDT':
                $aventura_currency_symbol = '৳ ';
                break;

            case 'BYR':
                $aventura_currency_symbol = 'Br';
                break;

            case 'BZD':
                $aventura_currency_symbol = '$';
                break;

            case 'BMD':
                $aventura_currency_symbol = '$';
                break;

            case 'BOB':
                $aventura_currency_symbol = 'Bs.';
                break;

            case 'BAM':
                $aventura_currency_symbol = 'KM';
                break;

            case 'BWP':
                $aventura_currency_symbol = 'P';
                break;

            case 'BGN':
                $aventura_currency_symbol = 'лв.';
                break;

            case 'BRL':
                $aventura_currency_symbol = 'R$';
                break;

            case 'BND':
                $aventura_currency_symbol = '$';
                break;

            case 'KHR':
                $aventura_currency_symbol = '៛';
                break;

            case 'CAD':
                $aventura_currency_symbol = '$';
                break;

            case 'KYD':
                $aventura_currency_symbol = '$';
                break;

            case 'CLP':
                $aventura_currency_symbol = '$';
                break;

            case 'CNY':
                $aventura_currency_symbol = '¥';
                break;

            case 'COP':
                $aventura_currency_symbol = '$';
                break;

            case 'CRC':
                $aventura_currency_symbol = '₡';
                break;

            case 'HRK':
                $aventura_currency_symbol = 'Kn';
                break;

            case 'CUP':
                $aventura_currency_symbol = '$';
                break;

            case 'CZK':
                $aventura_currency_symbol = 'Kč';
                break;

            case 'DOP':
                $aventura_currency_symbol = 'RD$';
                break;

            case 'XCD':
                $aventura_currency_symbol = '$';
                break;

            case 'EGP':
                $aventura_currency_symbol = 'EGP';
                break;

            case 'EUR':
                $aventura_currency_symbol = '€';
                break;

            case 'FKP':
                $aventura_currency_symbol = '£';
                break;

            case 'FJD':
                $aventura_currency_symbol = '$';
                break;

            case 'GBP':
                $aventura_currency_symbol = '£';
                break;

            case 'GHC':
                $aventura_currency_symbol = '₵';
                break;

            case 'GIP':
                $aventura_currency_symbol = '£';
                break;

            case 'GTQ':
                $aventura_currency_symbol = 'Q';
                break;

            case 'GGP':
                $aventura_currency_symbol = '£';
                break;

            case 'GYD':
                $aventura_currency_symbol = '$';
                break;

            case 'GEL':
                $aventura_currency_symbol = 'ლ';
                break;

            case 'GEL':
                $aventura_currency_symbol = 'ლ';
                break;

            case 'HNL':
                $aventura_currency_symbol = 'L';
                break;

            case 'HKD':
                $aventura_currency_symbol = '$';
                break;

            case 'HUF':
                $aventura_currency_symbol = 'Ft';
                break;

            case 'ISK':
                $aventura_currency_symbol = 'kr.';
                break;

            case 'INR':
                $aventura_currency_symbol = '₹';
                break;

            case 'IDR':
                $aventura_currency_symbol = 'Rp';
                break;

            case 'IRR':
                $aventura_currency_symbol = '﷼';
                break;

            case 'ILS':
                $aventura_currency_symbol = '₪';
                break;

            case 'JMD':
                $aventura_currency_symbol = '$';
                break;

            case 'JPY':
                $aventura_currency_symbol = '¥';
                break;

            case 'JEP':
                $aventura_currency_symbol = '£';
                break;

            case 'KZT':
                $aventura_currency_symbol = 'KZT';
                break;

            case 'KPW':
                $aventura_currency_symbol = '₩';
                break;

            case 'KRW':
                $aventura_currency_symbol = '₩';
                break;

            case 'KGS':
                $aventura_currency_symbol = 'сом';
                break;

            case 'KES':
                $aventura_currency_symbol = 'KSh';
                break;

            case 'LAK':
                $aventura_currency_symbol = '₭';
                break;

            case 'LBP':
                $aventura_currency_symbol = 'ل.ل';
                break;

            case 'LRD':
                $aventura_currency_symbol = '$';
                break;

            case 'MKD':
                $aventura_currency_symbol = 'ден';
                break;

            case 'MYR':
                $aventura_currency_symbol = 'RM';
                break;

            case 'MUR':
                $aventura_currency_symbol = '₨';
                break;

            case 'MXN':
                $aventura_currency_symbol = '$';
                break;

            case 'MNT':
                $aventura_currency_symbol = '₮';
                break;

            case 'GEL':
                $aventura_currency_symbol = 'ლ';
                break;

            case 'MAD':
                $aventura_currency_symbol = 'د.م.';
                break;

            case 'MZN':
                $aventura_currency_symbol = 'MT';
                break;

            case 'NAD':
                $aventura_currency_symbol = '$';
                break;

            case 'NPR':
                $aventura_currency_symbol = '₨';
                break;

            case 'ANG':
                $aventura_currency_symbol = 'ƒ';
                break;

            case 'NZD':
                $aventura_currency_symbol = '$';
                break;

            case 'NIO':
                $aventura_currency_symbol = 'C$';
                break;

            case 'NGN':
                $aventura_currency_symbol = '₦';
                break;

            case 'NOK':
                $aventura_currency_symbol = 'kr';
                break;

            case 'OMR':
                $aventura_currency_symbol = 'ر.ع.';
                break;

            case 'PKR':
                $aventura_currency_symbol = '₨';
                break;

            case 'PAB':
                $aventura_currency_symbol = 'B/.';
                break;

            case 'PYG':
                $aventura_currency_symbol = '₲';
                break;

            case 'PEN':
                $aventura_currency_symbol = 'S/.';
                break;

            case 'PHP':
                $aventura_currency_symbol = '₱';
                break;

            case 'PLN':
                $aventura_currency_symbol = 'zł';
                break;

            case 'QAR':
                $aventura_currency_symbol = 'ر.ق';
                break;

            case 'RON':
                $aventura_currency_symbol = 'lei';
                break;

            case 'RUB':
                $aventura_currency_symbol = '₽';
                break;

            case 'SHP':
                $aventura_currency_symbol = '£';
                break;

            case 'SAR':
                $aventura_currency_symbol = 'ر.س';
                break;

            case 'RSD':
                $aventura_currency_symbol = 'дин.';
                break;

            case 'SCR':
                $aventura_currency_symbol = '₨';
                break;

            case 'SGD':
                $aventura_currency_symbol = '$';
                break;

            case 'SBD':
                $aventura_currency_symbol = '$';
                break;

            case 'SOS':
                $aventura_currency_symbol = 'Sh';
                break;

            case 'ZAR':
                $aventura_currency_symbol = 'R';
                break;

            case 'LKR':
                $aventura_currency_symbol = 'රු';
                break;

            case 'SEK':
                $aventura_currency_symbol = 'kr';
                break;

            case 'CHF':
                $aventura_currency_symbol = 'CHF';
                break;

            case 'SRD':
                $aventura_currency_symbol = '$';
                break;

            case 'SYP':
                $aventura_currency_symbol = 'ل.س';
                break;

            case 'TWD':
                $aventura_currency_symbol = 'NT$';
                break;

            case 'THB':
                $aventura_currency_symbol = '฿';
                break;

            case 'TTD':
                $aventura_currency_symbol = '$';
                break;

            case 'TRL':
                $aventura_currency_symbol = '₺';
                break;

            case 'UAH':
                $aventura_currency_symbol = '₴';
                break;

            case 'AED':
                $aventura_currency_symbol = 'د.إ';
                break;

            case 'USD':
                $aventura_currency_symbol = '$';
                break;

            case 'UYU':
                $aventura_currency_symbol = '$';
                break;

            case 'UZS':
                $aventura_currency_symbol = 'UZS';
                break;

            case 'VEF':
                $aventura_currency_symbol = 'Bs F';
                break;

            case 'VND':
                $aventura_currency_symbol = '₫';
                break;

            case 'YER':
                $aventura_currency_symbol = '﷼';
                break;

        }
        return $aventura_currency_symbol;
    }
endif;

/*
 * template locate and include function
 */
if ( ! function_exists( 'aventura_get_template' ) ) {
    function aventura_get_template( $aventura_template_name, $aventura_template_path = '' ) {
        $aventura_template = locate_template(
            array(
                trailingslashit( $aventura_template_path ) . $aventura_template_name,
                $aventura_template_name
            )
        );
        include( $aventura_template );
    }
}

if ( ! function_exists( 'aventura_get_tour_cart_page' ) ) {
    function aventura_get_tour_cart_page() {
        global $aventura_options;
        if ( isset($aventura_options['tour_cart_page']) && ! empty( $aventura_options['tour_cart_page'] ) ) {
            return get_page_link( $aventura_options['tour_cart_page'] );
        }
        return false;
    }
}
if ( ! function_exists( 'aventura_get_tour_checkout_page' ) ) {
    function aventura_get_tour_checkout_page() {
        global $aventura_options;
        if ( isset($aventura_options['tour_checkout_page']) && ! empty( $aventura_options['tour_checkout_page'] ) ) {
            return get_page_link( $aventura_options['tour_checkout_page'] );
        }
        return false;
    }
}
if ( ! function_exists( 'aventura_get_tour_wishlist_page' ) ) {
    function aventura_get_tour_wishlist_page() {
        global $aventura_options;
        if ( isset($aventura_options['tour_wishlist_page']) && ! empty( $aventura_options['tour_wishlist_page'] ) ) {
            return get_page_link( $aventura_options['tour_wishlist_page'] );
        }
        return false;
    }
}

if ( ! function_exists( 'aventura_get_tour_confirm_page' ) ) {
    function aventura_get_tour_confirm_page() {
        global $aventura_options;
        if ( isset($aventura_options['tour_thankyou_page']) && ! empty( $aventura_options['tour_thankyou_page'] ) ) {
            return get_page_link( $aventura_options['tour_thankyou_page'] );
        }
        return false;
    }
}

if ( ! function_exists( 'aventura_tour_calc_tour_price' ) ) {
    function aventura_tour_calc_tour_price( $aventura_post_id, $aventura_date='', $aventura_adults=1, $aventura_kids=0 ) {
        $aventura_person_price = get_post_meta( $aventura_post_id, 'aventura_adult_price', true );
        if ( empty( $aventura_person_price ) ) $aventura_person_price = 0;

        $aventura_child_price = get_post_meta( $aventura_post_id, 'aventura_child_price', true );
        if ( empty( $aventura_child_price ) ) $aventura_child_price = 0;
        $aventura_total = $aventura_person_price * $aventura_adults + $aventura_child_price * $aventura_kids;
        return $aventura_total;
    }
}

/*
 * price format
 */
if ( ! function_exists( 'aventura_get_price_format' ) ) {
    function aventura_get_price_format( $aventura_type = "" ) {
        global $aventura_options;
        $aventura_currency_pos = ! empty( $aventura_options['aventura_currency_symbol_position'] ) ? $aventura_options['aventura_currency_symbol_position'] : 'left';
        $aventura_format = '%1$s%2$s';

        if ( 'special' == $aventura_type ) {
            switch ( $aventura_currency_pos ) {
                case 'right' :
                    $aventura_format = '<span>%2$s<sup>%1$s</sup></span>';
                    break;
                case 'left_space' :
                    $aventura_format = '<span><sup>%1$s</sup>&nbsp;%2$s</span>';
                    break;
                case 'right_space' :
                    $aventura_format = '<span>%2$s&nbsp;<sup>%1$s</sup></span>';
                    break;
                case 'left' :
                default:
                    $aventura_format = '<span><sup>%1$s</sup>%2$s</span>';
                    break;
            }
        } else {
            switch ( $aventura_currency_pos ) {
                case 'left' :
                    $aventura_format = '%1$s%2$s';
                    break;
                case 'right' :
                    $aventura_format = '%2$s%1$s';
                    break;
                case 'left_space' :
                    $aventura_format = '%1$s&nbsp;%2$s';
                    break;
                case 'right_space' :
                    $aventura_format = '%2$s&nbsp;%1$s';
                    break;
            }
        }

        return apply_filters( 'aventura_price_format', $aventura_format, $aventura_currency_pos, $aventura_type );
    }
}
/*
 * price function
 */
if ( ! function_exists( 'aventura_price' ) ) {
    function aventura_price( $aventura_amount, $aventura_type="" ) {
        global $aventura_options;

        $aventura_currency_symbol    = aventura_getCurrency();
        $aventura_decimal_prec       = isset( $aventura_options['aventura_currency_decimal_prec'] ) ? $aventura_options['aventura_currency_decimal_prec'] : 2;
        $aventura_decimal_sep        = isset( $aventura_options['aventura_currency_decimal_sep'] ) ? $aventura_options['aventura_currency_decimal_sep'] : '.';
        $aventura_thousands_sep      = isset( $aventura_options['aventura_currency_thousands_sep'] ) ? $aventura_options['aventura_currency_thousands_sep'] : ',';

        if(aventura_is_woocommerce_integration_enabled()){
            $aventura_currency_symbol   = get_woocommerce_currency_symbol();
            $aventura_decimal_prec      = wc_get_price_decimals();
            $aventura_decimal_sep       = wc_get_price_decimal_separator();
            $aventura_thousands_sep     = wc_get_price_thousand_separator();
        }
        $aventura_price_label = number_format( $aventura_amount, $aventura_decimal_prec, $aventura_decimal_sep, $aventura_thousands_sep );

        $aventura_format = aventura_get_price_format( $aventura_type );

        return sprintf( $aventura_format, $aventura_currency_symbol, $aventura_price_label );
    }
}


/*
 * get all countries
 */
if ( ! function_exists('aventura_get_all_countries') ) {
    function aventura_get_all_countries() {
        $aventura_countries = array(
            array(
                "code"=>"US",
                "name"=>esc_html__("United States","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"GB",
                "name"=>esc_html__("United Kingdom","aventura"),
                "d_code"=>"+44"
            ),
            array(
                "code"=>"CA",
                "name"=>esc_html__("Canada","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"AF",
                "name"=>esc_html__("Afghanistan","aventura"),
                "d_code"=>"+93"
            ),
            array(
                "code"=>"AL",
                "name"=>esc_html__("Albania","aventura"),
                "d_code"=>"+355"
            ),
            array(
                "code"=>"DZ",
                "name"=>esc_html__("Algeria","aventura"),
                "d_code"=>"+213"
            ),
            array(
                "code"=>"AS",
                "name"=>esc_html__("American Samoa","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"AD",
                "name"=>esc_html__("Andorra","aventura"),
                "d_code"=>"+376"
            ),
            array(
                "code"=>"AO",
                "name"=>esc_html__("Angola","aventura"),
                "d_code"=>"+244"
            ),
            array(
                "code"=>"AI",
                "name"=>esc_html__("Anguilla","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"AG",
                "name"=>esc_html__("Antigua","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"AR",
                "name"=>esc_html__("Argentina","aventura"),
                "d_code"=>"+54"
            ),
            array(
                "code"=>"AM",
                "name"=>esc_html__("Armenia","aventura"),
                "d_code"=>"+374"
            ),
            array(
                "code"=>"AW",
                "name"=>esc_html__("Aruba","aventura"),
                "d_code"=>"+297"
            ),
            array(
                "code"=>"AU",
                "name"=>esc_html__("Australia","aventura"),
                "d_code"=>"+61"
            ),
            array(
                "code"=>"AT",
                "name"=>esc_html__("Austria","aventura"),
                "d_code"=>"+43"
            ),
            array(
                "code"=>"AZ",
                "name"=>esc_html__("Azerbaijan","aventura"),
                "d_code"=>"+994"
            ),
            array(
                "code"=>"BH",
                "name"=>esc_html__("Bahrain","aventura"),
                "d_code"=>"+973"
            ),
            array(
                "code"=>"BD",
                "name"=>esc_html__("Bangladesh","aventura"),
                "d_code"=>"+880"
            ),
            array(
                "code"=>"BB",
                "name"=>esc_html__("Barbados","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"BY",
                "name"=>esc_html__("Belarus","aventura"),
                "d_code"=>"+375"
            ),
            array(
                "code"=>"BE",
                "name"=>esc_html__("Belgium","aventura"),
                "d_code"=>"+32"
            ),
            array(
                "code"=>"BZ",
                "name"=>esc_html__("Belize","aventura"),
                "d_code"=>"+501"
            ),
            array(
                "code"=>"BJ",
                "name"=>esc_html__("Benin","aventura"),
                "d_code"=>"+229"
            ),
            array(
                "code"=>"BM",
                "name"=>esc_html__("Bermuda","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"BT",
                "name"=>esc_html__("Bhutan","aventura"),
                "d_code"=>"+975"
            ),
            array(
                "code"=>"BO",
                "name"=>esc_html__("Bolivia","aventura"),
                "d_code"=>"+591"
            ),
            array(
                "code"=>"BA",
                "name"=>esc_html__("Bosnia and Herzegovina","aventura"),
                "d_code"=>"+387"
            ),
            array(
                "code"=>"BW",
                "name"=>esc_html__("Botswana","aventura"),
                "d_code"=>"+267"
            ),
            array(
                "code"=>"BR",
                "name"=>esc_html__("Brazil","aventura"),
                "d_code"=>"+55"
            ),
            array(
                "code"=>"IO",
                "name"=>esc_html__("British Indian Ocean Territory","aventura"),
                "d_code"=>"+246"
            ),
            array(
                "code"=>"VG",
                "name"=>esc_html__("British Virgin Islands","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"BN",
                "name"=>esc_html__("Brunei","aventura"),
                "d_code"=>"+673"
            ),
            array(
                "code"=>"BG",
                "name"=>esc_html__("Bulgaria","aventura"),
                "d_code"=>"+359"
            ),
            array(
                "code"=>"BF",
                "name"=>esc_html__("Burkina Faso","aventura"),
                "d_code"=>"+226"
            ),
            array(
                "code"=>"MM",
                "name"=>esc_html__("Burma Myanmar","aventura"),
                "d_code"=>"+95"
            ),
            array(
                "code"=>"BI",
                "name"=>esc_html__("Burundi","aventura"),
                "d_code"=>"+257"
            ),
            array(
                "code"=>"KH",
                "name"=>esc_html__("Cambodia","aventura"),
                "d_code"=>"+855"
            ),
            array(
                "code"=>"CM",
                "name"=>esc_html__("Cameroon","aventura"),
                "d_code"=>"+237"
            ),
            array(
                "code"=>"CV",
                "name"=>esc_html__("Cape Verde","aventura"),
                "d_code"=>"+238"
            ),
            array(
                "code"=>"KY",
                "name"=>esc_html__("Cayman Islands","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"CF",
                "name"=>esc_html__("Central African Republic","aventura"),
                "d_code"=>"+236"
            ),
            array(
                "code"=>"TD",
                "name"=>esc_html__("Chad","aventura"),
                "d_code"=>"+235"
            ),
            array(
                "code"=>"CL",
                "name"=>esc_html__("Chile","aventura"),
                "d_code"=>"+56"
            ),
            array(
                "code"=>"CN",
                "name"=>esc_html__("China","aventura"),
                "d_code"=>"+86"
            ),
            array(
                "code"=>"CO",
                "name"=>esc_html__("Colombia","aventura"),
                "d_code"=>"+57"
            ),
            array(
                "code"=>"KM",
                "name"=>esc_html__("Comoros","aventura"),
                "d_code"=>"+269"
            ),
            array(
                "code"=>"CK",
                "name"=>esc_html__("Cook Islands","aventura"),
                "d_code"=>"+682"
            ),
            array(
                "code"=>"CR",
                "name"=>esc_html__("Costa Rica","aventura"),
                "d_code"=>"+506"
            ),
            array(
                "code"=>"CI",
                "name"=>esc_html__("Cote d'Ivoire","aventura"),
                "d_code"=>"+225"
            ),
            array(
                "code"=>"HR",
                "name"=>esc_html__("Croatia","aventura"),
                "d_code"=>"+385"
            ),
            array(
                "code"=>"CU",
                "name"=>esc_html__("Cuba","aventura"),
                "d_code"=>"+53"
            ),
            array(
                "code"=>"CY",
                "name"=>esc_html__("Cyprus","aventura"),
                "d_code"=>"+357"
            ),
            array(
                "code"=>"CZ",
                "name"=>esc_html__("Czech Republic","aventura"),
                "d_code"=>"+420"
            ),
            array(
                "code"=>"CD",
                "name"=>esc_html__("Democratic Republic of Congo","aventura"),
                "d_code"=>"+243"
            ),
            array(
                "code"=>"DK",
                "name"=>esc_html__("Denmark","aventura"),
                "d_code"=>"+45"
            ),
            array(
                "code"=>"DJ",
                "name"=>esc_html__("Djibouti","aventura"),
                "d_code"=>"+253"
            ),
            array(
                "code"=>"DM",
                "name"=>esc_html__("Dominica","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"DO",
                "name"=>esc_html__("Dominican Republic","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"EC",
                "name"=>esc_html__("Ecuador","aventura"),
                "d_code"=>"+593"
            ),
            array(
                "code"=>"EG",
                "name"=>esc_html__("Egypt","aventura"),
                "d_code"=>"+20"
            ),
            array(
                "code"=>"SV",
                "name"=>esc_html__("El Salvador","aventura"),
                "d_code"=>"+503"
            ),
            array(
                "code"=>"GQ",
                "name"=>esc_html__("Equatorial Guinea","aventura"),
                "d_code"=>"+240"
            ),
            array(
                "code"=>"ER",
                "name"=>esc_html__("Eritrea","aventura"),
                "d_code"=>"+291"
            ),
            array(
                "code"=>"EE",
                "name"=>esc_html__("Estonia","aventura"),
                "d_code"=>"+372"
            ),
            array(
                "code"=>"ET",
                "name"=>esc_html__("Ethiopia","aventura"),
                "d_code"=>"+251"
            ),
            array(
                "code"=>"FK",
                "name"=>esc_html__("Falkland Islands","aventura"),
                "d_code"=>"+500"
            ),
            array(
                "code"=>"FO",
                "name"=>esc_html__("Faroe Islands","aventura"),
                "d_code"=>"+298"
            ),
            array(
                "code"=>"FM",
                "name"=>esc_html__("Federated States of Micronesia","aventura"),
                "d_code"=>"+691"
            ),
            array(
                "code"=>"FJ",
                "name"=>esc_html__("Fiji","aventura"),
                "d_code"=>"+679"
            ),
            array(
                "code"=>"FI",
                "name"=>esc_html__("Finland","aventura"),
                "d_code"=>"+358"
            ),
            array(
                "code"=>"FR",
                "name"=>esc_html__("France","aventura"),
                "d_code"=>"+33"
            ),
            array(
                "code"=>"GF",
                "name"=>esc_html__("French Guiana","aventura"),
                "d_code"=>"+594"
            ),
            array(
                "code"=>"PF",
                "name"=>esc_html__("French Polynesia","aventura"),
                "d_code"=>"+689"
            ),
            array(
                "code"=>"GA",
                "name"=>esc_html__("Gabon","aventura"),
                "d_code"=>"+241"
            ),
            array(
                "code"=>"GE",
                "name"=>esc_html__("Georgia","aventura"),
                "d_code"=>"+995"
            ),
            array(
                "code"=>"DE",
                "name"=>esc_html__("Germany","aventura"),
                "d_code"=>"+49"
            ),
            array(
                "code"=>"GH",
                "name"=>esc_html__("Ghana","aventura"),
                "d_code"=>"+233"
            ),
            array(
                "code"=>"GI",
                "name"=>esc_html__("Gibraltar","aventura"),
                "d_code"=>"+350"
            ),
            array(
                "code"=>"GR",
                "name"=>esc_html__("Greece","aventura"),
                "d_code"=>"+30"
            ),
            array(
                "code"=>"GL",
                "name"=>esc_html__("Greenland","aventura"),
                "d_code"=>"+299"
            ),
            array(
                "code"=>"GD",
                "name"=>esc_html__("Grenada","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"GP",
                "name"=>esc_html__("Guadeloupe","aventura"),
                "d_code"=>"+590"
            ),
            array(
                "code"=>"GU",
                "name"=>esc_html__("Guam","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"GT",
                "name"=>esc_html__("Guatemala","aventura"),
                "d_code"=>"+502"
            ),
            array(
                "code"=>"GN",
                "name"=>esc_html__("Guinea","aventura"),
                "d_code"=>"+224"
            ),
            array(
                "code"=>"GW",
                "name"=>esc_html__("Guinea-Bissau","aventura"),
                "d_code"=>"+245"
            ),
            array(
                "code"=>"GY",
                "name"=>esc_html__("Guyana","aventura"),
                "d_code"=>"+592"
            ),
            array(
                "code"=>"HT",
                "name"=>esc_html__("Haiti","aventura"),
                "d_code"=>"+509"
            ),
            array(
                "code"=>"HN",
                "name"=>esc_html__("Honduras","aventura"),
                "d_code"=>"+504"
            ),
            array(
                "code"=>"HK",
                "name"=>esc_html__("Hong Kong","aventura"),
                "d_code"=>"+852"
            ),
            array(
                "code"=>"HU",
                "name"=>esc_html__("Hungary","aventura"),
                "d_code"=>"+36"
            ),
            array(
                "code"=>"IS",
                "name"=>esc_html__("Iceland","aventura"),
                "d_code"=>"+354"
            ),
            array(
                "code"=>"IN",
                "name"=>esc_html__("India","aventura"),
                "d_code"=>"+91"
            ),
            array(
                "code"=>"ID",
                "name"=>esc_html__("Indonesia","aventura"),
                "d_code"=>"+62"
            ),
            array(
                "code"=>"IR",
                "name"=>esc_html__("Iran","aventura"),
                "d_code"=>"+98"
            ),
            array(
                "code"=>"IQ",
                "name"=>esc_html__("Iraq","aventura"),
                "d_code"=>"+964"
            ),
            array(
                "code"=>"IE",
                "name"=>esc_html__("Ireland","aventura"),
                "d_code"=>"+353"
            ),
            array(
                "code"=>"IL",
                "name"=>esc_html__("Israel","aventura"),
                "d_code"=>"+972"
            ),
            array(
                "code"=>"IT",
                "name"=>esc_html__("Italy","aventura"),
                "d_code"=>"+39"
            ),
            array(
                "code"=>"JM",
                "name"=>esc_html__("Jamaica","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"JP",
                "name"=>esc_html__("Japan","aventura"),
                "d_code"=>"+81"
            ),
            array(
                "code"=>"JO",
                "name"=>esc_html__("Jordan","aventura"),
                "d_code"=>"+962"
            ),
            array(
                "code"=>"KZ",
                "name"=>esc_html__("Kazakhstan","aventura"),
                "d_code"=>"+7"
            ),
            array(
                "code"=>"KE",
                "name"=>esc_html__("Kenya","aventura"),
                "d_code"=>"+254"
            ),
            array(
                "code"=>"KI",
                "name"=>esc_html__("Kiribati","aventura"),
                "d_code"=>"+686"
            ),
            array(
                "code"=>"XK",
                "name"=>esc_html__("Kosovo","aventura"),
                "d_code"=>"+381"
            ),
            array(
                "code"=>"KW",
                "name"=>esc_html__("Kuwait","aventura"),
                "d_code"=>"+965"
            ),
            array(
                "code"=>"KG",
                "name"=>esc_html__("Kyrgyzstan","aventura"),
                "d_code"=>"+996"
            ),
            array(
                "code"=>"LA",
                "name"=>esc_html__("Laos","aventura"),
                "d_code"=>"+856"
            ),
            array(
                "code"=>"LV",
                "name"=>esc_html__("Latvia","aventura"),
                "d_code"=>"+371"
            ),
            array(
                "code"=>"LB",
                "name"=>esc_html__("Lebanon","aventura"),
                "d_code"=>"+961"
            ),
            array(
                "code"=>"LS",
                "name"=>esc_html__("Lesotho","aventura"),
                "d_code"=>"+266"
            ),
            array(
                "code"=>"LR",
                "name"=>esc_html__("Liberia","aventura"),
                "d_code"=>"+231"
            ),
            array(
                "code"=>"LY",
                "name"=>esc_html__("Libya","aventura"),
                "d_code"=>"+218"
            ),
            array(
                "code"=>"LI",
                "name"=>esc_html__("Liechtenstein","aventura"),
                "d_code"=>"+423"
            ),
            array(
                "code"=>"LT",
                "name"=>esc_html__("Lithuania","aventura"),
                "d_code"=>"+370"
            ),
            array(
                "code"=>"LU",
                "name"=>esc_html__("Luxembourg","aventura"),
                "d_code"=>"+352"
            ),
            array(
                "code"=>"MO",
                "name"=>esc_html__("Macau","aventura"),
                "d_code"=>"+853"
            ),
            array(
                "code"=>"MK",
                "name"=>esc_html__("Macedonia","aventura"),
                "d_code"=>"+389"
            ),
            array(
                "code"=>"MG",
                "name"=>esc_html__("Madagascar","aventura"),
                "d_code"=>"+261"
            ),
            array(
                "code"=>"MW",
                "name"=>esc_html__("Malawi","aventura"),
                "d_code"=>"+265"
            ),
            array(
                "code"=>"MY",
                "name"=>esc_html__("Malaysia","aventura"),
                "d_code"=>"+60"
            ),
            array(
                "code"=>"MV",
                "name"=>esc_html__("Maldives","aventura"),
                "d_code"=>"+960"
            ),
            array(
                "code"=>"ML",
                "name"=>esc_html__("Mali","aventura"),
                "d_code"=>"+223"
            ),
            array(
                "code"=>"MT",
                "name"=>esc_html__("Malta","aventura"),
                "d_code"=>"+356"
            ),
            array(
                "code"=>"MH",
                "name"=>esc_html__("Marshall Islands","aventura"),
                "d_code"=>"+692"
            ),
            array(
                "code"=>"MQ",
                "name"=>esc_html__("Martinique","aventura"),
                "d_code"=>"+596"
            ),
            array(
                "code"=>"MR",
                "name"=>esc_html__("Mauritania","aventura"),
                "d_code"=>"+222"
            ),
            array(
                "code"=>"MU",
                "name"=>esc_html__("Mauritius","aventura"),
                "d_code"=>"+230"
            ),
            array(
                "code"=>"YT",
                "name"=>esc_html__("Mayotte","aventura"),
                "d_code"=>"+262"
            ),
            array(
                "code"=>"MX",
                "name"=>esc_html__("Mexico","aventura"),
                "d_code"=>"+52"
            ),
            array(
                "code"=>"MD",
                "name"=>esc_html__("Moldova","aventura"),
                "d_code"=>"+373"
            ),
            array(
                "code"=>"MC",
                "name"=>esc_html__("Monaco","aventura"),
                "d_code"=>"+377"
            ),
            array(
                "code"=>"MN",
                "name"=>esc_html__("Mongolia","aventura"),
                "d_code"=>"+976"
            ),
            array(
                "code"=>"ME",
                "name"=>esc_html__("Montenegro","aventura"),
                "d_code"=>"+382"
            ),
            array(
                "code"=>"MS",
                "name"=>esc_html__("Montserrat","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"MA",
                "name"=>esc_html__("Morocco","aventura"),
                "d_code"=>"+212"
            ),
            array(
                "code"=>"MZ",
                "name"=>esc_html__("Mozambique","aventura"),
                "d_code"=>"+258"
            ),
            array(
                "code"=>"NA",
                "name"=>esc_html__("Namibia","aventura"),
                "d_code"=>"+264"
            ),
            array(
                "code"=>"NR",
                "name"=>esc_html__("Nauru","aventura"),
                "d_code"=>"+674"
            ),
            array(
                "code"=>"NP",
                "name"=>esc_html__("Nepal","aventura"),
                "d_code"=>"+977"
            ),
            array(
                "code"=>"NL",
                "name"=>esc_html__("Netherlands","aventura"),
                "d_code"=>"+31"
            ),
            array(
                "code"=>"AN",
                "name"=>esc_html__("Netherlands Antilles","aventura"),
                "d_code"=>"+599"
            ),
            array(
                "code"=>"NC",
                "name"=>esc_html__("New Caledonia","aventura"),
                "d_code"=>"+687"
            ),
            array(
                "code"=>"NZ",
                "name"=>esc_html__("New Zealand","aventura"),
                "d_code"=>"+64"
            ),
            array(
                "code"=>"NI",
                "name"=>esc_html__("Nicaragua","aventura"),
                "d_code"=>"+505"
            ),
            array(
                "code"=>"NE",
                "name"=>esc_html__("Niger","aventura"),
                "d_code"=>"+227"
            ),
            array(
                "code"=>"NG",
                "name"=>esc_html__("Nigeria","aventura"),
                "d_code"=>"+234"
            ),
            array(
                "code"=>"NU",
                "name"=>esc_html__("Niue","aventura"),
                "d_code"=>"+683"
            ),
            array(
                "code"=>"NF",
                "name"=>esc_html__("Norfolk Island","aventura"),
                "d_code"=>"+672"
            ),
            array(
                "code"=>"KP",
                "name"=>esc_html__("North Korea","aventura"),
                "d_code"=>"+850"
            ),
            array(
                "code"=>"MP",
                "name"=>esc_html__("Northern Mariana Islands","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"NO",
                "name"=>esc_html__("Norway","aventura"),
                "d_code"=>"+47"
            ),
            array(
                "code"=>"OM",
                "name"=>esc_html__("Oman","aventura"),
                "d_code"=>"+968"
            ),
            array(
                "code"=>"PK",
                "name"=>esc_html__("Pakistan","aventura"),
                "d_code"=>"+92"
            ),
            array(
                "code"=>"PW",
                "name"=>esc_html__("Palau","aventura"),
                "d_code"=>"+680"
            ),
            array(
                "code"=>"PS",
                "name"=>esc_html__("Palestine","aventura"),
                "d_code"=>"+970"
            ),
            array(
                "code"=>"PA",
                "name"=>esc_html__("Panama","aventura"),
                "d_code"=>"+507"
            ),
            array(
                "code"=>"PG",
                "name"=>esc_html__("Papua New Guinea","aventura"),
                "d_code"=>"+675"
            ),
            array(
                "code"=>"PY",
                "name"=>esc_html__("Paraguay","aventura"),
                "d_code"=>"+595"
            ),
            array(
                "code"=>"PE",
                "name"=>esc_html__("Peru","aventura"),
                "d_code"=>"+51"
            ),
            array(
                "code"=>"PH",
                "name"=>esc_html__("Philippines","aventura"),
                "d_code"=>"+63"
            ),
            array(
                "code"=>"PL",
                "name"=>esc_html__("Poland","aventura"),
                "d_code"=>"+48"
            ),
            array(
                "code"=>"PT",
                "name"=>esc_html__("Portugal","aventura"),
                "d_code"=>"+351"
            ),
            array(
                "code"=>"PR",
                "name"=>esc_html__("Puerto Rico","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"QA",
                "name"=>esc_html__("Qatar","aventura"),
                "d_code"=>"+974"
            ),
            array(
                "code"=>"CG",
                "name"=>esc_html__("Republic of the Congo","aventura"),
                "d_code"=>"+242"
            ),
            array(
                "code"=>"RE",
                "name"=>esc_html__("Reunion","aventura"),
                "d_code"=>"+262"
            ),
            array(
                "code"=>"RO",
                "name"=>esc_html__("Romania","aventura"),
                "d_code"=>"+40"
            ),
            array(
                "code"=>"RU",
                "name"=>esc_html__("Russia","aventura"),
                "d_code"=>"+7"
            ),
            array(
                "code"=>"RW",
                "name"=>esc_html__("Rwanda","aventura"),
                "d_code"=>"+250"
            ),
            array(
                "code"=>"BL",
                "name"=>esc_html__("Saint Barthelemy","aventura"),
                "d_code"=>"+590"
            ),
            array(
                "code"=>"SH",
                "name"=>esc_html__("Saint Helena","aventura"),
                "d_code"=>"+290"
            ),
            array(
                "code"=>"KN",
                "name"=>esc_html__("Saint Kitts and Nevis","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"MF",
                "name"=>esc_html__("Saint Martin","aventura"),
                "d_code"=>"+590"
            ),
            array(
                "code"=>"PM",
                "name"=>esc_html__("Saint Pierre and Miquelon","aventura"),
                "d_code"=>"+508"
            ),
            array(
                "code"=>"VC",
                "name"=>esc_html__("Saint Vincent and the Grenadines","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"WS",
                "name"=>esc_html__("Samoa","aventura"),
                "d_code"=>"+685"
            ),
            array(
                "code"=>"SM",
                "name"=>esc_html__("San Marino","aventura"),
                "d_code"=>"+378"
            ),
            array(
                "code"=>"ST",
                "name"=>esc_html__("Sao Tome and Principe","aventura"),
                "d_code"=>"+239"
            ),
            array(
                "code"=>"SA",
                "name"=>esc_html__("Saudi Arabia","aventura"),
                "d_code"=>"+966"
            ),
            array(
                "code"=>"SN",
                "name"=>esc_html__("Senegal","aventura"),
                "d_code"=>"+221"
            ),
            array(
                "code"=>"RS",
                "name"=>esc_html__("Serbia","aventura"),
                "d_code"=>"+381"
            ),
            array(
                "code"=>"SC",
                "name"=>esc_html__("Seychelles","aventura"),
                "d_code"=>"+248"
            ),
            array(
                "code"=>"SL",
                "name"=>esc_html__("Sierra Leone","aventura"),
                "d_code"=>"+232"
            ),
            array(
                "code"=>"SG",
                "name"=>esc_html__("Singapore","aventura"),
                "d_code"=>"+65"
            ),
            array(
                "code"=>"SK",
                "name"=>esc_html__("Slovakia","aventura"),
                "d_code"=>"+421"
            ),
            array(
                "code"=>"SI",
                "name"=>esc_html__("Slovenia","aventura"),
                "d_code"=>"+386"
            ),
            array(
                "code"=>"SB",
                "name"=>esc_html__("Solomon Islands","aventura"),
                "d_code"=>"+677"
            ),
            array(
                "code"=>"SO",
                "name"=>esc_html__("Somalia","aventura"),
                "d_code"=>"+252"
            ),
            array(
                "code"=>"ZA",
                "name"=>esc_html__("South Africa","aventura"),
                "d_code"=>"+27"
            ),
            array(
                "code"=>"KR",
                "name"=>esc_html__("South Korea","aventura"),
                "d_code"=>"+82"
            ),
            array(
                "code"=>"ES",
                "name"=>esc_html__("Spain","aventura"),
                "d_code"=>"+34"
            ),
            array(
                "code"=>"LK",
                "name"=>esc_html__("Sri Lanka","aventura"),
                "d_code"=>"+94"
            ),
            array(
                "code"=>"LC",
                "name"=>esc_html__("St. Lucia","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"SD",
                "name"=>esc_html__("Sudan","aventura"),
                "d_code"=>"+249"
            ),
            array(
                "code"=>"SR",
                "name"=>esc_html__("Suriname","aventura"),
                "d_code"=>"+597"
            ),
            array(
                "code"=>"SZ",
                "name"=>esc_html__("Swaziland","aventura"),
                "d_code"=>"+268"
            ),
            array(
                "code"=>"SE",
                "name"=>esc_html__("Sweden","aventura"),
                "d_code"=>"+46"
            ),
            array(
                "code"=>"CH",
                "name"=>esc_html__("Switzerland","aventura"),
                "d_code"=>"+41"
            ),
            array(
                "code"=>"SY",
                "name"=>esc_html__("Syria","aventura"),
                "d_code"=>"+963"
            ),
            array(
                "code"=>"TW",
                "name"=>esc_html__("Taiwan","aventura"),
                "d_code"=>"+886"
            ),
            array(
                "code"=>"TJ",
                "name"=>esc_html__("Tajikistan","aventura"),
                "d_code"=>"+992"
            ),
            array(
                "code"=>"TZ",
                "name"=>esc_html__("Tanzania","aventura"),
                "d_code"=>"+255"
            ),
            array(
                "code"=>"TH",
                "name"=>esc_html__("Thailand","aventura"),
                "d_code"=>"+66"
            ),
            array(
                "code"=>"BS",
                "name"=>esc_html__("The Bahamas","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"GM",
                "name"=>esc_html__("The Gambia","aventura"),
                "d_code"=>"+220"
            ),
            array(
                "code"=>"TL",
                "name"=>esc_html__("Timor-Leste","aventura"),
                "d_code"=>"+670"
            ),
            array(
                "code"=>"TG",
                "name"=>esc_html__("Togo","aventura"),
                "d_code"=>"+228"
            ),
            array(
                "code"=>"TK",
                "name"=>esc_html__("Tokelau","aventura"),
                "d_code"=>"+690"
            ),
            array(
                "code"=>"TO",
                "name"=>esc_html__("Tonga","aventura"),
                "d_code"=>"+676"
            ),
            array(
                "code"=>"TT",
                "name"=>esc_html__("Trinidad and Tobago","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"TN",
                "name"=>esc_html__("Tunisia","aventura"),
                "d_code"=>"+216"
            ),
            array(
                "code"=>"TR",
                "name"=>esc_html__("Turkey","aventura"),
                "d_code"=>"+90"
            ),
            array(
                "code"=>"TM",
                "name"=>esc_html__("Turkmenistan","aventura"),
                "d_code"=>"+993"
            ),
            array(
                "code"=>"TC",
                "name"=>esc_html__("Turks and Caicos Islands","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"TV",
                "name"=>esc_html__("Tuvalu","aventura"),
                "d_code"=>"+688"
            ),
            array(
                "code"=>"UG",
                "name"=>esc_html__("Uganda","aventura"),
                "d_code"=>"+256"
            ),
            array(
                "code"=>"UA",
                "name"=>esc_html__("Ukraine","aventura"),
                "d_code"=>"+380"
            ),
            array(
                "code"=>"AE",
                "name"=>esc_html__("United Arab Emirates","aventura"),
                "d_code"=>"+971"
            ),
            array(
                "code"=>"UY",
                "name"=>esc_html__("Uruguay","aventura"),
                "d_code"=>"+598"
            ),
            array(
                "code"=>"VI",
                "name"=>esc_html__("US Virgin Islands","aventura"),
                "d_code"=>"+1"
            ),
            array(
                "code"=>"UZ",
                "name"=>esc_html__("Uzbekistan","aventura"),
                "d_code"=>"+998"
            ),
            array(
                "code"=>"VU",
                "name"=>esc_html__("Vanuatu","aventura"),
                "d_code"=>"+678"
            ),
            array(
                "code"=>"VA",
                "name"=>esc_html__("Vatican City","aventura"),
                "d_code"=>"+39"
            ),
            array(
                "code"=>"VE",
                "name"=>esc_html__("Venezuela","aventura"),
                "d_code"=>"+58"
            ),
            array(
                "code"=>"VN",
                "name"=>esc_html__("Vietnam","aventura"),
                "d_code"=>"+84"
            ),
            array(
                "code"=>"WF",
                "name"=>esc_html__("Wallis and Futuna","aventura"),
                "d_code"=>"+681"
            ),
            array(
                "code"=>"YE",
                "name"=>esc_html__("Yemen","aventura"),
                "d_code"=>"+967"
            ),
            array(
                "code"=>"ZM",
                "name"=>esc_html__("Zambia","aventura"),
                "d_code"=>"+260"
            ),
            array(
                "code"=>"ZW",
                "name"=>esc_html__("Zimbabwe","aventura"),
                "d_code"=>"+263"
            ),
        );
        return $aventura_countries;
    }
}

/*
 * Get current user info
 */
if ( ! function_exists( 'aventura_get_current_user_info' ) ) {
    function aventura_get_current_user_info( ) {
        $aventura_user_info = array(
            'display_name'  => '',
            'login'         => '',
            'first_name'    => '',
            'last_name'     => '',
            'email'         => '',
            'description'   => '',
            'country_code'  => '',
            'phone'         => '',
            'address'       => '',
            'city'          => '',
            'state'         => '',
            'zip'           => '',
            'country'       => '',
            'company'       => '',
            'photo_url'     => '',
            'order_notes'   => ''
        );
        if ( is_user_logged_in() ) {
            $aventura_current_user = wp_get_current_user();
            $aventura_user_id = $aventura_current_user->ID;
            $aventura_user_info['display_name']     = $aventura_current_user->user_firstname;
            $aventura_user_info['login']            = $aventura_current_user->user_login;
            $aventura_user_info['first_name']       = $aventura_current_user->user_firstname;
            $aventura_user_info['last_name']        = $aventura_current_user->user_lastname;
            $aventura_user_info['email']            = $aventura_current_user->user_email;
            $aventura_user_info['description']      = $aventura_current_user->description;
            $aventura_user_info['country_code']     = get_user_meta( $aventura_user_id, 'country_code', true );
            $aventura_user_info['phone']            = get_user_meta( $aventura_user_id, 'phone', true );
            $aventura_user_info['address']          = get_user_meta( $aventura_user_id, 'address', true );
            $aventura_user_info['city']             = get_user_meta( $aventura_user_id, 'city', true );
            $aventura_user_info['state']            = get_user_meta( $aventura_user_id, 'state', true );
            $aventura_user_info['zip']              = get_user_meta( $aventura_user_id, 'zip', true );
            $aventura_user_info['city']        		= get_user_meta( $aventura_user_id, 'city', true );
            $aventura_user_info['company']          = get_user_meta( $aventura_user_id, 'company', true );
            $aventura_user_info['order_notes']      = get_user_meta( $aventura_user_id, 'order_notes', true );
            $aventura_user_info['photo_url']        = ( isset( $aventura_current_user->photo_url ) && ! empty( $aventura_current_user->photo_url ) ) ? $aventura_current_user->photo_url : '';
        }
        return $aventura_user_info;
    }
}

/*
 * Update Cart Action
 */

add_action( 'wp_ajax_aventura_tour_update_cart', 'aventura_tour_update_cart' );
add_action( 'wp_ajax_nopriv_aventura_tour_update_cart', 'aventura_tour_update_cart' );

if ( ! function_exists( 'aventura_tour_update_cart' ) ) {
    function aventura_tour_update_cart() {
        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'tour_update_cart' ) ) {
            print esc_html__( 'Sorry, your nonce did not verify.', 'aventura' );
            exit;
        }
        // validation
        if ( ! isset( $_POST['tour_id'] ) || ! isset( $_POST['date'] ) ) {
            wp_send_json( array( 'success'=>0, 'message'=>esc_html__( 'Some validation error is occurred while calculate price.', 'aventura' ) ) );
        }

        // init variables
        $aventura_tour_id = $_POST['tour_id'];
        $aventura_date = $_POST['date'];
        $aventura_time = $_POST['time'];
        $aventura_first_name = $_POST['first_name'];
        $aventura_last_name = $_POST['last_name'];
        $aventura_email = $_POST['your_email'];
        $aventura_phone = $_POST['your_phone'];
        $aventura_total_adults = 222;
        $aventura_total_kids = 1111;
        $aventura_name_combo = ( isset( $_POST['name_combo'] ) ) ? $_POST['name_combo'] : '';
        $aventura_people_combo = ( isset( $_POST['people_combo'] ) ) ? $_POST['people_combo'] : '';
        $aventura_price_combo = ( isset( $_POST['price_combo'] ) ) ? $_POST['price_combo'] : 0;
        $aventura_adults = ( isset( $_POST['adults'] ) ) ? $_POST['adults'] : 1;
        $aventura_kids = ( isset( $_POST['kids'] ) ) ? $_POST['kids'] : 0;
        $total_price = aventura_tour_calc_tour_price( $aventura_tour_id, $aventura_date, $aventura_adults, $aventura_kids );
        if( $aventura_price_combo != '' && $aventura_price_combo != 'custom' ){
            $total_price = intval($aventura_price_combo);
        }
//		$aventura_uid = $aventura_tour_id . $aventura_date;
        $aventura_uid = $aventura_tour_id . str_replace( array('/') , '', $aventura_date )  . str_replace( array(':') , '', $aventura_time );
        $cart_data = array();

        // function
        $aventura_tour_data = array();
        $aventura_tour_data['adults'] 	    = $aventura_adults;
        $aventura_tour_data['kids'] 		= $aventura_kids;
        $aventura_tour_data['tour_id'] 	    = $aventura_tour_id;
        $aventura_tour_data['date']         = $aventura_date;
        $aventura_tour_data['time']         = $aventura_time;
        $aventura_tour_data['first_name']   = $aventura_first_name;
        $aventura_tour_data['last_name']    = $aventura_last_name;
        $aventura_tour_data['email']        = $aventura_email;
        $aventura_tour_data['phone']        = $aventura_phone;
        $aventura_tour_data['name_combo']   = $aventura_name_combo;
        $aventura_tour_data['people_combo'] = $aventura_people_combo;
        $aventura_tour_data['price_combo']  = $aventura_price_combo;
        $aventura_tour_data['total_price']  = $total_price;
        $aventura_tour_data['total_adults'] = $aventura_total_adults;
        $aventura_tour_data['total_kids']   = $aventura_total_kids;
        Aventura_Session_Cart::aventura_set( $aventura_uid, $aventura_tour_data );
        wp_send_json( array( 'success'=>1, 'message'=>esc_html__('success','aventura'), 'uid'=>$aventura_uid,'time'=>$aventura_time,'tourdata'=>$aventura_tour_data ) );
    }
}

/*
 * Delete Cart Action
 */

add_action( 'wp_ajax_aventura_tour_delete_cart', 'aventura_tour_delete_cart' );
add_action( 'wp_ajax_nopriv_aventura_tour_delete_cart', 'aventura_tour_delete_cart' );

if ( ! function_exists( 'aventura_tour_delete_cart' ) ) {
    function aventura_tour_delete_cart() {
        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'tour_update_cart' ) ) {
            print esc_html__( 'Sorry, your nonce did not verify.', 'aventura' );
            exit;
        }
        // validation
        if ( ! isset( $_POST['tour_id'] ) || ! isset( $_POST['date'] ) ) {
            wp_send_json( array( 'success'=>0, 'message'=>__( 'Some validation error is occurred while calculate price.', 'aventura' ) ) );
        }

        // init variables
        $aventura_tour_id = $_POST['tour_id'];
        $aventura_date = $_POST['date'];
        $aventura_time = $_POST['time'];
//		$aventura_uid = $aventura_tour_id . $aventura_date;
        $aventura_uid = $aventura_tour_id . str_replace( array('/') , '', $aventura_date )  . str_replace( array(':') , '', $aventura_time );

        Aventura_Session_Cart::aventura_unset( $aventura_uid);
        wp_send_json( array( 'success'=>1, 'message'=>'success'));
    }
}

/*
 * Add to Wishlist Action
 */

add_action( 'wp_ajax_add_to_wishlist', 'aventura_ajax_add_wishlist' );
add_action( 'wp_ajax_nopriv_add_to_wishlist', 'aventura_ajax_add_wishlist' );

if ( ! function_exists( 'aventura_ajax_add_wishlist' ) ) {
    function aventura_ajax_add_wishlist() {
        $aventura_result_json = array( 'success' => 0, 'result' => '' );
        if ( ! is_user_logged_in() ) {
            $aventura_result_json['success'] = 0;
            $aventura_result_json['result'] = esc_html__( 'Please login to update your wishlist.', 'aventura' );
            wp_send_json( $aventura_result_json );
        }
        $aventura_user_id = get_current_user_id();
        $aventura_new_item_id = sanitize_text_field( $_POST['post_id'] );
        $aventura_wishlist = get_user_meta( $aventura_user_id, 'wishlist', true );
        if ( isset( $_POST['remove'] ) ) {
            //remove
            $aventura_wishlist = array_diff( $aventura_wishlist, array( $aventura_new_item_id ) );
            if ( update_user_meta( $aventura_user_id, 'wishlist', $aventura_wishlist ) ) {
                $aventura_result_json['success'] = 1;
                $aventura_result_json['result'] = esc_html__( 'This post has removed from your wishlist successfully.', 'aventura' );
            } else {
                $aventura_result_json['success'] = 0;
                $aventura_result_json['result'] = esc_html__( 'Sorry, An error occurred while update wishlist.', 'aventura' );
            }
        } else {
            //add
            if ( empty( $aventura_wishlist ) ) $aventura_wishlist = array();
            if ( ! in_array( $aventura_new_item_id, $aventura_wishlist) ) {
                array_push( $aventura_wishlist, $aventura_new_item_id );
                if ( update_user_meta( $aventura_user_id, 'wishlist', $aventura_wishlist ) ) {
                    $aventura_result_json['success'] = 1;
                    $aventura_result_json['result'] = esc_html__( 'This post has added to your wishlist successfully.', 'aventura' );
                } else {
                    $aventura_result_json['success'] = 0;
                    $aventura_result_json['result'] = esc_html__( 'Sorry, An error occurred while update wishlist.', 'aventura' );
                }
            } else {
                $aventura_result_json['success'] = 1;
                $aventura_result_json['result'] = esc_html__( 'Already exists in your wishlist.', 'aventura' );
            }
        }
        wp_send_json( $aventura_result_json );
    }
}

/*
 * get order default values
 */
if ( ! function_exists( 'aventura_order_default_order_data' ) ) {
    function aventura_order_default_order_data( $aventura_type='new' ) {
        $aventura_default_order_data = array(
            'first_name'        	=> '',
            'last_name'         	=> '',
            'email'             	=> '',
            'phone'             	=> '',
            'address'           	=> '',
            'city'              	=> '',
            'state'              	=> '',
            'zip'               	=> '',
            'country'           	=> '',
            'order_notes' 			=> '',
            'post_id'  				=> '',
            'name_combo'            => '',
            'people_combo'          => '',
            'price_combo'           => '',
            'total_adults'          => '',
            'total_kids'            => '',
            'total_price'       	=> '',
            'currency_code'     	=> '',
            'deposit_paid'      	=> 1,
            'time'         			=> '',
            'date_from'         	=> '',
            'date_to'           	=> '',
            'booking_no'        	=> '',
            'pin_code'          	=> '',
            'payment_method'        => '',
            'status'            	=> 'new',
            'updated'           	=> date( 'Y-m-d H:i:s' ),
        );
        if ( $aventura_type == 'new' ) {
            $aventura_a = array(
                'created' 	=> date( 'Y-m-d H:i:s' ),
                'mail_sent' => '',
                'other' 	=> '',
                'id' 	=> '' );
            $aventura_default_order_data = array_merge( $aventura_default_order_data, $aventura_a );
        }

        return $aventura_default_order_data;
    }
}

function aventura_parse_paypal_response( $aventura_response ) {
    $aventura_result = array();
    $aventura_enteries = explode( '&', $aventura_response['body'] );

    foreach ( $aventura_enteries as $aventura_nvp ) {
        $aventura_pair = explode( '=', $aventura_nvp );
        if ( count( $aventura_pair ) > 1 )
            $aventura_result[urldecode($aventura_pair[0])] = urldecode( $aventura_pair[1] );
    }

    return $aventura_result;
}

/*
 * Credit Card Paypal
 */
if ( ! function_exists( 'aventura_credit_card_paypal_process_payment' ) ) {
    function aventura_credit_card_paypal_process_payment( $aventura_order_data ) {

        global $wpdb, $aventura_options;

        $aventura_PayPalApiUsername = $aventura_options['aventura_paypal_api_username'];
        $aventura_PayPalApiPassword = $aventura_options['aventura_paypal_api_password'];
        $aventura_PayPalApiSignature = $aventura_options['aventura_paypal_api_signature'];
        $aventura_paypalmode = ( empty( $aventura_options['aventura_paypal_sandbox'] ) ? '' : '.sandbox' );

        $aventura_gatewayRequestData = array(
            'PAYMENTACTION' => 'Sale',
            'VERSION' 		=> '84.0',
            'METHOD' 		=> 'DoDirectPayment',
            'USER' 			=> $aventura_PayPalApiUsername,
            'PWD' 			=> $aventura_PayPalApiPassword,
            'SIGNATURE' 	=> $aventura_PayPalApiSignature,
            'AMT' 			=> $aventura_order_data['total_price'],
            'FIRSTNAME' 	=> $aventura_order_data['first_name'],
            'LASTNAME' 		=> $aventura_order_data['last_name'],
            'CITY' 			=> $aventura_order_data['city'],
            'STATE' 		=> $aventura_order_data['state'],
            'ZIP' 			=> $aventura_order_data['zip'],
            'IPADDRESS' 	=> $_SERVER['REMOTE_ADDR'],
            'CREDITCARDTYPE' => $_POST['billing_cardtype'],
            'ACCT' 			=> $_POST['billing_credircard'],
            'CVV2' 			=> $_POST['billing_ccvnumber'],
            'EXPDATE' 		=> sprintf( '%s%s', $_POST['billing_expdatemonth'], $_POST['billing_expdateyear'] ),
            'STREET' 		=> sprintf( '%s', $aventura_order_data['address']),
            'CURRENCYCODE' 	=> urlencode(strtoupper( $aventura_order_data['currency_code'] ) ),
            'BUTTONSOURCE' 	=> 'TipsandTricks_SP',
        );
        $aventura_result = array();
        $aventura_erroMessage = "";
        $aventura_api_url = "https://api-3t" . $aventura_paypalmode . ".paypal.com/nvp";
        $aventura_request = array(
            'method' => 'POST',
            'httpversion' => '1.0',
            'timeout' => 100,
            'blocking' => true,
            //'sslverify' => empty( $aventura_options['aventura_paypal_sandbox'] ) ? true : false,
            'body' => $aventura_gatewayRequestData
        );

        $aventura_response = wp_remote_post( $aventura_api_url, $aventura_request );

        if ( ! is_wp_error( $aventura_response ) ) {

            $aventura_parsedResponse = aventura_parse_paypal_response( $aventura_response );

            if ( array_key_exists( 'ACK', $aventura_parsedResponse ) ) {
                switch ($aventura_parsedResponse['ACK']) {
                    case 'Success':
                    case 'SuccessWithWarning':
                        $aventura_other_booking_data = array();
                        if ( ! empty( $aventura_order_data['other'] ) ) {
                            $aventura_other_booking_data = unserialize( $aventura_order_data['other'] );
                        }

                        $aventura_other_booking_data['pp_transaction_id'] = $aventura_parsedResponse['TRANSACTIONID'];
                        $aventura_order_data['deposit_paid'] = 1;
                        $aventura_update_status = $wpdb->update( $wpdb->prefix . 'aventura_order', array( 'deposit_paid' => $aventura_order_data['deposit_paid'], 'other' => serialize( $aventura_other_booking_data ), 'status' => 'new' ), array( 'booking_no' => $aventura_order_data['booking_no'], 'pin_code' => $aventura_order_data['pin_code'] ) );

                        if ( $aventura_update_status === false ) {
                            $aventura_result['success'] = 0;
                            $aventura_result['errormsg'] = esc_html__( 'Sorry, An error occurred while add your order.', 'aventura' );
                            do_action( 'aventura_payment_update_booking_error' );
                        } elseif ( empty( $aventura_update_status ) ) {
                            $aventura_result['success'] = 0;
                            $aventura_result['errormsg'] = esc_html__( 'Sorry, An error occurred because no rows are matched in database.', 'aventura' );
                            do_action( 'aventura_payment_update_booking_no_row' );
                        } else {
                            $aventura_result['success'] = 1;
                            do_action( 'aventura_payment_update_booking_success' );
                        }
                        break;

                    default:
                        $aventura_result['success'] = 0;
                        $aventura_result['errormsg'] = $aventura_parsedResponse['L_LONGMESSAGE0'];
                        break;
                }
            }
        } else {
            // Uncomment to view the http error
            //$aventura_result['errormsg'] = print_r($aventura_response->errors, true);
            $aventura_result['success'] = 0;
            $aventura_result['errormsg'] = esc_html__( 'Something went wrong while performing your request. Please contact website administrator to report this problem.', 'aventura' );
        }

        return $aventura_result;
    }
}

/*
 * Handle submit booking ajax request
 */
add_action( 'wp_ajax_aventura_tour_submit_booking', 'aventura_tour_submit_booking' );
add_action( 'wp_ajax_nopriv_aventura_tour_submit_booking', 'aventura_tour_submit_booking' );

if ( ! function_exists( 'aventura_tour_submit_booking' ) ) {
    function aventura_tour_submit_booking() {
        global $wpdb, $aventura_options;

        // validation
        $aventura_result_json = array( 'success' => 0, 'result' => '', 'order_id' => 0 );
        $aventura_latest_order_id = $wpdb->get_var( $wpdb->prepare('SELECT id FROM ' . $wpdb->prefix . 'aventura_order ORDER BY id DESC LIMIT 1',"foo") );
        $aventura_booking_no = mt_rand( 1000, 9999 );
        $aventura_booking_no .= $aventura_latest_order_id;
        $aventura_pin_code = mt_rand( 1000, 9999 );

        if ( isset( $_POST['order_id'] ) && empty( $_POST['order_id'] ) ) {
            if ( ! isset( $_POST['uid'] ) || ! Aventura_Session_Cart::aventura_get( $_POST['uid'] ) ) {
                $aventura_result_json['success'] = 0;
                $aventura_result_json['result'] = esc_html__( 'Sorry, some error occurred on input data validation.', 'aventura' );
                wp_send_json( $aventura_result_json );
            }
            if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'checkout' ) ) {
                $aventura_result_json['success'] = 0;
                $aventura_result_json['result'] = esc_html__( 'Sorry, your nonce did not verify.', 'aventura' );
                wp_send_json( $aventura_result_json );
            }

            if ( isset( $_POST['payment_info'] ) && $_POST['payment_info'] == 'cc' ) {
                if ( ! aventura_is_valid_card_number( $_POST['billing_credircard'] ) ) {
                    $aventura_result_json['success'] = 0;
                    $aventura_result_json['result'] = esc_html__( 'Credit card number you entered is invalid.', 'aventura' );
                    wp_send_json( $aventura_result_json );
                }
                if ( ! aventura_is_valid_card_type( $_POST['billing_cardtype'] ) ) {
                    $aventura_result_json['success'] = 0;
                    $aventura_result_json['result'] = esc_html__( 'Card type is not valid.', 'aventura' );
                    wp_send_json( $aventura_result_json );
                }
                if ( ! aventura_is_valid_expiry( $_POST['billing_expdatemonth'], $_POST['billing_expdateyear'] ) ) {
                    $aventura_result_json['success'] = 0;
                    $aventura_result_json['result'] = esc_html__( 'Card expiration date is not valid.', 'aventura' );
                    wp_send_json( $aventura_result_json );
                }
                if ( ! aventura_is_valid_cvv_number( $_POST['billing_ccvnumber'] ) ) {
                    $aventura_result_json['success'] = 0;
                    $aventura_result_json['result'] = esc_html__( 'Card verification number (CVV) is not valid. You can find this number on your credit card.', 'aventura' );
                    wp_send_json( $aventura_result_json );
                }
            }

            // init variables
            $aventura_payment_method = '';
            if ( isset( $_POST['payment_info'] )) {
                $aventura_payment_method = $_POST['payment_info'];
            }
            $aventura_uid = $_POST['uid'];
            $aventura_post_fields = array( 'first_name', 'last_name', 'country', 'address', 'city', 'zip', 'email', 'phone', 'state', 'order_notes');
            $aventura_order_info = aventura_order_default_order_data( 'new' );
            foreach ( $aventura_post_fields as $aventura_post_field ) {
                if ( ! empty( $_POST[ $aventura_post_field ] ) ) {
                    $aventura_order_info[ $aventura_post_field ] = sanitize_text_field( $_POST[ $aventura_post_field ] );
                }
            }
            $aventura_cart_data = Aventura_Session_Cart::aventura_get( $aventura_uid );
            $aventura_discount = aventura_metabox( 'aventura_tour_discount','',$aventura_cart_data['tour_id'],'' );
            if( $aventura_cart_data['price_combo'] != '' && $aventura_cart_data['price_combo'] != 'custom' ){
                $aventura_order_info['name_combo'] 	    = $aventura_cart_data['name_combo'];
                $aventura_order_info['people_combo'] 	= $aventura_cart_data['people_combo'];
                $aventura_order_info['price_combo'] 	= $aventura_cart_data['price_combo'];
            }
            $aventura_order_info['total_price'] 	= round($aventura_cart_data['total_price']*(100-$aventura_discount)/100);
            $aventura_order_info['total_adults'] 	= $aventura_cart_data['adults'];
            $aventura_order_info['total_kids'] 		= $aventura_cart_data['kids'];
            $aventura_order_info['payment_method']  = $aventura_payment_method;
            $aventura_order_info['status'] 			= 'new'; // new
            $aventura_order_info['deposit_paid'] 	= 1;
            $aventura_order_info['mail_sent'] 		= 0;
            $aventura_order_info['post_id'] 		= $aventura_cart_data['tour_id'];
            $aventura_order_info['time'] 		    = $aventura_cart_data['time'];
            if ( ! empty( $aventura_cart_data['date'] ) ) $aventura_order_info['date_from'] = date( 'Y-m-d', aventura_strtotime( $aventura_cart_data['date'] ) );
            $aventura_order_info['booking_no'] 		= $aventura_booking_no;
            $aventura_order_info['pin_code'] 		= $aventura_pin_code;
            $aventura_order_info['currency_code'] 	= ((!isset($aventura_options['aventura_currency_options'])) || empty($aventura_options['aventura_currency_options'])) ? 'USD' : $aventura_options['aventura_currency_options'];

//			 if payment enabled set deposit price field
            $aventura_result_json['result']['is_payment'] = aventura_is_payment_enabled();
            if ( aventura_is_payment_enabled() ) {
                $aventura_decimal_prec = isset( $aventura_options['aventura_currency_decimal_prec'] ) ? $aventura_options['aventura_currency_decimal_prec'] : 2;
                $aventura_order_info['deposit_paid'] = 0; // set unpaid if payment enabled
                $aventura_order_info['status'] 		= 'pending';
            }
            $aventura_order_info['created'] = date( 'Y-m-d H:i:s' );
            $aventura_order_info['post_type'] = 'tour';

            if ( $wpdb->insert( $wpdb->prefix . 'aventura_order', $aventura_order_info ) ) {
                Aventura_Session_Cart::aventura_unset( $aventura_uid );
                $aventura_order_id = $wpdb->insert_id;
                /*	Save Data To Booking_Tour	*/
                $tour_booking_info = array();
                $tour_booking_info['order_id'] 		= $aventura_order_id;
                $tour_booking_info['tour_id'] 		= $aventura_cart_data['tour_id'];
                $tour_booking_info['tour_time'] 	= $aventura_cart_data['time'];
                $tour_booking_info['tour_date'] 	= $aventura_cart_data['date'];
                $tour_booking_info['adults'] 		= $aventura_cart_data['adults'];
                $tour_booking_info['kids'] 			= $aventura_cart_data['kids'];
                $tour_booking_info['people_combo'] 	= $aventura_cart_data['people_combo'];
                $tour_booking_info['total_price'] 	= $aventura_cart_data['total_price']*(100-$aventura_discount)/100;
                $wpdb->insert( $wpdb->prefix . 'aventura_tour_bookings', $tour_booking_info );

                if ( ( isset( $_POST['payment_info'] ) && $_POST['payment_info'] == 'cash' ) || ( ! isset( $_POST['payment_info'] ) ) ) {
                    $aventura_result_json['success'] 				= 1;
                    $aventura_result_json['result']['payment_info'] = 'cash';
                    $aventura_result_json['result']['order_id'] 	= $aventura_order_id;
                    $aventura_result_json['result']['booking_no'] 	= $aventura_booking_no;
                    $aventura_result_json['result']['pin_code'] 	= $aventura_pin_code;
                } elseif ( ( isset( $_POST['payment_info'] ) && $_POST['payment_info'] == 'paypal' ) ) {
                    $aventura_result_json['success'] 				= 1;
                    $aventura_result_json['result']['payment_info'] = 'paypal';
                    $aventura_result_json['result']['order_id'] 	= $aventura_order_id;
                    $aventura_result_json['result']['booking_no'] 	= $aventura_booking_no;
                    $aventura_result_json['result']['pin_code'] 	= $aventura_pin_code;
                } else if ( isset( $_POST['payment_info'] ) && $_POST['payment_info'] == 'cc' ) {
                    $aventura_payment_process_result = aventura_credit_card_paypal_process_payment( $aventura_order_info );

                    if ( $aventura_payment_process_result['success'] == 1 ) {
                        $aventura_result_json['success'] 				= 1;
                        $aventura_result_json['result']['payment_info'] = 'cc';
                        $aventura_result_json['result'] 				= array();
                        $aventura_result_json['result']['order_id'] 	= $aventura_order_id;
                        $aventura_result_json['result']['booking_no'] 	= $aventura_booking_no;
                        $aventura_result_json['result']['pin_code'] 	= $aventura_pin_code;
                    } else {
                        $aventura_result_json['success'] 	= 0;
                        $aventura_result_json['result'] 	= $aventura_payment_process_result['errormsg'];
                        $aventura_result_json['data'] = $aventura_payment_process_result['data'];
                        $aventura_result_json['url'] = $aventura_payment_process_result['url'];
                        $aventura_result_json['request'] = $aventura_payment_process_result['request'];
                        $aventura_result_json['response'] = $aventura_payment_process_result['response'];
                        $aventura_result_json['ack'] = $aventura_payment_process_result['ack'];
                        $aventura_result_json['order_id'] 	= $aventura_order_id;
                    }
                }
            } else {
                $aventura_result_json['success'] = 0;
                $aventura_result_json['result'] = esc_html__( 'Sorry, An error occurred while add your order.', 'aventura' );
            }
        } else if ( isset( $_POST['order_id'] ) && ! empty( $_POST['order_id'] ) && isset( $_POST['payment_info'] ) && $_POST['payment_info'] == 'cc'  ) {
            $aventura_order = new Aventura_Tour_Order( $_POST['order_id'] );
            $aventura_order_info = $aventura_order->aventura_get_order_info();

            $aventura_payment_process_result = aventura_credit_card_paypal_process_payment( $aventura_order_info );

            if ( $aventura_payment_process_result['success'] == 1 ) {
                $aventura_result_json['success'] 				= 1;
                $aventura_result_json['result'] 				= array();
                $aventura_result_json['result']['order_id'] 	= $aventura_order->order_id;
                $aventura_result_json['result']['booking_no'] 	= $aventura_booking_no;
                $aventura_result_json['result']['pin_code'] 	= $aventura_pin_code;
            } else {
                $aventura_result_json['success'] 				= 0;
                $aventura_result_json['result'] 				= $aventura_payment_process_result['errormsg'];
                $aventura_result_json['order_id'] 				= $aventura_order->order_id;
            }
        }

        wp_send_json( $aventura_result_json );
    }
}

/*
 * Check Tour Availability
 * */

if ( ! function_exists( 'aventura_tour_check_availability' ) ) {
    function aventura_tour_check_availability( $post_id ) {
//        $aventura_check = '';
//        $aventura_availability = '';
        // validation
        if ( empty( $post_id ) || 'tour' != get_post_type( $post_id ) ) return esc_html__( 'Invalide Tour ID.', 'aventura' ); //invalid data

//        $aventura_tour_type = aventura_metabox( 'aventura_tour_type','',$post_id,'' );
        $aventura_tour_type = aventura_metabox( 'aventura_tour_type','',$post_id,'' );
        $aventura_allow_manager_people = aventura_metabox( 'aventura_tour_manager_people','',$post_id,'' );
        $aventura_total_people = aventura_metabox( 'aventura_tour_total_people','',$post_id,'' );
        $aventura_total_people_booked = 0;

        global $wpdb;
        // Count Adults Booked
        $where = "1=1";
        $where .= " AND tour_id=" . $post_id;
//        if ( ! empty( $is_repeated ) ) $where .= " AND tour_date='" . esc_sql( date( 'Y-m-d', aventura_strtotime( $date ) ) ) . "'";
        $aventura_sql_adult = "SELECT SUM(adults) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
        $aventura_count_adults = $wpdb->get_var( $aventura_sql_adult );

        // Count Kids Booked
        $aventura_sql_kids = "SELECT SUM(kids) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
        $aventura_count_kids = $wpdb->get_var( $aventura_sql_kids );

        // Count People Combo Booked
        $aventura_sql_people_combo = "SELECT SUM(people_combo) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
        $aventura_count_people_combo = $wpdb->get_var( $aventura_sql_people_combo );

        if( $aventura_count_adults != '' || $aventura_count_kids != '' || $aventura_count_people_combo != ''){
            $aventura_total_people_booked = $aventura_count_adults + $aventura_count_kids + $aventura_count_people_combo;
        }

        if($aventura_allow_manager_people == 1){
            if($aventura_total_people == ''){
                return array('1',$aventura_total_people_booked,'');
            }else{
                if($aventura_total_people == '0'){
                    return array('0','','');
                }else{
                    if ( $aventura_total_people_booked < $aventura_total_people ) {
                        return array('1',$aventura_total_people_booked,$aventura_total_people - $aventura_total_people_booked);
                    } else {
                        return array('0','','');
                    }
                }
            }
        }else{
            return array('1',$aventura_total_people_booked,'');
        }
    }
}

/*
 * Check Tour Availability advance
 * */
if ( ! function_exists( 'aventura_tour_check_availability_advance' ) ) {
    function aventura_tour_check_availability_advance( $post_id, $date, $time ) {

        if ( empty( $post_id ) || 'tour' != get_post_type( $post_id ) ) return esc_html__( 'Invalide Tour ID.', 'aventura' ); //invalid data

//        $aventura_tour_type = aventura_metabox( 'aventura_tour_type','',$post_id,'' );
        $aventura_tour_type = aventura_metabox( 'aventura_tour_type','',$post_id,'' );
        $aventura_allow_manager_people = aventura_metabox( 'aventura_tour_manager_people','',$post_id,'' );
        $aventura_total_people = aventura_metabox( 'aventura_tour_total_people','',$post_id,'' );
        $aventura_total_people_booked = 0;

        global $wpdb;
        // Count Adults Booked
        $where = "1=1";
        $where .= " AND tour_id=" . $post_id;

        if($time != ''){
            $where .= " AND tour_time='" . $time . "'";
        }

        if($date != ''){
            $where .= " AND tour_date='" . esc_sql( date( 'Y-m-d', aventura_strtotime( $date ) ) ) . "'";
        }

        $aventura_sql_adult = "SELECT SUM(adults) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
        $aventura_count_adults = $wpdb->get_var( $aventura_sql_adult );

        // Count Kids Booked
        $aventura_sql_kids = "SELECT SUM(kids) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
        $aventura_count_kids = $wpdb->get_var( $aventura_sql_kids );

        // Count People Combo Booked
        $aventura_sql_people_combo = "SELECT SUM(people_combo) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
        $aventura_count_people_combo = $wpdb->get_var( $aventura_sql_people_combo );

        if( $aventura_count_adults != '' || $aventura_count_kids != '' || $aventura_count_people_combo != ''){
            $aventura_total_people_booked = $aventura_count_adults + $aventura_count_kids + $aventura_count_people_combo;
        }

        if($aventura_allow_manager_people == 1){
            if($aventura_total_people == ''){
                return array('1',$aventura_total_people_booked,'');
            }else{
                if($aventura_total_people == '0'){
                    return array('0','','');
                }else{
                    if ( $aventura_total_people_booked < $aventura_total_people ) {
                        return array('1',$aventura_total_people_booked,$aventura_total_people - $aventura_total_people_booked);
                    } else {
                        return array('0','','');
                    }
                }
            }
        }else{
            return array('1',$aventura_total_people_booked,'');
        }
    }
}

add_action( 'wp_ajax_aventura_tour_check_availability_ajax', 'aventura_tour_check_availability_ajax' );
add_action( 'wp_ajax_nopriv_aventura_tour_check_availability_ajax', 'aventura_tour_check_availability_ajax' );

if ( ! function_exists( 'aventura_tour_check_availability_ajax' ) ) {
    function aventura_tour_check_availability_ajax() {

        // validation
        if ( ! isset( $_POST['tour_id'] )) {
            wp_send_json( array( 'success'=>0, 'message'=>esc_html__( 'Some validation error is occurred while calculate price.', 'aventura' ) ) );
        }

        // init variables
        $aventura_tour_id = $_POST['tour_id'];
        $aventura_tour_date = $_POST['tour_date'];
        $aventura_tour_time = $_POST['tour_time'];

        $aventura_allow_manager_people = aventura_metabox( 'aventura_tour_manager_people','',$aventura_tour_id,'' );
        $aventura_total_people = aventura_metabox( 'aventura_tour_total_people','',$aventura_tour_id,'' );
        $aventura_total_people_booked = 0;

//        global $wpdb;
//        // Count Adults Booked
//        $where = "1=1";
//        $where .= " AND tour_id=" . $aventura_tour_id;
//        if($aventura_tour_date != ''){
//            $where .= " AND tour_date='" . esc_sql( date( 'Y-m-d', aventura_strtotime( $aventura_tour_date ) ) ) . "'";
//        }
//        if($aventura_tour_time != ''){
//            $where .= " AND tour_time='" . $aventura_tour_time . "'";
//        }
//
//        $aventura_sql_adult = "SELECT SUM(adults) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
//        $aventura_count_adults = $wpdb->get_var( $aventura_sql_adult );
//
//        // Count Kids Booked
//        $aventura_sql_kids = "SELECT SUM(kids) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
//        $aventura_count_kids = $wpdb->get_var( $aventura_sql_kids );
//
//        // Count People Combo Booked
//        $aventura_sql_people_combo = "SELECT SUM(people_combo) FROM " . $wpdb->prefix . "aventura_tour_bookings WHERE $where";
//        $aventura_count_people_combo = $wpdb->get_var( $aventura_sql_people_combo );
//
//        if( $aventura_count_adults != '' || $aventura_count_kids != '' || $aventura_count_people_combo != ''){
//            $aventura_total_people_booked = $aventura_count_adults + $aventura_count_kids + $aventura_count_people_combo;
//        }

        $aventura_tour_test = aventura_tour_check_availability_advance( $aventura_tour_id, $aventura_tour_date, $aventura_tour_time );

//        if($aventura_allow_manager_people == 1){
//            if($aventura_total_people == ''){
//                return array('1',$aventura_total_people_booked,'');
//            }else{
//                if($aventura_total_people == '0'){
//                    return array('0','','');
//                }else{
//                    if ( $aventura_total_people_booked < $aventura_total_people ) {
//                        return array('1',$aventura_total_people_booked,$aventura_total_people - $aventura_total_people_booked);
//                    } else {
//                        return array('0','','');
//                    }
//                }
//            }
//        }else{
//            return array('1',$aventura_total_people_booked,'');
//        }
        wp_send_json( array( 'success'=>1, 'message'=>esc_html__('success','aventura'), 'booked'=> $aventura_tour_test ) );
    }
}


/****	Page Thank You	****/

/*
 * process payment
 */
if ( ! function_exists( 'aventura_process_payment' ) ) {
    function aventura_process_payment( $aventura_payment_data ) {
        global $aventura_options;
        $aventura_success = 0;
        if ( aventura_is_paypal_enabled() ) {
            // validation
            if ( empty( $aventura_options['aventura_paypal_api_username'] ) || empty( $aventura_options['aventura_paypal_api_password'] ) || empty( $aventura_options['aventura_paypal_api_signature'] ) ) {
                return false;
            }

            $aventura_PayPalApiUsername = $aventura_options['aventura_paypal_api_username'];
            $aventura_PayPalApiPassword = $aventura_options['aventura_paypal_api_password'];
            $aventura_PayPalApiSignature = $aventura_options['aventura_paypal_api_signature'];
            $aventura_PayPalMode = ( empty( $aventura_options['aventura_paypal_sandbox'] ) ? 'live' : 'sandbox' );

            // SetExpressCheckOut
            if ( ! isset( $_GET["token"] ) || ! isset( $_GET["PayerID"] ) ) {
                $aventura_padata = 	'&METHOD=SetExpressCheckout'.
                    '&RETURNURL='.urlencode($aventura_payment_data['return_url'] ).
                    '&CANCELURL='.urlencode($aventura_payment_data['cancel_url']).
                    '&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
                    '&L_PAYMENTREQUEST_0_NAME0='.urlencode($aventura_payment_data['item_name']).
                    '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($aventura_payment_data['item_number']).
                    '&L_PAYMENTREQUEST_0_DESC0='.urlencode($aventura_payment_data['item_desc']).
                    '&L_PAYMENTREQUEST_0_AMT0='.urlencode($aventura_payment_data['item_price']).
                    '&L_PAYMENTREQUEST_0_QTY0='. urlencode($aventura_payment_data['item_qty']).
                    '&NOSHIPPING=1'.
                    '&SOLUTIONTYPE=Sole'.
                    '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($aventura_payment_data['item_total_price']).
                    '&PAYMENTREQUEST_0_AMT='.urlencode($aventura_payment_data['grand_total']).
                    '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode( $aventura_payment_data['currency'] ) .
                    '&LOCALECODE=US'.
                    '&LOGOIMG=' . aventura_logo_url() .
                    '&CARTBORDERCOLOR=FFFFFF'.
                    '&ALLOWNOTE=1';
                //We need to execute the "SetExpressCheckOut" method to obtain paypal token
                $aventura_paypal= new Aventura_PayPal();
                $aventura_httpParsedResponseAr = $aventura_paypal->Aventura_PPHttpPost('SetExpressCheckout', $aventura_padata, $aventura_PayPalApiUsername, $aventura_PayPalApiPassword, $aventura_PayPalApiSignature, $aventura_PayPalMode);

                //Respond according to message we receive from Paypal
                if ( "SUCCESS" == strtoupper($aventura_httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($aventura_httpParsedResponseAr["ACK"])) {
                    //Redirect user to PayPal store with Token received.
                    $aventura_PayPalMode = ($aventura_PayPalMode=='sandbox') ? '.sandbox' : '';
                    $aventura_paypalurl ='https://www'.$aventura_PayPalMode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$aventura_httpParsedResponseAr["TOKEN"].'';
                    echo '<script> location.replace("'.esc_js($aventura_paypalurl).'"); </script>';
                    exit;
                } else {
                    //Show error message
                    echo '<div class="alert alert-warning"><b>'.esc_html__("Error : ","aventura").'</b>' . urldecode($aventura_httpParsedResponseAr["L_LONGMESSAGE0"]) . '<span class="close"></span></div>';
                    echo '<pre>';
                    print_r($aventura_httpParsedResponseAr);
                    echo '</pre>';
                    exit;
                }
            }

            // DoExpressCheckOut
            if ( isset( $_GET["token"] ) && isset( $_GET["PayerID"] ) ) {

                $aventura_token = $_GET["token"];
                $aventura_payer_id = $_GET["PayerID"];

                $aventura_padata = 	'&TOKEN='.urlencode($aventura_token).
                    '&PAYERID='.urlencode($aventura_payer_id).
                    '&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
                    '&L_PAYMENTREQUEST_0_NAME0='.urlencode($aventura_payment_data['item_name']).
                    '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($aventura_payment_data['item_number']).
                    '&L_PAYMENTREQUEST_0_DESC0='.urlencode($aventura_payment_data['item_desc']).
                    '&L_PAYMENTREQUEST_0_AMT0='.urlencode($aventura_payment_data['item_price']).
                    '&L_PAYMENTREQUEST_0_QTY0='. urlencode($aventura_payment_data['item_qty']).
                    '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($aventura_payment_data['item_total_price']).
                    '&PAYMENTREQUEST_0_AMT='.urlencode($aventura_payment_data['grand_total']).
                    '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($aventura_payment_data['currency']);

                //execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
                $aventura_paypal = new Aventura_PayPal();
                $aventura_httpParsedResponseAr = $aventura_paypal->Aventura_PPHttpPost('DoExpressCheckoutPayment', $aventura_padata, $aventura_PayPalApiUsername, $aventura_PayPalApiPassword, $aventura_PayPalApiSignature, $aventura_PayPalMode);

                //Check if everything went ok..
                if ( "SUCCESS" == strtoupper( $aventura_httpParsedResponseAr["ACK"] ) || "SUCCESSWITHWARNING" == strtoupper( $aventura_httpParsedResponseAr["ACK"] ) ) {

                    echo '<div class="alert alert-success">' . esc_html__( 'Payment Received Successfully! Your Transaction ID : ', 'aventura' ) . urldecode($aventura_httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]) . '<span class="close"></span></div>';

                    $transation_id = urldecode( $aventura_httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"] );

                    // GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
                    $aventura_padata = '&TOKEN='.urlencode($aventura_token);
                    $aventura_paypal= new Aventura_PayPal();
                    $aventura_httpParsedResponseAr = $aventura_paypal->Aventura_PPHttpPost('GetExpressCheckoutDetails', $aventura_padata, $aventura_PayPalApiUsername, $aventura_PayPalApiPassword, $aventura_PayPalApiSignature, $aventura_PayPalMode);

                    if ( "SUCCESS" == strtoupper($aventura_httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($aventura_httpParsedResponseAr["ACK"])) {
                        $aventura_success = 1;
                        return array( 'success'=>1, 'method'=>'paypal', 'transaction_id' => $transation_id );
                    } else  {
                        echo '<div class="alert alert-warning"><b>'.esc_html__("GetTransactionDetails failed:","aventura").'</b>' . urldecode($aventura_httpParsedResponseAr["L_LONGMESSAGE0"]) . '<span class="close"></span></div>';
                        echo '<pre>';
                        print_r($aventura_httpParsedResponseAr);
                        echo '</pre>';
                        exit;
                    }
                } else {
                    echo '<div class="alert alert-warning"><b>'.esc_html__("Error : ","aventura").'</b>' . urldecode($aventura_httpParsedResponseAr["L_LONGMESSAGE0"]) . '<span class="close"></span></div>';
                    echo '<pre>';
                    print_r($aventura_httpParsedResponseAr);
                    echo '</pre>';
                    exit;
                }
            }
        }
        return false;
    }
}

/*
 * check if any payment is enabled
 */
if ( ! function_exists( 'aventura_is_payment_enabled' ) ) {
    function aventura_is_payment_enabled() {
        return apply_filters( 'aventura_is_payment_enabled', false );
    }
}

/*
 * get current page url
 */
if ( ! function_exists( 'aventura_get_current_page_url' ) ) {
    function aventura_get_current_page_url() {
        global $wp;
        return esc_url( home_url(add_query_arg(array(),$wp->request)) );
    }
}


/*
 * echo deposit payment not paid notice on confirmation page
 */
add_action( 'aventura_order_deposit_payment_not_paid', 'aventura_order_deposit_payment_not_paid' );
if ( ! function_exists( 'aventura_order_deposit_payment_not_paid' ) ) {
    function aventura_order_deposit_payment_not_paid( $aventura_order_data ) {
        echo '<div class="alert alert-warning">' . esc_html__( 'Deposit payment is not paid.', 'aventura' ) . '<span class="close"></span></div>';
    }
}

/*
 * send confirmation email
 */
add_action( 'aventura_order_conf_mail_not_sent', 'aventura_order_conf_send_mail' );
if ( ! function_exists( 'aventura_order_conf_send_mail' ) ) {
    function aventura_order_conf_send_mail( $aventura_order_data ) {
        global $wpdb;
        $aventura_mail_sent = 0;
        if ( aventura_order_send_email( $aventura_order_data['booking_no'], $aventura_order_data['pin_code'], 'new' ) ) {
            $aventura_mail_sent = 1;
            $wpdb->update( $wpdb->prefix . 'aventura_order', array( 'mail_sent' => $aventura_mail_sent ), array( 'booking_no' => $aventura_order_data['booking_no'], 'pin_code' => $aventura_order_data['pin_code'] ), array( '%d' ), array( '%d','%d' ) );
        }
    }
}

/*
 * send booking confirmation email function
 */
if ( ! function_exists( 'aventura_order_send_email' ) ) {
    function aventura_order_send_email( $aventura_booking_no, $aventura_booking_pincode, $aventura_type='new', $aventura_subject='', $aventura_description='' ) {
        $aventura_order = new Aventura_Tour_Order( $aventura_booking_no, $aventura_booking_pincode );
        $aventura_order_data = $aventura_order->aventura_get_order_info();
        if ( ! empty( $aventura_order_data ) ) {
            $aventura_post_type = get_post_type( $aventura_order_data['post_id'] );
            if ( 'tour' == $aventura_post_type ) {
                return aventura_tour_generate_conf_mail( $aventura_order, $aventura_type );
            }
        }
        return false;
    }
}

/*
 * send booking confirmation email function
 */
if ( ! function_exists( 'aventura_tour_generate_conf_mail' ) ) {
    function aventura_tour_generate_conf_mail( $aventura_order, $type='new' ) {
        global $wpdb, $aventura_options;
        $aventura_order_data = $aventura_order->aventura_get_order_info();
        if ( ! empty( $aventura_order_data ) ) {
            // server variables
            $aventura_admin_email = get_option('admin_email');
            $aventura_home_url = esc_url( home_url('/') );
            $aventura_site_name = $_SERVER['SERVER_NAME'];
            $aventura_logo_url = esc_url( aventura_logo_url() );
            $aventura_order_data['tour_id'] = $aventura_order_data['post_id'];

            // tour info
            $aventura_tour_name = get_the_title( $aventura_order_data['tour_id'] );
//            if ( ! empty( $aventura_order_data['date_from'] ) && '0000-00-00' != $aventura_order_data['date_from'] ) $aventura_tour_name .= ' - ' . date( 'j F Y', strtotime( $aventura_order_data['date_from'] ) );
            $aventura_tour_url = esc_url( get_permalink( $aventura_order_data['tour_id'] ) );
            $aventura_tour_thumbnail = get_the_post_thumbnail( $aventura_order_data['tour_id'], 'medium' );
            $aventura_tour_address = get_post_meta( $aventura_order_data['tour_id'], '_tour_address', true );
            $aventura_tour_email = get_post_meta( $aventura_order_data['tour_id'], '_tour_email', true );
            $aventura_tour_phone = get_post_meta( $aventura_order_data['tour_id'], '_tour_phone', true );

            // booking info
            $aventura_booking_date = date( 'j F Y', strtotime( $aventura_order_data['date_from'] ) );
            $aventura_booking_time = $aventura_order_data['time'];
            $aventura_booking_adults = $aventura_order_data['total_adults'];
            $aventura_booking_kids = $aventura_order_data['total_kids'];
            $aventura_name_combo = $aventura_order_data['name_combo'];
            $aventura_booking_total_price = esc_html( aventura_price( $aventura_order_data['total_price'], "", $aventura_order_data['currency_code'], 0 ) );
            $aventura_booking_deposit_paid = esc_html( empty( $aventura_order_data['deposit_paid'] ) ? 'No' : 'Yes' );
            $aventura_booking_no = $aventura_order_data['booking_no'];
            $aventura_booking_pincode = $aventura_order_data['pin_code'];
            $aventura_order_payment_method = $aventura_order_data['payment_method'];

            // customer info
            $aventura_customer_first_name = $aventura_order_data['first_name'];
            $aventura_customer_last_name = $aventura_order_data['last_name'];
            $aventura_customer_email = $aventura_order_data['email'];
            $aventura_customer_country_code = $aventura_order_data['country'];
            $aventura_customer_phone = $aventura_order_data['phone'];
//            $aventura_customer_address1 = $aventura_order_data['address1'];
//            $aventura_customer_address2 = $aventura_order_data['address2'];
            $aventura_customer_address = $aventura_order_data['address'];
            $aventura_customer_city = $aventura_order_data['city'];
            $aventura_customer_state = $aventura_order_data['state'];
            $aventura_customer_zip = $aventura_order_data['zip'];
            $aventura_customer_country = $aventura_order_data['country'];
            $aventura_customer_order_notes = $aventura_order_data['order_notes'];

            $aventura_variables = array( 'home_url',
                'site_name',
                'logo_url',
                'tour_name',
                'tour_url',
                'tour_thumbnail',
                'tour_address',
                'tour_email',
                'tour_phone',
                'booking_services',
                'booking_no',
                'booking_pincode',
                'booking_date',
                'booking_adults',
                'booking_kids',
                'booking_total_price',
                'customer_first_name',
                'customer_last_name',
                'customer_email',
                'customer_country_code',
                'customer_phone',
//                'customer_address1',
//                'customer_address2',
                'customer_address',
                'customer_city',
                'customer_zip',
                'customer_country',
                'customer_order_notes',
            );

            if ( empty( $aventura_subject ) ) {
                $aventura_subject = empty( $aventura_options['aventura_email_confirm_subject_customer'] ) ? esc_html__('Booking Confirmation Email Subject','aventura') : $aventura_options['aventura_email_confirm_subject_customer'];
            }

            if ( empty( $aventura_description ) ) {
                $aventura_description = empty( $aventura_options['aventura_email_confirm_description_customer'] ) ? esc_html__('Booking Confirmation Email Description','aventura') : $aventura_options['aventura_email_confirm_description_customer'];
            }

            foreach ( $aventura_variables as $aventura_variable ) {
                $aventura_subject = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_subject );
                $aventura_description = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_description );
                $aventura_tour_name = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_tour_name );
                $aventura_booking_no = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_booking_no );
                $aventura_booking_date = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_booking_date );
                $aventura_booking_adults = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_booking_adults );
                $aventura_booking_kids = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_booking_kids );
                $aventura_name_combo = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_name_combo );
                $aventura_booking_total_price = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_booking_total_price );
                $aventura_order_payment_method = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_order_payment_method );
            }
            $aventura_customer_order_option = ((!isset($aventura_options['aventura_email_confirm_customer_order_and_billing'])) || empty($aventura_options['aventura_email_confirm_customer_order_and_billing'])) ? true : $aventura_options['aventura_email_confirm_customer_order_and_billing'];
            $aventura_customer_order_position = ((!isset($aventura_options['aventura_email_confirm_customer_order_billing_position'])) || empty($aventura_options['aventura_email_confirm_customer_order_billing_position'])) ? true : $aventura_options['aventura_email_confirm_customer_order_billing_position'];

            $aventura_mail_sent = aventura_send_mail( $aventura_site_name, $aventura_admin_email, $aventura_customer_email, $aventura_subject, $aventura_description, $aventura_booking_no, $aventura_tour_name, $aventura_booking_date, $aventura_booking_time, $aventura_booking_adults, $aventura_booking_kids , $aventura_name_combo, $aventura_booking_total_price, $aventura_order_payment_method, $aventura_customer_first_name, $aventura_customer_last_name, $aventura_customer_phone, $aventura_customer_address, $aventura_customer_city, $aventura_customer_state, $aventura_customer_zip, $aventura_customer_country, $aventura_customer_order_notes, $aventura_customer_order_option, $aventura_customer_order_position );

            /* mailing function to admin */
            $aventura_email_admin = empty( $aventura_options['aventura_email_confirm_to_admin'] ) ? false : $aventura_options['aventura_email_confirm_to_admin'];

            if ( ! empty( $aventura_email_admin) && $aventura_email_admin == true ) {

                $aventura_admin_order_option = ((!isset($aventura_options['aventura_email_confirm_admin_order_and_billing'])) || empty($aventura_options['aventura_email_confirm_admin_order_and_billing'])) ? true : $aventura_options['aventura_email_confirm_admin_order_and_billing'];
                $aventura_admin_order_position = ((!isset($aventura_options['aventura_email_confirm_admin_order_billing_position'])) || empty($aventura_options['aventura_email_confirm_admin_order_billing_position'])) ? true : $aventura_options['aventura_email_confirm_admin_order_billing_position'];

                $aventura_subject = empty( $aventura_options['aventura_email_confirm_subject_admin'] ) ? esc_html__('You received a booking','aventura') : $aventura_options['aventura_email_confirm_subject_admin'];
                $aventura_description = empty( $aventura_options['aventura_email_confirm_description_admin'] ) ? esc_html__('Booking Details','aventura') : $aventura_options['aventura_email_confirm_description_admin'];

                foreach ( $aventura_variables as $aventura_variable ) {
                    $aventura_subject = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_subject );
                    $aventura_description = str_replace( "[" . $aventura_variable . "]", $$variable, $aventura_description );
                }

                aventura_send_mail( $aventura_site_name, $aventura_admin_email, $aventura_admin_email, $aventura_subject, $aventura_description, $aventura_booking_no, $aventura_tour_name, $aventura_booking_date, $aventura_booking_time, $aventura_booking_adults, $aventura_booking_kids , $aventura_name_combo, $aventura_booking_total_price, $aventura_order_payment_method, $aventura_customer_first_name, $aventura_customer_last_name, $aventura_customer_phone, $aventura_customer_address, $aventura_customer_city, $aventura_customer_state, $aventura_customer_zip, $aventura_customer_country, $aventura_customer_order_notes, $aventura_admin_order_option, $aventura_admin_order_position );
            }
            return true;
        }
        return false;
    }
}
/*
 * send mail functions
 */

if ( ! function_exists('aventura_send_mail') ) {
    function aventura_send_mail( $aventura_from_name, $aventura_from_address, $aventura_to_address, $aventura_subject, $aventura_description, $aventura_booking_no, $aventura_tour_name, $aventura_booking_date, $aventura_booking_time, $aventura_booking_adults, $aventura_booking_kids , $aventura_name_combo, $aventura_booking_total_price, $aventura_order_payment_method, $aventura_customer_first_name, $aventura_customer_last_name, $aventura_customer_phone, $aventura_customer_address, $aventura_customer_city, $aventura_customer_state, $aventura_customer_zip, $aventura_customer_country, $aventura_customer_order_notes , $aventura_order_option, $aventura_order_position ) {
        switch ($aventura_customer_country) {
            case 'US':
                $aventura_customer_country_name = 'United States';
                break;

            case 'GB':
                $aventura_customer_country_name = 'United Kingdom';
                break;

            case 'CA':
                $aventura_customer_country_name = 'Canada';
                break;

            case 'AF':
                $aventura_customer_country_name = 'Afghanistan';
                break;

            case 'AL':
                $aventura_customer_country_name = 'Albania';
                break;

            case 'DZ':
                $aventura_customer_country_name = 'Algeria';
                break;

            case 'AS':
                $aventura_customer_country_name = 'American Samoa';
                break;

            case 'AD':
                $aventura_customer_country_name = 'Andorra';
                break;

            case 'AO':
                $aventura_customer_country_name = 'Angola';
                break;

            case 'AI':
                $aventura_customer_country_name = 'Anguilla';
                break;

            case 'AG':
                $aventura_customer_country_name = 'Antigua';
                break;

            case 'AR':
                $aventura_customer_country_name = 'Argentina';
                break;

            case 'AM':
                $aventura_customer_country_name = 'Armenia';
                break;

            case 'AW':
                $aventura_customer_country_name = 'Aruba';
                break;

            case 'AU':
                $aventura_customer_country_name = 'Australia';
                break;

            case 'AT':
                $aventura_customer_country_name = 'Austria';
                break;

            case 'AZ':
                $aventura_customer_country_name = 'Azerbaijan';
                break;

            case 'BH':
                $aventura_customer_country_name = 'Bahrain';
                break;

            case 'BD':
                $aventura_customer_country_name = 'Bangladesh';
                break;

            case 'BB':
                $aventura_customer_country_name = 'Barbados';
                break;

            case 'BY':
                $aventura_customer_country_name = 'Belarus';
                break;

            case 'BE':
                $aventura_customer_country_name = 'Belgium';
                break;

            case 'BZ':
                $aventura_customer_country_name = 'Belize';
                break;

            case 'BJ':
                $aventura_customer_country_name = 'Benin';
                break;

            case 'BM':
                $aventura_customer_country_name = 'Bermuda';
                break;

            case 'BT':
                $aventura_customer_country_name = 'Bhutan';
                break;

            case 'BO':
                $aventura_customer_country_name = 'Bolivia';
                break;

            case 'BA':
                $aventura_customer_country_name = 'Bosnia and Herzegovina';
                break;

            case 'BW':
                $aventura_customer_country_name = 'Botswana';
                break;

            case 'BR':
                $aventura_customer_country_name = 'Brazil';
                break;

            case 'IO':
                $aventura_customer_country_name = 'British Indian Ocean Territory';
                break;

            case 'VG':
                $aventura_customer_country_name = 'British Virgin Islands';
                break;

            case 'BN':
                $aventura_customer_country_name = 'Brunei';
                break;

            case 'BG':
                $aventura_customer_country_name = 'Bulgaria';
                break;

            case 'BF':
                $aventura_customer_country_name = 'Burkina Faso';
                break;

            case 'MM':
                $aventura_customer_country_name = 'Burma Myanmar';
                break;

            case 'BI':
                $aventura_customer_country_name = 'Burundi';
                break;

            case 'KH':
                $aventura_customer_country_name = 'Cambodia';
                break;

            case 'CM':
                $aventura_customer_country_name = 'Cameroon';
                break;

            case 'CV':
                $aventura_customer_country_name = 'Cape Verde';
                break;

            case 'KY':
                $aventura_customer_country_name = 'Cayman Islands';
                break;

            case 'CF':
                $aventura_customer_country_name = 'Central African Republic';
                break;

            case 'TD':
                $aventura_customer_country_name = 'Chad';
                break;

            case 'CL':
                $aventura_customer_country_name = 'Chile';
                break;

            case 'CN':
                $aventura_customer_country_name = 'China';
                break;

            case 'CO':
                $aventura_customer_country_name = 'Colombia';
                break;

            case 'KM':
                $aventura_customer_country_name = 'Comoros';
                break;

            case 'CK':
                $aventura_customer_country_name = 'Cook Islands';
                break;

            case 'CR':
                $aventura_customer_country_name = 'Costa Rica';
                break;

            case 'CI':
                $aventura_customer_country_name = "Cote d\'Ivoire";
                break;

            case 'HR':
                $aventura_customer_country_name = 'Croatia';
                break;

            case 'CU':
                $aventura_customer_country_name = 'Cuba';
                break;

            case 'CY':
                $aventura_customer_country_name = 'Cyprus';
                break;

            case 'CZ':
                $aventura_customer_country_name = 'Czech Republic';
                break;

            case 'CD':
                $aventura_customer_country_name = 'Democratic Republic of Congo';
                break;

            case 'DK':
                $aventura_customer_country_name = 'Denmark';
                break;

            case 'DJ':
                $aventura_customer_country_name = 'Djibouti';
                break;

            case 'DM':
                $aventura_customer_country_name = 'Dominica';
                break;

            case 'DO':
                $aventura_customer_country_name = 'Dominican Republic';
                break;

            case 'EC':
                $aventura_customer_country_name = 'Ecuador';
                break;

            case 'EG':
                $aventura_customer_country_name = 'Egypt';
                break;

            case 'SV':
                $aventura_customer_country_name = 'El Salvador';
                break;

            case 'GQ':
                $aventura_customer_country_name = 'Equatorial Guinea';
                break;

            case 'ER':
                $aventura_customer_country_name = 'Eritrea';
                break;

            case 'EE':
                $aventura_customer_country_name = 'Estonia';
                break;

            case 'ET':
                $aventura_customer_country_name = 'Ethiopia';
                break;

            case 'FK':
                $aventura_customer_country_name = 'Falkland Islands';
                break;

            case 'FO':
                $aventura_customer_country_name = 'Faroe Islands';
                break;

            case 'FM':
                $aventura_customer_country_name = 'Federated States of Micronesia';
                break;

            case 'FJ':
                $aventura_customer_country_name = 'Fiji';
                break;

            case 'FI':
                $aventura_customer_country_name = 'Finland';
                break;

            case 'FR':
                $aventura_customer_country_name = 'France';
                break;

            case 'GF':
                $aventura_customer_country_name = 'French Guiana';
                break;

            case 'PF':
                $aventura_customer_country_name = 'French Polynesia';
                break;

            case 'GA':
                $aventura_customer_country_name = 'Gabon';
                break;

            case 'GE':
                $aventura_customer_country_name = 'Georgia';
                break;

            case 'DE':
                $aventura_customer_country_name = 'Germany';
                break;

            case 'GH':
                $aventura_customer_country_name = 'Ghana';
                break;

            case 'GI':
                $aventura_customer_country_name = 'Gibraltar';
                break;

            case 'GR':
                $aventura_customer_country_name = 'Greece';
                break;

            case 'GL':
                $aventura_customer_country_name = 'Greenland';
                break;

            case 'GD':
                $aventura_customer_country_name = 'Grenada';
                break;

            case 'GP':
                $aventura_customer_country_name = 'Guadeloupe';
                break;

            case 'GU':
                $aventura_customer_country_name = 'Guam';
                break;

            case 'GT':
                $aventura_customer_country_name = 'Guatemala';
                break;

            case 'GN':
                $aventura_customer_country_name = 'Guinea';
                break;

            case 'GW':
                $aventura_customer_country_name = 'Guinea-Bissau';
                break;

            case 'GY':
                $aventura_customer_country_name = 'Guyana';
                break;

            case 'HT':
                $aventura_customer_country_name = 'Haiti';
                break;

            case 'HN':
                $aventura_customer_country_name = 'Honduras';
                break;

            case 'HK':
                $aventura_customer_country_name = 'Hong Kong';
                break;

            case 'HU':
                $aventura_customer_country_name = 'Hungary';
                break;

            case 'IS':
                $aventura_customer_country_name = 'Iceland';
                break;

            case 'IN':
                $aventura_customer_country_name = 'India';
                break;

            case 'ID':
                $aventura_customer_country_name = 'Indonesia';
                break;

            case 'IR':
                $aventura_customer_country_name = 'Iran';
                break;

            case 'IQ':
                $aventura_customer_country_name = 'Iraq';
                break;

            case 'IE':
                $aventura_customer_country_name = 'Ireland';
                break;

            case 'IL':
                $aventura_customer_country_name = 'Israel';
                break;

            case 'IT':
                $aventura_customer_country_name = 'Italy';
                break;

            case 'JM':
                $aventura_customer_country_name = 'Jamaica';
                break;

            case 'JP':
                $aventura_customer_country_name = 'Japan';
                break;

            case 'JO':
                $aventura_customer_country_name = 'Jordan';
                break;

            case 'KZ':
                $aventura_customer_country_name = 'Kazakhstan';
                break;

            case 'KE':
                $aventura_customer_country_name = 'Kenya';
                break;

            case 'KI':
                $aventura_customer_country_name = 'Kiribati';
                break;

            case 'XK':
                $aventura_customer_country_name = 'Kosovo';
                break;

            case 'KW':
                $aventura_customer_country_name = 'Kuwait';
                break;

            case 'KG':
                $aventura_customer_country_name = 'Kyrgyzstan';
                break;

            case 'LA':
                $aventura_customer_country_name = 'Laos';
                break;

            case 'LV':
                $aventura_customer_country_name = 'Latvia';
                break;

            case 'LB':
                $aventura_customer_country_name = 'Lebanon';
                break;

            case 'LS':
                $aventura_customer_country_name = 'Lesotho';
                break;

            case 'LR':
                $aventura_customer_country_name = 'Liberia';
                break;

            case 'LY':
                $aventura_customer_country_name = 'Libya';
                break;

            case 'LI':
                $aventura_customer_country_name = 'Liechtenstein';
                break;

            case 'LT':
                $aventura_customer_country_name = 'Lithuania';
                break;

            case 'LU':
                $aventura_customer_country_name = 'Luxembourg';
                break;

            case 'MO':
                $aventura_customer_country_name = 'Macau';
                break;

            case 'MK':
                $aventura_customer_country_name = 'Macedonia';
                break;

            case 'MG':
                $aventura_customer_country_name = 'Madagascar';
                break;

            case 'MW':
                $aventura_customer_country_name = 'Malawi';
                break;

            case 'MY':
                $aventura_customer_country_name = 'Malaysia';
                break;

            case 'MV':
                $aventura_customer_country_name = 'Maldives';
                break;

            case 'ML':
                $aventura_customer_country_name = 'Mali';
                break;

            case 'MT':
                $aventura_customer_country_name = 'Malta';
                break;

            case 'MH':
                $aventura_customer_country_name = 'Marshall Islands';
                break;

            case 'MQ':
                $aventura_customer_country_name = 'Martinique';
                break;

            case 'MR':
                $aventura_customer_country_name = 'Mauritania';
                break;

            case 'MU':
                $aventura_customer_country_name = 'Mauritius';
                break;

            case 'YT':
                $aventura_customer_country_name = 'Mayotte';
                break;

            case 'MX':
                $aventura_customer_country_name = 'Mexico';
                break;

            case 'MD':
                $aventura_customer_country_name = 'Moldova';
                break;

            case 'MC':
                $aventura_customer_country_name = 'Monaco';
                break;

            case 'MN':
                $aventura_customer_country_name = 'Mongolia';
                break;

            case 'ME':
                $aventura_customer_country_name = 'Montenegro';
                break;

            case 'MS':
                $aventura_customer_country_name = 'Montserrat';
                break;

            case 'MA':
                $aventura_customer_country_name = 'Morocco';
                break;

            case 'MZ':
                $aventura_customer_country_name = 'Mozambique';
                break;

            case 'NA':
                $aventura_customer_country_name = 'Namibia';
                break;

            case 'NR':
                $aventura_customer_country_name = 'Nauru';
                break;

            case 'NP':
                $aventura_customer_country_name = 'Nepal';
                break;

            case 'NL':
                $aventura_customer_country_name = 'Netherlands';
                break;

            case 'AN':
                $aventura_customer_country_name = 'Netherlands Antilles';
                break;

            case 'NC':
                $aventura_customer_country_name = 'New Caledonia';
                break;
            case 'NZ':
                $aventura_customer_country_name = 'New Zealand';
                break;

            case 'NI':
                $aventura_customer_country_name = 'Nicaragua';
                break;

            case 'NE':
                $aventura_customer_country_name = 'Niger';
                break;

            case 'NG':
                $aventura_customer_country_name = 'Nigeria';
                break;

            case 'NU':
                $aventura_customer_country_name = 'Niue';
                break;

            case 'NF':
                $aventura_customer_country_name = 'Norfolk Island';
                break;

            case 'KP':
                $aventura_customer_country_name = 'North Korea';
                break;

            case 'MP':
                $aventura_customer_country_name = 'Northern Mariana Islands';
                break;

            case 'NO':
                $aventura_customer_country_name = 'Norway';
                break;

            case 'OM':
                $aventura_customer_country_name = 'Oman';
                break;

            case 'PK':
                $aventura_customer_country_name = 'Pakistan';
                break;

            case 'PW':
                $aventura_customer_country_name = 'Palau';
                break;

            case 'PS':
                $aventura_customer_country_name = 'Palestine';
                break;

            case 'PA':
                $aventura_customer_country_name = 'Panama';
                break;

            case 'PG':
                $aventura_customer_country_name = 'Papua New Guinea';
                break;

            case 'PY':
                $aventura_customer_country_name = 'Paraguay';
                break;

            case 'PE':
                $aventura_customer_country_name = 'Peru';
                break;

            case 'PH':
                $aventura_customer_country_name = 'Philippines';
                break;

            case 'PL':
                $aventura_customer_country_name = 'Poland';
                break;

            case 'PT':
                $aventura_customer_country_name = 'Portugal';
                break;

            case 'PR':
                $aventura_customer_country_name = 'Puerto Rico';
                break;

            case 'QA':
                $aventura_customer_country_name = 'Qatar';
                break;

            case 'CG':
                $aventura_customer_country_name = 'Republic of the Congo';
                break;

            case 'RE':
                $aventura_customer_country_name = 'Reunion';
                break;

            case 'RO':
                $aventura_customer_country_name = 'Romania';
                break;

            case 'RU':
                $aventura_customer_country_name = 'Russia';
                break;

            case 'RW':
                $aventura_customer_country_name = 'Rwanda';
                break;

            case 'BL':
                $aventura_customer_country_name = 'Saint Barthelemy';
                break;

            case 'SH':
                $aventura_customer_country_name = 'Saint Helena';
                break;

            case 'KN':
                $aventura_customer_country_name = 'Saint Kitts and Nevis';
                break;

            case 'MF':
                $aventura_customer_country_name = 'Saint Martin';
                break;

            case 'PM':
                $aventura_customer_country_name = 'Saint Pierre and Miquelon';
                break;

            case 'VC':
                $aventura_customer_country_name = 'Saint Vincent and the Grenadines';
                break;

            case 'WS':
                $aventura_customer_country_name = 'Samoa';
                break;

            case 'SM':
                $aventura_customer_country_name = 'San Marino';
                break;

            case 'ST':
                $aventura_customer_country_name = 'Sao Tome and Principe';
                break;

            case 'SA':
                $aventura_customer_country_name = 'Saudi Arabia';
                break;

            case 'SN':
                $aventura_customer_country_name = 'Senegal';
                break;

            case 'RS':
                $aventura_customer_country_name = 'Serbia';
                break;

            case 'SC':
                $aventura_customer_country_name = 'Seychelles';
                break;

            case 'SL':
                $aventura_customer_country_name = 'Sierra Leone';
                break;

            case 'SG':
                $aventura_customer_country_name = 'Singapore';
                break;

            case 'SK':
                $aventura_customer_country_name = 'Slovakia';
                break;

            case 'SI':
                $aventura_customer_country_name = 'Slovenia';
                break;

            case 'SB':
                $aventura_customer_country_name = 'Solomon Islands';
                break;

            case 'SO':
                $aventura_customer_country_name = 'Somalia';
                break;

            case 'ZA':
                $aventura_customer_country_name = 'South Africa';
                break;

            case 'KR':
                $aventura_customer_country_name = 'South Korea';
                break;

            case 'ES':
                $aventura_customer_country_name = 'Spain';
                break;

            case 'LK':
                $aventura_customer_country_name = 'Sri Lanka';
                break;

            case 'LC':
                $aventura_customer_country_name = 'St. Lucia';
                break;

            case 'SD':
                $aventura_customer_country_name = 'Sudan';
                break;

            case 'SR':
                $aventura_customer_country_name = 'Suriname';
                break;

            case 'SZ':
                $aventura_customer_country_name = 'Swaziland';
                break;

            case 'SE':
                $aventura_customer_country_name = 'Sweden';
                break;

            case 'CH':
                $aventura_customer_country_name = 'Switzerland';
                break;

            case 'SY':
                $aventura_customer_country_name = 'Syria';
                break;

            case 'TW':
                $aventura_customer_country_name = 'Taiwan';
                break;

            case 'TJ':
                $aventura_customer_country_name = 'Tajikistan';
                break;

            case 'TZ':
                $aventura_customer_country_name = 'Tanzania';
                break;

            case 'TH':
                $aventura_customer_country_name = 'Thailand';
                break;

            case 'BS':
                $aventura_customer_country_name = 'The Bahamas';
                break;

            case 'GM':
                $aventura_customer_country_name = 'The Gambia';
                break;

            case 'TL':
                $aventura_customer_country_name = 'Timor-Leste';
                break;

            case 'TG':
                $aventura_customer_country_name = 'Togo';
                break;

            case 'TK':
                $aventura_customer_country_name = 'Tokelau';
                break;

            case 'TO':
                $aventura_customer_country_name = 'Tonga';
                break;

            case 'TT':
                $aventura_customer_country_name = 'Trinidad and Tobago';
                break;

            case 'TN':
                $aventura_customer_country_name = 'Tunisia';
                break;

            case 'TR':
                $aventura_customer_country_name = 'Turkey';
                break;

            case 'TM':
                $aventura_customer_country_name = 'Turkmenistan';
                break;

            case 'TC':
                $aventura_customer_country_name = 'Turks and Caicos Islands';
                break;

            case 'TV':
                $aventura_customer_country_name = 'Tuvalu';
                break;

            case 'UG':
                $aventura_customer_country_name = 'Uganda';
                break;

            case 'UA':
                $aventura_customer_country_name = 'Ukraine';
                break;

            case 'AE':
                $aventura_customer_country_name = 'United Arab Emirates';
                break;

            case 'UY':
                $aventura_customer_country_name = 'Uruguay';
                break;

            case 'VI':
                $aventura_customer_country_name = 'US Virgin Islands';
                break;

            case 'UZ':
                $aventura_customer_country_name = 'Uzbekistan';
                break;

            case 'VU':
                $aventura_customer_country_name = 'Vanuatu';
                break;

            case 'VA':
                $aventura_customer_country_name = 'Vatican City';
                break;

            case 'VE':
                $aventura_customer_country_name = 'Venezuela';
                break;

            case 'VN':
                $aventura_customer_country_name = 'Vietnam';
                break;

            case 'WF':
                $aventura_customer_country_name = 'Wallis and Futuna';
                break;

            case 'YE':
                $aventura_customer_country_name = 'Yemen';
                break;

            case 'ZM':
                $aventura_customer_country_name = 'Zambia';
                break;

            case 'ZW':
                $aventura_customer_country_name = 'Zimbabwe';
                break;

            default:
                $aventura_customer_country_name = 'United States';
                break;
        }

        switch ($aventura_order_payment_method){
            case 'cash':
                $aventura_order_payment_method_name = 'Payment by cash';
                break;

            case 'paypal':
                $aventura_order_payment_method_name = 'Payment by paypal';
                break;

            case 'cc':
                $aventura_order_payment_method_name = 'Payment by credit card';
                break;

            default:
                $aventura_order_payment_method_name = '';
                break;
        }

        // Order & Billing address output
        $aventura_order_output = "";
        $aventura_order_output .= "<h4>". esc_html__('Order Details','aventura') ."</h4>\n";
        $aventura_order_output .= "<table'>
        <tr>
            <th>".esc_html__('Booking No','aventura')."</th>
            <th>".esc_html__('Tour Name','aventura')."</th>
            <th>".esc_html__('Date Time','aventura')."</th>";
        if($aventura_name_combo != ''){
            $aventura_order_output .= "<th>".esc_html__('Combo','aventura')."</th>";
        }else{
            $aventura_order_output .= "<th>".esc_html__('Adult','aventura')."</th>
            <th>".esc_html__('Children','aventura')."</th>";
        }
        $aventura_order_output .= "<th>".esc_html__('Total Price','aventura')."</th>
            <th>".esc_html__('Payment Method','aventura')."</th>
        </tr>
        <tr>
            <td>". $aventura_booking_no ."</td>        
            <td>". $aventura_tour_name ."</td>        
            <td>". $aventura_booking_date ." ". $aventura_booking_time ."</td>";
        if($aventura_name_combo != ''){
            $aventura_order_output .= "<td>". $aventura_name_combo ."</td>";
        }else{
            $aventura_order_output .= "<td>". $aventura_booking_adults ."</td>              
            <td>". $aventura_booking_kids ."</td>";
        }

        $aventura_order_output .= "<td>". $aventura_booking_total_price ."</td>
            <td>". $aventura_order_payment_method_name ."</td>              
        </tr>
        </table>\n";
        $aventura_order_output .= "<h4>". esc_html__('Billing address','aventura') ."</h4>\n";
        $aventura_order_output .= "<table'>
        <tr>
            <th>".esc_html__('Name','aventura')."</th>
            <th>".esc_html__('Email','aventura')."</th>
            <th>".esc_html__('Phone','aventura')."</th>
            <th>".esc_html__('Address','aventura')."</th>
            <th>".esc_html__('City','aventura')."</th>
            <th>".esc_html__('State','aventura')."</th>
            <th>".esc_html__('Postal Code','aventura')."</th>
            <th>".esc_html__('Country','aventura')."</th>
            <th>".esc_html__('Order notes','aventura')."</th>
        </tr>
        <tr>
            <td>". $aventura_customer_first_name." ". $aventura_customer_last_name ."</td>        
            <td>". $aventura_to_address ."</td>              
            <td>". $aventura_customer_phone ."</td>              
            <td>". $aventura_customer_address ."</td>              
            <td>". $aventura_customer_city ."</td>                           
            <td>". $aventura_customer_state ."</td>              
            <td>". $aventura_customer_zip ."</td>              
            <td>". $aventura_customer_country_name ."</td>              
            <td>". $aventura_customer_order_notes ."</td>              
        </tr>
        </table>\n";

        //Create Email Headers
        $aventura_headers = "MIME-Version: 1.0" . "\r\n";
        $aventura_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $aventura_headers .= "From: ".$aventura_from_name." <".$aventura_from_address.">\n";
        $aventura_headers .= "Reply-To: ".$aventura_from_name." <".$aventura_from_address.">\n";
        $aventura_message = "<html>\n";
        $aventura_message .= "<head>
                                <style>
                                table {
                                    border-collapse: collapse;
                                }
                                
                                td, th {
                                    border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;
                                }
                                </style>
                            </head>";
        $aventura_message .= "<body>\n";
        if($aventura_order_option == true && $aventura_order_position == 'before'){
            $aventura_message .= $aventura_order_output;
        }
        $aventura_message .= $aventura_description . "\n";
        if($aventura_order_option == true && $aventura_order_position == 'after'){
        $aventura_message .= $aventura_order_output;
        }
        $aventura_message .= "</body>\n";
        $aventura_message .= "</html>\n";
        $aventura_mailsent = wp_mail( $aventura_to_address, $aventura_subject, $aventura_message, $aventura_headers );
        return ($aventura_mailsent)?(true):(false);
    }
}
/****	End Page Thank You	****/

/****	Tour List-Grid	****/
/*
 * get temporary table name
 */
if ( ! function_exists( 'aventura_get_temp_table_name' ) ) {
    function aventura_get_temp_table_name() {
        $aventura_temp_tbl_name = str_replace( ' ', '', 'Search_' . session_id() ); // Replaces all spaces with hyphens.
        return esc_sql( preg_replace('/[^A-Za-z0-9\-]/', '', $aventura_temp_tbl_name) ); // Removes special chars.
    }
}

/*	Get Search Result	*/
if ( ! function_exists( 'aventura_tour_get_search_result' ) ) {
    function aventura_tour_get_search_result( $aventura_args ) {
        global $aventura_options, $wpdb;
        $aventura_s = '';
        $aventura_date = '';
        $aventura_tour_length = '';
        $aventura_categories_filter = array();
        $aventura_destination_filter = array();
        $aventura_language_filter = array();
        $aventura_price_filter = array();
        $aventura_rating_filter = array();
        $aventura_order_by = '';
        $aventura_order = '';
        $aventura_last_no = 0;
        $aventura_per_page = ( isset( $aventura_options['aventura_tour_archive_limit'] ) && is_numeric($aventura_options['aventura_tour_archive_limit']) )?$aventura_options['aventura_tour_archive_limit']:6;
        extract( $aventura_args );
        $aventura_order_array = array( 'ASC', 'DESC' );
        $aventura_order_by_array = array(
            '' 			=> '',
            'name' 		=> 'post_s1.post_title',
            'price' 	=> 'convert(meta_price.meta_value, decimal)',
            'rating' 	=> 'meta_rating.meta_value',
            'popularity'=> 'convert(meta_views.meta_value, decimal)'
        );

        if ( ! array_key_exists( $aventura_order_by , $aventura_order_by_array) ) $aventura_order_by = '';
        if ( ! in_array( $aventura_order , $aventura_order_array) ) $aventura_order = 'DESC';

        $aventura_tbl_posts = esc_sql( $wpdb->posts );
        $aventura_tbl_postmeta = esc_sql( $wpdb->postmeta );
        $aventura_tbl_terms = esc_sql( $wpdb->prefix . 'terms' );
        $aventura_tbl_term_taxonomy = esc_sql( $wpdb->prefix . 'term_taxonomy' );
        $aventura_tbl_term_relationships = esc_sql( $wpdb->prefix . 'term_relationships' );
        $tbl_icl_translations = esc_sql( $wpdb->prefix . 'icl_translations' );
        $aventura_temp_tbl_name = aventura_get_temp_table_name();

        $s_query = "SELECT DISTINCT post_s1.ID AS tour_id FROM {$aventura_tbl_posts} AS post_s1";

        if (isset($GLOBALS["polylang"])) {
            $s_query .= " INNER JOIN {$aventura_tbl_term_relationships} AS ltr1 ON ltr1.object_id= post_s1.ID";
            $s_query .= " INNER JOIN {$aventura_tbl_term_taxonomy} AS ltt1 ON ltr1.term_taxonomy_id= ltt1.term_taxonomy_id";

//            var_dump($s_query);
        }

        $s_query .= " WHERE (post_s1.post_status = 'publish') AND (post_s1.post_type = 'tour')";
        if (isset($GLOBALS["polylang"])) {
            //            $currentLanguage  = get_bloginfo('language');
            $aventura_currentLanguage  = pll_current_language();
//            var_dump($aventura_currentLanguage);

            $aventura_term = get_term_by('slug',$aventura_currentLanguage,'language');
//            var_dump($aventura_term->term_id);

            $s_query .= " AND (ltt1.taxonomy = 'language') AND (ltt1.term_id = '{$aventura_term->term_id}')";
        }

        /*  search filter	*/
        if ( ! empty( $aventura_s ) ) {
            $s_query .= " AND ((post_s1.post_title LIKE '%{$aventura_s}%') OR (post_s1.post_content LIKE '%{$aventura_s}%') )";
        }

        // if wpml is enabled do search by default language post
        if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && defined('ICL_LANGUAGE_CODE') && ( aventura_get_lang_count() > 1 ) ) {
//            var_dump(aventura_get_default_language());
            $s_query = "SELECT DISTINCT it2.element_id AS tour_id FROM ({$s_query}) AS t0
						INNER JOIN {$tbl_icl_translations} it1 ON (it1.element_type = 'post_tour') AND it1.element_id = t0.tour_id
						INNER JOIN {$tbl_icl_translations} it2 ON (it2.element_type = 'post_tour') AND it2.language_code='" . aventura_get_default_language() . "' AND it2.trid = it1.trid ";
        }

        $aventura_sql = "SELECT t1.* FROM ( {$s_query} ) AS t1 ";

        if ( ! empty( $aventura_date ) ) {
            $aventura_date = esc_sql( date( 'Y-m-d', aventura_strtotime( $aventura_date ) ) );
            $day_of_week = esc_sql( date( 'w', aventura_strtotime( $aventura_date ) ) );

            $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_c2 ON (meta_c2.meta_key = 'aventura_tour_type') AND (t1.tour_id = meta_c2.post_id)";
            $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_c3 ON (meta_c3.meta_key = 'aventura_departure_date') AND (t1.tour_id = meta_c3.post_id)";
            $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_c4 ON (meta_c4.meta_key = 'aventura_tour_start_date') AND (t1.tour_id = meta_c4.post_id)";
            $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_c5 ON (meta_c5.meta_key = 'aventura_tour_end_date') AND (t1.tour_id = meta_c5.post_id)";
            $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_c6 ON (meta_c6.meta_key = 'aventura_available_days') AND (t1.tour_id = meta_c6.post_id)";
            $aventura_sql .= " LEFT JOIN ( SELECT tour_booking.tour_id, SUM( tour_booking.adults ) as adults, SUM( tour_booking.kids ) as kids FROM " . $wpdb->prefix . "aventura_tour_bookings AS tour_booking
						INNER JOIN " . $wpdb->prefix . "aventura_order as tour_order
						ON tour_order.id = tour_booking.order_id AND tour_order.status!='cancelled'
						WHERE tour_order.date_from = '{$aventura_date}'
						GROUP BY tour_booking.tour_id ) AS booking_info ON booking_info.tour_id = t1.tour_id";
            $aventura_sql .= " WHERE ((( meta_c2.meta_value='daily' ) AND ( IFNULL(meta_c4.meta_value, '0000-00-00') < '{$aventura_date}' ) AND ( IFNULL(meta_c5.meta_value, '9999-12-31') > '{$aventura_date}' ) AND ( IFNULL(meta_c6.meta_value, '{$day_of_week}') = '{$day_of_week}' )) OR ( meta_c2.meta_value='special' AND meta_c3.meta_value='{$aventura_date}' ))";
        }

        if( !empty( $aventura_tour_length ) ){
            $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_length ON (meta_length.meta_key = 'aventura_tour_duration_value') AND (t1.tour_id = meta_length.post_id)";
            $aventura_sql .= " WHERE meta_length.meta_value = '{$aventura_tour_length}' ";
        }

        // if wpml is enabled return current language posts
        if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && defined('ICL_LANGUAGE_CODE') && ( aventura_get_lang_count() > 1 ) && ( aventura_get_default_language() != ICL_LANGUAGE_CODE ) ) {
//            var_dump(ICL_LANGUAGE_CODE);
            $aventura_sql = "SELECT it4.element_id AS tour_id FROM ({$aventura_sql}) AS t5
					INNER JOIN {$tbl_icl_translations} it3 ON (it3.element_type = 'post_tour') AND it3.element_id = t5.tour_id
					INNER JOIN {$tbl_icl_translations} it4 ON (it4.element_type = 'post_tour') AND it4.language_code='" . ICL_LANGUAGE_CODE . "' AND it4.trid = it3.trid";
        }

        $aventura_sql = "CREATE TEMPORARY TABLE IF NOT EXISTS {$aventura_temp_tbl_name} AS " . $aventura_sql;
        $wpdb->query( $aventura_sql );

        $aventura_sql = " FROM {$aventura_temp_tbl_name} as t1
				INNER JOIN {$aventura_tbl_posts} post_s1 ON (t1.tour_id = post_s1.ID) AND (post_s1.post_status = 'publish') AND (post_s1.post_type = 'tour')";
        $aventura_where = ' WHERE 1=1';

        /* tour_category filter	*/
        if ( ! empty( $aventura_categories_filter ) && trim( implode( '', $aventura_categories_filter ) ) != "" ) {
            $aventura_where .= " AND (( SELECT COUNT(1) FROM {$aventura_tbl_term_relationships} AS tr
					INNER JOIN {$aventura_tbl_term_taxonomy} AS tt1 ON ( tr.term_taxonomy_id= tt1.term_taxonomy_id )
					WHERE tt1.taxonomy = 'tour-category' AND tt1.term_id IN (" . esc_sql( implode( ',', $aventura_categories_filter ) ) . ") AND tr.object_id = post_s1.ID ) = " . count( $aventura_categories_filter ) . ")";
        }

        /* tour_language filter	*/
        if ( ! empty( $aventura_language_filter ) && trim( implode( '', $aventura_language_filter ) ) != "" ) {
            $aventura_where .= " AND (( SELECT COUNT(1) FROM {$aventura_tbl_term_relationships} AS tr1
					INNER JOIN {$aventura_tbl_term_taxonomy} AS tt1 ON ( tr1.term_taxonomy_id= tt1.term_taxonomy_id )
					WHERE tt1.taxonomy = 'tour-language' AND tt1.term_id IN (" . esc_sql( implode( ',', $aventura_language_filter ) ) . ") AND tr1.object_id = post_s1.ID ) = " . count( $aventura_language_filter ) . ")";
        }

        /* tour_destination filter	*/
        if ( ! empty( $aventura_destination_filter ) && trim( implode( '', $aventura_destination_filter ) ) != "" ) {
            $aventura_destination_count = 1;
            $aventura_destination_meta  = "";
            foreach ($aventura_destination_filter as $aventura_destination_sql){
                $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_destination_".esc_sql($aventura_destination_count)." ON post_s1.ID = meta_destination_".esc_sql($aventura_destination_count).".post_id AND meta_destination_".esc_sql($aventura_destination_count).".meta_key = 'aventura_tour_destination'";
                $aventura_where .= " AND (meta_destination_".esc_sql($aventura_destination_count).".meta_value IN (".esc_sql($aventura_destination_sql)."))";
                $aventura_destination_meta .= " AND meta_destination_".esc_sql($aventura_destination_count).".post_id = post_s1.ID";
                $aventura_destination_count++;
            }

            $aventura_where .= $aventura_destination_meta." AND post_s1.post_type = 'tour'";

        }

        /* price filter	*/
        $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_price ON post_s1.ID = meta_price.post_id AND meta_price.meta_key = 'aventura_adult_price'";
        if ( ! empty( $aventura_price_filter ) && trim( implode( '', $aventura_price_filter ) ) != "" ) {
            $aventura_price_where = array();
            if ( $aventura_price_filter[0] < $aventura_price_filter[1] ) {
                $aventura_price_where[] = "( cast(meta_price.meta_value as unsigned) BETWEEN " . esc_sql( $aventura_price_filter[0] ) . " AND " . esc_sql( $aventura_price_filter[1] ) . " )";
            }elseif( $aventura_price_filter[0] > $aventura_price_filter[1] ){
                $aventura_price_where[] = "( cast(meta_price.meta_value as unsigned) BETWEEN " . esc_sql( $aventura_price_filter[1] ) . " AND " . esc_sql( $aventura_price_filter[0] ) . " )";
            } else {
                $aventura_price_where[] = "( cast(meta_price.meta_value as unsigned) = " . esc_sql( $aventura_price_filter[0] ) . " )";
            }
            $aventura_where .= " AND ( " . implode( ' OR ', $aventura_price_where ) . " )";
        }

        /* rating filter */
        $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_rating ON post_s1.ID = meta_rating.post_id AND meta_rating.meta_key = 'tz-average-rating'";
        if ( ! empty( $aventura_rating_filter ) && trim( implode( '', $aventura_rating_filter ) ) != "" && $aventura_rating_filter[0] != 0 ) {
            $aventura_where .= " AND meta_rating.meta_value IN (" . esc_sql( implode( ',', $aventura_rating_filter ) ) . ")  ";
        }

        /* views filter	*/
        $aventura_sql .= " LEFT JOIN {$aventura_tbl_postmeta} AS meta_views ON post_s1.ID = meta_views.post_id AND meta_views.meta_key = 'post_views_count'";

        $aventura_sql .= $aventura_where;
        $aventura_count_sql = "SELECT COUNT(DISTINCT t1.tour_id)" . $aventura_sql;
        $aventura_count = $wpdb->get_var( $aventura_count_sql );

        if ( ! empty( $aventura_order_by ) ) {
            $aventura_sql .= " ORDER BY " . $aventura_order_by_array[$aventura_order_by] . " " . $aventura_order;
        }
        $aventura_sql .= " LIMIT {$aventura_last_no}, {$aventura_per_page};";
        $aventura_main_sql = "SELECT DISTINCT t1.tour_id AS tour_id" . $aventura_sql;

        $aventura_ids = $wpdb->get_results( $aventura_main_sql, ARRAY_A );
        return array( 'count' => $aventura_count, 'ids' => $aventura_ids );
    }
}

/*
 * get language count
 */
if ( ! function_exists( 'aventura_get_lang_count' ) ) {
    function aventura_get_lang_count() {
        $language_count = 1;
        // wpml variables
        if ( defined('ICL_LANGUAGE_CODE') ) {
            $languages = icl_get_languages('skip_missing=1');
            $language_count = count( $languages );
        }
        return $language_count;
    }
}

/*
 * get default language
 */
if ( ! function_exists( 'aventura_get_default_language' ) ) {
    function aventura_get_default_language() {
        global $sitepress;

        if ( $sitepress ) {
            return $sitepress->get_default_language();
        } elseif ( defined(WPLANG) ) {
            return WPLANG;
        }

        return "en";
    }
}

/****	End Page Thank You	****/

/****	Tour List & Grid	****/

/*  Form Booking Ajax  */
function aventura_ajax_booking_form () {
    global $aventura_options;
    $aventura_tour_ID        = $_POST['post_id'];
    $aventura_people_available = $_POST['people_available'];
    $aventura_tour_type      = $_POST['tour_type'];
    $aventura_max_adults     = $_POST['max_adults'];
    $aventura_max_kids       = $_POST['max_kids'];
    $aventura_adult_price    = $_POST['adults_price'];
    $aventura_child_price    = $_POST['child_price'];

    $aventura_discount    					= $_POST['discount'];
    $aventura_tour_available_days    		= $_POST['available'];
    $aventura_tour_start_date_milli_sec    	= $_POST['start_date'];
    $aventura_tour_end_date_milli_sec    	= $_POST['end_date'];
    $aventura_tour_departure_time    	    = $_POST['departure_time'];

    $aventura_decimal_prec       = isset( $aventura_options['aventura_currency_decimal_prec'] ) ? $aventura_options['aventura_currency_decimal_prec'] : 2;
    $aventura_decimal_sep        = isset( $aventura_options['aventura_currency_decimal_sep'] ) ? $aventura_options['aventura_currency_decimal_sep'] : '.';
    $aventura_thousands_sep      = isset( $aventura_options['aventura_currency_thousands_sep'] ) ? $aventura_options['aventura_currency_thousands_sep'] : ',';

    $aventura_add_combo             =   aventura_metabox( 'aventura_add_combo','',$aventura_tour_ID,'' );
    $aventura_add_combo_tour        =   aventura_metabox( 'aventura_add_combo_tour','',$aventura_tour_ID,'' );

    $aventura_check_has_combo = false;
    foreach ( $aventura_add_combo_tour as $aventura_combo_item ) {
        if( $aventura_combo_item['price_combo'] != '' && $aventura_combo_item['people_combo'] != '' && $aventura_combo_item['name_combo'] != '' ){
            $aventura_check_has_combo = true;
        }
    }
    $aventura_class_has_combo = '';
    if ( $aventura_check_has_combo == true ){
        $aventura_class_has_combo = 'has_combo';
    }

    $aventura_day_start_week = get_option('start_of_week');

    ?>
    <div class="tz-close-form-booking bg"></div>
    <div class="tz-tour-booking">
        <div class="tz-tour-book-form">
            <div class="tz-tour-price">
				<span class="tz-tour-total-price">
					<?php echo esc_html__('Total:','aventura');?>

                    <span class="total-price">
						<span class="total_all_price">
							<?php
                            //							$aventura_total_price           =   $aventura_adult_price;
                            //							if( isset($aventura_total_price) ){
                            //								echo aventura_price($aventura_total_price);
                            //							}
                            ?>

                            <?php
                            if($aventura_adult_price != ''){
                                echo aventura_price($aventura_adult_price);
                            }elseif($aventura_child_price != ''){
                                echo aventura_price($aventura_child_price);'';
                            }
                            ?>
						</span>
					</span>
				</span>
                <span class="tz-tour-price-per-person">
					<?php echo esc_html__('From','aventura');?>
                    <span class="price-per-person">
						<?php
                        //						if( isset($aventura_adult_price) ){
                        //							echo aventura_price($aventura_adult_price);
                        //						}
                        ?>

                        <?php
                        if($aventura_adult_price != ''){
                            echo aventura_price($aventura_adult_price);
                        }elseif($aventura_child_price != ''){
                            echo aventura_price($aventura_child_price);
                        }?>
					</span>
                    <?php echo esc_html__('/persion','aventura');?>
				</span>
            </div>
            <form method="get" id="booking-form" action="<?php echo esc_url( aventura_get_tour_cart_page() ); ?>">
                <input type="hidden" name="tour_id" value="<?php echo esc_attr($aventura_tour_ID);?>">
<!--                --><?php //if($aventura_people_available != NULL){?>
                <input type="hidden" name="people_available" value="<?php echo $aventura_people_available;?>">
<!--                --><?php //} ?>
                <div class="form-group">
                    <label><?php esc_html_e('First Name','aventura') ?></label>
                    <div class="book-name">
                        <input name="first_name" value="" placeholder="<?php esc_html_e('First name','aventura') ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php esc_html_e('Last Name','aventura') ?></label>
                    <div class="book-name">
                        <input name="last_name" value="" placeholder="<?php esc_html_e('Last name','aventura') ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php esc_html_e('Email','aventura') ?></label>
                    <div class="book-email">
                        <input name="your_email" value="" placeholder="<?php esc_html_e('Email','aventura') ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label><?php esc_html_e('Phone','aventura') ?></label>
                    <div class="book-phone">
                        <input name="your_phone" value="" placeholder="<?php esc_html_e('Phone','aventura') ?>" type="text">
                    </div>
                </div>
                <?php if($aventura_tour_type == 'daily'):?>
                    <div class="form-group">
                        <label><?php esc_html_e('Departure Date','aventura') ?></label>
                        <div class="book-departure-date">
                            <input class="date-pick form-control" data-locale="<?php echo esc_attr(get_locale()); ?>" data-day-start-week= "<?php echo esc_attr($aventura_day_start_week);?>" data-date-format="yyyy-mm-dd" type="text" name="date" placeholder="<?php esc_html_e('mm/dd/yyyy','aventura') ?>">
                        </div>
                    </div>
                <?php endif;?>
                <?php if ( ! empty( $aventura_tour_departure_time ) ) :?>
                    <div class="form-group">
                        <label><?php esc_html_e('Departure Time','aventura') ?></label>
                        <div class="book-departure-time">
                            <select name="departure_time">
                                <option  value=""><?php esc_html_e('Choose departure time','aventura' ); ?></option>
                                <?php

                                foreach ( $aventura_tour_departure_time as $aventura_time ) {
                                    echo '<option  value="' . esc_attr( $aventura_time ) . '">'. esc_html( $aventura_time ) .'</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                <?php endif;?>

                <p class="our-of-stock-message"><?php echo esc_html__('Out of stock','aventura'); ?></p>

                <?php if ( $aventura_check_has_combo == true ) : ?>
                    <div class="form-group">
                        <?php
                        echo '<label>'.esc_html__('Choose Combo','aventura').'</label>';
                        ?>
                        <div class="book-combo-tours">
                            <select id="price_combo" name="price_combo">
<!--                                --><?php
//                                foreach ( $aventura_add_combo as $aventura_combo ) {
//                                    echo '<option  value="' . esc_attr( $aventura_combo[1] ) . '">'. esc_html( $aventura_combo[0] ) .'</option>';
//                                }
//                                ?>
                                <?php
                                foreach ( $aventura_add_combo_tour as $aventura_combo_tour ) {
                                    echo '<option  value="' . esc_attr( $aventura_combo_tour['price_combo'] ) . '" data-people-combo="' . esc_attr( $aventura_combo_tour['people_combo'] ) . '">'. esc_html( $aventura_combo_tour['name_combo'] ) .'</option>';
                                }
                                ?>
                                <option  value="custom" selected><?php esc_html_e('Choose Persons','aventura' ); ?></option>
                            </select>
                            <input class="name_combo" name="name_combo" value="" type="hidden">
                            <input class="people_combo" name="people_combo" value="" type="hidden">
                        </div>
                    </div>
                <?php endif;?>
                <?php if( isset($aventura_adult_price) && $aventura_adult_price != 0 ){ ?>
                    <div class="form-group <?php echo esc_html($aventura_class_has_combo); ?>">
                        <label><?php esc_html_e('Adults','aventura') ?></label>
                        <div class="st_adults_children">
                            <div class="input-number-ticket">
                                <input class="input-number" name="number_adults" type="text" value="1" data-min="1" data-max="<?php echo esc_attr($aventura_max_adults); ?>"/>
                                <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                <input name="price_adults" value="<?php echo esc_html($aventura_adult_price); ?>" type="hidden">
                            </div>
                            <div class="tz_price">
                                <span class="adult_price"><?php if( isset($aventura_adult_price) ) echo esc_html('×&nbsp;').aventura_price($aventura_adult_price); ?></span>
                                <span class="total_price_adults"><?php if( isset($aventura_adult_price) ) echo esc_html('=&nbsp;').aventura_price($aventura_adult_price); ?></span>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if( isset($aventura_child_price) && $aventura_child_price != 0 ){ ?>
                    <div class="form-group <?php echo esc_html($aventura_class_has_combo); ?>">
                        <label><?php esc_html_e('Children','aventura') ?></label>
                        <div class="st_adults_children">
                            <div class="input-number-ticket">
                                <input class="input-number" name="number_children" type="text" value="0" data-min="0" data-max="<?php echo esc_attr($aventura_max_kids); ?>"/>
                                <span class="input-number-decrement"><i class="fa fa-caret-left"></i></span><span class="input-number-increment"><i class="fa fa-caret-right"></i></span>
                                <input name="price_child" value="<?php echo esc_html($aventura_child_price); ?>" type="hidden">
                            </div>
                            <div class="tz_price">
                                <span class="child_price"><?php if( isset($aventura_child_price) ) echo esc_html('×&nbsp;').aventura_price($aventura_child_price); ?></span>
                                <span class="total_price_children"><?php echo esc_html('=&nbsp;').aventura_price(0); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <p class="book-message">
                    <?php echo esc_html__('Exceed the maximum number of people for this tour. The number of seats available is ','aventura')?>
                    <span class="book-number-available">10</span>
                </p>
                <button type="submit" class="btn_full book-now"><?php echo esc_html__( 'Booking now', 'aventura' ) ?></button>
            </form>
            <span class="tz-close-form-booking"><i class="fa fa-close"></i></span>
        </div>
        <div class="tz-tour-data" data-adults-price="<?php if($aventura_adult_price != ''){ echo esc_attr( $aventura_adult_price ); }else{ echo '0';} ?>" data-child-price="<?php if($aventura_child_price != ''){ echo esc_attr( $aventura_child_price ); }else{ echo '0';} ?>" data-discount="<?php echo esc_attr( $aventura_discount ); ?>" data-available-days='<?php echo json_encode($aventura_tour_available_days );?>' data-start-date="<?php echo esc_attr($aventura_tour_start_date_milli_sec); ?>" data-end-date="<?php echo esc_attr($aventura_tour_end_date_milli_sec); ?>" data-decimal-prec="<?php echo esc_attr($aventura_decimal_prec); ?>" data-decimal-sep="<?php echo esc_attr($aventura_decimal_sep); ?>" data-thousands-sep="<?php echo esc_attr($aventura_thousands_sep); ?>" data-departure-time='<?php echo json_encode($aventura_tour_departure_time );?>'></div>
    </div>
    <?php
    wp_die();
}

if ( is_user_logged_in() ) {
    add_action('wp_ajax_aventura_ajax_booking_form','aventura_ajax_booking_form');
}else{
    add_action('wp_ajax_nopriv_aventura_ajax_booking_form','aventura_ajax_booking_form');
}
/*  End Form Booking Ajax  */

/*  Review Lightbox Ajax  */
function aventura_review_lightbox () {
    $aventura_post_id       = $_POST['post_id'];

    $aventura_args = array(
        'post_id' => $aventura_post_id
    );
    $aventura_comments = get_comments( $aventura_args );
    $aventura_comments_number = get_comments_number($aventura_post_id);

    echo '<div class="tz-close-preview bg"></div>';
    echo '<div class="reviews">';
    if( isset($aventura_comments) && !empty($aventura_comments) ){
        if( $aventura_comments_number > 2 ){
            echo '<h2 class="comments-title">'.esc_html($aventura_comments_number).esc_html__(' Reviews','aventura').'</h2>';
        }else{
            echo '<h2 class="comments-title">'.esc_html($aventura_comments_number).esc_html__(' Review','aventura').'</h2>';
        }
        echo '<ol class="comment-list">';
        foreach($aventura_comments as $aventura_comment) {
            $aventura_comment_ID = $aventura_comment->comment_ID;
            ?>
            <li id="li-comment-<?php echo esc_attr($aventura_comment_ID); ?>">
                <div id="comment-<?php echo esc_attr($aventura_comment_ID); ?>" class="comments">
                    <div class="comment-meta comment-author vcard">
                        <img src="<?php echo get_avatar_url( $aventura_comment->user_id,array('size'=> 75,)); ?>" alt="avatar">
                    </div>

                    <?php if ( '0' == $aventura_comment->comment_approved ) : ?>
                        <p class="comment-awaiting-moderation"><?php  esc_html_e( 'Your comment is awaiting moderation.', 'aventura'); ?></p>
                    <?php endif; ?>

                    <div class="comment-content">
                        <?php
                        /*	Get Author	*/
                        $aventura_author_url    = $aventura_comment->comment_author_url;
                        $aventura_author  		= $aventura_comment->comment_author;
                        if ( empty( $aventura_author_url ) || 'http://' == $aventura_author_url ){
                            echo '<h5 class="fn">'.esc_attr($aventura_author).'</h5>';
                        }else{
                            echo '<h5 class="fn"><a href="'.esc_url($aventura_author_url).'" rel="external nofollow" class="url">'.esc_html($aventura_author).'</a></h5>';
                        }

                        /*	Get Time	*/
                        $aventura_comment_date = false ? $aventura_comment->comment_date_gmt : $aventura_comment->comment_date;
                        $aventura_date = mysql2date(get_option('time_format'), $aventura_comment_date, true);

                        ?>

                        <div class="content">
                            <span class="time"><?php echo esc_attr($aventura_date); ?></span>
                            <span class="sp"> <?php echo esc_html__('-','aventura'); ?></span>
                            <span class="date"><?php comment_date('',$aventura_comment_ID); ?></span>
                        </div>
                        <?php
                        comment_text($aventura_comment_ID);

                        // Get rating
                        $aventura_rating = get_comment_meta( $aventura_comment_ID, 'tz-rating', true );
                        $aventura_rating = ( empty( $aventura_rating ) ? 0 : $aventura_rating );

                        // Build rating HTML
                        if( $aventura_rating == 5 ){
                            echo '<div class="tz-average-rating rating"><div class="tz-rating tz-rating-50">' . esc_html($aventura_rating) . '</div></div>';
                        }else{
                            echo '<div class="tz-average-rating rating"><div class="tz-rating tz-rating-' . esc_attr($aventura_rating) . '">' . esc_html($aventura_rating) . '</div></div>';
                        }
                        ?>

                    </div><!-- .comment-content -->
                    <div class="clearfix"></div>
                </div><!-- #comment-## -->
            </li>
            <?php
        }
        echo '</ol>'; ?>
        <?php
    }else{
        echo '<h2 class="comments-title notdata">'.esc_html__('Did not find review', 'aventura').'</h2>';
    }
    echo '<a class="permalink" href="'.get_the_permalink($aventura_post_id).'" target="_blank">'.esc_html__('Go To Reviews','aventura').'</a>';
    echo '<div class="tz-close-preview"><i class="fa fa-close"></i></div>';
    echo '</div>';

    wp_die();
}

if ( is_user_logged_in() ) {
    add_action('wp_ajax_aventura_review_lightbox','aventura_review_lightbox');
}else{
    add_action('wp_ajax_nopriv_aventura_review_lightbox','aventura_review_lightbox');
}
/*  End Form Review Ajax  */

/****	End Tour List & Grid	****/

/****	Tour Woocommerce	****/

/*
 * Add Tour product to WooCommerce Cart
 */
if ( ! function_exists( 'aventura_add_tour_to_woo_cart' ) ) {
    function aventura_add_tour_to_woo_cart() {
        if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'tour_update_cart' ) ) {
            print esc_html__( 'Sorry, your nonce did not verify.', 'aventura' );
            exit;
        }

        // init variables
        $tour_id = $_POST['tour_id'];
        $tour_date = $_POST['date'];
        $tour_time = $_POST['time'];
//        $uid = $tour_id . $tour_date;
        $uid = $tour_id . str_replace( array('/') , '', $tour_date )  . str_replace( array(':') , '', $tour_time );

        $tour_product_id = aventura_create_tour_product( $tour_id, $uid );

        if ( !$tour_product_id || is_wp_error( $tour_product_id ) ) {
            wp_send_json( array( 'success'=>0, 'message'=>'Can not add Tour to Cart. Please try again later' ) );
        }

        global $woocommerce;

        $cart = $woocommerce->cart->get_cart();
        $in_cart = false;
        // check if product already in cart
        if ( count( $cart ) > 0 ) {
            foreach ( $cart as $cart_item_key => $values ) {
                $_product = $values['data'];
                if ( $_product->id == $tour_product_id ) {
                    $in_cart = true;
                }
            }
            if ( ! $in_cart ) {
                $woocommerce->cart->add_to_cart( $tour_product_id );
            }
        } else {
            $woocommerce->cart->add_to_cart( $tour_product_id );
        }
         $cart = $woocommerce->cart->get_cart();

        wp_send_json( array( 'success'=>1, 'message'=>'success' ) );
    }
}

add_action( 'wp_ajax_aventura_add_tour_to_woo_cart', 'aventura_add_tour_to_woo_cart' );
add_action( 'wp_ajax_nopriv_aventura_add_tour_to_woo_cart', 'aventura_add_tour_to_woo_cart' );


/*
 * Create product for selected Tour
 */
if ( ! function_exists( 'aventura_create_tour_product' ) ) {
    function aventura_create_tour_product( $aventura_tour_id, $aventura_uid ) {

        $aventura_discount = get_post_meta( $aventura_tour_id, 'aventura_tour_discount', true );
        $aventura_discount = empty( $aventura_discount ) ? 0 : $aventura_discount;

        $aventura_cart = new Aventura_Session_Cart();
        $aventura_cart_info = $aventura_cart->aventura_get( $aventura_uid );

        $aventura_date          =   $aventura_cart_info['date'];
        $aventura_time          =   $aventura_cart_info['time'];
        $aventura_adults        =   $aventura_cart_info['adults'];
        $aventura_kids          =   $aventura_cart_info['kids'];
        $aventura_name_combo    =   $aventura_cart_info['name_combo'];
        $aventura_people_combo  =   $aventura_cart_info['people_combo'];
        $aventura_price_combo   =   $aventura_cart_info['price_combo'];
        $aventura_total_price   =   $aventura_cart_info['total_price'];
        $aventura_total_adults  =   $aventura_cart_info['total_adults'];
        $aventura_total_kids    =   $aventura_cart_info['total_kids'];

        $tour_product = array(
            'post_title'        => get_the_title( $aventura_tour_id ),
            'post_content'      => '',
            'post_status'       => 'publish',
            'post_type'         => 'product',
            'comment_status'    => 'closed',
            'import_id'         => 125,
        );
        //Create Tour Product
        $tour_product_id = wp_insert_post( $tour_product );

        if( $tour_product_id ) {
            $attach_id = get_post_meta( $aventura_tour_id, "_thumbnail_id", true );
            update_post_meta( $tour_product_id, '_thumbnail_id', $attach_id );

            wp_set_object_terms( $tour_product_id, 'tour', 'product_cat' );
            wp_set_object_terms( $tour_product_id, 'simple_tour', 'product_type' );
//            update_post_meta( $tour_product_id, 'product_type', 'simple_tour' );

            $default_attributes = array();
            update_post_meta( $tour_product_id, '_sku', 'sku' . $aventura_uid );
            update_post_meta( $tour_product_id, '_stock_status', 'instock' );
            update_post_meta( $tour_product_id, '_visibility', 'visible' );
            update_post_meta( $tour_product_id, '_virtual', 'yes');
            update_post_meta( $tour_product_id, '_default_attributes', $default_attributes );
            update_post_meta( $tour_product_id, '_manage_stock', 'no' );
            update_post_meta( $tour_product_id, '_backorders', 'no' );



            $aventura_booking_price = $aventura_total_price * (100-$aventura_discount)/100;

            if( $aventura_price_combo != '' && $aventura_price_combo != 'custom' ){
                $aventura_booking_price = intval($aventura_price_combo) * (100-$aventura_discount)/100;
            }

            update_post_meta( $tour_product_id, '_regular_price', $aventura_booking_price );
            update_post_meta( $tour_product_id, '_sale_price', $aventura_booking_price );
            update_post_meta( $tour_product_id, '_price', $aventura_booking_price );

            update_post_meta( $tour_product_id, 'aventura_post_id', $aventura_tour_id );
            update_post_meta( $tour_product_id, 'aventura_booking_date', $aventura_date );
            update_post_meta( $tour_product_id, 'aventura_booking_time', $aventura_time );
            update_post_meta( $tour_product_id, 'aventura_total_price', $aventura_booking_price );

            $booking_info = array();

            $booking_info['tour_id']        = $aventura_tour_id;
            $booking_info['name_combo']     = $aventura_name_combo;
            $booking_info['people_combo']   = $aventura_people_combo;
            $booking_info['adults']         = $aventura_adults;
            $booking_info['kids']           = $aventura_kids;
            $booking_info['price_combo'] 	= $aventura_price_combo;
            $booking_info['total_adults']   = $aventura_total_adults;
            $booking_info['total_kids']     = $aventura_total_kids;
            $booking_info['total_price']    = $aventura_booking_price;

            update_post_meta( $tour_product_id, 'aventura_booking_info', $booking_info );

        }

        return $tour_product_id;
//        return $aventura_cart_info;
    }
}

/*
 * Check if Woocommerce Integration is enabled
 */

if ( ! function_exists( 'aventura_is_woocommerce_integration_enabled' ) ) {
    function aventura_is_woocommerce_integration_enabled() {
        global $aventura_options;
        $aventura_woocommerce     =    ((!isset($aventura_options['aventura_woocommerce_integration'])) || empty($aventura_options['aventura_woocommerce_integration'])) ? '' : $aventura_options['aventura_woocommerce_integration'];
        if ( $aventura_woocommerce && class_exists( 'WooCommerce' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * Apply a different tax rate based on the user role.
 */
function aventura_diff_rate_for_user( $tax_class, $product ) {
    $product_id = $product->get_id();
    $product_cats = wp_get_post_terms($product_id, 'product_cat');
    foreach ($product_cats as $cat){
        if( $cat->name == 'Tours' ){
            $tax_class = 'Zero Rate';
        }
    }
    return $tax_class;
}
add_filter( 'woocommerce_product_tax_class', 'aventura_diff_rate_for_user', 1, 2 );

/****	End Tour Woocommerce	****/

/*****  End Tour Function   *****/