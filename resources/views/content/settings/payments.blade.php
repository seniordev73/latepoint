@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Latepoint')

@section('content')
<link href="{{ asset('/assets/css/settings.css') }}" rel="stylesheet">
<link href="{{ asset('/assets/css/admin.css') }}" rel="stylesheet">

<div class="row">
    <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
        <div class="card-header mb-4 d-flex">
            <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">General</h4>
            </a>
            <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Schedule</h4>
            </a>
            <a href="{{ url('/admin/settings/tax') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Tax</h4>
            </a>
            <a href="{{ url('/admin/settings/steps') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Steps</h4>
            </a>
            <a href="{{ url('/admin/settings/payments') }}" class="agent-status-active text-center mx-2 acitive-tab">
                <h4 class="m-0 me-2">Payments</h4>
            </a>
            <a href="{{ url('/admin/settings/notifications') }}" class="agent-status-active text-center mx-2 ">
                <h4 class="m-0 me-2">Notifications</h4>
            </a>
            <a href="{{ url('/admin/settings/roles') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">Roles</h4>
            </a>
            <a href="{{ url('/admin/settings/system') }}" class="agent-status-active text-center mx-2">
                <h4 class="m-0 me-2">System</h4>
            </a>
            <hr>
        </div>
        <div class="col-md-12 os-form-w">
            @if($check == 0)
                <form action="{{route('admin.settings-storepayments')}}" data-os-action="settings__update" method="post">
                    @csrf
                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="45429e9a8b">
                    <input type="hidden" name="_wp_http_referer"
                        value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=settings__payments">
                    <div class="os-section-header">
                        <h3>Payment Processors</h3>
                    </div>
                    <div class="os-togglable-items-w">
                        <div class="os-togglable-item-w" id="paymentProcessorToggler_paypal">
                            <div class="os-togglable-item-head">
                                <div class="os-toggler-w">
                                    <input type="hidden" name="settings[enable_payment_processor_paypal]" value="off"
                                        id="settings_enable_payment_processor_paypal">
                                    <div data-controlled-toggle-id="togglePaymentSettings_paypal"
                                        class="os-toggler off size-large" data-is-string-value="true"
                                        data-for="settings_enable_payment_processor_paypal">
                                        <div class="toggler-rail">
                                            <div class="toggler-pill"></div>
                                        </div>
                                    </div>
                                </div>
                                <img class="os-togglable-item-logo-img"
                                    src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint-payments-paypal/public/images/processor-logo.png">
                                <div class="os-togglable-item-name">PayPal</div>
                            </div>
                            <div class="os-togglable-item-body" style="display: none" id="togglePaymentSettings_paypal">

                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>API Keys</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-form-group os-form-textfield-group os-form-group-bordered"><label
                                                for="settings_paypal_client_id">Client ID</label><input type="text"
                                                placeholder="Client ID" name="settings[paypal_client_id]" value=""
                                                theme="bordered" id="settings_paypal_client_id" class="os-form-control">
                                        </div>
                                        <div class="os-form-group os-form-textfield-group os-form-group-bordered"><label
                                                for="settings_paypal_client_secret">Secret Key</label><input type="password"
                                                placeholder="Secret Key" name="settings[paypal_client_secret]" value=""
                                                theme="bordered" id="settings_paypal_client_secret" class="os-form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Other Settings</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-row">
                                            <div class="os-col-6">
                                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                    <label for="settings_paypal_country_code">Country</label><select
                                                        name="settings[paypal_country_code]"
                                                        id="settings_paypal_country_code" class="os-form-control">
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AG">Antigua &amp; Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BA">Bosnia &amp; Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="VG">British Virgin Islands</option>
                                                        <option value="BN">Brunei</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="C2">China</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo - Brazzaville</option>
                                                        <option value="CD">Congo - Kinshasa</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte D’ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong Sar China</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Laos</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MK">Macedonia</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia</option>
                                                        <option value="MD">Moldova</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn Islands</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Réunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russia</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">São Tomé &amp; Príncipe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="KR">South Korea</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SH">St. Helena</option>
                                                        <option value="KN">St. Kitts &amp; Nevis</option>
                                                        <option value="LC">St. Lucia</option>
                                                        <option value="PM">St. Pierre &amp; Miquelon</option>
                                                        <option value="VC">St. Vincent &amp; Grenadines</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="TW">Taiwan</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad &amp; Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks &amp; Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US" selected="">United States</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VA">Vatican City</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="WF">Wallis &amp; Futuna</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="os-col-6">
                                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                    <label for="settings_paypal_currency_iso_code">Currency
                                                        Code</label><select name="settings[paypal_currency_iso_code]"
                                                        id="settings_paypal_currency_iso_code" class="os-form-control">
                                                        <option value="AUD">Australian dollar</option>
                                                        <option value="BRL">Brazilian real</option>
                                                        <option value="CAD">Canadian dollar</option>
                                                        <option value="COP">Colombian Pesos</option>
                                                        <option value="CZK">Czech koruna</option>
                                                        <option value="DKK">Danish krone</option>
                                                        <option value="EUR">Euro</option>
                                                        <option value="HKD">Hong Kong dollar</option>
                                                        <option value="HUF">Hungarian forint</option>
                                                        <option value="INR">Indian rupee</option>
                                                        <option value="ILS">Israeli new shekel</option>
                                                        <option value="JPY">Japanese yen</option>
                                                        <option value="MYR">Malaysian ringgit</option>
                                                        <option value="MXN">Mexican peso</option>
                                                        <option value="TWD">New Taiwan dollar</option>
                                                        <option value="NZD">New Zealand dollar</option>
                                                        <option value="NOK">Norwegian krone</option>
                                                        <option value="PHP">Philippine peso</option>
                                                        <option value="PLN">Polish złoty</option>
                                                        <option value="GBP">Pound sterling</option>
                                                        <option value="RUB">Russian ruble</option>
                                                        <option value="SGD">Singapore dollar</option>
                                                        <option value="SEK">Swedish krona</option>
                                                        <option value="CHF">Swiss franc</option>
                                                        <option value="THB">Thai baht</option>
                                                        <option value="USD" selected="">United States dollar
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="os-togglable-item-w" id="paymentProcessorToggler_stripe">
                            <div class="os-togglable-item-head">
                                <div class="os-toggler-w">
                                    <input type="hidden" name="settings[enable_payment_processor_stripe]" value="off"
                                        id="settings_enable_payment_processor_stripe">
                                    <div data-controlled-toggle-id="togglePaymentSettings_stripe"
                                        class="os-toggler off size-large" data-is-string-value="true"
                                        data-for="settings_enable_payment_processor_stripe">
                                        <div class="toggler-rail">
                                            <div class="toggler-pill"></div>
                                        </div>
                                    </div>
                                </div>
                                <img class="os-togglable-item-logo-img"
                                    src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint-payments-stripe/public/images/processor-logo.png">
                                <div class="os-togglable-item-name">Stripe</div>
                            </div>
                            <div class="os-togglable-item-body" style="display: none" id="togglePaymentSettings_stripe">
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>API Keys</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-row">
                                            <div class="os-col-6">
                                                <div
                                                    class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                    <label for="settings_stripe_secret_key">Secret Key</label><input
                                                        type="password" placeholder="Secret Key"
                                                        name="settings[stripe_secret_key]" value=""
                                                        id="settings_stripe_secret_key" class="os-form-control">
                                                </div>
                                            </div>
                                            <div class="os-col-6">
                                                <div
                                                    class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                    <label for="settings_stripe_publishable_key">Publishable
                                                        Key</label><input type="text" placeholder="Publishable Key"
                                                        name="settings[stripe_publishable_key]" value=""
                                                        id="settings_stripe_publishable_key" class="os-form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Checkout Type</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="latepoint-message latepoint-message-subtle">There are two ways to
                                            accept payments via Stripe. 1. Stripe Elements: supports credit card and iDEAL
                                            payments directly in your booking form, matching its look and feel. 2. Stripe
                                            Checkout: supports more payment methods, but will redirect a customer to a
                                            Stripe hosted page to finish the payment.</div>
                                        <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                name="settings[stripe_checkout_type]"
                                                class="display-toggler-control os-form-control"
                                                data-toggler-group="stripe-checkout-type"
                                                id="settings_stripe_checkout_type">
                                                <option value="elements" selected="">Stripe Elements</option>
                                                <option value="checkout">Stripe Checkout</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Payment Methods</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="stripe-elements-payments-grid display-toggler-target"
                                            data-toggler-group="stripe-checkout-type" data-toggler-key="elements"><input
                                                type="hidden" name="settings[stripe_elements_enabled_payment_methods]"
                                                value="" id="settings_stripe_elements_enabled_payment_methods">
                                            <div class="os-form-group os-form-toggler-group"><input type="hidden"
                                                    name="settings[stripe_elements_enabled_payment_methods][card]"
                                                    value="off" id="settings_stripe_elements_enabled_payment_methods_card"
                                                    class="os-form-checkbox">
                                                <div class="os-toggler off size-normal" data-is-string-value="true"
                                                    data-for="settings_stripe_elements_enabled_payment_methods_card">
                                                    <div class="toggler-rail">
                                                        <div class="toggler-pill"></div>
                                                    </div>
                                                </div>
                                                <div class="os-toggler-label-w"><label>Credit Card</label></div>
                                            </div>
                                            <div class="os-form-group os-form-toggler-group"><input type="hidden"
                                                    name="settings[stripe_elements_enabled_payment_methods][ideal]"
                                                    value="off" id="settings_stripe_elements_enabled_payment_methods_ideal"
                                                    class="os-form-checkbox">
                                                <div class="os-toggler off size-normal" data-is-string-value="true"
                                                    data-for="settings_stripe_elements_enabled_payment_methods_ideal">
                                                    <div class="toggler-rail">
                                                        <div class="toggler-pill"></div>
                                                    </div>
                                                </div>
                                                <div class="os-toggler-label-w"><label>iDEAL</label></div>
                                            </div>
                                        </div>
                                        <div class="display-toggler-target" data-toggler-group="stripe-checkout-type"
                                            data-toggler-key="checkout" style="display: none;">
                                            <div class="os-form-group os-form-toggler-group  with-sub-label size-normal">
                                                <input type="hidden" name="settings[stripe_checkout_manual_payment_methods]"
                                                    value="off" id="settings_stripe_checkout_manual_payment_methods">
                                                <div data-controlled-toggle-id="latepointStripeCheckoutManualPaymentMethods"
                                                    class="os-toggler off size-normal" data-is-string-value="true"
                                                    data-for="settings_stripe_checkout_manual_payment_methods">
                                                    <div class="toggler-rail">
                                                        <div class="toggler-pill"></div>
                                                    </div>
                                                </div>
                                                <div class="os-toggler-label-w"><label>I will pick here (Not
                                                        Recommended)</label><span>You should set enabled payment methods
                                                        through your Stripe Dashboard instead of setting them here</span>
                                                </div>
                                            </div>
                                            <div style="display: none;" id="latepointStripeCheckoutManualPaymentMethods"
                                                class="stripe-checkout-payments-grid"><input type="hidden"
                                                    name="settings[stripe_checkout_enabled_payment_methods]" value=""
                                                    id="settings_stripe_checkout_enabled_payment_methods">
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="alipay"
                                                        id="settings_stripe_checkout_enabled_payment_methods_alipay"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_alipay">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Alipay</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="card" checked=""
                                                        id="settings_stripe_checkout_enabled_payment_methods_card"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler on size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_card">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Credit Cards</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="ideal"
                                                        id="settings_stripe_checkout_enabled_payment_methods_ideal"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_ideal">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>iDEAL</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="fpx"
                                                        id="settings_stripe_checkout_enabled_payment_methods_fpx"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_fpx">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>FPX</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="bacs_debit"
                                                        id="settings_stripe_checkout_enabled_payment_methods_bacs_debit"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_bacs_debit">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>BASC Payments</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="bancontact"
                                                        id="settings_stripe_checkout_enabled_payment_methods_bancontact"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_bancontact">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Bancontact</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="giropay"
                                                        id="settings_stripe_checkout_enabled_payment_methods_giropay"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_giropay">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Giropay</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="p24"
                                                        id="settings_stripe_checkout_enabled_payment_methods_p24"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_p24">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Przelewy24</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="eps"
                                                        id="settings_stripe_checkout_enabled_payment_methods_eps"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_eps">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>EPS Payments</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="sofort"
                                                        id="settings_stripe_checkout_enabled_payment_methods_sofort"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_sofort">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Sofort Payments</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="sepa_debit"
                                                        id="settings_stripe_checkout_enabled_payment_methods_sepa_debit"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_sepa_debit">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>SEPA Direct Debit</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="grabpay"
                                                        id="settings_stripe_checkout_enabled_payment_methods_grabpay"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_grabpay">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>GrabPay Payments</label></div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="afterpay_clearpay"
                                                        id="settings_stripe_checkout_enabled_payment_methods_afterpay_clearpay"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_afterpay_clearpay">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Afterpay and Clearpay</label>
                                                    </div>
                                                </div>
                                                <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                        name="settings[stripe_checkout_enabled_payment_methods][]"
                                                        value="acss_debit"
                                                        id="settings_stripe_checkout_enabled_payment_methods_acss_debit"
                                                        class="os-form-checkbox" style="display: none;">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_checkout_enabled_payment_methods_acss_debit">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Canadian PAD (ACSS)</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Other Settings</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="os-row mb-2">
                                            <div class="os-col-6">
                                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                    <label for="settings_stripe_country_code">Country</label><select
                                                        name="settings[stripe_country_code]"
                                                        id="settings_stripe_country_code" class="os-form-control">
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IN">India</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US" selected="">United States</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="os-col-6">
                                                <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                    <label for="settings_stripe_currency_iso_code">Currency
                                                        Code</label><select name="settings[stripe_currency_iso_code]"
                                                        id="settings_stripe_currency_iso_code" class="os-form-control">
                                                        <option value="usd" selected="">usd</option>
                                                        <option value="aed">aed</option>
                                                        <option value="afn">afn</option>
                                                        <option value="all">all</option>
                                                        <option value="amd">amd</option>
                                                        <option value="ang">ang</option>
                                                        <option value="aoa">aoa</option>
                                                        <option value="ars">ars</option>
                                                        <option value="aud">aud</option>
                                                        <option value="awg">awg</option>
                                                        <option value="azn">azn</option>
                                                        <option value="bam">bam</option>
                                                        <option value="bbd">bbd</option>
                                                        <option value="bdt">bdt</option>
                                                        <option value="bgn">bgn</option>
                                                        <option value="bif">bif</option>
                                                        <option value="bmd">bmd</option>
                                                        <option value="bnd">bnd</option>
                                                        <option value="bob">bob</option>
                                                        <option value="brl">brl</option>
                                                        <option value="bsd">bsd</option>
                                                        <option value="bwp">bwp</option>
                                                        <option value="bzd">bzd</option>
                                                        <option value="cad">cad</option>
                                                        <option value="cdf">cdf</option>
                                                        <option value="chf">chf</option>
                                                        <option value="clp">clp</option>
                                                        <option value="cny">cny</option>
                                                        <option value="cop">cop</option>
                                                        <option value="crc">crc</option>
                                                        <option value="cve">cve</option>
                                                        <option value="czk">czk</option>
                                                        <option value="djf">djf</option>
                                                        <option value="dkk">dkk</option>
                                                        <option value="dop">dop</option>
                                                        <option value="dzd">dzd</option>
                                                        <option value="egp">egp</option>
                                                        <option value="etb">etb</option>
                                                        <option value="eur">eur</option>
                                                        <option value="fjd">fjd</option>
                                                        <option value="fkp">fkp</option>
                                                        <option value="gbp">gbp</option>
                                                        <option value="gel">gel</option>
                                                        <option value="gip">gip</option>
                                                        <option value="gmd">gmd</option>
                                                        <option value="gnf">gnf</option>
                                                        <option value="gtq">gtq</option>
                                                        <option value="gyd">gyd</option>
                                                        <option value="hkd">hkd</option>
                                                        <option value="hnl">hnl</option>
                                                        <option value="hrk">hrk</option>
                                                        <option value="htg">htg</option>
                                                        <option value="huf">huf</option>
                                                        <option value="idr">idr</option>
                                                        <option value="ils">ils</option>
                                                        <option value="inr">inr</option>
                                                        <option value="isk">isk</option>
                                                        <option value="jmd">jmd</option>
                                                        <option value="jpy">jpy</option>
                                                        <option value="kes">kes</option>
                                                        <option value="kgs">kgs</option>
                                                        <option value="khr">khr</option>
                                                        <option value="kmf">kmf</option>
                                                        <option value="krw">krw</option>
                                                        <option value="kyd">kyd</option>
                                                        <option value="kzt">kzt</option>
                                                        <option value="lak">lak</option>
                                                        <option value="lbp">lbp</option>
                                                        <option value="lkr">lkr</option>
                                                        <option value="lrd">lrd</option>
                                                        <option value="lsl">lsl</option>
                                                        <option value="mad">mad</option>
                                                        <option value="mdl">mdl</option>
                                                        <option value="mga">mga</option>
                                                        <option value="mkd">mkd</option>
                                                        <option value="mmk">mmk</option>
                                                        <option value="mnt">mnt</option>
                                                        <option value="mop">mop</option>
                                                        <option value="mro">mro</option>
                                                        <option value="mur">mur</option>
                                                        <option value="mvr">mvr</option>
                                                        <option value="mwk">mwk</option>
                                                        <option value="mxn">mxn</option>
                                                        <option value="myr">myr</option>
                                                        <option value="mzn">mzn</option>
                                                        <option value="nad">nad</option>
                                                        <option value="ngn">ngn</option>
                                                        <option value="nio">nio</option>
                                                        <option value="nok">nok</option>
                                                        <option value="npr">npr</option>
                                                        <option value="nzd">nzd</option>
                                                        <option value="pab">pab</option>
                                                        <option value="pen">pen</option>
                                                        <option value="pgk">pgk</option>
                                                        <option value="php">php</option>
                                                        <option value="pkr">pkr</option>
                                                        <option value="pln">pln</option>
                                                        <option value="pyg">pyg</option>
                                                        <option value="qar">qar</option>
                                                        <option value="ron">ron</option>
                                                        <option value="rsd">rsd</option>
                                                        <option value="rub">rub</option>
                                                        <option value="rwf">rwf</option>
                                                        <option value="sar">sar</option>
                                                        <option value="sbd">sbd</option>
                                                        <option value="scr">scr</option>
                                                        <option value="sek">sek</option>
                                                        <option value="sgd">sgd</option>
                                                        <option value="shp">shp</option>
                                                        <option value="sll">sll</option>
                                                        <option value="sos">sos</option>
                                                        <option value="srd">srd</option>
                                                        <option value="std">std</option>
                                                        <option value="svc">svc</option>
                                                        <option value="szl">szl</option>
                                                        <option value="thb">thb</option>
                                                        <option value="tjs">tjs</option>
                                                        <option value="top">top</option>
                                                        <option value="try">try</option>
                                                        <option value="ttd">ttd</option>
                                                        <option value="twd">twd</option>
                                                        <option value="tzs">tzs</option>
                                                        <option value="uah">uah</option>
                                                        <option value="ugx">ugx</option>
                                                        <option value="uyu">uyu</option>
                                                        <option value="uzs">uzs</option>
                                                        <option value="vnd">vnd</option>
                                                        <option value="vuv">vuv</option>
                                                        <option value="wst">wst</option>
                                                        <option value="xaf">xaf</option>
                                                        <option value="xcd">xcd</option>
                                                        <option value="xof">xof</option>
                                                        <option value="xpf">xpf</option>
                                                        <option value="yer">yer</option>
                                                        <option value="zar">zar</option>
                                                        <option value="zmw">zmw</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="os-row">
                                            <div class="os-col-12">
                                                <div class="os-form-group os-form-toggler-group  size-normal"><input
                                                        type="hidden" name="settings[stripe_remove_zip_code]" value="off"
                                                        id="settings_stripe_remove_zip_code">
                                                    <div class="os-toggler off size-normal" data-is-string-value="true"
                                                        data-for="settings_stripe_remove_zip_code">
                                                        <div class="toggler-rail">
                                                            <div class="toggler-pill"></div>
                                                        </div>
                                                    </div>
                                                    <div class="os-toggler-label-w"><label>Do not ask for Zip/Postal
                                                            Code</label></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="os-row">
                                            <div class="os-col-12">
                                                <div class="copyable-text-block">
                                                    <div class="text-label">
                                                        Webhook URL </div>
                                                    <input type="text" class="os-click-to-copy text-value"
                                                        data-copy-tooltip-position="left"
                                                        value="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-admin/admin-post.php?action=latepoint_route_call&amp;route_name=payments_stripe__webhook">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="os-section-header">
                        <h3>Other Settings</h3>
                    </div>
                    <div class="white-box">
                        <div class="white-box-header">
                            <div class="os-form-sub-header">
                                <h3>Payment Settings</h3>
                            </div>
                        </div>
                        <div class="white-box-content no-padding">
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Environment</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                            name="settings[payments_environment]" id="settings_payments_environment"
                                            class="os-form-control">
                                            <option value="live" selected="">Live (Production)</option>
                                            <option value="dev">Testing (Development)</option>
                                            <option value="demo">Demo</option>
                                        </select></div>
                                </div>
                            </div>

                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Local Payments</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="os-form-group os-form-toggler-group  with-sub-label size-normal"><input
                                            type="hidden" name="settings[enable_payments_local]" value="on"
                                            id="settings_enable_payments_local">
                                        <div class="os-toggler on size-normal" data-is-string-value="true"
                                            data-for="settings_enable_payments_local">
                                            <div class="toggler-rail">
                                                <div class="toggler-pill"></div>
                                            </div>
                                        </div>
                                        <div class="os-toggler-label-w"><label>Allow Paying Locally</label><span>Show "Pay
                                                Later" payment option</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="os-form-buttons">
                        <div class="os-form-group">
                            <button type="submit" name="submit" class="btn btn-primary" id="submit">Save Settings</button>
                        </div>
                    </div>
                </form>
            @else
                        @php
                            $value = unserialize($paymentVal->value);
                        @endphp
                        <form action="{{route('admin.settings-storepayments')}}" data-os-action="settings__update" method="post">
                            @csrf
                            <input type="hidden" id="_wpnonce" name="_wpnonce" value="45429e9a8b">
                            <input type="hidden" name="_wp_http_referer"
                                value="/demo_4217c15f9eb342a2/wp-admin/admin.php?page=latepoint&amp;route_name=settings__payments">
                            <div class="os-section-header">
                                <h3>Payment Processors</h3>
                            </div>
                            <div class="os-togglable-items-w">
                                <div class="os-togglable-item-w" id="paymentProcessorToggler_paypal">
                                    <div class="os-togglable-item-head">
                                        <div class="os-toggler-w">
                                            <input type="hidden" name="settings[enable_payment_processor_paypal]"
                                                value="{{$value['enable_payment_processor_paypal']}}"
                                                id="settings_enable_payment_processor_paypal">
                                            <div data-controlled-toggle-id="togglePaymentSettings_paypal"
                                                class="os-toggler {{$value['enable_payment_processor_paypal']}} size-large"
                                                data-is-string-value="true" data-for="settings_enable_payment_processor_paypal">
                                                <div class="toggler-rail">
                                                    <div class="toggler-pill"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="os-togglable-item-logo-img"
                                            src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint-payments-paypal/public/images/processor-logo.png">
                                        <div class="os-togglable-item-name">PayPal</div>
                                    </div>
                                    <div class="os-togglable-item-body"
                                        style="<?php    echo ($value['enable_payment_processor_paypal'] == 'on' ? '' : 'display:none;'); ?>"
                                        id="togglePaymentSettings_paypal">

                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>API Keys</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-form-group os-form-textfield-group os-form-group-bordered"><label
                                                        for="settings_paypal_client_id">Client ID</label><input type="text"
                                                        placeholder="Client ID" name="settings[paypal_client_id]"
                                                        value="{{$value['paypal_client_id']}}" theme="bordered"
                                                        id="settings_paypal_client_id" class="os-form-control">
                                                </div>
                                                <div class="os-form-group os-form-textfield-group os-form-group-bordered"><label
                                                        for="settings_paypal_client_secret">Secret Key</label><input type="password"
                                                        placeholder="Secret Key" name="settings[paypal_client_secret]"
                                                        value="{{$value['paypal_client_secret']}}" theme="bordered"
                                                        id="settings_paypal_client_secret" class="os-form-control"></div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Other Settings</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-row">
                                                    <div class="os-col-6">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <label for="settings_paypal_country_code">Country</label><select
                                                                name="settings[paypal_country_code]"
                                                                id="settings_paypal_country_code" class="os-form-control">
                                                                <option value="AL" <?php    echo ($value['paypal_country_code']) == 'AL' ? 'selected' : '';?>>
                                                                    Albania</option>
                                                                <option value="DZ" <?php    echo ($value['paypal_country_code']) == 'DZ' ? 'selected' : '';?>>
                                                                    Algeria</option>
                                                                <option value="AD" <?php    echo ($value['paypal_country_code']) == 'AD' ? 'selected' : '';?>>
                                                                    Andorra</option>
                                                                <option value="AO" <?php    echo ($value['paypal_country_code']) == 'AO' ? 'selected' : '';?>>
                                                                    Angola</option>
                                                                <option value="AI" <?php    echo ($value['paypal_country_code']) == 'AI' ? 'selected' : '';?>>
                                                                    Anguilla</option>
                                                                <option value="AG" <?php    echo ($value['paypal_country_code']) == 'AG' ? 'selected' : '';?>>
                                                                    Antigua &amp; Barbuda</option>
                                                                <option value="AR" <?php    echo ($value['paypal_country_code']) == 'AR' ? 'selected' : '';?>>
                                                                    Argentina</option>
                                                                <option value="AM" <?php    echo ($value['paypal_country_code']) == 'AM' ? 'selected' : '';?>>
                                                                    Armenia</option>
                                                                <option value="AW" <?php    echo ($value['paypal_country_code']) == 'AW' ? 'selected' : '';?>>Aruba
                                                                </option>
                                                                <option value="AU" <?php    echo ($value['paypal_country_code']) == 'AU' ? 'selected' : '';?>>
                                                                    Australia</option>
                                                                <option value="AT" <?php    echo ($value['paypal_country_code']) == 'AT' ? 'selected' : '';?>>
                                                                    Austria</option>
                                                                <option value="AZ" <?php    echo ($value['paypal_country_code']) == 'AZ' ? 'selected' : '';?>>
                                                                    Azerbaijan</option>
                                                                <option value="BS" <?php    echo ($value['paypal_country_code']) == 'BS' ? 'selected' : '';?>>
                                                                    Bahamas</option>
                                                                <option value="BH" <?php    echo ($value['paypal_country_code']) == 'BH' ? 'selected' : '';?>>
                                                                    Bahrain</option>
                                                                <option value="BB" <?php    echo ($value['paypal_country_code']) == 'BB' ? 'selected' : '';?>>
                                                                    Barbados</option>
                                                                <option value="BY" <?php    echo ($value['paypal_country_code']) == 'BY' ? 'selected' : '';?>>
                                                                    Belarus</option>
                                                                <option value="BE" <?php    echo ($value['paypal_country_code']) == 'BE' ? 'selected' : '';?>>
                                                                    Belgium</option>
                                                                <option value="BZ" <?php    echo ($value['paypal_country_code']) == 'BZ' ? 'selected' : '';?>>
                                                                    Belize</option>
                                                                <option value="BJ" <?php    echo ($value['paypal_country_code']) == 'BJ' ? 'selected' : '';?>>Benin
                                                                </option>
                                                                <option value="BM" <?php    echo ($value['paypal_country_code']) == 'BM' ? 'selected' : '';?>>
                                                                    Bermuda</option>
                                                                <option value="BT" <?php    echo ($value['paypal_country_code']) == 'BT' ? 'selected' : '';?>>
                                                                    Bhutan</option>
                                                                <option value="BO" <?php    echo ($value['paypal_country_code']) == 'BO' ? 'selected' : '';?>>
                                                                    Bolivia</option>
                                                                <option value="BA" <?php    echo ($value['paypal_country_code']) == 'BA' ? 'selected' : '';?>>
                                                                    Bosnia &amp; Herzegovina</option>
                                                                <option value="BW" <?php    echo ($value['paypal_country_code']) == 'BW' ? 'selected' : '';?>>
                                                                    Botswana</option>
                                                                <option value="BR" <?php    echo ($value['paypal_country_code']) == 'BR' ? 'selected' : '';?>>
                                                                    Brazil</option>
                                                                <option value="VG" <?php    echo ($value['paypal_country_code']) == 'VG' ? 'selected' : '';?>>
                                                                    British Virgin Islands</option>
                                                                <option value="BN" <?php    echo ($value['paypal_country_code']) == 'BN' ? 'selected' : '';?>>
                                                                    Brunei</option>
                                                                <option value="BG" <?php    echo ($value['paypal_country_code']) == 'BG' ? 'selected' : '';?>>
                                                                    Bulgaria</option>
                                                                <option value="BF" <?php    echo ($value['paypal_country_code']) == 'BF' ? 'selected' : '';?>>
                                                                    Burkina Faso</option>
                                                                <option value="BI" <?php    echo ($value['paypal_country_code']) == 'BI' ? 'selected' : '';?>>
                                                                    Burundi</option>
                                                                <option value="KH" <?php    echo ($value['paypal_country_code']) == 'KH' ? 'selected' : '';?>>
                                                                    Cambodia</option>
                                                                <option value="CM" <?php    echo ($value['paypal_country_code']) == 'CM' ? 'selected' : '';?>>
                                                                    Cameroon</option>
                                                                <option value="CA" <?php    echo ($value['paypal_country_code']) == 'CA' ? 'selected' : '';?>>
                                                                    Canada</option>
                                                                <option value="CV" <?php    echo ($value['paypal_country_code']) == 'CV' ? 'selected' : '';?>>Cape
                                                                    Verde</option>
                                                                <option value="KY" <?php    echo ($value['paypal_country_code']) == 'KY' ? 'selected' : '';?>>
                                                                    Cayman Islands</option>
                                                                <option value="TD" <?php    echo ($value['paypal_country_code']) == 'TD' ? 'selected' : '';?>>Chad
                                                                </option>
                                                                <option value="CL" <?php    echo ($value['paypal_country_code']) == 'CL' ? 'selected' : '';?>>Chile
                                                                </option>
                                                                <option value="C2" <?php    echo ($value['paypal_country_code']) == 'C2' ? 'selected' : '';?>>China
                                                                </option>
                                                                <option value="CO" <?php    echo ($value['paypal_country_code']) == 'CO' ? 'selected' : '';?>>
                                                                    Colombia</option>
                                                                <option value="KM" <?php    echo ($value['paypal_country_code']) == 'KM' ? 'selected' : '';?>>
                                                                    Comoros</option>
                                                                <option value="CG" <?php    echo ($value['paypal_country_code']) == 'CG' ? 'selected' : '';?>>Congo
                                                                    - Brazzaville</option>
                                                                <option value="CD" <?php    echo ($value['paypal_country_code']) == 'CD' ? 'selected' : '';?>>Congo
                                                                    - Kinshasa</option>
                                                                <option value="CK" <?php    echo ($value['paypal_country_code']) == 'CK' ? 'selected' : '';?>>Cook
                                                                    Islands</option>
                                                                <option value="CR" <?php    echo ($value['paypal_country_code']) == 'CR' ? 'selected' : '';?>>Costa
                                                                    Rica</option>
                                                                <option value="CI" <?php    echo ($value['paypal_country_code']) == 'CI' ? 'selected' : '';?>>Côte
                                                                    D’ivoire</option>
                                                                <option value="HR" <?php    echo ($value['paypal_country_code']) == 'HR' ? 'selected' : '';?>>
                                                                    Croatia</option>
                                                                <option value="CY" <?php    echo ($value['paypal_country_code']) == 'CY' ? 'selected' : '';?>>
                                                                    Cyprus</option>
                                                                <option value="CZ" <?php    echo ($value['paypal_country_code']) == 'CZ' ? 'selected' : '';?>>Czech
                                                                    Republic</option>
                                                                <option value="DK" <?php    echo ($value['paypal_country_code']) == 'DK' ? 'selected' : '';?>>
                                                                    Denmark</option>
                                                                <option value="DJ" <?php    echo ($value['paypal_country_code']) == 'DJ' ? 'selected' : '';?>>
                                                                    Djibouti</option>
                                                                <option value="DM" <?php    echo ($value['paypal_country_code']) == 'DM' ? 'selected' : '';?>>
                                                                    Dominica</option>
                                                                <option value="DO" <?php    echo ($value['paypal_country_code']) == 'DO' ? 'selected' : '';?>>
                                                                    Dominican Republic</option>
                                                                <option value="EC" <?php    echo ($value['paypal_country_code']) == 'EC' ? 'selected' : '';?>>
                                                                    Ecuador</option>
                                                                <option value="EG" <?php    echo ($value['paypal_country_code']) == 'EG' ? 'selected' : '';?>>Egypt
                                                                </option>
                                                                <option value="SV" <?php    echo ($value['paypal_country_code']) == 'SV' ? 'selected' : '';?>>El
                                                                    Salvador</option>
                                                                <option value="ER" <?php    echo ($value['paypal_country_code']) == 'ER' ? 'selected' : '';?>>
                                                                    Eritrea</option>
                                                                <option value="EE" <?php    echo ($value['paypal_country_code']) == 'EE' ? 'selected' : '';?>>
                                                                    Estonia</option>
                                                                <option value="ET" <?php    echo ($value['paypal_country_code']) == 'ET' ? 'selected' : '';?>>
                                                                    Ethiopia</option>
                                                                <option value="FK" <?php    echo ($value['paypal_country_code']) == 'FK' ? 'selected' : '';?>>
                                                                    Falkland Islands</option>
                                                                <option value="FO" <?php    echo ($value['paypal_country_code']) == 'FO' ? 'selected' : '';?>>Faroe
                                                                    Islands</option>
                                                                <option value="FJ" <?php    echo ($value['paypal_country_code']) == 'FJ' ? 'selected' : '';?>>Fiji
                                                                </option>
                                                                <option value="FI" <?php    echo ($value['paypal_country_code']) == 'FI' ? 'selected' : '';?>>
                                                                    Finland</option>
                                                                <option value="FR" <?php    echo ($value['paypal_country_code']) == 'FR' ? 'selected' : '';?>>
                                                                    France</option>
                                                                <option value="GF" <?php    echo ($value['paypal_country_code']) == 'GF' ? 'selected' : '';?>>
                                                                    French Guiana</option>
                                                                <option value="PF" <?php    echo ($value['paypal_country_code']) == 'PF' ? 'selected' : '';?>>
                                                                    French Polynesia</option>
                                                                <option value="GA" <?php    echo ($value['paypal_country_code']) == 'GA' ? 'selected' : '';?>>Gabon
                                                                </option>
                                                                <option value="GM" <?php    echo ($value['paypal_country_code']) == 'GM' ? 'selected' : '';?>>
                                                                    Gambia</option>
                                                                <option value="GE" <?php    echo ($value['paypal_country_code']) == 'GE' ? 'selected' : '';?>>
                                                                    Georgia</option>
                                                                <option value="DE" <?php    echo ($value['paypal_country_code']) == 'DE' ? 'selected' : '';?>>
                                                                    Germany</option>
                                                                <option value="GI" <?php    echo ($value['paypal_country_code']) == 'GI' ? 'selected' : '';?>>
                                                                    Gibraltar</option>
                                                                <option value="GR" <?php    echo ($value['paypal_country_code']) == 'GR' ? 'selected' : '';?>>
                                                                    Greece</option>
                                                                <option value="GL" <?php    echo ($value['paypal_country_code']) == 'GL' ? 'selected' : '';?>>
                                                                    Greenland</option>
                                                                <option value="GD" <?php    echo ($value['paypal_country_code']) == 'GD' ? 'selected' : '';?>>
                                                                    Grenada</option>
                                                                <option value="GP" <?php    echo ($value['paypal_country_code']) == 'GP' ? 'selected' : '';?>>
                                                                    Guadeloupe</option>
                                                                <option value="GT" <?php    echo ($value['paypal_country_code']) == 'GT' ? 'selected' : '';?>>
                                                                    Guatemala</option>
                                                                <option value="GN" <?php    echo ($value['paypal_country_code']) == 'GN' ? 'selected' : '';?>>
                                                                    Guinea</option>
                                                                <option value="GW" <?php    echo ($value['paypal_country_code']) == 'GW' ? 'selected' : '';?>>
                                                                    Guinea-bissau</option>
                                                                <option value="GY" <?php    echo ($value['paypal_country_code']) == 'GY' ? 'selected' : '';?>>
                                                                    Guyana</option>
                                                                <option value="HN" <?php    echo ($value['paypal_country_code']) == 'HN' ? 'selected' : '';?>>
                                                                    Honduras</option>
                                                                <option value="HK" <?php    echo ($value['paypal_country_code']) == 'HK' ? 'selected' : '';?>>Hong
                                                                    Kong Sar China</option>
                                                                <option value="HU" <?php    echo ($value['paypal_country_code']) == 'HU' ? 'selected' : '';?>>
                                                                    Hungary</option>
                                                                <option value="IS" <?php    echo ($value['paypal_country_code']) == 'IS' ? 'selected' : '';?>>
                                                                    Iceland</option>
                                                                <option value="IN" <?php    echo ($value['paypal_country_code']) == 'IN' ? 'selected' : '';?>>India
                                                                </option>
                                                                <option value="ID" <?php    echo ($value['paypal_country_code']) == 'ID' ? 'selected' : '';?>>
                                                                    Indonesia</option>
                                                                <option value="IE" <?php    echo ($value['paypal_country_code']) == 'IE' ? 'selected' : '';?>>
                                                                    Ireland</option>
                                                                <option value="IL" <?php    echo ($value['paypal_country_code']) == 'IL' ? 'selected' : '';?>>
                                                                    Israel</option>
                                                                <option value="IT" <?php    echo ($value['paypal_country_code']) == 'IT' ? 'selected' : '';?>>Italy
                                                                </option>
                                                                <option value="JM" <?php    echo ($value['paypal_country_code']) == 'JM' ? 'selected' : '';?>>
                                                                    Jamaica</option>
                                                                <option value="JP" <?php    echo ($value['paypal_country_code']) == 'JP' ? 'selected' : '';?>>Japan
                                                                </option>
                                                                <option value="JO" <?php    echo ($value['paypal_country_code']) == 'JO' ? 'selected' : '';?>>
                                                                    Jordan</option>
                                                                <option value="KZ" <?php    echo ($value['paypal_country_code']) == 'KZ' ? 'selected' : '';?>>
                                                                    Kazakhstan</option>
                                                                <option value="KE" <?php    echo ($value['paypal_country_code']) == 'KE' ? 'selected' : '';?>>Kenya
                                                                </option>
                                                                <option value="KI" <?php    echo ($value['paypal_country_code']) == 'KI' ? 'selected' : '';?>>
                                                                    Kiribati</option>
                                                                <option value="KW" <?php    echo ($value['paypal_country_code']) == 'KW' ? 'selected' : '';?>>
                                                                    Kuwait</option>
                                                                <option value="KG" <?php    echo ($value['paypal_country_code']) == 'KG' ? 'selected' : '';?>>
                                                                    Kyrgyzstan</option>
                                                                <option value="LA" <?php    echo ($value['paypal_country_code']) == 'LA' ? 'selected' : '';?>>Laos
                                                                </option>
                                                                <option value="LV" <?php    echo ($value['paypal_country_code']) == 'LV' ? 'selected' : '';?>>
                                                                    Latvia</option>
                                                                <option value="LS" <?php    echo ($value['paypal_country_code']) == 'LS' ? 'selected' : '';?>>
                                                                    Lesotho</option>
                                                                <option value="LI" <?php    echo ($value['paypal_country_code']) == 'LI' ? 'selected' : '';?>>
                                                                    Liechtenstein</option>
                                                                <option value="LT" <?php    echo ($value['paypal_country_code']) == 'LT' ? 'selected' : '';?>>
                                                                    Lithuania</option>
                                                                <option value="LU" <?php    echo ($value['paypal_country_code']) == 'LU' ? 'selected' : '';?>>
                                                                    Luxembourg</option>
                                                                <option value="MK" <?php    echo ($value['paypal_country_code']) == 'MK' ? 'selected' : '';?>>
                                                                    Macedonia</option>
                                                                <option value="MG" <?php    echo ($value['paypal_country_code']) == 'MG' ? 'selected' : '';?>>
                                                                    Madagascar</option>
                                                                <option value="MW" <?php    echo ($value['paypal_country_code']) == 'MW' ? 'selected' : '';?>>
                                                                    Malawi</option>
                                                                <option value="MY" <?php    echo ($value['paypal_country_code']) == 'MY' ? 'selected' : '';?>>
                                                                    Malaysia</option>
                                                                <option value="MV" <?php    echo ($value['paypal_country_code']) == 'MV' ? 'selected' : '';?>>
                                                                    Maldives</option>
                                                                <option value="ML" <?php    echo ($value['paypal_country_code']) == 'ML' ? 'selected' : '';?>>Mali
                                                                </option>
                                                                <option value="MT" <?php    echo ($value['paypal_country_code']) == 'MT' ? 'selected' : '';?>>Malta
                                                                </option>
                                                                <option value="MH" <?php    echo ($value['paypal_country_code']) == 'MH' ? 'selected' : '';?>>
                                                                    Marshall Islands</option>
                                                                <option value="MQ" <?php    echo ($value['paypal_country_code']) == 'MQ' ? 'selected' : '';?>>
                                                                    Martinique</option>
                                                                <option value="MR" <?php    echo ($value['paypal_country_code']) == 'MR' ? 'selected' : '';?>>
                                                                    Mauritania</option>
                                                                <option value="MU" <?php    echo ($value['paypal_country_code']) == 'MU' ? 'selected' : '';?>>
                                                                    Mauritius</option>
                                                                <option value="YT" <?php    echo ($value['paypal_country_code']) == 'YT' ? 'selected' : '';?>>
                                                                    Mayotte</option>
                                                                <option value="MX" <?php    echo ($value['paypal_country_code']) == 'MX' ? 'selected' : '';?>>
                                                                    Mexico</option>
                                                                <option value="FM" <?php    echo ($value['paypal_country_code']) == 'FM' ? 'selected' : '';?>>
                                                                    Micronesia</option>
                                                                <option value="MD" <?php    echo ($value['paypal_country_code']) == 'MD' ? 'selected' : '';?>>
                                                                    Moldova</option>
                                                                <option value="MC" <?php    echo ($value['paypal_country_code']) == 'MC' ? 'selected' : '';?>>
                                                                    Monaco</option>
                                                                <option value="MN" <?php    echo ($value['paypal_country_code']) == 'MN' ? 'selected' : '';?>>
                                                                    Mongolia</option>
                                                                <option value="ME" <?php    echo ($value['paypal_country_code']) == 'ME' ? 'selected' : '';?>>
                                                                    Montenegro</option>
                                                                <option value="MS" <?php    echo ($value['paypal_country_code']) == 'MS' ? 'selected' : '';?>>
                                                                    Montserrat</option>
                                                                <option value="MA" <?php    echo ($value['paypal_country_code']) == 'MA' ? 'selected' : '';?>>
                                                                    Morocco</option>
                                                                <option value="MZ" <?php    echo ($value['paypal_country_code']) == 'MZ' ? 'selected' : '';?>>
                                                                    Mozambique</option>
                                                                <option value="NA" <?php    echo ($value['paypal_country_code']) == 'NA' ? 'selected' : '';?>>
                                                                    Namibia</option>
                                                                <option value="NR" <?php    echo ($value['paypal_country_code']) == 'NR' ? 'selected' : '';?>>Nauru
                                                                </option>
                                                                <option value="NP" <?php    echo ($value['paypal_country_code']) == 'NP' ? 'selected' : '';?>>Nepal
                                                                </option>
                                                                <option value="NL" <?php    echo ($value['paypal_country_code']) == 'NL' ? 'selected' : '';?>>
                                                                    Netherlands</option>
                                                                <option value="NC" <?php    echo ($value['paypal_country_code']) == 'NC' ? 'selected' : '';?>>New
                                                                    Caledonia</option>
                                                                <option value="NZ" <?php    echo ($value['paypal_country_code']) == 'NZ' ? 'selected' : '';?>>New
                                                                    Zealand</option>
                                                                <option value="NI" <?php    echo ($value['paypal_country_code']) == 'NI' ? 'selected' : '';?>>
                                                                    Nicaragua</option>
                                                                <option value="NE" <?php    echo ($value['paypal_country_code']) == 'NE' ? 'selected' : '';?>>Niger
                                                                </option>
                                                                <option value="NG" <?php    echo ($value['paypal_country_code']) == 'NG' ? 'selected' : '';?>>
                                                                    Nigeria</option>
                                                                <option value="NU" <?php    echo ($value['paypal_country_code']) == 'NU' ? 'selected' : '';?>>Niue
                                                                </option>
                                                                <option value="NF" <?php    echo ($value['paypal_country_code']) == 'NF' ? 'selected' : '';?>>
                                                                    Norfolk Island</option>
                                                                <option value="NO" <?php    echo ($value['paypal_country_code']) == 'NO' ? 'selected' : '';?>>
                                                                    Norway</option>
                                                                <option value="OM" <?php    echo ($value['paypal_country_code']) == 'OM' ? 'selected' : '';?>>Oman
                                                                </option>
                                                                <option value="PW" <?php    echo ($value['paypal_country_code']) == 'PW' ? 'selected' : '';?>>Palau
                                                                </option>
                                                                <option value="PA" <?php    echo ($value['paypal_country_code']) == 'PA' ? 'selected' : '';?>>
                                                                    Panama</option>
                                                                <option value="PG" <?php    echo ($value['paypal_country_code']) == 'PG' ? 'selected' : '';?>>Papua
                                                                    New Guinea</option>
                                                                <option value="PY" <?php    echo ($value['paypal_country_code']) == 'PY' ? 'selected' : '';?>>
                                                                    Paraguay</option>
                                                                <option value="PE" <?php    echo ($value['paypal_country_code']) == 'PE' ? 'selected' : '';?>>Peru
                                                                </option>
                                                                <option value="PH" <?php    echo ($value['paypal_country_code']) == 'PH' ? 'selected' : '';?>>
                                                                    Philippines</option>
                                                                <option value="PN" <?php    echo ($value['paypal_country_code']) == 'PN' ? 'selected' : '';?>>
                                                                    Pitcairn Islands</option>
                                                                <option value="PL" <?php    echo ($value['paypal_country_code']) == 'PL' ? 'selected' : '';?>>
                                                                    Poland</option>
                                                                <option value="PT" <?php    echo ($value['paypal_country_code']) == 'PT' ? 'selected' : '';?>>
                                                                    Portugal</option>
                                                                <option value="QA" <?php    echo ($value['paypal_country_code']) == 'QA' ? 'selected' : '';?>>Qatar
                                                                </option>
                                                                <option value="RE" <?php    echo ($value['paypal_country_code']) == 'RE' ? 'selected' : '';?>>
                                                                    Réunion</option>
                                                                <option value="RO" <?php    echo ($value['paypal_country_code']) == 'RO' ? 'selected' : '';?>>
                                                                    Romania</option>
                                                                <option value="RU" <?php    echo ($value['paypal_country_code']) == 'RU' ? 'selected' : '';?>>
                                                                    Russia</option>
                                                                <option value="RW" <?php    echo ($value['paypal_country_code']) == 'RW' ? 'selected' : '';?>>
                                                                    Rwanda</option>
                                                                <option value="WS" <?php    echo ($value['paypal_country_code']) == 'WS' ? 'selected' : '';?>>Samoa
                                                                </option>
                                                                <option value="SM" <?php    echo ($value['paypal_country_code']) == 'SM' ? 'selected' : '';?>>San
                                                                    Marino</option>
                                                                <option value="ST" <?php    echo ($value['paypal_country_code']) == 'ST' ? 'selected' : '';?>>São
                                                                    Tomé &amp; Príncipe</option>
                                                                <option value="SA" <?php    echo ($value['paypal_country_code']) == 'SA' ? 'selected' : '';?>>Saudi
                                                                    Arabia</option>
                                                                <option value="SN" <?php    echo ($value['paypal_country_code']) == 'SN' ? 'selected' : '';?>>
                                                                    Senegal</option>
                                                                <option value="RS" <?php    echo ($value['paypal_country_code']) == 'RS' ? 'selected' : '';?>>
                                                                    Serbia</option>
                                                                <option value="SC" <?php    echo ($value['paypal_country_code']) == 'SC' ? 'selected' : '';?>>
                                                                    Seychelles</option>
                                                                <option value="SL" <?php    echo ($value['paypal_country_code']) == 'SL' ? 'selected' : '';?>>
                                                                    Sierra Leone</option>
                                                                <option value="SG" <?php    echo ($value['paypal_country_code']) == 'SG' ? 'selected' : '';?>>
                                                                    Singapore</option>
                                                                <option value="SK" <?php    echo ($value['paypal_country_code']) == 'SK' ? 'selected' : '';?>>
                                                                    Slovakia</option>
                                                                <option value="SI" <?php    echo ($value['paypal_country_code']) == 'SI' ? 'selected' : '';?>>
                                                                    Slovenia</option>
                                                                <option value="SB" <?php    echo ($value['paypal_country_code']) == 'SB' ? 'selected' : '';?>>
                                                                    Solomon Islands</option>
                                                                <option value="SO" <?php    echo ($value['paypal_country_code']) == 'SO' ? 'selected' : '';?>>
                                                                    Somalia</option>
                                                                <option value="ZA" <?php    echo ($value['paypal_country_code']) == 'ZA' ? 'selected' : '';?>>South
                                                                    Africa</option>
                                                                <option value="KR" <?php    echo ($value['paypal_country_code']) == 'KR' ? 'selected' : '';?>>South
                                                                    Korea</option>
                                                                <option value="ES" <?php    echo ($value['paypal_country_code']) == 'ES' ? 'selected' : '';?>>Spain
                                                                </option>
                                                                <option value="LK" <?php    echo ($value['paypal_country_code']) == 'LK' ? 'selected' : '';?>>Sri
                                                                    Lanka</option>
                                                                <option value="SH" <?php    echo ($value['paypal_country_code']) == 'SH' ? 'selected' : '';?>>St.
                                                                    Helena</option>
                                                                <option value="KN" <?php    echo ($value['paypal_country_code']) == 'KN' ? 'selected' : '';?>>St.
                                                                    Kitts &amp; Nevis</option>
                                                                <option value="LC" <?php    echo ($value['paypal_country_code']) == 'LC' ? 'selected' : '';?>>St.
                                                                    Lucia</option>
                                                                <option value="PM" <?php    echo ($value['paypal_country_code']) == 'PM' ? 'selected' : '';?>>St.
                                                                    Pierre &amp; Miquelon</option>
                                                                <option value="VC" <?php    echo ($value['paypal_country_code']) == 'VC' ? 'selected' : '';?>>St.
                                                                    Vincent &amp; Grenadines</option>
                                                                <option value="SR" <?php    echo ($value['paypal_country_code']) == 'SR' ? 'selected' : '';?>>
                                                                    Suriname</option>
                                                                <option value="SJ" <?php    echo ($value['paypal_country_code']) == 'SJ' ? 'selected' : '';?>>
                                                                    Svalbard &amp; Jan Mayen</option>
                                                                <option value="SZ" <?php    echo ($value['paypal_country_code']) == 'SZ' ? 'selected' : '';?>>
                                                                    Swaziland</option>
                                                                <option value="SE" <?php    echo ($value['paypal_country_code']) == 'SE' ? 'selected' : '';?>>
                                                                    Sweden</option>
                                                                <option value="CH" <?php    echo ($value['paypal_country_code']) == 'CH' ? 'selected' : '';?>>
                                                                    Switzerland</option>
                                                                <option value="TW" <?php    echo ($value['paypal_country_code']) == 'TW' ? 'selected' : '';?>>
                                                                    Taiwan</option>
                                                                <option value="TJ" <?php    echo ($value['paypal_country_code']) == 'TJ' ? 'selected' : '';?>>
                                                                    Tajikistan</option>
                                                                <option value="TZ" <?php    echo ($value['paypal_country_code']) == 'TZ' ? 'selected' : '';?>>
                                                                    Tanzania</option>
                                                                <option value="TH" <?php    echo ($value['paypal_country_code']) == 'TH' ? 'selected' : '';?>>
                                                                    Thailand</option>
                                                                <option value="TG" <?php    echo ($value['paypal_country_code']) == 'TG' ? 'selected' : '';?>>Togo
                                                                </option>
                                                                <option value="TO" <?php    echo ($value['paypal_country_code']) == 'TO' ? 'selected' : '';?>>Tonga
                                                                </option>
                                                                <option value="TT" <?php    echo ($value['paypal_country_code']) == 'TT' ? 'selected' : '';?>>
                                                                    Trinidad &amp; Tobago</option>
                                                                <option value="TN" <?php    echo ($value['paypal_country_code']) == 'TN' ? 'selected' : '';?>>
                                                                    Tunisia</option>
                                                                <option value="TM" <?php    echo ($value['paypal_country_code']) == 'TM' ? 'selected' : '';?>>
                                                                    Turkmenistan</option>
                                                                <option value="TC" <?php    echo ($value['paypal_country_code']) == 'TC' ? 'selected' : '';?>>Turks
                                                                    &amp; Caicos Islands</option>
                                                                <option value="TV" <?php    echo ($value['paypal_country_code']) == 'TV' ? 'selected' : '';?>>
                                                                    Tuvalu</option>
                                                                <option value="UG" <?php    echo ($value['paypal_country_code']) == 'UG' ? 'selected' : '';?>>
                                                                    Uganda</option>
                                                                <option value="UA" <?php    echo ($value['paypal_country_code']) == 'UA' ? 'selected' : '';?>>
                                                                    Ukraine</option>
                                                                <option value="AE" <?php    echo ($value['paypal_country_code']) == 'AE' ? 'selected' : '';?>>
                                                                    United Arab Emirates</option>
                                                                <option value="GB" <?php    echo ($value['paypal_country_code']) == 'GB' ? 'selected' : '';?>>
                                                                    United Kingdom</option>
                                                                <option
                                                                    value="US  <?php    echo ($value['paypal_country_code']) == 'US' ? 'selected' : '';?>">
                                                                    United States</option>
                                                                <option value="UY" <?php    echo ($value['paypal_country_code']) == 'UY' ? 'selected' : '';?>>
                                                                    Uruguay</option>
                                                                <option value="VU" <?php    echo ($value['paypal_country_code']) == 'VU' ? 'selected' : '';?>>
                                                                    Vanuatu</option>
                                                                <option value="VA" <?php    echo ($value['paypal_country_code']) == 'VA' ? 'selected' : '';?>>
                                                                    Vatican City</option>
                                                                <option value="VE" <?php    echo ($value['paypal_country_code']) == 'VE' ? 'selected' : '';?>>
                                                                    Venezuela</option>
                                                                <option value="VN" <?php    echo ($value['paypal_country_code']) == 'VN' ? 'selected' : '';?>>
                                                                    Vietnam</option>
                                                                <option value="WF" <?php    echo ($value['paypal_country_code']) == 'WF' ? 'selected' : '';?>>
                                                                    Wallis &amp; Futuna</option>
                                                                <option value="YE" <?php    echo ($value['paypal_country_code']) == 'YE' ? 'selected' : '';?>>Yemen
                                                                </option>
                                                                <option value="ZM" <?php    echo ($value['paypal_country_code']) == 'ZM' ? 'selected' : '';?>>
                                                                    Zambia</option>
                                                                <option value="ZW" <?php    echo ($value['paypal_country_code']) == 'ZW' ? 'selected' : '';?>>
                                                                    Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="os-col-6">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <label for="settings_paypal_currency_iso_code">Currency
                                                                Code</label><select name="settings[paypal_currency_iso_code]"
                                                                id="settings_paypal_currency_iso_code" class="os-form-control">
                                                                <option value="AUD" <?php    echo ($value['paypal_currency_iso_code']) == 'AUD' ? 'selected' : '';?>>
                                                                    Australian dollar</option>
                                                                <option value="BRL" <?php    echo ($value['paypal_currency_iso_code']) == 'BRL' ? 'selected' : '';?>>
                                                                    Brazilian real</option>
                                                                <option value="CAD" <?php    echo ($value['paypal_currency_iso_code']) == 'CAD' ? 'selected' : '';?>>
                                                                    Canadian dollar</option>
                                                                <option value="COP" <?php    echo ($value['paypal_currency_iso_code']) == 'COP' ? 'selected' : '';?>>
                                                                    Colombian Pesos</option>
                                                                <option value="CZK" <?php    echo ($value['paypal_currency_iso_code']) == 'CZK' ? 'selected' : '';?>>
                                                                    Czech koruna</option>
                                                                <option value="DKK" <?php    echo ($value['paypal_currency_iso_code']) == 'DKK' ? 'selected' : '';?>>
                                                                    Danish krone</option>
                                                                <option value="EUR" <?php    echo ($value['paypal_currency_iso_code']) == 'EUR' ? 'selected' : '';?>>
                                                                    Euro</option>
                                                                <option value="HKD" <?php    echo ($value['paypal_currency_iso_code']) == 'HKD' ? 'selected' : '';?>>
                                                                    Hong Kong dollar</option>
                                                                <option value="HUF" <?php    echo ($value['paypal_currency_iso_code']) == 'HUF' ? 'selected' : '';?>>
                                                                    Hungarian forint</option>
                                                                <option value="INR" <?php    echo ($value['paypal_currency_iso_code']) == 'INR' ? 'selected' : '';?>>
                                                                    Indian rupee</option>
                                                                <option value="ILS" <?php    echo ($value['paypal_currency_iso_code']) == 'ILS' ? 'selected' : '';?>>
                                                                    Israeli new shekel</option>
                                                                <option value="JPY" <?php    echo ($value['paypal_currency_iso_code']) == 'JPY' ? 'selected' : '';?>>
                                                                    Japanese yen</option>
                                                                <option value="MYR" <?php    echo ($value['paypal_currency_iso_code']) == 'MYR' ? 'selected' : '';?>>
                                                                    Malaysian ringgit</option>
                                                                <option value="MXN" <?php    echo ($value['paypal_currency_iso_code']) == 'MXN' ? 'selected' : '';?>>
                                                                    Mexican peso</option>
                                                                <option value="TWD" <?php    echo ($value['paypal_currency_iso_code']) == 'TWD' ? 'selected' : '';?>>
                                                                    New Taiwan dollar</option>
                                                                <option value="NZD" <?php    echo ($value['paypal_currency_iso_code']) == 'NZD' ? 'selected' : '';?>>
                                                                    New Zealand dollar</option>
                                                                <option value="NOK" <?php    echo ($value['paypal_currency_iso_code']) == 'NOK' ? 'selected' : '';?>>
                                                                    Norwegian krone</option>
                                                                <option value="PHP" <?php    echo ($value['paypal_currency_iso_code']) == 'PHP' ? 'selected' : '';?>>
                                                                    Philippine peso</option>
                                                                <option value="PLN" <?php    echo ($value['paypal_currency_iso_code']) == 'PLN' ? 'selected' : '';?>>
                                                                    Polish złoty</option>
                                                                <option value="GBP" <?php    echo ($value['paypal_currency_iso_code']) == 'GBP' ? 'selected' : '';?>>
                                                                    Pound sterling</option>
                                                                <option value="RUB" <?php    echo ($value['paypal_currency_iso_code']) == 'RUB' ? 'selected' : '';?>>
                                                                    Russian ruble</option>
                                                                <option value="SGD" <?php    echo ($value['paypal_currency_iso_code']) == 'SGD' ? 'selected' : '';?>>
                                                                    Singapore dollar</option>
                                                                <option value="SEK" <?php    echo ($value['paypal_currency_iso_code']) == 'SEK' ? 'selected' : '';?>>
                                                                    Swedish krona</option>
                                                                <option value="CHF" <?php    echo ($value['paypal_currency_iso_code']) == 'CHF' ? 'selected' : '';?>>
                                                                    Swiss franc</option>
                                                                <option value="THB" <?php    echo ($value['paypal_currency_iso_code']) == 'THB' ? 'selected' : '';?>>
                                                                    Thai baht</option>
                                                                <option value="USD" <?php    echo ($value['paypal_currency_iso_code']) == 'USD' ? 'selected' : '';?>>
                                                                    United States dollar </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-togglable-item-w" id="paymentProcessorToggler_stripe">
                                    <div class="os-togglable-item-head">
                                        <div class="os-toggler-w">
                                            <input type="hidden" name="settings[enable_payment_processor_stripe]"
                                                value="{{$value['enable_payment_processor_stripe']}}"
                                                id="settings_enable_payment_processor_stripe">
                                            <div data-controlled-toggle-id="togglePaymentSettings_stripe"
                                                class="os-toggler {{$value['enable_payment_processor_stripe']}} size-large"
                                                data-is-string-value="true" data-for="settings_enable_payment_processor_stripe">
                                                <div class="toggler-rail">
                                                    <div class="toggler-pill"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <img class="os-togglable-item-logo-img"
                                            src="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-content/plugins/latepoint-payments-stripe/public/images/processor-logo.png">
                                        <div class="os-togglable-item-name">Stripe</div>
                                    </div>
                                    <div class="os-togglable-item-body"
                                        style="<?php    echo ($value['enable_payment_processor_stripe'] == 'on' ? '' : 'display:none;');?>"
                                        id="togglePaymentSettings_stripe">
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>API Keys</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-row">
                                                    <div class="os-col-6">
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                            <label for="settings_stripe_secret_key">Secret Key</label><input
                                                                type="password" placeholder="Secret Key"
                                                                name="settings[stripe_secret_key]"
                                                                value="{{$value['stripe_secret_key']}}"
                                                                id="settings_stripe_secret_key" class="os-form-control">
                                                        </div>
                                                    </div>
                                                    <div class="os-col-6">
                                                        <div
                                                            class="os-form-group os-form-textfield-group os-form-group-transparent">
                                                            <label for="settings_stripe_publishable_key">Publishable
                                                                Key</label><input type="text" placeholder="Publishable Key"
                                                                name="settings[stripe_publishable_key]"
                                                                value="{{$value['stripe_publishable_key']}}"
                                                                id="settings_stripe_publishable_key" class="os-form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Checkout Type</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="latepoint-message latepoint-message-subtle">There are two ways to
                                                    accept payments via Stripe. 1. Stripe Elements: supports credit card and iDEAL
                                                    payments directly in your booking form, matching its look and feel. 2. Stripe
                                                    Checkout: supports more payment methods, but will redirect a customer to a
                                                    Stripe hosted page to finish the payment.</div>
                                                <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                        name="settings[stripe_checkout_type]"
                                                        class="display-toggler-control os-form-control"
                                                        data-toggler-group="stripe-checkout-type"
                                                        id="settings_stripe_checkout_type">
                                                        <option value="elements" <?php    echo ($value['stripe_checkout_type']) == 'elements' ? 'selected' : '';?>>Stripe
                                                            Elements</option>
                                                        <option value="checkout" <?php    echo ($value['stripe_checkout_type']) == 'checkout' ? 'selected' : '';?>>Stripe
                                                            Checkout</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Payment Methods</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="stripe-elements-payments-grid display-toggler-target"
                                                    data-toggler-group="stripe-checkout-type" data-toggler-key="elements"><input
                                                        type="hidden" name="settings[stripe_elements_enabled_payment_methods]"
                                                        value="" id="settings_stripe_elements_enabled_payment_methods">
                                                    <div class="os-form-group os-form-toggler-group"><input type="hidden"
                                                            name="settings[stripe_elements_enabled_payment_methods][card]"
                                                            value="{{$value['stripe_elements_enabled_payment_methods']['card']}}"
                                                            id="settings_stripe_elements_enabled_payment_methods_card"
                                                            class="os-form-checkbox">
                                                        <div class="os-toggler {{$value['stripe_elements_enabled_payment_methods']['card']}} size-normal"
                                                            data-is-string-value="true"
                                                            data-for="settings_stripe_elements_enabled_payment_methods_card">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>Credit Card</label></div>
                                                    </div>
                                                    <div class="os-form-group os-form-toggler-group"><input type="hidden"
                                                            name="settings[stripe_elements_enabled_payment_methods][ideal]"
                                                            value="{{$value['stripe_elements_enabled_payment_methods']['ideal']}}"
                                                            id="settings_stripe_elements_enabled_payment_methods_ideal"
                                                            class="os-form-checkbox">
                                                        <div class="os-toggler {{$value['stripe_elements_enabled_payment_methods']['ideal']}} size-normal"
                                                            data-is-string-value="true"
                                                            data-for="settings_stripe_elements_enabled_payment_methods_ideal">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>iDEAL</label></div>
                                                    </div>
                                                </div>
                                                <div class="display-toggler-target" data-toggler-group="stripe-checkout-type"
                                                    data-toggler-key="checkout" style="display: none;">
                                                    <div class="os-form-group os-form-toggler-group  with-sub-label size-normal">
                                                        <input type="hidden" name="settings[stripe_checkout_manual_payment_methods]"
                                                            value="off" id="settings_stripe_checkout_manual_payment_methods">
                                                        <div data-controlled-toggle-id="latepointStripeCheckoutManualPaymentMethods"
                                                            class="os-toggler off size-normal" data-is-string-value="true"
                                                            data-for="settings_stripe_checkout_manual_payment_methods">
                                                            <div class="toggler-rail">
                                                                <div class="toggler-pill"></div>
                                                            </div>
                                                        </div>
                                                        <div class="os-toggler-label-w"><label>I will pick here (Not
                                                                Recommended)</label><span>You should set enabled payment methods
                                                                through your Stripe Dashboard instead of setting them here</span>
                                                        </div>
                                                    </div>
                                                    <div style="display: none;" id="latepointStripeCheckoutManualPaymentMethods"
                                                        class="stripe-checkout-payments-grid"><input type="hidden"
                                                            name="settings[stripe_checkout_enabled_payment_methods]" value=""
                                                            id="settings_stripe_checkout_enabled_payment_methods">
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="alipay"
                                                                id="settings_stripe_checkout_enabled_payment_methods_alipay"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_alipay">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Alipay</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="card" checked=""
                                                                id="settings_stripe_checkout_enabled_payment_methods_card"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler on size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_card">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Credit Cards</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="ideal"
                                                                id="settings_stripe_checkout_enabled_payment_methods_ideal"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_ideal">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>iDEAL</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="fpx"
                                                                id="settings_stripe_checkout_enabled_payment_methods_fpx"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_fpx">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>FPX</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="bacs_debit"
                                                                id="settings_stripe_checkout_enabled_payment_methods_bacs_debit"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_bacs_debit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>BASC Payments</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="bancontact"
                                                                id="settings_stripe_checkout_enabled_payment_methods_bancontact"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_bancontact">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Bancontact</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="giropay"
                                                                id="settings_stripe_checkout_enabled_payment_methods_giropay"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_giropay">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Giropay</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="p24"
                                                                id="settings_stripe_checkout_enabled_payment_methods_p24"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_p24">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Przelewy24</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="eps"
                                                                id="settings_stripe_checkout_enabled_payment_methods_eps"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_eps">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>EPS Payments</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="sofort"
                                                                id="settings_stripe_checkout_enabled_payment_methods_sofort"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_sofort">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Sofort Payments</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="sepa_debit"
                                                                id="settings_stripe_checkout_enabled_payment_methods_sepa_debit"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_sepa_debit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>SEPA Direct Debit</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="grabpay"
                                                                id="settings_stripe_checkout_enabled_payment_methods_grabpay"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_grabpay">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>GrabPay Payments</label></div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="afterpay_clearpay"
                                                                id="settings_stripe_checkout_enabled_payment_methods_afterpay_clearpay"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_afterpay_clearpay">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Afterpay and Clearpay</label>
                                                            </div>
                                                        </div>
                                                        <div class="os-form-group os-form-toggler-group"><input type="checkbox"
                                                                name="settings[stripe_checkout_enabled_payment_methods][]"
                                                                value="acss_debit"
                                                                id="settings_stripe_checkout_enabled_payment_methods_acss_debit"
                                                                class="os-form-checkbox" style="display: none;">
                                                            <div class="os-toggler off size-normal" data-is-string-value="true"
                                                                data-for="settings_stripe_checkout_enabled_payment_methods_acss_debit">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Canadian PAD (ACSS)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-section-row">
                                            <div class="sub-section-label">
                                                <h3>Other Settings</h3>
                                            </div>
                                            <div class="sub-section-content">
                                                <div class="os-row mb-2">
                                                    <div class="os-col-6">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <label for="settings_stripe_country_code">Country</label><select
                                                                name="settings[stripe_country_code]"
                                                                id="settings_stripe_country_code" class="os-form-control">
                                                                <option value="AU" <?php    echo ($value['stripe_country_code'] == "AU" ? 'selected' : '')?>>
                                                                    Australia</option>
                                                                <option value="AT" <?php    echo ($value['stripe_country_code'] == "AT" ? 'selected' : '')?>>
                                                                    Austria</option>
                                                                <option value="BE" <?php    echo ($value['stripe_country_code'] == "BE" ? 'selected' : '')?>>
                                                                    Belgium</option>
                                                                <option value="BR" <?php    echo ($value['stripe_country_code'] == "BR" ? 'selected' : '')?>>Brazil
                                                                </option>
                                                                <option value="BG" <?php    echo ($value['stripe_country_code'] == "BG" ? 'selected' : '')?>>
                                                                    Bulgaria</option>
                                                                <option value="CA" <?php    echo ($value['stripe_country_code'] == "CA" ? 'selected' : '')?>>Canada
                                                                </option>
                                                                <option value="HR" <?php    echo ($value['stripe_country_code'] == "HR" ? 'selected' : '')?>>
                                                                    Croatia</option>
                                                                <option value="CY" <?php    echo ($value['stripe_country_code'] == "CY" ? 'selected' : '')?>>Cyprus
                                                                </option>
                                                                <option value="CZ" <?php    echo ($value['stripe_country_code'] == "CZ" ? 'selected' : '')?>>Czech
                                                                    Republic</option>
                                                                <option value="DK" <?php    echo ($value['stripe_country_code'] == "DK" ? 'selected' : '')?>>
                                                                    Denmark</option>
                                                                <option value="EE" <?php    echo ($value['stripe_country_code'] == "EE" ? 'selected' : '')?>>
                                                                    Estonia</option>
                                                                <option value="FI" <?php    echo ($value['stripe_country_code'] == "FI" ? 'selected' : '')?>>
                                                                    Finland</option>
                                                                <option value="FR" <?php    echo ($value['stripe_country_code'] == "FR" ? 'selected' : '')?>>France
                                                                </option>
                                                                <option value="DE" <?php    echo ($value['stripe_country_code'] == "DE" ? 'selected' : '')?>>
                                                                    Germany</option>
                                                                <option value="GI" <?php    echo ($value['stripe_country_code'] == "GI" ? 'selected' : '')?>>
                                                                    Gibraltar</option>
                                                                <option value="GR" <?php    echo ($value['stripe_country_code'] == "GR" ? 'selected' : '')?>>Greece
                                                                </option>
                                                                <option value="HK" <?php    echo ($value['stripe_country_code'] == "HK" ? 'selected' : '')?>>Hong
                                                                    Kong</option>
                                                                <option value="HU" <?php    echo ($value['stripe_country_code'] == "HU" ? 'selected' : '')?>>
                                                                    Hungary</option>
                                                                <option value="IN" <?php    echo ($value['stripe_country_code'] == "IN" ? 'selected' : '')?>>India
                                                                </option>
                                                                <option value="IE" <?php    echo ($value['stripe_country_code'] == "IE" ? 'selected' : '')?>>
                                                                    Ireland</option>
                                                                <option value="IT" <?php    echo ($value['stripe_country_code'] == "IT" ? 'selected' : '')?>>Italy
                                                                </option>
                                                                <option value="JP" <?php    echo ($value['stripe_country_code'] == "JP" ? 'selected' : '')?>>Japan
                                                                </option>
                                                                <option value="LV" <?php    echo ($value['stripe_country_code'] == "LV" ? 'selected' : '')?>>Latvia
                                                                </option>
                                                                <option value="LI" <?php    echo ($value['stripe_country_code'] == "LI" ? 'selected' : '')?>>
                                                                    Liechtenstein</option>
                                                                <option value="LT" <?php    echo ($value['stripe_country_code'] == "LT" ? 'selected' : '')?>>
                                                                    Lithuania</option>
                                                                <option value="LU" <?php    echo ($value['stripe_country_code'] == "LU" ? 'selected' : '')?>>
                                                                    Luxembourg</option>
                                                                <option value="MY" <?php    echo ($value['stripe_country_code'] == "MY" ? 'selected' : '')?>>
                                                                    Malaysia</option>
                                                                <option value="MT" <?php    echo ($value['stripe_country_code'] == "MT" ? 'selected' : '')?>>Malta
                                                                </option>
                                                                <option value="MX" <?php    echo ($value['stripe_country_code'] == "MX" ? 'selected' : '')?>>Mexico
                                                                </option>
                                                                <option value="NL" <?php    echo ($value['stripe_country_code'] == "NL" ? 'selected' : '')?>>
                                                                    Netherlands</option>
                                                                <option value="NZ" <?php    echo ($value['stripe_country_code'] == "NZ" ? 'selected' : '')?>>New
                                                                    Zealand</option>
                                                                <option value="NO" <?php    echo ($value['stripe_country_code'] == "NO" ? 'selected' : '')?>>Norway
                                                                </option>
                                                                <option value="PL" <?php    echo ($value['stripe_country_code'] == "PL" ? 'selected' : '')?>>Poland
                                                                </option>
                                                                <option value="PT" <?php    echo ($value['stripe_country_code'] == "PT" ? 'selected' : '')?>>
                                                                    Portugal</option>
                                                                <option value="RO" <?php    echo ($value['stripe_country_code'] == "RO" ? 'selected' : '')?>>
                                                                    Romania</option>
                                                                <option value="SG" <?php    echo ($value['stripe_country_code'] == "SG" ? 'selected' : '')?>>
                                                                    Singapore</option>
                                                                <option value="SK" <?php    echo ($value['stripe_country_code'] == "SK" ? 'selected' : '')?>>
                                                                    Slovakia</option>
                                                                <option value="SI" <?php    echo ($value['stripe_country_code'] == "SI" ? 'selected' : '')?>>
                                                                    Slovenia</option>
                                                                <option value="ES" <?php    echo ($value['stripe_country_code'] == "ES" ? 'selected' : '')?>>Spain
                                                                </option>
                                                                <option value="SE" <?php    echo ($value['stripe_country_code'] == "SE" ? 'selected' : '')?>>Sweden
                                                                </option>
                                                                <option value="CH" <?php    echo ($value['stripe_country_code'] == "CH" ? 'selected' : '')?>>
                                                                    Switzerland</option>
                                                                <option value="TH" <?php    echo ($value['stripe_country_code'] == "TH" ? 'selected' : '')?>>
                                                                    Thailand</option>
                                                                <option value="AE" <?php    echo ($value['stripe_country_code'] == "AE" ? 'selected' : '')?>>United
                                                                    Arab Emirates</option>
                                                                <option value="GB" <?php    echo ($value['stripe_country_code'] == "GB" ? 'selected' : '')?>>United
                                                                    Kingdom</option>
                                                                <option value="US" <?php    echo ($value['stripe_country_code'] == "US" ? 'selected' : '')?>>United
                                                                    States</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="os-col-6">
                                                        <div class="os-form-group os-form-select-group os-form-group-transparent">
                                                            <label for="settings_stripe_currency_iso_code">Currency
                                                                Code</label><select name="settings[stripe_currency_iso_code]"
                                                                id="settings_stripe_currency_iso_code" class="os-form-control">
                                                                <option value="usd" <?php    echo ($value['stripe_currency_iso_code'] == "usd" ? 'selected' : '') ?>>usd</option>
                                                                <option value="aed" <?php    echo ($value['stripe_currency_iso_code'] == "aed" ? 'selected' : '') ?>>aed</option>
                                                                <option value="afn" <?php    echo ($value['stripe_currency_iso_code'] == "afn" ? 'selected' : '') ?>>afn</option>
                                                                <option value="all" <?php    echo ($value['stripe_currency_iso_code'] == "all" ? 'selected' : '') ?>>all</option>
                                                                <option value="amd" <?php    echo ($value['stripe_currency_iso_code'] == "amd" ? 'selected' : '') ?>>amd</option>
                                                                <option value="ang" <?php    echo ($value['stripe_currency_iso_code'] == "ang" ? 'selected' : '') ?>>ang</option>
                                                                <option value="aoa" <?php    echo ($value['stripe_currency_iso_code'] == "aoa" ? 'selected' : '') ?>>aoa</option>
                                                                <option value="ars" <?php    echo ($value['stripe_currency_iso_code'] == "ars" ? 'selected' : '') ?>>ars</option>
                                                                <option value="aud" <?php    echo ($value['stripe_currency_iso_code'] == "aud" ? 'selected' : '') ?>>aud</option>
                                                                <option value="awg" <?php    echo ($value['stripe_currency_iso_code'] == "awg" ? 'selected' : '') ?>>awg</option>
                                                                <option value="azn" <?php    echo ($value['stripe_currency_iso_code'] == "azn" ? 'selected' : '') ?>>azn</option>
                                                                <option value="bam" <?php    echo ($value['stripe_currency_iso_code'] == "bam" ? 'selected' : '') ?>>bam</option>
                                                                <option value="bbd" <?php    echo ($value['stripe_currency_iso_code'] == "bbd" ? 'selected' : '') ?>>bbd</option>
                                                                <option value="bdt" <?php    echo ($value['stripe_currency_iso_code'] == "bdt" ? 'selected' : '') ?>>bdt</option>
                                                                <option value="bgn" <?php    echo ($value['stripe_currency_iso_code'] == "bgn" ? 'selected' : '') ?>>bgn</option>
                                                                <option value="bif" <?php    echo ($value['stripe_currency_iso_code'] == "bif" ? 'selected' : '') ?>>bif</option>
                                                                <option value="bmd" <?php    echo ($value['stripe_currency_iso_code'] == "bmd" ? 'selected' : '') ?>>bmd</option>
                                                                <option value="bnd" <?php    echo ($value['stripe_currency_iso_code'] == "bnd" ? 'selected' : '') ?>>bnd</option>
                                                                <option value="bob" <?php    echo ($value['stripe_currency_iso_code'] == "bob" ? 'selected' : '') ?>>bob</option>
                                                                <option value="brl" <?php    echo ($value['stripe_currency_iso_code'] == "brl" ? 'selected' : '') ?>>brl</option>
                                                                <option value="bsd" <?php    echo ($value['stripe_currency_iso_code'] == "bsd" ? 'selected' : '') ?>>bsd</option>
                                                                <option value="bwp" <?php    echo ($value['stripe_currency_iso_code'] == "bwp" ? 'selected' : '') ?>>bwp</option>
                                                                <option value="bzd" <?php    echo ($value['stripe_currency_iso_code'] == "bzd" ? 'selected' : '') ?>>bzd</option>
                                                                <option value="cad" <?php    echo ($value['stripe_currency_iso_code'] == "cad" ? 'selected' : '') ?>>cad</option>
                                                                <option value="cdf" <?php    echo ($value['stripe_currency_iso_code'] == "cdf" ? 'selected' : '') ?>>cdf</option>
                                                                <option value="chf" <?php    echo ($value['stripe_currency_iso_code'] == "chf" ? 'selected' : '') ?>>chf</option>
                                                                <option value="clp" <?php    echo ($value['stripe_currency_iso_code'] == "clp" ? 'selected' : '') ?>>clp</option>
                                                                <option value="cny" <?php    echo ($value['stripe_currency_iso_code'] == "cny" ? 'selected' : '') ?>>cny</option>
                                                                <option value="cop" <?php    echo ($value['stripe_currency_iso_code'] == "cop" ? 'selected' : '') ?>>cop</option>
                                                                <option value="crc" <?php    echo ($value['stripe_currency_iso_code'] == "crc" ? 'selected' : '') ?>>crc</option>
                                                                <option value="cve" <?php    echo ($value['stripe_currency_iso_code'] == "cve" ? 'selected' : '') ?>>cve</option>
                                                                <option value="czk" <?php    echo ($value['stripe_currency_iso_code'] == "czk" ? 'selected' : '') ?>>czk</option>
                                                                <option value="djf" <?php    echo ($value['stripe_currency_iso_code'] == "djf" ? 'selected' : '') ?>>djf</option>
                                                                <option value="dkk" <?php    echo ($value['stripe_currency_iso_code'] == "dkk" ? 'selected' : '') ?>>dkk</option>
                                                                <option value="dop" <?php    echo ($value['stripe_currency_iso_code'] == "dop" ? 'selected' : '') ?>>dop</option>
                                                                <option value="dzd" <?php    echo ($value['stripe_currency_iso_code'] == "dzd" ? 'selected' : '') ?>>dzd</option>
                                                                <option value="egp" <?php    echo ($value['stripe_currency_iso_code'] == "egp" ? 'selected' : '') ?>>egp</option>
                                                                <option value="etb" <?php    echo ($value['stripe_currency_iso_code'] == "etb" ? 'selected' : '') ?>>etb</option>
                                                                <option value="eur" <?php    echo ($value['stripe_currency_iso_code'] == "eur" ? 'selected' : '') ?>>eur</option>
                                                                <option value="fjd" <?php    echo ($value['stripe_currency_iso_code'] == "fjd" ? 'selected' : '') ?>>fjd</option>
                                                                <option value="fkp" <?php    echo ($value['stripe_currency_iso_code'] == "fkp" ? 'selected' : '') ?>>fkp</option>
                                                                <option value="gbp" <?php    echo ($value['stripe_currency_iso_code'] == "gbp" ? 'selected' : '') ?>>gbp</option>
                                                                <option value="gel" <?php    echo ($value['stripe_currency_iso_code'] == "gel" ? 'selected' : '') ?>>gel</option>
                                                                <option value="gip" <?php    echo ($value['stripe_currency_iso_code'] == "gip" ? 'selected' : '') ?>>gip</option>
                                                                <option value="gmd" <?php    echo ($value['stripe_currency_iso_code'] == "gmd" ? 'selected' : '') ?>>gmd</option>
                                                                <option value="gnf" <?php    echo ($value['stripe_currency_iso_code'] == "gnf" ? 'selected' : '') ?>>gnf</option>
                                                                <option value="gtq" <?php    echo ($value['stripe_currency_iso_code'] == "gtq" ? 'selected' : '') ?>>gtq</option>
                                                                <option value="gyd" <?php    echo ($value['stripe_currency_iso_code'] == "gyd" ? 'selected' : '') ?>>gyd</option>
                                                                <option value="hkd" <?php    echo ($value['stripe_currency_iso_code'] == "hkd" ? 'selected' : '') ?>>hkd</option>
                                                                <option value="hnl" <?php    echo ($value['stripe_currency_iso_code'] == "hnl" ? 'selected' : '') ?>>hnl</option>
                                                                <option value="hrk" <?php    echo ($value['stripe_currency_iso_code'] == "hrk" ? 'selected' : '') ?>>hrk</option>
                                                                <option value="htg" <?php    echo ($value['stripe_currency_iso_code'] == "htg" ? 'selected' : '') ?>>htg</option>
                                                                <option value="huf" <?php    echo ($value['stripe_currency_iso_code'] == "huf" ? 'selected' : '') ?>>huf</option>
                                                                <option value="idr" <?php    echo ($value['stripe_currency_iso_code'] == "idr" ? 'selected' : '') ?>>idr</option>
                                                                <option value="ils" <?php    echo ($value['stripe_currency_iso_code'] == "ils" ? 'selected' : '') ?>>ils</option>
                                                                <option value="inr" <?php    echo ($value['stripe_currency_iso_code'] == "inr" ? 'selected' : '') ?>>inr</option>
                                                                <option value="isk" <?php    echo ($value['stripe_currency_iso_code'] == "isk" ? 'selected' : '') ?>>isk</option>
                                                                <option value="jmd" <?php    echo ($value['stripe_currency_iso_code'] == "jmd" ? 'selected' : '') ?>>jmd</option>
                                                                <option value="jpy" <?php    echo ($value['stripe_currency_iso_code'] == "jpy" ? 'selected' : '') ?>>jpy</option>
                                                                <option value="kes" <?php    echo ($value['stripe_currency_iso_code'] == "kes" ? 'selected' : '') ?>>kes</option>
                                                                <option value="kgs" <?php    echo ($value['stripe_currency_iso_code'] == "kgs" ? 'selected' : '') ?>>kgs</option>
                                                                <option value="khr" <?php    echo ($value['stripe_currency_iso_code'] == "khr" ? 'selected' : '') ?>>khr</option>
                                                                <option value="kmf" <?php    echo ($value['stripe_currency_iso_code'] == "kmf" ? 'selected' : '') ?>>kmf</option>
                                                                <option value="krw" <?php    echo ($value['stripe_currency_iso_code'] == "krw" ? 'selected' : '') ?>>krw</option>
                                                                <option value="kyd" <?php    echo ($value['stripe_currency_iso_code'] == "kyd" ? 'selected' : '') ?>>kyd</option>
                                                                <option value="kzt" <?php    echo ($value['stripe_currency_iso_code'] == "kzt" ? 'selected' : '') ?>>kzt</option>
                                                                <option value="lak" <?php    echo ($value['stripe_currency_iso_code'] == "lak" ? 'selected' : '') ?>>lak</option>
                                                                <option value="lbp" <?php    echo ($value['stripe_currency_iso_code'] == "lbp" ? 'selected' : '') ?>>lbp</option>
                                                                <option value="lkr" <?php    echo ($value['stripe_currency_iso_code'] == "lkr" ? 'selected' : '') ?>>lkr</option>
                                                                <option value="lrd" <?php    echo ($value['stripe_currency_iso_code'] == "lrd" ? 'selected' : '') ?>>lrd</option>
                                                                <option value="lsl" <?php    echo ($value['stripe_currency_iso_code'] == "lsl" ? 'selected' : '') ?>>lsl</option>
                                                                <option value="mad" <?php    echo ($value['stripe_currency_iso_code'] == "mad" ? 'selected' : '') ?>>mad</option>
                                                                <option value="mdl" <?php    echo ($value['stripe_currency_iso_code'] == "mdl" ? 'selected' : '') ?>>mdl</option>
                                                                <option value="mga" <?php    echo ($value['stripe_currency_iso_code'] == "mga" ? 'selected' : '') ?>>mga</option>
                                                                <option value="mkd" <?php    echo ($value['stripe_currency_iso_code'] == "mkd" ? 'selected' : '') ?>>mkd</option>
                                                                <option value="mmk" <?php    echo ($value['stripe_currency_iso_code'] == "mmk" ? 'selected' : '') ?>>mmk</option>
                                                                <option value="mnt" <?php    echo ($value['stripe_currency_iso_code'] == "mnt" ? 'selected' : '') ?>>mnt</option>
                                                                <option value="mop" <?php    echo ($value['stripe_currency_iso_code'] == "mop" ? 'selected' : '') ?>>mop</option>
                                                                <option value="mro" <?php    echo ($value['stripe_currency_iso_code'] == "mro" ? 'selected' : '') ?>>mro</option>
                                                                <option value="mur" <?php    echo ($value['stripe_currency_iso_code'] == "mur" ? 'selected' : '') ?>>mur</option>
                                                                <option value="mvr" <?php    echo ($value['stripe_currency_iso_code'] == "mvr" ? 'selected' : '') ?>>mvr</option>
                                                                <option value="mwk" <?php    echo ($value['stripe_currency_iso_code'] == "mwk" ? 'selected' : '') ?>>mwk</option>
                                                                <option value="mxn" <?php    echo ($value['stripe_currency_iso_code'] == "mxn" ? 'selected' : '') ?>>mxn</option>
                                                                <option value="myr" <?php    echo ($value['stripe_currency_iso_code'] == "myr" ? 'selected' : '') ?>>myr</option>
                                                                <option value="mzn" <?php    echo ($value['stripe_currency_iso_code'] == "mzn" ? 'selected' : '') ?>>mzn</option>
                                                                <option value="nad" <?php    echo ($value['stripe_currency_iso_code'] == "nad" ? 'selected' : '') ?>>nad</option>
                                                                <option value="ngn" <?php    echo ($value['stripe_currency_iso_code'] == "ngn" ? 'selected' : '') ?>>ngn</option>
                                                                <option value="nio" <?php    echo ($value['stripe_currency_iso_code'] == "nio" ? 'selected' : '') ?>>nio</option>
                                                                <option value="nok" <?php    echo ($value['stripe_currency_iso_code'] == "nok" ? 'selected' : '') ?>>nok</option>
                                                                <option value="npr" <?php    echo ($value['stripe_currency_iso_code'] == "npr" ? 'selected' : '') ?>>npr</option>
                                                                <option value="nzd" <?php    echo ($value['stripe_currency_iso_code'] == "nzd" ? 'selected' : '') ?>>nzd</option>
                                                                <option value="pab" <?php    echo ($value['stripe_currency_iso_code'] == "pab" ? 'selected' : '') ?>>pab</option>
                                                                <option value="pen" <?php    echo ($value['stripe_currency_iso_code'] == "pen" ? 'selected' : '') ?>>pen</option>
                                                                <option value="pgk" <?php    echo ($value['stripe_currency_iso_code'] == "pgk" ? 'selected' : '') ?>>pgk</option>
                                                                <option value="php" <?php    echo ($value['stripe_currency_iso_code'] == "php" ? 'selected' : '') ?>>php</option>
                                                                <option value="pkr" <?php    echo ($value['stripe_currency_iso_code'] == "pkr" ? 'selected' : '') ?>>pkr</option>
                                                                <option value="pln" <?php    echo ($value['stripe_currency_iso_code'] == "pln" ? 'selected' : '') ?>>pln</option>
                                                                <option value="pyg" <?php    echo ($value['stripe_currency_iso_code'] == "pyg" ? 'selected' : '') ?>>pyg</option>
                                                                <option value="qar" <?php    echo ($value['stripe_currency_iso_code'] == "qar" ? 'selected' : '') ?>>qar</option>
                                                                <option value="ron" <?php    echo ($value['stripe_currency_iso_code'] == "ron" ? 'selected' : '') ?>>ron</option>
                                                                <option value="rsd" <?php    echo ($value['stripe_currency_iso_code'] == "rsd" ? 'selected' : '') ?>>rsd</option>
                                                                <option value="rub" <?php    echo ($value['stripe_currency_iso_code'] == "rub" ? 'selected' : '') ?>>rub</option>
                                                                <option value="rwf" <?php    echo ($value['stripe_currency_iso_code'] == "rwf" ? 'selected' : '') ?>>rwf</option>
                                                                <option value="sar" <?php    echo ($value['stripe_currency_iso_code'] == "sar" ? 'selected' : '') ?>>sar</option>
                                                                <option value="sbd" <?php    echo ($value['stripe_currency_iso_code'] == "sbd" ? 'selected' : '') ?>>sbd</option>
                                                                <option value="scr" <?php    echo ($value['stripe_currency_iso_code'] == "scr" ? 'selected' : '') ?>>scr</option>
                                                                <option value="sek" <?php    echo ($value['stripe_currency_iso_code'] == "sek" ? 'selected' : '') ?>>sek</option>
                                                                <option value="sgd" <?php    echo ($value['stripe_currency_iso_code'] == "sgd" ? 'selected' : '') ?>>sgd</option>
                                                                <option value="shp" <?php    echo ($value['stripe_currency_iso_code'] == "shp" ? 'selected' : '') ?>>shp</option>
                                                                <option value="sll" <?php    echo ($value['stripe_currency_iso_code'] == "sll" ? 'selected' : '') ?>>sll</option>
                                                                <option value="sos" <?php    echo ($value['stripe_currency_iso_code'] == "sos" ? 'selected' : '') ?>>sos</option>
                                                                <option value="srd" <?php    echo ($value['stripe_currency_iso_code'] == "srd" ? 'selected' : '') ?>>srd</option>
                                                                <option value="std" <?php    echo ($value['stripe_currency_iso_code'] == "std" ? 'selected' : '') ?>>std</option>
                                                                <option value="svc" <?php    echo ($value['stripe_currency_iso_code'] == "svc" ? 'selected' : '') ?>>svc</option>
                                                                <option value="szl" <?php    echo ($value['stripe_currency_iso_code'] == "szl" ? 'selected' : '') ?>>szl</option>
                                                                <option value="thb" <?php    echo ($value['stripe_currency_iso_code'] == "thb" ? 'selected' : '') ?>>thb</option>
                                                                <option value="tjs" <?php    echo ($value['stripe_currency_iso_code'] == "tjs" ? 'selected' : '') ?>>tjs</option>
                                                                <option value="top" <?php    echo ($value['stripe_currency_iso_code'] == "top" ? 'selected' : '') ?>>top</option>
                                                                <option value="try" <?php    echo ($value['stripe_currency_iso_code'] == "try" ? 'selected' : '') ?>>try</option>
                                                                <option value="ttd" <?php    echo ($value['stripe_currency_iso_code'] == "ttd" ? 'selected' : '') ?>>ttd</option>
                                                                <option value="twd" <?php    echo ($value['stripe_currency_iso_code'] == "twd" ? 'selected' : '') ?>>twd</option>
                                                                <option value="tzs" <?php    echo ($value['stripe_currency_iso_code'] == "tzs" ? 'selected' : '') ?>>tzs</option>
                                                                <option value="uah" <?php    echo ($value['stripe_currency_iso_code'] == "uah" ? 'selected' : '') ?>>uah</option>
                                                                <option value="ugx" <?php    echo ($value['stripe_currency_iso_code'] == "ugx" ? 'selected' : '') ?>>ugx</option>
                                                                <option value="uyu" <?php    echo ($value['stripe_currency_iso_code'] == "uyu" ? 'selected' : '') ?>>uyu</option>
                                                                <option value="uzs" <?php    echo ($value['stripe_currency_iso_code'] == "uzs" ? 'selected' : '') ?>>uzs</option>
                                                                <option value="vnd" <?php    echo ($value['stripe_currency_iso_code'] == "vnd" ? 'selected' : '') ?>>vnd</option>
                                                                <option value="vuv" <?php    echo ($value['stripe_currency_iso_code'] == "vuv" ? 'selected' : '') ?>>vuv</option>
                                                                <option value="wst" <?php    echo ($value['stripe_currency_iso_code'] == "wst" ? 'selected' : '') ?>>wst</option>
                                                                <option value="xaf" <?php    echo ($value['stripe_currency_iso_code'] == "xaf" ? 'selected' : '') ?>>xaf</option>
                                                                <option value="xcd" <?php    echo ($value['stripe_currency_iso_code'] == "xcd" ? 'selected' : '') ?>>xcd</option>
                                                                <option value="xof" <?php    echo ($value['stripe_currency_iso_code'] == "xof" ? 'selected' : '') ?>>xof</option>
                                                                <option value="xpf" <?php    echo ($value['stripe_currency_iso_code'] == "xpf" ? 'selected' : '') ?>>xpf</option>
                                                                <option value="yer" <?php    echo ($value['stripe_currency_iso_code'] == "yer" ? 'selected' : '') ?>>yer</option>
                                                                <option value="zar" <?php    echo ($value['stripe_currency_iso_code'] == "zar" ? 'selected' : '') ?>>zar</option>
                                                                <option value="zmw" <?php    echo ($value['stripe_currency_iso_code'] == "zmw" ? 'selected' : '') ?>>zmw</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="os-row">
                                                    <div class="os-col-12">
                                                        <div class="os-form-group os-form-toggler-group  size-normal"><input
                                                                type="hidden" name="settings[stripe_remove_zip_code]"
                                                                value="{{$value['stripe_remove_zip_code']}}"
                                                                id="settings_stripe_remove_zip_code">
                                                            <div class="os-toggler {{$value['stripe_remove_zip_code']}} size-normal"
                                                                data-is-string-value="true"
                                                                data-for="settings_stripe_remove_zip_code">
                                                                <div class="toggler-rail">
                                                                    <div class="toggler-pill"></div>
                                                                </div>
                                                            </div>
                                                            <div class="os-toggler-label-w"><label>Do not ask for Zip/Postal
                                                                    Code</label></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="os-row">
                                                    <div class="os-col-12">
                                                        <div class="copyable-text-block">
                                                            <div class="text-label">
                                                                Webhook URL </div>
                                                            <input type="text" class="os-click-to-copy text-value"
                                                                data-copy-tooltip-position="left"
                                                                value="https://latepoint-demo.com/demo_4217c15f9eb342a2/wp-admin/admin-post.php?action=latepoint_route_call&amp;route_name=payments_stripe__webhook">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="os-section-header">
                                <h3>Other Settings</h3>
                            </div>
                            <div class="white-box">
                                <div class="white-box-header">
                                    <div class="os-form-sub-header">
                                        <h3>Payment Settings</h3>
                                    </div>
                                </div>
                                <div class="white-box-content no-padding">
                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Environment</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="os-form-group os-form-select-group os-form-group-transparent"><select
                                                    name="settings[payments_environment]" id="settings_payments_environment"
                                                    class="os-form-control">
                                                    <option value="live" <?php    echo ($value['payments_environment'] == "live" ? 'selected' : ''); ?>>Live (Production)</option>
                                                    <option value="dev" <?php    echo ($value['payments_environment'] == "dev" ? 'selected' : ''); ?>>Testing (Development)</option>
                                                    <option value="demo" <?php    echo ($value['payments_environment'] == "demo" ? 'selected' : ''); ?>>Demo</option>
                                                </select></div>
                                        </div>
                                    </div>

                                    <div class="sub-section-row">
                                        <div class="sub-section-label">
                                            <h3>Local Payments</h3>
                                        </div>
                                        <div class="sub-section-content">
                                            <div class="os-form-group os-form-toggler-group  with-sub-label size-normal"><input
                                                    type="hidden" name="settings[enable_payments_local]"
                                                    value="{{$value['enable_payments_local']}}" id="settings_enable_payments_local">
                                                <div class="os-toggler {{$value['enable_payments_local']}} size-normal"
                                                    data-is-string-value="true" data-for="settings_enable_payments_local">
                                                    <div class="toggler-rail">
                                                        <div class="toggler-pill"></div>
                                                    </div>
                                                </div>
                                                <div class="os-toggler-label-w"><label>Allow Paying Locally</label><span>Show "Pay
                                                        Later" payment option</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="os-form-buttons">
                                <div class="os-form-group">
                                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Save Settings</button>
                                </div>
                            </div>
                        </form>
            @endif
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('/assets/jquery.js')}}"></script>
<script>
    $('.os-form-toggler-group').click(function () {
        var obj = $(this).children('.os-toggler');
        var val = $(this).children('input');
        if (obj.hasClass('on')) {
            obj.removeClass('on');
            obj.addClass('off');
            val.val('off');
        } else {
            obj.removeClass('off');
            obj.addClass('on');
            val.val('on');
        }
    });

    $('.os-toggler-w').click(function () {
        var obj = $(this).children('.os-toggler');
        var val = $(this).children('input');
        if (obj.hasClass('on')) {
            obj.removeClass('on');
            obj.addClass('off');
            val.val('off');
            obj.parents('.os-togglable-item-w').children('.os-togglable-item-body').hide();
        } else {
            obj.removeClass('off');
            obj.addClass('on');
            val.val('on');
            obj.parents('.os-togglable-item-w').children('.os-togglable-item-body').show();
        }
    });
</script>
@endsection