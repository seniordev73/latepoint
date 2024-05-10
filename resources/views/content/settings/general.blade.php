@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Settings | general')

@section('page-style')
@vite([
    'resources/assets/vendor/scss/pages/card-analytics.scss'

])
@endsection

@section('vendor-style')
@vite([
    'resources/assets/vendor/libs/flatpickr/flatpickr.scss',
    'resources/assets/vendor/libs/select2/select2.scss',
    'resources/assets/vendor/libs/dropzone/dropzone.scss'
])
@endsection

@section('vendor-script')
@vite([
    'resources/assets/vendor/libs/flatpickr/flatpickr.js',
    'resources/assets/vendor/libs/select2/select2.js',
    'resources/assets/vendor/libs/dropzone/dropzone.js'
])
@endsection

@section('page-script')
@vite([
    'resources/assets/js/ui-cards-analytics.js',
    'resources/assets/js/forms-selects.js',
    'resources/assets/js/forms-file-upload.js'
])
@endsection
@section('content')

<link href="{{asset('/assets/css/settings.css')}}" rel="stylesheet">

<div class="row">
    @if($check == 0)
        <form action="{{route('admin.settings-storegeneral')}}" method="post">
            @csrf
            <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
                <div class="card-header mb-4 d-flex">
                    <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2 acitive-tab">
                        <h4 class="m-0 me-2">General</h4>
                    </a>
                    <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2">
                        <h4 class="m-0 me-2">Schedule</h4>
                    </a>
                    <a href="{{ url('/admin/settings/tax') }}" class="agent-status-active text-center mx-2">
                        <h4 class="m-0 me-2">Tax</h4>
                    </a>
                    <a href="{{ url('/admin/settings/steps') }}" class="agent-status-active text-center mx-2">
                        <h4 class="m-0 me-2">Steps</h4>
                    </a>
                    <a href="{{ url('/admin/settings/payments') }}" class="agent-status-active text-center mx-2">
                        <h4 class="m-0 me-2">Payments</h4>
                    </a>
                    <a href="{{ url('/admin/settings/notifications') }}" class="agent-status-active text-center mx-2">
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
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Appointment Settings</h5>
                        <div class="card-body demo-only-element p-0">
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Statuses</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-6 px-3">
                                            <label for="settings_default_booking_status" class="form-label">Default status</label>
                                            <select name="settings[default_booking_status]" id="settings_default_booking_status" class="selectpicker w-100">
                                                <option value="approved" selected="">Approved</option>
                                                <option value="pending">Pending Approval</option>
                                                <option value="cancelled">Cancelled</option>
                                                <option value="no_show">No Show</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 px-3">
                                            <label for="selectpickerBasic" class="form-label">Statuses that block timeslot</label>
                                            <div class="select2-primary">
                                                <select id="select2Basic1" name="settings[timeslot_blocking_statuses]" class="select2 form-select w-100" data-style="btn-default" multiple>
                                                    <option value="approved" selected="">Approved</option>
                                                    <option value="pending">Pending Approval</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="no_show">No Show</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-6 px-3">
                                            <label for="settings_default_booking_status" class="form-label">Statuses that appear on pending page</label>
                                            <div class="select2-primary">
                                                <select name="settings[default_booking_status]" id="select2Basic2" class="select2 form-select w-100" multiple>
                                                    <option value="approved">Approved</option>
                                                    <option value="pending" selected="">Pending Approval</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="no_show">No Show</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 px-3">
                                            <label for="selectpickerBasic" class="form-label">Statuses hidden on calendar</label>
                                            <div class="select2-primary">
                                                <select id="select2Basic3" name="settings[calendar_hidden_statuses]" class="select2 form-select w-100" data-style="btn-default" multiple>
                                                    <option value="approved" selected="">Approved</option>
                                                    <option value="pending">Pending Approval</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="no_show">No Show</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Additional Statuses (comma separated)</label>
                                            <input type="text" name="settings[additional_booking_statuses]" class="form-control" id="defaultFormControlInput" placeholder="Additional Statuses (comma separated)" aria-describedby="defaultFormControlHelp" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Date and time --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Date and time</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-4 px-3">
                                            <label for="settings_default_booking_status" class="form-label">Time system</label>
                                            <select name="settings[default_booking_status]" id="settings_default_booking_status" class="form-select w-100">
                                                <option value="approved" selected="">12-hour clock</option>
                                                <option value="completed">24-hour clock</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 px-3">
                                            <label for="settings_date_format" class="form-label">Date format</label>
                                            <select id="settings_date_format" name="settings[date_format]" class="form-select w-100" data-style="btn-default">
                                                <option value="m/d/Y" selected="">MM/DD/YYYY</option>
                                                <option value="m.d.Y">MM.DD.YYYY</option>
                                                <option value="d/m/Y">DD/MM/YYYY</option>
                                                <option value="d.m.Y">DD.MM.YYYY</option>
                                                <option value="Y-m-d">YYYY-MM-DD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Selectable intervals</label>
                                            <input type="text" name="settings[timeblock_interval]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="30 minutes" />
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="col-lg-6 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][show_appointment_end_time]" checked />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Show appointment end time <br><p>Show booking end time during booking process and on summary</p></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][disable_verbose_date_output]" checked />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Disable verbose date output<br><p>Use number instead of name of the month when outputting dates</p></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Restrictions</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Time Restrictions --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Date and time</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <div class="alert alert-secondary" role="alert">
                                                You can set restrictions on earliest/latest dates in the future when your customer can place an appointment. You can either use a relative values like for example "+1 month", "+2 weeks", "+5 days", "+3 hours", "+30 minutes" (entered without quotes), or you can use a fixed date in format YYYY-MM-DD. Leave blank to remove any limitations.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-6 px-3">
                                            <label for="selectpickerBasic" class="form-label">Earliest Possible Booking</label>
                                            <input type="text" name="settings[earliest_possible_booking]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Earliest Possible Booking" />
                                        </div>
                                        <div class="col-lg-6 px-3">
                                            <label for="selectpickerBasic" class="form-label">Latest Possible Booking</label>
                                            <input type="text" name="settings[latest_possible_booking]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Latest Possible Booking" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Quantity Restrictions --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Quantity Restrictions</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Maximum Number of Future Bookings per Customer</label>
                                            <input type="text" name="settings[max_future_bookings_per_customer]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Maximum Number of Future Bookings per Customer" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card mb-4">
                        <h5 class="card-header">Currency Settings</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Symbol --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Symbol</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Symbol before the price</label>
                                            <input type="text" name="settings[currency_symbol_before]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Symbol before the price" value="$" />
                                        </div>
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Symbol after the price</label>
                                            <input type="text" name="settings[latest_possible_booking]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Symbol after the price" />
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Formatting --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Formatting</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Thousand Separator</label>
                                            <select name="settings[thousand_separator]" id="settings_default_booking_status" class="selectpicker w-100">
                                                <option value="," selected="">Comma (1,000)</option>
                                                <option value=".">Dot (1.000)</option>
                                                <option value=" ">Space (1 000)</option>
                                                <option value="">None (1000)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Decimal Separator</label>
                                            <select name="settings[decimal_separator]" id="settings_default_booking_status" class="selectpicker w-100">
                                                <option value="." selected="">Dot (0.99)</option>
                                                <option value=",">Comma (0,99)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Number of Decimals</label>
                                            <select name="settings[number_of_decimals]" id="settings_default_booking_status" class="selectpicker w-100">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2" selected="">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Phone Settings</h5>
                    <div class="card-body demo-only-element p-0">
                        {{-- Countries --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Countries</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex">
                                    <div class="col-lg-4 px-3">
                                        <label for="selectpickerBasic" class="form-label">Countries shown in phone field</label>
                                        <select name="settings[list_of_phone_countries]" id="settings_list_of_phone_countries" class="selectpicker form-select w-100" data-style="btn-default">
                                            <option value="all" selected="">Show all countries</option>
                                            <option value="select">Show selected countries</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 px-3">
                                        <label for="selectpickerBasic" class="form-label">Default Country (if not auto-detected)</label>
                                        <select name="settings[default_phone_country]" id="settings_default_phone_country" class="select2 form-select w-100" data-style="btn-default">
                                            <option value="us" selected="">United States</option><option value="af">Afghanistan</option><option value="al">Albania</option><option value="dz">Algeria</option><option value="as">American Samoa</option><option value="ad">Andorra</option><option value="ao">Angola</option><option value="ai">Anguilla</option><option value="ag">Antigua and Barbuda</option><option value="ar">Argentina</option><option value="am">Armenia (Հայաստան)</option><option value="aw">Aruba</option><option value="ac">Ascension Island</option><option value="au">Australia</option><option value="at">Austria (Österreich)</option><option value="az">Azerbaijan (Azərbaycan)</option><option value="bs">Bahamas</option><option value="bh">Bahrain (‫البحرين‬‎)</option><option value="bd">Bangladesh (বাংলাদেশ)</option><option value="bb">Barbados</option><option value="by">Belarus (Беларусь)</option><option value="be">Belgium (België)</option><option value="bz">Belize</option><option value="bj">Benin (Bénin)</option><option value="bm">Bermuda</option><option value="bt">Bhutan (འབྲུག)</option><option value="bo">Bolivia</option><option value="ba">Bosnia and Herzegovina (Босна и Херцеговина)</option><option value="bw">Botswana</option><option value="br">Brazil (Brasil)</option><option value="io">British Indian Ocean Territory</option><option value="vg">British Virgin Islands</option><option value="bn">Brunei</option><option value="bg">Bulgaria (България)</option><option value="bf">Burkina Faso</option><option value="bi">Burundi (Uburundi)</option><option value="kh">Cambodia (កម្ពុជា)</option><option value="cm">Cameroon (Cameroun)</option><option value="ca">Canada</option><option value="cv">Cape Verde (Kabu Verdi)</option><option value="bq">Caribbean Netherlands</option><option value="ky">Cayman Islands</option><option value="cf">Central African Republic (République centrafricaine)</option><option value="td">Chad (Tchad)</option><option value="cl">Chile</option><option value="cn">China (中国)</option><option value="cx">Christmas Island</option><option value="cc">Cocos (Keeling) Islands</option><option value="co">Colombia</option><option value="km">Comoros (‫جزر القمر‬‎)</option><option value="cd">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)</option><option value="cg">Congo (Republic) (Congo-Brazzaville)</option><option value="ck">Cook Islands</option><option value="cr">Costa Rica</option><option value="ci">Côte d’Ivoire</option><option value="hr">Croatia (Hrvatska)</option><option value="cu">Cuba</option><option value="cw">Curaçao</option><option value="cy">Cyprus (Κύπρος)</option><option value="cz">Czech Republic (Česká republika)</option><option value="dk">Denmark (Danmark)</option><option value="dj">Djibouti</option><option value="dm">Dominica</option><option value="do">Dominican Republic (República Dominicana)</option><option value="ec">Ecuador</option><option value="eg">Egypt (‫مصر‬‎)</option><option value="sv">El Salvador</option><option value="gq">Equatorial Guinea (Guinea Ecuatorial)</option><option value="er">Eritrea</option><option value="ee">Estonia (Eesti)</option><option value="sz">Eswatini</option><option value="et">Ethiopia</option><option value="fk">Falkland Islands (Islas Malvinas)</option><option value="fo">Faroe Islands (Føroyar)</option><option value="fj">Fiji</option><option value="fi">Finland (Suomi)</option><option value="fr">France</option><option value="gf">French Guiana (Guyane française)</option><option value="pf">French Polynesia (Polynésie française)</option><option value="ga">Gabon</option><option value="gm">Gambia</option><option value="ge">Georgia (საქართველო)</option><option value="de">Germany (Deutschland)</option><option value="gh">Ghana (Gaana)</option><option value="gi">Gibraltar</option><option value="gr">Greece (Ελλάδα)</option><option value="gl">Greenland (Kalaallit Nunaat)</option><option value="gd">Grenada</option><option value="gp">Guadeloupe</option><option value="gu">Guam</option><option value="gt">Guatemala</option><option value="gg">Guernsey</option><option value="gn">Guinea (Guinée)</option><option value="gw">Guinea-Bissau (Guiné Bissau)</option><option value="gy">Guyana</option><option value="ht">Haiti</option><option value="hn">Honduras</option><option value="hk">Hong Kong (香港)</option><option value="hu">Hungary (Magyarország)</option><option value="is">Iceland (Ísland)</option><option value="in">India (भारत)</option><option value="id">Indonesia</option><option value="ir">Iran (‫ایران‬‎)</option><option value="iq">Iraq (‫العراق‬‎)</option><option value="ie">Ireland</option><option value="im">Isle of Man</option><option value="il">Israel (‫ישראל‬‎)</option><option value="it">Italy (Italia)</option><option value="jm">Jamaica</option><option value="jp">Japan (日本)</option><option value="je">Jersey</option><option value="jo">Jordan (‫الأردن‬‎)</option><option value="kz">Kazakhstan (Казахстан)</option><option value="ke">Kenya</option><option value="ki">Kiribati</option><option value="xk">Kosovo</option><option value="kw">Kuwait (‫الكويت‬‎)</option><option value="kg">Kyrgyzstan (Кыргызстан)</option><option value="la">Laos (ລາວ)</option><option value="lv">Latvia (Latvija)</option><option value="lb">Lebanon (‫لبنان‬‎)</option><option value="ls">Lesotho</option><option value="lr">Liberia</option><option value="ly">Libya (‫ليبيا‬‎)</option><option value="li">Liechtenstein</option><option value="lt">Lithuania (Lietuva)</option><option value="lu">Luxembourg</option><option value="mo">Macau (澳門)</option><option value="mk">North Macedonia (Македонија)</option><option value="mg">Madagascar (Madagasikara)</option><option value="mw">Malawi</option><option value="my">Malaysia</option><option value="mv">Maldives</option><option value="ml">Mali</option><option value="mt">Malta</option><option value="mh">Marshall Islands</option><option value="mq">Martinique</option><option value="mr">Mauritania (‫موريتانيا‬‎)</option><option value="mu">Mauritius (Moris)</option><option value="yt">Mayotte</option><option value="mx">Mexico (México)</option><option value="fm">Micronesia</option><option value="md">Moldova (Republica Moldova)</option><option value="mc">Monaco</option><option value="mn">Mongolia (Монгол)</option><option value="me">Montenegro (Crna Gora)</option><option value="ms">Montserrat</option><option value="ma">Morocco (‫المغرب‬‎)</option><option value="mz">Mozambique (Moçambique)</option><option value="mm">Myanmar (Burma) (မြန်မာ)</option><option value="na">Namibia (Namibië)</option><option value="nr">Nauru</option><option value="np">Nepal (नेपाल)</option><option value="nl">Netherlands (Nederland)</option><option value="nc">New Caledonia (Nouvelle-Calédonie)</option><option value="nz">New Zealand</option><option value="ni">Nicaragua</option><option value="ne">Niger (Nijar)</option><option value="ng">Nigeria</option><option value="nu">Niue</option><option value="nf">Norfolk Island</option><option value="kp">North Korea (조선 민주주의 인민 공화국)</option><option value="mp">Northern Mariana Islands</option><option value="no">Norway (Norge)</option><option value="om">Oman (‫عُمان‬‎)</option><option value="pk">Pakistan (‫پاکستان‬‎)</option><option value="pw">Palau</option><option value="ps">Palestine (‫فلسطين‬‎)</option><option value="pa">Panama (Panamá)</option><option value="pg">Papua New Guinea</option><option value="py">Paraguay</option><option value="pe">Peru (Perú)</option><option value="ph">Philippines</option><option value="pl">Poland (Polska)</option><option value="pt">Portugal</option><option value="pr">Puerto Rico</option><option value="qa">Qatar (‫قطر‬‎)</option><option value="re">Réunion (La Réunion)</option><option value="ro">Romania (România)</option><option value="ru">Russia (Россия)</option><option value="rw">Rwanda</option><option value="bl">Saint Barthélemy</option><option value="sh">Saint Helena</option><option value="kn">Saint Kitts and Nevis</option><option value="lc">Saint Lucia</option><option value="mf">Saint Martin (Saint-Martin (partie française))</option><option value="pm">Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</option><option value="vc">Saint Vincent and the Grenadines</option><option value="ws">Samoa</option><option value="sm">San Marino</option><option value="st">São Tomé and Príncipe (São Tomé e Príncipe)</option><option value="sa">Saudi Arabia (‫المملكة العربية السعودية‬‎)</option><option value="sn">Senegal (Sénégal)</option><option value="rs">Serbia (Србија)</option><option value="sc">Seychelles</option><option value="sl">Sierra Leone</option><option value="sg">Singapore</option><option value="sx">Sint Maarten</option><option value="sk">Slovakia (Slovensko)</option><option value="si">Slovenia (Slovenija)</option><option value="sb">Solomon Islands</option><option value="so">Somalia (Soomaaliya)</option><option value="za">South Africa</option><option value="kr">South Korea (대한민국)</option><option value="ss">South Sudan (‫جنوب السودان‬‎)</option><option value="es">Spain (España)</option><option value="lk">Sri Lanka (ශ්‍රී ලංකාව)</option><option value="sd">Sudan (‫السودان‬‎)</option><option value="sr">Suriname</option><option value="sj">Svalbard and Jan Mayen</option><option value="se">Sweden (Sverige)</option><option value="ch">Switzerland (Schweiz)</option><option value="sy">Syria (‫سوريا‬‎)</option><option value="tw">Taiwan (台灣)</option><option value="tj">Tajikistan</option><option value="tz">Tanzania</option><option value="th">Thailand (ไทย)</option><option value="tl">Timor-Leste</option><option value="tg">Togo</option><option value="tk">Tokelau</option><option value="to">Tonga</option><option value="tt">Trinidad and Tobago</option><option value="tn">Tunisia (‫تونس‬‎)</option><option value="tr">Turkey (Türkiye)</option><option value="tm">Turkmenistan</option><option value="tc">Turks and Caicos Islands</option><option value="tv">Tuvalu</option>
                                            <option value="vi">U.S. Virgin Islands</option><option value="ug">Uganda</option><option value="ua">Ukraine (Україна)</option>
                                            <option value="ae">United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</option>
                                            <option value="gb">United Kingdom</option><option value="uy">Uruguay</option><option value="uz">Uzbekistan (Oʻzbekiston)</option>
                                            <option value="vu">Vanuatu</option><option value="va">Vatican City (Città del Vaticano)</option><option value="ve">Venezuela</option><option value="vn">Vietnam (Việt Nam)</option><option value="wf">Wallis and Futuna (Wallis-et-Futuna)</option><option value="eh">Western Sahara (‫الصحراء الغربية‬‎)</option><option value="ye">Yemen (‫اليمن‬‎)</option><option value="zm">Zambia</option><option value="zw">Zimbabwe</option><option value="ax">Åland Islands</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Validation --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Validation</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][validate_phone_type]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Validate phone typed fields if they are set as required<br><p>Reject invalid phone for customers and agents if the phone field is set as required</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][format_phone_number]" checked/>
                                            <input type="hidden" name="settings[format_phone_number]" value="off">
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Format phone number on input<br><p>Applies formatting on phone fields based on the country selected (not recommended for countries that have multiple NSN lengths)</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][show_country_dial_code]" checked/>
                                            <input type="hidden" name="settings[show_country_dial_code]" value="off">
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Show country dial code next to flag<br><p>If enabled, will show a country code next to a flag, for example +1 for United States</p></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Appearance Settings</h5>
                    <div class="card-body demo-only-element p-0">
                        {{-- Visual Style --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Visual Style</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Color Scheme for Booking Form</label>
                                        <select name="settings[color_scheme_for_booking_form]" id="settings_color_scheme_for_booking_form" class="selectpicker w-100">
                                            <option value="blue" selected="">Blue</option><option value="black">Black</option><option value="teal">Teal</option>
                                            <option value="green">Green</option><option value="purple">Purple</option>
                                            <option value="red">Red</option><option value="orange">Orange</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Border Style</label>
                                        <select name="settings[border_radius]" id="settings_border_radius" class="selectpicker w-100">
                                            <option value="rounded">Rounded Corners</option>
                                            <option value="flat" selected="">Flat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Date and Time Picker --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Date and Time Picker</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Show Time Slots as</label>
                                        <select name="settings[time_pick_style]" id="settings_time_pick_style" class="selectpicker w-100">
                                            <option value="timeline">Timeline</option>
                                            <option value="timebox" selected="">Time Boxes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][hide_time_picker]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Hide time picker when only one time slot is available</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][hide_slot_availability_count]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Hide slot availability count</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Timeslot Availability Logic</h5>
                    <div class="card-body demo-only-element p-0">
                        {{-- Restrictions --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Restrictions</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][one_agent_location]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Location can only be used by one agent at a time<br><p>At any given location, only one agent can be booked at a time</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][one_location_agent]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Agents can only be present in one location at a time<br><p>If an agent is booked at one location, he will not be able to accept any bookings for the same timeslot at other locations</p></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Permissions --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Permissions</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][one_agent_different_services]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <label class="switch-label">One agent can perform different services simultaneously<br><p>Allows an agent to be booked for different services within the same timeslot</p></label>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Customer Settings</h5>
                    <div class="card-body demo-only-element p-0">
                        {{-- Rescheduling --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Rescheduling</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][customers_reshedule_bookings]" checked/>
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Allow customers reschedule their bookings<br><p>If enable, shows a button on customer cabinet to reschedule an appointment</p></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Cancellation --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Cancellation</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][customers_cancel_bookings]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Allow customers cancel their bookings<br><p>If enable, shows a button on customer cabinet to cancel an appointment</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][customer_set_restriction]" checked/>
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Set restriction on when customer can cancel</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Customer Cabinet --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Customer Cabinet</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Shortcode for contents of New Appointment tab</label>
                                        <input type="text" name="settings[currency_symbol_before]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Shortcode for contents of New Appointment tab" value="[latepoint_book_form]" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <div class="alert alert-secondary" role="alert">
                                            You can set attributes for a new appointment button tile in a format
                                            <a href="javascript:;">data-selected-agent="ID" data-selected-location="ID" etc...</a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Attributes for New Appointment button</label>
                                        <input type="text" name="settings[customer_dashboard_book_button_attributes]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Attributes for New Appointment button" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Restrictions --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Restrictions</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][wordpress_users_use]" checked/>
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Use WordPress users as customers<br>
                                                <p>Customers can login using their WordPress credentials</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][require_customers_set_password]"  checked/>
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Require customers to set password<br>
                                                <p>Shows password field on registration step</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][remove_auth_tabs]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Remove login and register tabs<br>
                                                <p>This will disable ability for customers to login or register on booking form</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][hide_create_account]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Hide "Create Account" prompt on confirmation step</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Social Login --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Social Login</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][enable_google_login]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Enable login with Google<br>Display Google Login button on customer login and registration forms</p></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="settings[check][enable_facebook_login]" checked />
                                            <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">Enable login with Facebook<br>
                                                <p>Display Facebook Login button on customer login and registration forms</p></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Setup Pages</h5>
                    <div class="card-body demo-only-element p-0">
                        {{-- Set Page URLs --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Set Page URLs</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Customer Dashboard Page URL</label>
                                        <input type="text" name="settings[customer_dashboard_url]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Customer Dashboard Page URL" value="/customer-cabinet/" />
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label for="selectpickerBasic" class="form-label">Customer Login Page URL</label>
                                        <input type="text" name="settings[customer_login_url]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Customer Login Page URL" value="/customer-cabinet/" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <h5 class="card-header">Other Settings</h5>
                    <div class="card-body demo-only-element p-0">
                        {{-- Business Information --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Business Information</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-4">
                                    <div class="col-lg-12 px-3">
                                        <div action="/upload" class="dropzone needsclick" id="dropzone-basic">
                                            <div class="dz-message needsclick m-0">
                                                Company Logo
                                            </div>
                                            <div class="fallback">
                                                <input name="file" type="file" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-lg-3 px-3">
                                        <label for="settings_business_name" class="form-label">Company Name</label>
                                        <input type="text" name="settings[business_name]" class="form-control" id="settings_business_name" aria-describedby="defaultFormControlHelp" placeholder="Company Name" />                        
                                    </div>
                                    <div class="col-lg-3 px-3">
                                        <label for="settings_business_phone" class="form-label">Business Phone</label>
                                        <input type="text" name="settings[business_phone]" class="form-control" id="settings_business_phone" aria-describedby="defaultFormControlHelp" placeholder="Business Phone" />                        
                                    </div>
                                    <div class="col-lg-6 px-3">
                                        <label for="settings_business_address" class="form-label">Business Address</label>
                                        <input type="text" name="settings[business_address]" class="form-control" id="settings_business_address" aria-describedby="defaultFormControlHelp" placeholder="Business Address" />                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Canlendar Settings --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Canlendar Settings</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex mb-3">
                                    <div class="col-lg-12 px-3">
                                        <label for="settings_calendar_height" class="form-label">Daily Calendar Minimum Height (in pixels)</label>
                                        <input type="text" name="settings[calendar_height]" class="form-control" id="settings_calendar_height" aria-describedby="defaultFormControlHelp" placeholder="Daily Calendar Minimum Height (in pixels)" value="700" />                        
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <div class="alert alert-secondary" role="alert">
                                            You can use variables in your booking template, they will be replaced with a value for the booking.
                                            <a href="javascript:;" class="text-decoration-underline"><i class="bx bx-info-circle bx-xs "></i>Show Available Variables</a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <label for="settings_booking_title" class="form-label">Booking tile information to display on calendar</label>
                                        <input type="text" name="settings[booking_title]" class="form-control" id="settings_booking_title" aria-describedby="defaultFormControlHelp" placeholder="Booking tile information to display on calendar" value="@{{ service_name }}" />                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Google Places API --}}
                        <div class="sub-section-row">
                            <div class="sub-section-label">
                                <h3>Google Places API</h3>
                            </div>
                            <div class="sub-section-content">
                                <div class="d-flex">
                                    <div class="col-lg-12 px-3">
                                        <div class="alert alert-secondary" role="alert">
                                            In order for address autocomplete to work, you need an API key. To learn how to create an API key for Google Places API. 
                                            <a href="javascript:;" class="text-decoration-underline">click here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-lg-6 px-3">
                                        <input type="text" name="settings[google_places_api_key]" class="form-control h-100" id="settings_google_places_api_key" aria-describedby="defaultFormControlHelp" placeholder="Google Places API key" />                                                        
                                    </div>
                                    <div class="col-lg-6 px-3">
                                        <label for="settings_business_name" class="form-label">Country Restriction</label>
                                        <select name="settings[google_places_country_restriction]" id="settings_google_places_country_restriction" class="selectpicker w-100">
                                            <option value="" selected="">No Restrictions</option><option value="au">Australia</option>
                                            <option value="at">Austria</option><option value="be">Belgium</option><option value="br">Brazil</option>
                                            <option value="ca">Canada</option><option value="dk">Denmark</option><option value="ee">Estonia</option>
                                            <option value="fi">Finland</option><option value="fr">France</option><option value="de">Germany</option>
                                            <option value="gr">Greece</option><option value="hk">Hong Kong</option><option value="in">India</option>
                                            <option value="ie">Ireland</option><option value="it">Italy</option><option value="jp">Japan</option>
                                            <option value="lv">Latvia</option><option value="lt">Lithuania</option><option value="lu">Luxembourg</option>
                                            <option value="my">Malaysia</option><option value="mx">Mexico</option><option value="nl">Netherlands</option>
                                            <option value="nz">New Zealand</option><option value="no">Norway</option><option value="pl">Poland</option>
                                            <option value="pt">Portugal</option><option value="ro">Romania</option><option value="sg">Singapore</option>
                                            <option value="sk">Slovakia</option><option value="si">Slovenia</option><option value="es">Spain</option>
                                            <option value="se">Sweden</option><option value="ch">Switzerland</option><option value="ae">United Arab Emirates</option>
                                            <option value="gb">United Kingdom</option><option value="us">United States</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary add-agent" type="submit">Save Settings</button>

                </div>
            </div>
        </form>
    @else
            <form action="{{route('admin.settings-storegeneral')}}" method="post">
                @csrf
                @php
                    $value = unserialize($general->value);
                @endphp
                <div class="col-lg-12 col-xxl-12 mb-4 order-3 order-xxl-1">
                    <div class="card-header mb-4 d-flex">
                        <a href="{{ url('/admin/settings/general') }}" class="agent-status-active text-center mx-2 acitive-tab">
                            <h4 class="m-0 me-2">General</h4>
                        </a>
                        <a href="{{ url('/admin/settings/schedule') }}" class="agent-status-active text-center mx-2">
                            <h4 class="m-0 me-2">Schedule</h4>
                        </a>
                        <a href="{{ url('/admin/settings/tax') }}" class="agent-status-active text-center mx-2">
                            <h4 class="m-0 me-2">Tax</h4>
                        </a>
                        <a href="{{ url('/admin/settings/steps') }}" class="agent-status-active text-center mx-2">
                            <h4 class="m-0 me-2">Steps</h4>
                        </a>
                        <a href="{{ url('/admin/settings/payments') }}" class="agent-status-active text-center mx-2">
                            <h4 class="m-0 me-2">Payments</h4>
                        </a>
                        <a href="{{ url('/admin/settings/notifications') }}" class="agent-status-active text-center mx-2">
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
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h5 class="card-header">Appointment Settings</h5>
                            <div class="card-body demo-only-element p-0">
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Statuses</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="d-flex mb-3">
                                            <div class="col-lg-6 px-3">
                                                <label for="settings_default_booking_status" class="form-label">Default status</label>
                                                <select name="settings[default_booking_status]" id="settings_default_booking_status" class="selectpicker w-100">
                                                    <option value="approved" selected="">Approved</option>
                                                    <option value="pending">Pending Approval</option>
                                                    <option value="cancelled">Cancelled</option>
                                                    <option value="no_show">No Show</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 px-3">
                                                <label for="selectpickerBasic" class="form-label">Statuses that block timeslot</label>
                                                <div class="select2-primary">
                                                    <select id="select2Basic1" name="settings[timeslot_blocking_statuses]" class="select2 form-select w-100" data-style="btn-default" multiple>
                                                        <option value="approved" selected="">Approved</option>
                                                        <option value="pending">Pending Approval</option>
                                                        <option value="cancelled">Cancelled</option>
                                                        <option value="no_show">No Show</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="col-lg-6 px-3">
                                                <label for="settings_default_booking_status" class="form-label">Statuses that appear on pending page</label>
                                                <div class="select2-primary">
                                                    <select name="settings[default_booking_status]" id="select2Basic2" class="select2 form-select w-100" multiple>
                                                        <option value="approved">Approved</option>
                                                        <option value="pending" selected="">Pending Approval</option>
                                                        <option value="cancelled">Cancelled</option>
                                                        <option value="no_show">No Show</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 px-3">
                                                <label for="selectpickerBasic" class="form-label">Statuses hidden on calendar</label>
                                                <div class="select2-primary">
                                                    <select id="select2Basic3" name="settings[calendar_hidden_statuses]" class="select2 form-select w-100" data-style="btn-default" multiple>
                                                        <option value="approved" selected="">Approved</option>
                                                        <option value="pending">Pending Approval</option>
                                                        <option value="cancelled">Cancelled</option>
                                                        <option value="no_show">No Show</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-12 px-3">
                                                <label for="selectpickerBasic" class="form-label">Additional Statuses (comma separated)</label>
                                                <input type="text" value="{{htmlspecialchars($value['additional_booking_statuses']) }}" name="settings[additional_booking_statuses]" class="form-control" id="defaultFormControlInput" placeholder="Additional Statuses (comma separated)" aria-describedby="defaultFormControlHelp" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- Date and time --}}
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Date and time</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="d-flex mb-3">
                                            <div class="col-lg-4 px-3">
                                                <label for="settings_default_booking_status" class="form-label">Time system</label>
                                                <select name="settings[default_booking_status]" id="settings_default_booking_status" class="form-select w-100">
                                                    <option value="approved" selected="">12-hour clock</option>
                                                    <option value="completed">24-hour clock</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 px-3">
                                                <label for="settings_date_format" class="form-label">Date format</label>
                                                <select id="settings_date_format" name="settings[date_format]" class="form-select w-100" data-style="btn-default">
                                                    <option value="m/d/Y" selected="">MM/DD/YYYY</option>
                                                    <option value="m.d.Y">MM.DD.YYYY</option>
                                                    <option value="d/m/Y">DD/MM/YYYY</option>
                                                    <option value="d.m.Y">DD.MM.YYYY</option>
                                                    <option value="Y-m-d">YYYY-MM-DD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <div class="col-lg-12 px-3">
                                                <label for="selectpickerBasic" class="form-label">Selectable intervals</label>
                                                <input type="text" value="{{htmlspecialchars($value['timeblock_interval']) }}" name="settings[timeblock_interval]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" value="30 minutes" />
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="col-lg-6 px-3">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input" name="settings[check][show_appointment_end_time]" <?php    echo (!empty($value['check']['show_appointment_end_time']) && $value['check']['show_appointment_end_time'] ? 'checked' : ''); ?> />
                                                    <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                    </span>
                                                    <span class="switch-label">Show appointment end time <br><p>Show booking end time during booking process and on summary</p></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-6 px-3">
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input" name="settings[check][disable_verbose_date_output]" <?php    echo (!empty($value['check']['disable_verbose_date_output']) && $value['check']['disable_verbose_date_output'] ? 'checked' : ''); ?> />
                                                    <span class="switch-toggle-slider">
                                                    <span class="switch-on"></span>
                                                    <span class="switch-off"></span>
                                                    </span>
                                                    <span class="switch-label">Disable verbose date output<br><p>Use number instead of name of the month when outputting dates</p></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <h5 class="card-header">Restrictions</h5>
                            <div class="card-body demo-only-element p-0">
                                {{-- Time Restrictions --}}
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Date and time</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="d-flex">
                                            <div class="col-lg-12 px-3">
                                                <div class="alert alert-secondary" role="alert">
                                                    You can set restrictions on earliest/latest dates in the future when your customer can place an appointment. You can either use a relative values like for example "+1 month", "+2 weeks", "+5 days", "+3 hours", "+30 minutes" (entered without quotes), or you can use a fixed date in format YYYY-MM-DD. Leave blank to remove any limitations.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-6 px-3">
                                                <label for="selectpickerBasic" class="form-label">Earliest Possible Booking</label>
                                                <input type="text" value="{{htmlspecialchars($value['earliest_possible_booking']) }}" name="settings[earliest_possible_booking]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Earliest Possible Booking" />
                                            </div>
                                            <div class="col-lg-6 px-3">
                                                <label for="selectpickerBasic" class="form-label">Latest Possible Booking</label>
                                                <input type="text" value="{{htmlspecialchars($value['latest_possible_booking']) }}" name="settings[latest_possible_booking]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Latest Possible Booking" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Quantity Restrictions --}}
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Quantity Restrictions</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="d-flex">
                                            <div class="col-lg-12 px-3">
                                                <label for="selectpickerBasic" class="form-label">Maximum Number of Future Bookings per Customer</label>
                                                <input type="text" value="{{htmlspecialchars($value['max_future_bookings_per_customer']) }}" name="settings[max_future_bookings_per_customer]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Maximum Number of Future Bookings per Customer" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4">
                            <h5 class="card-header">Currency Settings</h5>
                            <div class="card-body demo-only-element p-0">
                                {{-- Symbol --}}
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Symbol</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="d-flex">
                                            <div class="col-lg-4 px-3">
                                                <label for="selectpickerBasic" class="form-label">Symbol before the price</label>
                                                <input type="text" value="{{htmlspecialchars($value['currency_symbol_before']) }}" name="settings[currency_symbol_before]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Symbol before the price" value="$" />
                                            </div>
                                            <div class="col-lg-4 px-3">
                                                <label for="selectpickerBasic" class="form-label">Symbol after the price</label>
                                                <input type="text" value="{{htmlspecialchars($value['latest_possible_booking']) }}" name="settings[latest_possible_booking]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Symbol after the price" />
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-- Formatting --}}
                                <div class="sub-section-row">
                                    <div class="sub-section-label">
                                        <h3>Formatting</h3>
                                    </div>
                                    <div class="sub-section-content">
                                        <div class="d-flex">
                                            <div class="col-lg-4 px-3">
                                                <label for="selectpickerBasic" class="form-label">Thousand Separator</label>
                                                <select name="settings[thousand_separator]" id="settings_default_booking_status" class="selectpicker w-100">
                                                    <option value="," selected="">Comma (1,000)</option>
                                                    <option value=".">Dot (1.000)</option>
                                                    <option value=" ">Space (1 000)</option>
                                                    <option value="">None (1000)</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 px-3">
                                                <label for="selectpickerBasic" class="form-label">Decimal Separator</label>
                                                <select name="settings[decimal_separator]" id="settings_default_booking_status" class="selectpicker w-100">
                                                    <option value="." selected="">Dot (0.99)</option>
                                                    <option value=",">Comma (0,99)</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 px-3">
                                                <label for="selectpickerBasic" class="form-label">Number of Decimals</label>
                                                <select name="settings[number_of_decimals]" id="settings_default_booking_status" class="selectpicker w-100">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2" selected="">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Phone Settings</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Countries --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Countries</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Countries shown in phone field</label>
                                            <select name="settings[list_of_phone_countries]" id="settings_list_of_phone_countries" class="selectpicker form-select w-100" data-style="btn-default">
                                                <option value="all" selected="">Show all countries</option>
                                                <option value="select">Show selected countries</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 px-3">
                                            <label for="selectpickerBasic" class="form-label">Default Country (if not auto-detected)</label>
                                            <select name="settings[default_phone_country]" id="settings_default_phone_country" class="select2 form-select w-100" data-style="btn-default">
                                                <option value="us" selected="">United States</option><option value="af">Afghanistan</option><option value="al">Albania</option><option value="dz">Algeria</option><option value="as">American Samoa</option><option value="ad">Andorra</option><option value="ao">Angola</option><option value="ai">Anguilla</option><option value="ag">Antigua and Barbuda</option><option value="ar">Argentina</option><option value="am">Armenia (Հայաստան)</option><option value="aw">Aruba</option><option value="ac">Ascension Island</option><option value="au">Australia</option><option value="at">Austria (Österreich)</option><option value="az">Azerbaijan (Azərbaycan)</option><option value="bs">Bahamas</option><option value="bh">Bahrain (‫البحرين‬‎)</option><option value="bd">Bangladesh (বাংলাদেশ)</option><option value="bb">Barbados</option><option value="by">Belarus (Беларусь)</option><option value="be">Belgium (België)</option><option value="bz">Belize</option><option value="bj">Benin (Bénin)</option><option value="bm">Bermuda</option><option value="bt">Bhutan (འབྲུག)</option><option value="bo">Bolivia</option><option value="ba">Bosnia and Herzegovina (Босна и Херцеговина)</option><option value="bw">Botswana</option><option value="br">Brazil (Brasil)</option><option value="io">British Indian Ocean Territory</option><option value="vg">British Virgin Islands</option><option value="bn">Brunei</option><option value="bg">Bulgaria (България)</option><option value="bf">Burkina Faso</option><option value="bi">Burundi (Uburundi)</option><option value="kh">Cambodia (កម្ពុជា)</option><option value="cm">Cameroon (Cameroun)</option><option value="ca">Canada</option><option value="cv">Cape Verde (Kabu Verdi)</option><option value="bq">Caribbean Netherlands</option><option value="ky">Cayman Islands</option><option value="cf">Central African Republic (République centrafricaine)</option><option value="td">Chad (Tchad)</option><option value="cl">Chile</option><option value="cn">China (中国)</option><option value="cx">Christmas Island</option><option value="cc">Cocos (Keeling) Islands</option><option value="co">Colombia</option><option value="km">Comoros (‫جزر القمر‬‎)</option><option value="cd">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)</option><option value="cg">Congo (Republic) (Congo-Brazzaville)</option><option value="ck">Cook Islands</option><option value="cr">Costa Rica</option><option value="ci">Côte d’Ivoire</option><option value="hr">Croatia (Hrvatska)</option><option value="cu">Cuba</option><option value="cw">Curaçao</option><option value="cy">Cyprus (Κύπρος)</option><option value="cz">Czech Republic (Česká republika)</option><option value="dk">Denmark (Danmark)</option><option value="dj">Djibouti</option><option value="dm">Dominica</option><option value="do">Dominican Republic (República Dominicana)</option><option value="ec">Ecuador</option><option value="eg">Egypt (‫مصر‬‎)</option><option value="sv">El Salvador</option><option value="gq">Equatorial Guinea (Guinea Ecuatorial)</option><option value="er">Eritrea</option><option value="ee">Estonia (Eesti)</option><option value="sz">Eswatini</option><option value="et">Ethiopia</option><option value="fk">Falkland Islands (Islas Malvinas)</option><option value="fo">Faroe Islands (Føroyar)</option><option value="fj">Fiji</option><option value="fi">Finland (Suomi)</option><option value="fr">France</option><option value="gf">French Guiana (Guyane française)</option><option value="pf">French Polynesia (Polynésie française)</option><option value="ga">Gabon</option><option value="gm">Gambia</option><option value="ge">Georgia (საქართველო)</option><option value="de">Germany (Deutschland)</option><option value="gh">Ghana (Gaana)</option><option value="gi">Gibraltar</option><option value="gr">Greece (Ελλάδα)</option><option value="gl">Greenland (Kalaallit Nunaat)</option><option value="gd">Grenada</option><option value="gp">Guadeloupe</option><option value="gu">Guam</option><option value="gt">Guatemala</option><option value="gg">Guernsey</option><option value="gn">Guinea (Guinée)</option><option value="gw">Guinea-Bissau (Guiné Bissau)</option><option value="gy">Guyana</option><option value="ht">Haiti</option><option value="hn">Honduras</option><option value="hk">Hong Kong (香港)</option><option value="hu">Hungary (Magyarország)</option><option value="is">Iceland (Ísland)</option><option value="in">India (भारत)</option><option value="id">Indonesia</option><option value="ir">Iran (‫ایران‬‎)</option><option value="iq">Iraq (‫العراق‬‎)</option><option value="ie">Ireland</option><option value="im">Isle of Man</option><option value="il">Israel (‫ישראל‬‎)</option><option value="it">Italy (Italia)</option><option value="jm">Jamaica</option><option value="jp">Japan (日本)</option><option value="je">Jersey</option><option value="jo">Jordan (‫الأردن‬‎)</option><option value="kz">Kazakhstan (Казахстан)</option><option value="ke">Kenya</option><option value="ki">Kiribati</option><option value="xk">Kosovo</option><option value="kw">Kuwait (‫الكويت‬‎)</option><option value="kg">Kyrgyzstan (Кыргызстан)</option><option value="la">Laos (ລາວ)</option><option value="lv">Latvia (Latvija)</option><option value="lb">Lebanon (‫لبنان‬‎)</option><option value="ls">Lesotho</option><option value="lr">Liberia</option><option value="ly">Libya (‫ليبيا‬‎)</option><option value="li">Liechtenstein</option><option value="lt">Lithuania (Lietuva)</option><option value="lu">Luxembourg</option><option value="mo">Macau (澳門)</option><option value="mk">North Macedonia (Македонија)</option><option value="mg">Madagascar (Madagasikara)</option><option value="mw">Malawi</option><option value="my">Malaysia</option><option value="mv">Maldives</option><option value="ml">Mali</option><option value="mt">Malta</option><option value="mh">Marshall Islands</option><option value="mq">Martinique</option><option value="mr">Mauritania (‫موريتانيا‬‎)</option><option value="mu">Mauritius (Moris)</option><option value="yt">Mayotte</option><option value="mx">Mexico (México)</option><option value="fm">Micronesia</option><option value="md">Moldova (Republica Moldova)</option><option value="mc">Monaco</option><option value="mn">Mongolia (Монгол)</option><option value="me">Montenegro (Crna Gora)</option><option value="ms">Montserrat</option><option value="ma">Morocco (‫المغرب‬‎)</option><option value="mz">Mozambique (Moçambique)</option><option value="mm">Myanmar (Burma) (မြန်မာ)</option><option value="na">Namibia (Namibië)</option><option value="nr">Nauru</option><option value="np">Nepal (नेपाल)</option><option value="nl">Netherlands (Nederland)</option><option value="nc">New Caledonia (Nouvelle-Calédonie)</option><option value="nz">New Zealand</option><option value="ni">Nicaragua</option><option value="ne">Niger (Nijar)</option><option value="ng">Nigeria</option><option value="nu">Niue</option><option value="nf">Norfolk Island</option><option value="kp">North Korea (조선 민주주의 인민 공화국)</option><option value="mp">Northern Mariana Islands</option><option value="no">Norway (Norge)</option><option value="om">Oman (‫عُمان‬‎)</option><option value="pk">Pakistan (‫پاکستان‬‎)</option><option value="pw">Palau</option><option value="ps">Palestine (‫فلسطين‬‎)</option><option value="pa">Panama (Panamá)</option><option value="pg">Papua New Guinea</option><option value="py">Paraguay</option><option value="pe">Peru (Perú)</option><option value="ph">Philippines</option><option value="pl">Poland (Polska)</option><option value="pt">Portugal</option><option value="pr">Puerto Rico</option><option value="qa">Qatar (‫قطر‬‎)</option><option value="re">Réunion (La Réunion)</option><option value="ro">Romania (România)</option><option value="ru">Russia (Россия)</option><option value="rw">Rwanda</option><option value="bl">Saint Barthélemy</option><option value="sh">Saint Helena</option><option value="kn">Saint Kitts and Nevis</option><option value="lc">Saint Lucia</option><option value="mf">Saint Martin (Saint-Martin (partie française))</option><option value="pm">Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</option><option value="vc">Saint Vincent and the Grenadines</option><option value="ws">Samoa</option><option value="sm">San Marino</option><option value="st">São Tomé and Príncipe (São Tomé e Príncipe)</option><option value="sa">Saudi Arabia (‫المملكة العربية السعودية‬‎)</option><option value="sn">Senegal (Sénégal)</option><option value="rs">Serbia (Србија)</option><option value="sc">Seychelles</option><option value="sl">Sierra Leone</option><option value="sg">Singapore</option><option value="sx">Sint Maarten</option><option value="sk">Slovakia (Slovensko)</option><option value="si">Slovenia (Slovenija)</option><option value="sb">Solomon Islands</option><option value="so">Somalia (Soomaaliya)</option><option value="za">South Africa</option><option value="kr">South Korea (대한민국)</option><option value="ss">South Sudan (‫جنوب السودان‬‎)</option><option value="es">Spain (España)</option><option value="lk">Sri Lanka (ශ්‍රී ලංකාව)</option><option value="sd">Sudan (‫السودان‬‎)</option><option value="sr">Suriname</option><option value="sj">Svalbard and Jan Mayen</option><option value="se">Sweden (Sverige)</option><option value="ch">Switzerland (Schweiz)</option><option value="sy">Syria (‫سوريا‬‎)</option><option value="tw">Taiwan (台灣)</option><option value="tj">Tajikistan</option><option value="tz">Tanzania</option><option value="th">Thailand (ไทย)</option><option value="tl">Timor-Leste</option><option value="tg">Togo</option><option value="tk">Tokelau</option><option value="to">Tonga</option><option value="tt">Trinidad and Tobago</option><option value="tn">Tunisia (‫تونس‬‎)</option><option value="tr">Turkey (Türkiye)</option><option value="tm">Turkmenistan</option><option value="tc">Turks and Caicos Islands</option><option value="tv">Tuvalu</option>
                                                <option value="vi">U.S. Virgin Islands</option><option value="ug">Uganda</option><option value="ua">Ukraine (Україна)</option>
                                                <option value="ae">United Arab Emirates (‫الإمارات العربية المتحدة‬‎)</option>
                                                <option value="gb">United Kingdom</option><option value="uy">Uruguay</option><option value="uz">Uzbekistan (Oʻzbekiston)</option>
                                                <option value="vu">Vanuatu</option><option value="va">Vatican City (Città del Vaticano)</option><option value="ve">Venezuela</option><option value="vn">Vietnam (Việt Nam)</option><option value="wf">Wallis and Futuna (Wallis-et-Futuna)</option><option value="eh">Western Sahara (‫الصحراء الغربية‬‎)</option><option value="ye">Yemen (‫اليمن‬‎)</option><option value="zm">Zambia</option><option value="zw">Zimbabwe</option><option value="ax">Åland Islands</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Validation --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Validation</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][validate_phone_type]" <?php    echo (!empty($value['check']['validate_phone_type']) && $value['check']['validate_phone_type'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Validate phone typed fields if they are set as required<br><p>Reject invalid phone for customers and agents if the phone field is set as required</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][format_phone_number]" <?php    echo (!empty($value['check']['format_phone_number']) && $value['check']['format_phone_number'] ? 'checked' : ''); ?>/>
                                                <input type="hidden" name="settings[format_phone_number]" value="off">
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Format phone number on input<br><p>Applies formatting on phone fields based on the country selected (not recommended for countries that have multiple NSN lengths)</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][show_country_dial_code]" <?php    echo (!empty($value['check']['show_country_dial_code']) && $value['check']['show_country_dial_code'] ? 'checked' : ''); ?>/>
                                                <input type="hidden" name="settings[show_country_dial_code]" value="off">
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Show country dial code next to flag<br><p>If enabled, will show a country code next to a flag, for example +1 for United States</p></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Appearance Settings</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Visual Style --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Visual Style</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Color Scheme for Booking Form</label>
                                            <select name="settings[color_scheme_for_booking_form]" id="settings_color_scheme_for_booking_form" class="selectpicker w-100">
                                                <option value="blue" selected="">Blue</option><option value="black">Black</option><option value="teal">Teal</option>
                                                <option value="green">Green</option><option value="purple">Purple</option>
                                                <option value="red">Red</option><option value="orange">Orange</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Border Style</label>
                                            <select name="settings[border_radius]" id="settings_border_radius" class="selectpicker w-100">
                                                <option value="rounded">Rounded Corners</option>
                                                <option value="flat" selected="">Flat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Date and Time Picker --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Date and Time Picker</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Show Time Slots as</label>
                                            <select name="settings[time_pick_style]" id="settings_time_pick_style" class="selectpicker w-100">
                                                <option value="timeline">Timeline</option>
                                                <option value="timebox" selected="">Time Boxes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][hide_time_picker]" <?php    echo (!empty($value['check']['hide_time_picker']) && $value['check']['hide_time_picker'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Hide time picker when only one time slot is available</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][hide_slot_availability_count]" <?php    echo (!empty($value['check']['hide_slot_availability_count']) && $value['check']['hide_slot_availability_count'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Hide slot availability count</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Timeslot Availability Logic</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Restrictions --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Restrictions</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][one_agent_location]" <?php    echo (!empty($value['check']['one_agent_location']) && $value['check']['one_agent_location'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Location can only be used by one agent at a time<br><p>At any given location, only one agent can be booked at a time</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][one_location_agent]" <?php    echo (!empty($value['check']['one_location_agent']) && $value['check']['one_location_agent'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Agents can only be present in one location at a time<br><p>If an agent is booked at one location, he will not be able to accept any bookings for the same timeslot at other locations</p></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Permissions --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Permissions</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][one_agent_different_services]" <?php    echo (!empty($value['check']['one_agent_different_services']) && $value['check']['one_agent_different_services'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <label class="switch-label">One agent can perform different services simultaneously<br><p>Allows an agent to be booked for different services within the same timeslot</p></label>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Customer Settings</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Rescheduling --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Rescheduling</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][customers_reshedule_bookings]" <?php    echo (!empty($value['check']['customers_reshedule_bookings']) && $value['check']['customers_reshedule_bookings'] ? 'checked' : ''); ?>/>
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Allow customers reschedule their bookings<br><p>If enable, shows a button on customer cabinet to reschedule an appointment</p></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Cancellation --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Cancellation</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][customers_cancel_bookings]" <?php    echo (!empty($value['check']['customers_cancel_bookings']) && $value['check']['customers_cancel_bookings'] ? 'checked' : ''); ?>/>
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Allow customers cancel their bookings<br><p>If enable, shows a button on customer cabinet to cancel an appointment</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][customer_set_restriction]" <?php    echo (!empty($value['check']['customer_set_restriction']) && $value['check']['customer_set_restriction'] ? 'checked' : ''); ?>/>
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Set restriction on when customer can cancel</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Customer Cabinet --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Customer Cabinet</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Shortcode for contents of New Appointment tab</label>
                                            <input type="text" value="{{htmlspecialchars($value['currency_symbol_before']) }}" name="settings[currency_symbol_before]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Shortcode for contents of New Appointment tab" value="[latepoint_book_form]" />
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <div class="alert alert-secondary" role="alert">
                                                You can set attributes for a new appointment button tile in a format
                                                <a href="javascript:;">data-selected-agent="ID" data-selected-location="ID" etc...</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Attributes for New Appointment button</label>
                                            <input type="text" value="{{htmlspecialchars($value['customer_dashboard_book_button_attributes']) }}" name="settings[customer_dashboard_book_button_attributes]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Attributes for New Appointment button" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Restrictions --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Restrictions</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][wordpress_users_use]" <?php    echo (!empty($value['check']['wordpress_users_use']) && $value['check']['wordpress_users_use'] ? 'checked' : ''); ?>/>
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Use WordPress users as customers<br>
                                                    <p>Customers can login using their WordPress credentials</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][require_customers_set_password]"  <?php    echo (!empty($value['check']['require_customers_set_password']) && $value['check']['require_customers_set_password'] ? 'checked' : ''); ?>/>
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Require customers to set password<br>
                                                    <p>Shows password field on registration step</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][remove_auth_tabs]" <?php    echo (!empty($value['check']['remove_auth_tabs']) && $value['check']['remove_auth_tabs'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Remove login and register tabs<br>
                                                    <p>This will disable ability for customers to login or register on booking form</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][hide_create_account]" <?php    echo (!empty($value['check']['hide_create_account']) && $value['check']['hide_create_account'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Hide "Create Account" prompt on confirmation step</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Social Login --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Social Login</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][enable_google_login]" <?php    echo (!empty($value['check']['enable_google_login']) && $value['check']['enable_google_login'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Enable login with Google<br>Display Google Login button on customer login and registration forms</p></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="settings[check][enable_facebook_login]" <?php    echo (!empty($value['check']['enable_facebook_login']) && $value['check']['enable_facebook_login'] ? 'checked' : ''); ?> />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">Enable login with Facebook<br>
                                                    <p>Display Facebook Login button on customer login and registration forms</p></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Setup Pages</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Set Page URLs --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Set Page URLs</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Customer Dashboard Page URL</label>
                                            <input type="text" value="{{htmlspecialchars($value['customer_dashboard_url']) }}" name="settings[customer_dashboard_url]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Customer Dashboard Page URL" value="/customer-cabinet/" />
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label for="selectpickerBasic" class="form-label">Customer Login Page URL</label>
                                            <input type="text" value="{{htmlspecialchars($value['customer_login_url']) }}" name="settings[customer_login_url]" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" placeholder="Customer Login Page URL" value="/customer-cabinet/" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <h5 class="card-header">Other Settings</h5>
                        <div class="card-body demo-only-element p-0">
                            {{-- Business Information --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Business Information</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-4">
                                        <div class="col-lg-12 px-3">
                                            <div action="/upload" class="dropzone needsclick" id="dropzone-basic">
                                                <div class="dz-message needsclick m-0">
                                                    Company Logo
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="col-lg-3 px-3">
                                            <label for="settings_business_name" class="form-label">Company Name</label>
                                            <input type="text" value="{{htmlspecialchars($value['business_name']) }}" name="settings[business_name]" class="form-control" id="settings_business_name" aria-describedby="defaultFormControlHelp" placeholder="Company Name" />                        
                                        </div>
                                        <div class="col-lg-3 px-3">
                                            <label for="settings_business_phone" class="form-label">Business Phone</label>
                                            <input type="text" value="{{htmlspecialchars($value['business_phone']) }}" name="settings[business_phone]" class="form-control" id="settings_business_phone" aria-describedby="defaultFormControlHelp" placeholder="Business Phone" />                        
                                        </div>
                                        <div class="col-lg-6 px-3">
                                            <label for="settings_business_address" class="form-label">Business Address</label>
                                            <input type="text" value="{{htmlspecialchars($value['business_address']) }}" name="settings[business_address]" class="form-control" id="settings_business_address" aria-describedby="defaultFormControlHelp" placeholder="Business Address" />                        
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Canlendar Settings --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Canlendar Settings</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex mb-3">
                                        <div class="col-lg-12 px-3">
                                            <label for="settings_calendar_height" class="form-label">Daily Calendar Minimum Height (in pixels)</label>
                                            <input type="text" value="{{htmlspecialchars($value['calendar_height']) }}" name="settings[calendar_height]" class="form-control" id="settings_calendar_height" aria-describedby="defaultFormControlHelp" placeholder="Daily Calendar Minimum Height (in pixels)" value="700" />                        
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <div class="alert alert-secondary" role="alert">
                                                You can use variables in your booking template, they will be replaced with a value for the booking.
                                                <a href="javascript:;" class="text-decoration-underline"><i class="bx bx-info-circle bx-xs "></i>Show Available Variables</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <label for="settings_booking_title" class="form-label">Booking tile information to display on calendar</label>
                                            <input type="text" value="{{htmlspecialchars($value['booking_title']) }}" name="settings[booking_title]" class="form-control" id="settings_booking_title" aria-describedby="defaultFormControlHelp" placeholder="Booking tile information to display on calendar" value="@{{ service_name }}" />                        
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Google Places API --}}
                            <div class="sub-section-row">
                                <div class="sub-section-label">
                                    <h3>Google Places API</h3>
                                </div>
                                <div class="sub-section-content">
                                    <div class="d-flex">
                                        <div class="col-lg-12 px-3">
                                            <div class="alert alert-secondary" role="alert">
                                                In order for address autocomplete to work, you need an API key. To learn how to create an API key for Google Places API. 
                                                <a href="javascript:;" class="text-decoration-underline">click here</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-lg-6 px-3">
                                            <input type="text" value="{{htmlspecialchars($value['google_places_api_key']) }}" name="settings[google_places_api_key]" class="form-control h-100" id="settings_google_places_api_key" aria-describedby="defaultFormControlHelp" placeholder="Google Places API key" />                                                        
                                        </div>
                                        <div class="col-lg-6 px-3">
                                            <label for="settings_business_name" class="form-label">Country Restriction</label>
                                            <select name="settings[google_places_country_restriction]" id="settings_google_places_country_restriction" class="selectpicker w-100">
                                                <option value="" selected="">No Restrictions</option><option value="au">Australia</option>
                                                <option value="at">Austria</option><option value="be">Belgium</option><option value="br">Brazil</option>
                                                <option value="ca">Canada</option><option value="dk">Denmark</option><option value="ee">Estonia</option>
                                                <option value="fi">Finland</option><option value="fr">France</option><option value="de">Germany</option>
                                                <option value="gr">Greece</option><option value="hk">Hong Kong</option><option value="in">India</option>
                                                <option value="ie">Ireland</option><option value="it">Italy</option><option value="jp">Japan</option>
                                                <option value="lv">Latvia</option><option value="lt">Lithuania</option><option value="lu">Luxembourg</option>
                                                <option value="my">Malaysia</option><option value="mx">Mexico</option><option value="nl">Netherlands</option>
                                                <option value="nz">New Zealand</option><option value="no">Norway</option><option value="pl">Poland</option>
                                                <option value="pt">Portugal</option><option value="ro">Romania</option><option value="sg">Singapore</option>
                                                <option value="sk">Slovakia</option><option value="si">Slovenia</option><option value="es">Spain</option>
                                                <option value="se">Sweden</option><option value="ch">Switzerland</option><option value="ae">United Arab Emirates</option>
                                                <option value="gb">United Kingdom</option><option value="us">United States</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary add-agent" type="submit">Save Settings</button>

                    </div>
                </div>
            </form>
    @endif
    
</div>
@endsection
