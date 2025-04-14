<div class="p-3 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="w-full mb-1">
        <div class="mb-2">
            <nav class="flex mb-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/dashboard" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="#" class="ml-1 text-gray-500 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Profile</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-5xl mx-auto grid grid-cols-1 mb-6 md:grid-cols-2 gap-6">
        <!-- Profile Picture Section -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 flex items-center gap-1">
                Profile picture <span class="text-gray-400">&#9432;</span>
            </h3>
            <div class="flex items-center gap-4 mt-4">
                @if($customer->profile->profile_picture)
                <img id="user_image" src="{{ asset('uploads/customers/' . $customer->profile->profile_picture) }}" alt="Profile Picture" class="w-20 h-20 rounded border border-gray-300">
                @else
                <img src="{{ asset('images/demo_user.png') }}" alt="Profile Picture" class="w-20 h-20 rounded border border-gray-300">
                @endif
                <div>
                    @if($customer->profile->is_verified)
                    <span class="bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded">Verified</span>
                    @else
                    <span class="bg-red-200 text-red-800 text-xs font-semibold px-2 py-1 rounded">Not-Verified</span>
                    @endif
                    <h2 class="text-xl font-semibold">{{ $customer->fullname }}</h2>
                    <p class="text-gray-500 text-sm">{{ '@'.$customer->username }}</p>
                </div>
            </div>
            <div class="items-center pt-6 rounded-b dark:border-gray-700">
                <button type="button" data-modal-target="upload-image-modal" data-modal-toggle="upload-image-modal" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Change Avatar</button>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-800 dark:text-gray-300">Email</label>
                    <input type="email" id="email" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $customer->email }}" disabled>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                    <input type="text" id="phone" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="+1 678-548-2943" value="{{ $customer->profile->phone }}">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of birth</label>
                    <input id="dob" datepicker datepicker-autohide datepicker-buttons datepicker-format="yyyy-mm-dd" type="text" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="YYYY-MM-DD" value="{{ $customer->profile->dob }}" required>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                    <select id="gender" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @if($customer->profile->gender)
                        <option selected value="{{ $customer->profile->gender }}">{{ ucfirst($customer->profile->gender) }}</option>
                        @else
                        <option selected disabled>Select Gender</option>
                        @endif

                        @foreach(['Male', 'Female', 'Other'] as $gender)
                        @if(strtolower($gender) !== $customer->profile->gender)
                        <option value="{{ strtolower($gender) }}">{{ $gender }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="items-center pt-6 rounded-b dark:border-gray-700">
                <button type="submit" onclick="profileInfo()" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save</button>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto grid grid-cols-1 mb-6 gap-6">
        <!-- Additional Information Section -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="home" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input type="text" id="address" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="11923 NE Sumner St, NY" value="{{ $customer->profile->address }}">
                </div>
                <div>
                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                    <select id="country" name="country" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        @if($customer->profile->country)
                        <option selected value="{{ $customer->profile->country }}">{{ $customer->profile->country }}</option>
                        @else
                        <option selected disabled>Select Country</option>
                        @endif
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Central African Rep.">Central African Rep.</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Greece">Greece</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="North Korea">North Korea</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Korea">South Korea</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div>
                    <label for="timezone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Timezone</label>
                    <select id="timezone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @if($customer->profile->timezone)
                        <option selected value="{{ $customer->profile->timezone }}">{{ $customer->profile->timezone }}</option>
                        @else
                        <option selected disabled>Select Timezone</option>
                        @endif
                        <option value=" Pacific/Midway">(UTC-11:00) Midway Island, American Samoa</option>
                        <option value="Pacific/Honolulu">(UTC-10:00) Hawaii</option>

                        <option value="America/Anchorage">(UTC-08:00) Alaska</option>
                        <option value="America/Tijuana">(UTC-07:00) Baja California</option>
                        <option value="America/Los_Angeles">(UTC-07:00) Pacific Time (US and Canada)</option>
                        <option value="America/Phoenix">(UTC-07:00) Arizona</option>

                        <option value="America/Chihuahua">(UTC-06:00) Chihuahua, La Paz, Mazatlan</option>
                        <option value="America/Denver">(UTC-06:00) Mountain Time (US and Canada)</option>
                        <option value="America/Regina">(UTC-06:00) Saskatchewan</option>
                        <option value="America/Belize">(UTC-06:00) Central America</option>

                        <option value="America/Chicago">(UTC-05:00) Central Time (US and Canada)</option>
                        <option value="America/Mexico_City">(UTC-05:00) Guadalajara, Mexico City, Monterrey</option>
                        <option value="America/Bogota">(UTC-05:00) Bogota, Lima, Quito</option>
                        <option value="America/Jamaica">(UTC-05:00) Kingston, George Town</option>

                        <option value="America/New_York">(UTC-04:00) Eastern Time (US and Canada)</option>
                        <option value="America/Indiana/Indianapolis">(UTC-04:00) Indiana (East)</option>
                        <option value="America/Cuiaba">(UTC-04:00) Cuiaba</option>
                        <option value="America/Manaus">(UTC-04:00) Georgetown, La Paz, Manaus, San Juan</option>
                        <option value="America/Caracas">(UTC-04:30) Caracas</option>

                        <option value="America/Asuncion">(UTC-03:00) Asuncion</option>
                        <option value="America/Halifax">(UTC-03:00) Atlantic Time (Canada)</option>
                        <option value="America/Sao_Paulo">(UTC-03:00) Brasilia</option>
                        <option value="America/Buenos_Aires">(UTC-03:00) Buenos Aires</option>
                        <option value="America/Cayenne">(UTC-03:00) Cayenne, Fortaleza</option>
                        <option value="America/Montevideo">(UTC-03:00) Montevideo</option>
                        <option value="America/Bahia">(UTC-03:00) Salvador</option>
                        <option value="America/Santiago">(UTC-03:00) Santiago</option>

                        <option value="America/Noronha">(UTC-02:00) Mid-Atlantic</option>
                        <option value="America/Godthab">(UTC-02:00) Greenland</option>
                        <option value="America/St_Johns">(UTC-02:30) Newfoundland and Labrador</option>

                        <option value="Atlantic/Cape_Verde">(UTC-01:00) Cape Verde Islands</option>
                        <option value="Atlantic/Azores">(UTC+00:00) Azores</option>
                        <option value="Africa/Monrovia">(UTC+00:00) Monrovia, Reykjavik</option>

                        <option value="Europe/London">(UTC+01:00) Dublin, Edinburgh, Lisbon, London</option>
                        <option value="Africa/Casablanca">(UTC+01:00) Casablanca</option>
                        <option value="Africa/Algiers">(UTC+01:00) West Central Africa</option>

                        <option value="Europe/Amsterdam">(UTC+02:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                        <option value="Europe/Belgrade">(UTC+02:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                        <option value="Europe/Brussels">(UTC+02:00) Brussels, Copenhagen, Madrid, Paris</option>
                        <option value="Europe/Warsaw">(UTC+02:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                        <option value="Africa/Windhoek">(UTC+02:00) Windhoek</option>
                        <option value="Africa/Cairo">(UTC+02:00) Cairo</option>
                        <option value="Africa/Harare">(UTC+02:00) Harare, Pretoria</option>
                        <option value="Europe/Kaliningrad">(UTC+02:00) Kaliningrad</option>
                        <option value="Africa/Tripoli">(UTC+02:00) Tripoli</option>

                        <option value="Europe/Athens">(UTC+03:00) Athens, Bucharest</option>
                        <option value="Asia/Beirut">(UTC+03:00) Beirut</option>
                        <option value="Asia/Damascus">(UTC+03:00) Damascus</option>
                        <option value="EET">(UTC+03:00) Eastern Europe</option>
                        <option value="Europe/Helsinki">(UTC+03:00) Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius</option>
                        <option value="Asia/Istanbul">(UTC+03:00) Istanbul</option>
                        <option value="Asia/Jerusalem">(UTC+03:00) Jerusalem</option>
                        <option value="Asia/Amman">(UTC+03:00) Amman</option>
                        <option value="Asia/Baghdad">(UTC+03:00) Baghdad</option>
                        <option value="Asia/Kuwait">(UTC+03:00) Kuwait, Riyadh</option>
                        <option value="Europe/Minsk">(UTC+03:00) Minsk</option>
                        <option value="Europe/Moscow">(UTC+03:00) Moscow, St. Petersburg, Volgograd</option>
                        <option value="Africa/Nairobi">(UTC+03:00) Nairobi</option>

                        <option value="Asia/Tehran">(UTC+03:30) Tehran</option>
                        <option value="Asia/Muscat">(UTC+04:00) Abu Dhabi, Muscat</option>
                        <option value="Europe/Samara">(UTC+04:00) Izhevsk, Samara</option>
                        <option value="Indian/Mauritius">(UTC+04:00) Port Louis</option>
                        <option value="Asia/Tbilisi">(UTC+04:00) Tbilisi</option>
                        <option value="Asia/Yerevan">(UTC+04:00) Yerevan</option>

                        <option value="Asia/Kabul">(UTC+04:30) Kabul</option>

                        <option value="Asia/Tashkent">(UTC+05:00) Tashkent, Ashgabat</option>
                        <option value="Asia/Yekaterinburg">(UTC+05:00) Ekaterinburg</option>
                        <option value="Asia/Karachi">(UTC+05:00) Islamabad, Karachi</option>
                        <option value="Asia/Baku">(UTC+05:00) Baku</option>

                        <option value="Asia/Kolkata">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                        <option value="Asia/Colombo">(UTC+05:30) Sri Jayawardenepura</option>

                        <option value="Asia/Katmandu">(UTC+05:45) Kathmandu</option>

                        <option value="Asia/Almaty">(UTC+06:00) Astana</option>
                        <option value="Asia/Dhaka">(UTC+06:00) Dhaka</option>
                        <option value="Asia/Novosibirsk">(UTC+06:00) Novosibirsk</option>

                        <option value="Asia/Rangoon">(UTC+06:30) Yangon (Rangoon)</option>

                        <option value="Asia/Bangkok">(UTC+07:00) Bangkok, Hanoi, Jakarta</option>
                        <option value="Asia/Krasnoyarsk">(UTC+07:00) Krasnoyarsk</option>

                        <option value="Asia/Chongqing">(UTC+08:00) Beijing, Chongqing, Hong Kong SAR, Urumqi</option>
                        <option value="Asia/Irkutsk">(UTC+08:00) Irkutsk</option>
                        <option value="Asia/Kuala_Lumpur">(UTC+08:00) Kuala Lumpur, Singapore</option>
                        <option value="Australia/Perth">(UTC+08:00) Perth</option>
                        <option value="Asia/Taipei">(UTC+08:00) Taipei</option>
                        <option value="Asia/Ulaanbaatar">(UTC+08:00) Ulaanbaatar</option>

                        <option value="Asia/Tokyo">(UTC+09:00) Osaka, Sapporo, Tokyo</option>
                        <option value="Asia/Seoul">(UTC+09:00) Seoul</option>
                        <option value="Asia/Yakutsk">(UTC+09:00) Yakutsk</option>

                        <option value="Australia/Darwin">(UTC+09:30) Darwin</option>
                        <option value="Australia/Adelaide">(UTC+10:30) Adelaide</option>

                        <option value="Australia/Brisbane">(UTC+10:00) Brisbane</option>
                        <option value="Australia/Canberra">(UTC+11:00) Canberra, Melbourne, Sydney</option>
                        <option value="Australia/Hobart">(UTC+11:00) Hobart</option>
                        <option value="Pacific/Guam">(UTC+10:00) Guam, Port Moresby</option>
                        <option value="Asia/Magadan">(UTC+10:00) Magadan</option>
                        <option value="Asia/Vladivostok">(UTC+10:00) Vladivostok, Magadan</option>

                        <option value="Asia/Srednekolymsk">(UTC+11:00) Chokirdakh</option>
                        <option value="Pacific/Guadalcanal">(UTC+11:00) Solomon Islands, New Caledonia</option>

                        <option value="Asia/Anadyr">(UTC+12:00) Anadyr, Petropavlovsk-Kamchatsky</option>
                        <option value="Pacific/Fiji">(UTC+12:00) Fiji Islands, Kamchatka, Marshall Islands</option>

                        <option value="Pacific/Auckland">(UTC+13:00) Auckland, Wellington</option>
                        <option value="Pacific/Tongatapu">(UTC+13:00) Nuku'alofa</option>
                        <option value="Pacific/Apia">(UTC+14:00) Samoa</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
                    <input type="text" id="website" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://yourwebsite.com" value="{{ $customer->profile->website }}">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn</label>
                    <input type="text" id="linkedin" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://linkedin.com/in/username" value="{{ $customer->profile->linkedin }}">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter</label>
                    <input type="text" id="twitter" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://twitter.com/username" value="{{ $customer->profile->twitter }}">
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mt-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                    <textarea id="bio" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="My name is Maria Chinn. I'm a writer specializing in informational content for marketing professionals... ... ...">{{ $customer->profile->bio }}</textarea>
                </div>
            </div>
            <div class="items-center pt-6 rounded-b dark:border-gray-700">
                <button type="submit" onclick="personalInfo()" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Upload Image Modal -->
<div id="upload-image-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 items-center justify-center overflow-y-auto">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md relative dark:bg-gray-800">
        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-900 dark:hover:text-white" data-modal-toggle="upload-image-modal" id="modalCloseBtn">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <div class="px-6 pt-6">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Upload Profile Picture</h3>
        </div>

        <!-- Modal Body -->
        <div class="p-6 space-y-4">
            <div class="text-sm text-gray-600 dark:text-gray-300 space-y-1">
                <p>• Max file size: <span class="font-medium">2 MB</span></p>
                <p>• Accepted formats: <span class="font-medium">JPG, PNG, JPEG</span></p>
                <p>• Please use a clear photo of yourself.</p>
            </div>

            <form id="uploadPhoto" enctype="multipart/form-data">
                <input type="file" id="image_input" accept="image/png, image/jpeg, image/jpg" hidden>
                <div class="flex items-center justify-center w-full mt-4">
                    <label for="image_input"
                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16V4m0 0l-4 4m4-4l4 4M17 8v12m0 0l-4-4m4 4l4-4"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag & drop</p>
                        </div>
                    </label>
                </div>

                <!-- Image Preview -->
                <div id="preview_container" class="mt-4 hidden">
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">Preview:</p>
                    <img id="image_preview" src="" alt="Preview" class="w-32 h-32 rounded-full object-cover border shadow">
                </div>
            </form>
        </div>

        <div class="flex justify-end px-6 pb-6">
            <button type="button" onclick="uploadPhoto()" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Upload
            </button>
        </div>
    </div>
</div>


@push('other-scripts')
<script>
    // Image preview
    document.getElementById("image_input").addEventListener("change", function(e) {
        const file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);
            const preview = document.getElementById("image_preview");
            preview.src = url;
            document.getElementById("preview_container").classList.remove("hidden");
        }
    });

    async function uploadPhoto() {
        const fileInput = document.getElementById('image_input');
        const file = fileInput.files[0];

        if (!file) {
            toastr.error("Please select an image to upload.");
            return;
        }

        const formData = new FormData();
        formData.append('image', file);

        try {
            const response = await axios.post('/update-profile-picture', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            if (response.status === 200 && response.data.success === true) {
                toastr.success("Avatar updated successfully!");
                $('#user_image').attr('src', response.data.image_path);
                $('#modalCloseBtn').click()
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        } catch (error) {
            toastr.error("An error occurred while updating the customer avatar.");
            console.error(error);
        }
    }


    async function profileInfo() {
        let data = {
            'phone': $('#phone').val(),
            'dob': $('#dob').val(),
            'gender': $('#gender').val(),
        }

        try {
            const response = await axios.post('/update-customer', data);
            if (response.status === 200 && response.data.success === true) {
                toastr.success("Profile updated successfully!");
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        } catch (error) {
            toastr.error("An error occurred while updating the customer profile.");
        }
    }

    async function personalInfo() {
        let data = {
            'address': $('#address').val(),
            'country': $('#country').val(),
            'timezone': $('#timezone').val(),
            'website': $('#website').val(),
            'linkedin': $('#linkedin').val(),
            'twitter': $('#twitter').val(),
            'bio': $('#bio').val(),
        }

        try {
            const response = await axios.post('/update-customer', data);
            if (response.status === 200 && response.data.success === true) {
                toastr.success("Profile updated successfully!");
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        } catch (error) {
            toastr.error("An error occurred while updating the customer profile.");
        }
    }
</script>
@endpush