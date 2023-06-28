@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body">
                    <form action="{{ route("register") }}" method="POST">
                        @csrf
                            <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase"> <i class="fas fa-cubes" style="color: #22b3c1;"></i> RUGBY registration form</h3>
                                
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1m">First name</label>

                                  <input id="first_name" type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    {{-- <input type="text" class="form-control form-control-lg" id="firstname" value="{{ old('firstname') }}"name="first_name" >
                                    @error('first_name')
                                    <p style="color: red">{{ $message }}</p>
                                    @enderror --}}
                                </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1n">Last name</label>

                                  <input id="last_name" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                                  @error('last_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="form3Example1m1">Email Address</label>

                                  <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="emailrepeat">Re enter email address</label>

                                  <input id="emailrepeat" type="email" class="form-control form-control-lg @error('email_confirmation') is-invalid @enderror" name="email_confirmation" value="{{ old('email_confirmation') }}" required autocomplete="email_confirmation">

                                @error('email_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                   
                                </div>
                                </div>
                            </div>
            
                            <div class="form-outline mb-4">
                              <label for="password">Enter New Password</label>

                              <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <div class="form-outline mb-4">
                              <label for="confirmpass">Re-Type Password</label>

                              <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                <label for="primary_phone" >Primary Phone</label>

                                  <select name="primary_phone" class="form-control form-control-lg  @error('primary_phone') is-invalid @enderror" id="primary_phone" >
                                    <option >Select</option>
                                    <option name="primary_phone">Afghanistan +93</option>
                                    <option name="primary_phone">Åland Islands +358</option>
                                    <option  name="primary_phone" >Albania +355</option>
                                    <option  name="primary_phone" >Algeria +213</option>
                                    <option  name="primary_phone" >American Samoa +1684</option>
                                    <option  name="primary_phone" >Andorra +376</option>
                                    <option  name="primary_phone" >Angola +244</option>
                                    <option  name="primary_phone" >Anguilla +1264</option>
                                    <option  name="primary_phone" >Antarctica +672</option>
                                    <option  name="primary_phone" >Antigua & Barbuda +1268</option>
                                    <option  name="primary_phone" >Argentina +54</option>
                                    <option  name="primary_phone" >Armenia +374</option>
                                    <option  name="primary_phone" >Aruba +297</option>
                                    <option  name="primary_phone" >Australia +61</option>
                                    <option  name="primary_phone" >Austria +43</option>
                                    <option  name="primary_phone" >Azerbaijan +994</option>
                                    <option  name="primary_phone" >Bahamas +1242</option>
                                    <option  name="primary_phone" >Bahrain +973</option>
                                    <option  name="primary_phone" >Bangladesh +880</option>
                                    <option  name="primary_phone" >Barbados +1246</option>
                                    <option  name="primary_phone" >Belarus +375</option>
                                    <option  name="primary_phone" >Belgium +32</option>
                                    <option  name="primary_phone" >Belize +501</option>
                                    <option  name="primary_phone" >Benin +229</option>
                                    <option  name="primary_phone" >Bermuda +1441</option>
                                    <option  name="primary_phone" >Bhutan +975</option>
                                    <option  name="primary_phone" >Bolivia +591</option>
                                    <option  name="primary_phone" >Caribbean Netherlands +599</option>
                                    <option  name="primary_phone" >Bosnia & Herzegovina +387</option>
                                    <option  name="primary_phone" >Botswana +267</option>
                                    <option  name="primary_phone" >Bouvet Island +55</option>
                                    <option  name="primary_phone" >Brazil +55</option>
                                    <option  name="primary_phone" >British Indian Ocean Territory +246</option>
                                    <option  name="primary_phone" >Brunei +673</option>
                                    <option  name="primary_phone" >Bulgaria +359</option>
                                    <option  name="primary_phone" >Burkina Faso +226</option>
                                    <option  name="primary_phone" >Burundi +257</option>
                                    <option  name="primary_phone" >Cambodia +855</option>
                                    <option  name="primary_phone" >Cameroon +237</option>
                                    <option  name="primary_phone" >Canada +1</option>
                                    <option  name="primary_phone" >Cape Verde +238</option>
                                    <option  name="primary_phone" >Cayman Islands +1345</option>
                                    <option  name="primary_phone" >Central African Republic +236</option>
                                    <option  name="primary_phone" >Chad +235</option>
                                    <option  name="primary_phone" >Chile +56</option>
                                    <option  name="primary_phone" >China +86</option>
                                    <option  name="primary_phone" >Christmas Island +61</option>
                                    <option  name="primary_phone" >Cocos (Keeling) Islands +672</option>
                                    <option  name="primary_phone" >Colombia +57</option>
                                    <option  name="primary_phone" >Comoros +269</option>
                                    <option  name="primary_phone" >Congo - Brazzaville +242</option>
                                    <option  name="primary_phone" >Congo - Kinshasa +242</option>
                                    <option  name="primary_phone" >Cook Islands +682</option>
                                    <option  name="primary_phone" >Costa Rica +506</option>
                                    <option  name="primary_phone" >Côte d’Ivoire +225</option>
                                    <option  name="primary_phone" >Croatia +385</option>
                                    <option  name="primary_phone" >Cuba +53</option>
                                    <option  name="primary_phone" >Curaçao +599</option>
                                    <option  name="primary_phone" >Cyprus +357</option>
                                    <option  name="primary_phone" >Czechia +420</option>
                                    <option  name="primary_phone" >Denmark +45</option>
                                    <option  name="primary_phone" >Djibouti +253</option>
                                    <option  name="primary_phone" >Dominica +1767</option>
                                    <option  name="primary_phone" >Dominican Republic +1809</option>
                                    <option  name="primary_phone" >Ecuador +593</option>
                                    <option  name="primary_phone" >Egypt +20</option>
                                    <option  name="primary_phone" >El Salvador +503</option>
                                    <option  name="primary_phone" >Equatorial Guinea +240</option>
                                    <option  name="primary_phone" >Eritrea +291</option>
                                    <option  name="primary_phone" >Estonia +372</option>
                                    <option  name="primary_phone" >Ethiopia +251</option>
                                    <option  name="primary_phone" >Falkland Islands (Islas Malvinas) +500</option>
                                    <option  name="primary_phone" >Faroe Islands +298</option>
                                    <option  name="primary_phone" >Fiji +679</option>
                                    <option  name="primary_phone" >Finland +358</option>
                                    <option  name="primary_phone" >France +33</option>
                                    <option  name="primary_phone" >French Guiana +594</option>
                                    <option  name="primary_phone" >French Polynesia +689</option>
                                    <option  name="primary_phone" >French Southern Territories +262</option>
                                    <option  name="primary_phone" >Gabon +241</option>
                                    <option  name="primary_phone" >Gambia +220</option>
                                    <option  name="primary_phone" >Georgia +995</option>
                                    <option  name="primary_phone" >Germany +49</option>
                                    <option  name="primary_phone" >Ghana +233</option>
                                    <option  name="primary_phone" >Gibraltar +350</option>
                                    <option  name="primary_phone" >Greece +30</option>
                                    <option  name="primary_phone" >Greenland +299</option>
                                    <option  name="primary_phone" >Grenada +1473</option>
                                    <option  name="primary_phone" >Guadeloupe +590</option>
                                    <option  name="primary_phone" >Guam +1671</option>
                                    <option  name="primary_phone" >Guatemala +502</option>
                                    <option  name="primary_phone" >Guernsey +44</option>
                                    <option  name="primary_phone" >Guinea +224</option>
                                    <option  name="primary_phone" >Guinea-Bissau +245</option>
                                    <option  name="primary_phone" >Guyana +592</option>
                                    <option  name="primary_phone" >Haiti +509</option>
                                    <option  name="primary_phone" >Heard & McDonald Islands +0</option>
                                    <option  name="primary_phone" >Vatican City +39</option>
                                    <option  name="primary_phone" >Honduras +504</option>
                                    <option  name="primary_phone" >Hong Kong +852</option>
                                    <option  name="primary_phone" >Hungary +36</option>
                                    <option  name="primary_phone" >Iceland +354</option>
                                    <option  name="primary_phone" >India +91</option>
                                    <option  name="primary_phone" >Indonesia +62</option>
                                    <option  name="primary_phone" >Iran +98</option>
                                    <option  name="primary_phone" >Iraq +964</option>
                                    <option  name="primary_phone" >Ireland +353</option>
                                    <option  name="primary_phone" >Isle of Man +44</option>
                                    <option  name="primary_phone" >Israel +972</option>
                                    <option  name="primary_phone" >Italy +39</option>
                                    <option  name="primary_phone" >Jamaica +1876</option>
                                    <option  name="primary_phone" >Japan +81</option>
                                    <option  name="primary_phone" >Jersey +44</option>
                                    <option  name="primary_phone" >Jordan +962</option>
                                    <option  name="primary_phone" >Kazakhstan +7</option>
                                    <option  name="primary_phone" >Kenya +254</option>
                                    <option  name="primary_phone" >Kiribati +686</option>
                                    <option  name="primary_phone" >North Korea +850</option>
                                    <option  name="primary_phone" >South Korea +82</option>
                                    <option  name="primary_phone" >Kosovo +381</option>
                                    <option  name="primary_phone" >Kuwait +965</option>
                                    <option  name="primary_phone" >Kyrgyzstan +996</option>
                                    <option  name="primary_phone" >Laos +856</option>
                                    <option  name="primary_phone" >Latvia +371</option>
                                    <option  name="primary_phone" >Lebanon +961</option>
                                    <option  name="primary_phone" >Lesotho +266</option>
                                    <option  name="primary_phone" >Liberia +231</option>
                                    <option  name="primary_phone" >Libya +218</option>
                                    <option  name="primary_phone" >Liechtenstein +423</option>
                                    <option  name="primary_phone" >Lithuania +370</option>
                                    <option  name="primary_phone" >Luxembourg +352</option>
                                    <option  name="primary_phone" >Macao +853</option>
                                    <option  name="primary_phone" >North Macedonia +389</option>
                                    <option  name="primary_phone" >Madagascar +261</option>
                                    <option  name="primary_phone" >Malawi +265</option>
                                    <option  name="primary_phone" >Malaysia +60</option>
                                    <option  name="primary_phone" >Maldives +960</option>
                                    <option  name="primary_phone" >Mali +223</option>
                                    <option  name="primary_phone" >Malta +356</option>
                                    <option  name="primary_phone" >Marshall Islands +692</option>
                                    <option  name="primary_phone" >Martinique +596</option>
                                    <option  name="primary_phone" >Mauritania +222</option>
                                    <option  name="primary_phone" >Mauritius +230</option>
                                    <option  name="primary_phone" >Mayotte +262</option>
                                    <option  name="primary_phone" >Mexico +52</option>
                                    <option  name="primary_phone" >Micronesia +691</option>
                                    <option  name="primary_phone" >Moldova +373</option>
                                    <option  name="primary_phone" >Monaco +377</option>
                                    <option  name="primary_phone" >Mongolia +976</option>
                                    <option  name="primary_phone" >Montenegro +382</option>
                                    <option  name="primary_phone" >Montserrat +1664</option>
                                    <option  name="primary_phone" >Morocco +212</option>
                                    <option  name="primary_phone" >Mozambique +258</option>
                                    <option  name="primary_phone" >Myanmar (Burma) +95</option>
                                    <option  name="primary_phone" >Namibia +264</option>
                                    <option  name="primary_phone" >Nauru +674</option>
                                    <option  name="primary_phone" >Nepal +977</option>
                                    <option  name="primary_phone" >Netherlands +31</option>
                                    <option  name="primary_phone" >Curaçao +599</option>
                                    <option  name="primary_phone" >New Caledonia +687</option>
                                    <option  name="primary_phone" >New Zealand +64</option>
                                    <option  name="primary_phone" >Nicaragua +505</option>
                                    <option  name="primary_phone" >Niger +227</option>
                                    <option  name="primary_phone" >Nigeria +234</option>
                                    <option  name="primary_phone" >Niue +683</option>
                                    <option  name="primary_phone" >Norfolk Island +672</option>
                                    <option  name="primary_phone" >Northern Mariana Islands +1670</option>
                                    <option  name="primary_phone" >Norway +47</option>
                                    <option  name="primary_phone" >Oman +968</option>
                                    <option  name="primary_phone" >Pakistan +92</option>
                                    <option  name="primary_phone" >Palau +680</option>
                                    <option  name="primary_phone" >Palestine +970</option>
                                    <option  name="primary_phone" >Panama +507</option>
                                    <option  name="primary_phone" >Papua New Guinea +675</option>
                                    <option  name="primary_phone" >Paraguay +595</option>
                                    <option  name="primary_phone" >Peru +51</option>
                                    <option  name="primary_phone" >Philippines +63</option>
                                    <option  name="primary_phone" >Pitcairn Islands +64</option>
                                    <option  name="primary_phone" >Poland +48</option>
                                    <option  name="primary_phone" >Portugal +351</option>
                                    <option  name="primary_phone" >Puerto Rico +1787</option>
                                    <option  name="primary_phone" >Qatar +974</option>
                                    <option  name="primary_phone" >Réunion +262</option>
                                    <option  name="primary_phone" >Romania +40</option>
                                    <option  name="primary_phone" >Russia +70</option>
                                    <option  name="primary_phone" >Rwanda +250</option>
                                    <option  name="primary_phone" >St. Barthélemy +590</option>
                                    <option  name="primary_phone" >St. Helena +290</option>
                                    <option  name="primary_phone" >St. Kitts & Nevis +1869</option>
                                    <option  name="primary_phone" >St. Lucia +1758</option>
                                    <option  name="primary_phone" >St. Martin +590</option>
                                    <option  name="primary_phone" >St. Pierre & Miquelon +508</option>
                                    <option  name="primary_phone" >St. Vincent & Grenadines +1784</option>
                                    <option  name="primary_phone" >Samoa +684</option>
                                    <option  name="primary_phone" >San Marino +378</option>
                                    <option  name="primary_phone" >São Tomé & Príncipe +239</option>
                                    <option  name="primary_phone" >Saudi Arabia +966</option>
                                    <option  name="primary_phone" >Senegal +221</option>
                                    <option  name="primary_phone" >Serbia +381</option>
                                    <option  name="primary_phone" >Serbia +381</option>
                                    <option  name="primary_phone" >Seychelles +248</option>
                                    <option  name="primary_phone" >Sierra Leone +232</option>
                                    <option  name="primary_phone" >Singapore +65</option>
                                    <option  name="primary_phone" >Sint Maarten +1</option>
                                    <option  name="primary_phone" >Slovakia +421</option>
                                    <option  name="primary_phone" >Slovenia +386</option>
                                    <option  name="primary_phone" >Solomon Islands +677</option>
                                    <option  name="primary_phone" >Somalia +252</option>
                                    <option  name="primary_phone" >South Africa +27</option>
                                    <option  name="primary_phone" >South Georgia & South Sandwich Islands +500</option>
                                    <option  name="primary_phone" >South Sudan +211</option>
                                    <option  name="primary_phone" >Spain +34</option>
                                    <option  name="primary_phone" >Sri Lanka +94</option>
                                    <option  name="primary_phone" >Sudan +249</option>
                                    <option  name="primary_phone" >Suriname +597</option>
                                    <option  name="primary_phone" >Svalbard & Jan Mayen +47</option>
                                    <option  name="primary_phone" >Eswatini +268</option>
                                    <option  name="primary_phone" >Sweden +46</option>
                                    <option  name="primary_phone" >Switzerland +41</option>
                                    <option  name="primary_phone" >Syria +963</option>
                                    <option  name="primary_phone" >Taiwan +886</option>
                                    <option  name="primary_phone" >Tajikistan +992</option>
                                    <option  name="primary_phone" >Tanzania +255</option>
                                    <option  name="primary_phone" >Thailand +66</option>
                                    <option  name="primary_phone" >Timor-Leste +670</option>
                                    <option  name="primary_phone" >Togo +228</option>
                                    <option  name="primary_phone" >Tokelau +690</option>
                                    <option  name="primary_phone" >Tonga +676</option>
                                    <option  name="primary_phone" >Trinidad & Tobago +1868</option>
                                    <option  name="primary_phone" >Tunisia +216</option>
                                    <option  name="primary_phone" >Turkey +90</option>
                                    <option  name="primary_phone" >Turkmenistan +7370</option>
                                    <option  name="primary_phone" >Turks & Caicos Islands +1649</option>
                                    <option  name="primary_phone" >Tuvalu +688</option>
                                    <option  name="primary_phone" >Uganda +256</option>
                                    <option  name="primary_phone" >Ukraine +380</option>
                                    <option  name="primary_phone" >United Arab Emirates +971</option>
                                    <option  name="primary_phone" >United Kingdom +44</option>
                                    <option  name="primary_phone" >United States +1</option>
                                    <option  name="primary_phone" >U.S. Outlying Islands +1</option>
                                    <option  name="primary_phone" >Uruguay +598</option>
                                    <option  name="primary_phone" >Uzbekistan +998</option>
                                    <option  name="primary_phone" >Vanuatu +678</option>
                                    <option  name="primary_phone" >Venezuela +58</option>
                                    <option  name="primary_phone" >Vietnam +84</option>
                                    <option  name="primary_phone" >British Virgin Islands +1284</option>
                                    <option  name="primary_phone" >U.S. Virgin Islands +1340</option>
                                    <option  name="primary_phone" >Wallis & Futuna +681</option>
                                    <option  name="primary_phone" >Western Sahara +212</option>
                                    <option  name="primary_phone" >Yemen +967</option>
                                    <option  name="primary_phone" >Zambia +260</option>
                                    <option  name="primary_phone" >Zimbabwe +263</option>
                                </select>
                                 
                                @error('primary_phone')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                  <label for="phone">Phone Number</label>

                                  <input id="phone" type="number" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
            
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                              <label for="phone">Nationality</label>

                                <select name="nationality"  value="{{ old('nationality') }}" autocomplete="nationality" autofocus class="form-control @error('nationality') is-invalid @enderror" id="nationality" >
                                  <option selected disabled>Nationality</option>
                                      <option name="nationality">Afghanistan</option>
                                      <option name="nationality">Åland Islands</option>
                                      <option  name="nationality" >Albania</option>
                                      <option  name="nationality" >Algeria</option>
                                      <option  name="nationality" >American Samoa</option>
                                      <option  name="nationality" >Andorra</option>
                                      <option  name="nationality" >Angola</option>
                                      <option  name="nationality" >Anguilla</option>
                                      <option  name="nationality" >Antarctica</option>
                                      <option  name="nationality" >Antigua & Barbuda</option>
                                      <option  name="nationality" >Argentina</option>
                                      <option  name="nationality" >Armenia</option>
                                      <option  name="nationality" >Aruba</option>
                                      <option  name="nationality" >Australia</option>
                                      <option  name="nationality" >Austria</option>
                                      <option  name="nationality" >Azerbaijan</option>
                                      <option  name="nationality" >Bahamas</option>
                                      <option  name="nationality" >Bahrain</option>
                                      <option  name="nationality" >Bangladesh</option>
                                      <option  name="nationality" >Barbados</option>
                                      <option  name="nationality" >Belarus</option>
                                      <option  name="nationality" >Belgium</option>
                                      <option  name="nationality" >Belize</option>
                                      <option  name="nationality" >Benin</option>
                                      <option  name="nationality" >Bermuda</option>
                                      <option  name="nationality" >Bhutan</option>
                                      <option  name="nationality" >Bolivia</option>
                                      <option  name="nationality" >Caribbean Netherlands</option>
                                      <option  name="nationality" >Bosnia & Herzegovina</option>
                                      <option  name="nationality" >Botswana</option>
                                      <option  name="nationality" >Bouvet Island</option>
                                      <option  name="nationality" >Brazil</option>
                                      <option  name="nationality" >British Indian Ocean Territory</option>
                                      <option  name="nationality" >Brunei</option>
                                      <option  name="nationality" >Bulgaria</option>
                                      <option  name="nationality" >Burkina Faso</option>
                                      <option  name="nationality" >Burundi</option>
                                      <option  name="nationality" >Cambodia</option>
                                      <option  name="nationality" >Cameroon</option>
                                      <option  name="nationality" >Canad</option>
                                      <option  name="nationality" >Cape Verde</option>
                                      <option  name="nationality" >Cayman Islands</option>
                                      <option  name="nationality" >Central African Republic</option>
                                      <option  name="nationality" >Chad</option>
                                      <option  name="nationality" >Chile</option>
                                      <option  name="nationality" >China</option>
                                      <option  name="nationality" >Christmas Island</option>
                                      <option  name="nationality" >Cocos (Keeling) Islands</option>
                                      <option  name="nationality" >Colombia</option>
                                      <option  name="nationality" >Comoros</option>
                                      <option  name="nationality" >Congo - Brazzaville</option>
                                      <option  name="nationality" >Congo - Kinshasa</option>
                                      <option  name="nationality" >Cook Islands</option>
                                      <option  name="nationality" >Costa Rica</option>
                                      <option  name="nationality" >Côte d’Ivoire</option>
                                      <option  name="nationality" >Croatia</option>
                                      <option  name="nationality" >Cuba</option>
                                      <option  name="nationality" >Curaçao</option>
                                      <option  name="nationality" >Cyprus</option>
                                      <option  name="nationality" >Czechia</option>
                                      <option  name="nationality" >Denmark</option>
                                      <option  name="nationality" >Djibouti</option>
                                      <option  name="nationality" >Dominica</option>
                                      <option  name="nationality" >Dominican Republic</option>
                                      <option  name="nationality" >Ecuador</option>
                                      <option  name="nationality" >Egypt</option>
                                      <option  name="nationality" >El Salvador</option>
                                      <option  name="nationality" >Equatorial Guinea</option>
                                      <option  name="nationality" >Eritrea</option>
                                      <option  name="nationality" >Estonia</option>
                                      <option  name="nationality" >Ethiopia</option>
                                      <option  name="nationality" >Falkland Islands (Islas Malvinas)</option>
                                      <option  name="nationality" >Faroe Islands</option>
                                      <option  name="nationality" >Fiji</option>
                                      <option  name="nationality" >Finland</option>
                                      <option  name="nationality" >France</option>
                                      <option  name="nationality" >French Guiana</option>
                                      <option  name="nationality" >French Polynesia</option>
                                      <option  name="nationality" >French Southern Territories</option>
                                      <option  name="nationality" >Gabon</option>
                                      <option  name="nationality" >Gambia</option>
                                      <option  name="nationality" >Georgia</option>
                                      <option  name="nationality" >Germany</option>
                                      <option  name="nationality" >Ghana</option>
                                      <option  name="nationality" >Gibraltar</option>
                                      <option  name="nationality" >Greece</option>
                                      <option  name="nationality" >Greenland</option>
                                      <option  name="nationality" >Grenada</option>
                                      <option  name="nationality" >Guadeloupe</option>
                                      <option  name="nationality" >Guam</option>
                                      <option  name="nationality" >Guatemala</option>
                                      <option  name="nationality" >Guernsey</option>
                                      <option  name="nationality" >Guinea</option>
                                      <option  name="nationality" >Guinea-Bissau</option>
                                      <option  name="nationality" >Guyana</option>
                                      <option  name="nationality" >Haiti</option>
                                      <option  name="nationality" >Heard & McDonald Island</option>
                                      <option  name="nationality" >Vatican City</option>
                                      <option  name="nationality" >Honduras</option>
                                      <option  name="nationality" >Hong Kong</option>
                                      <option  name="nationality" >Hungary</option>
                                      <option  name="nationality" >Iceland</option>
                                      <option  name="nationality" >India</option>
                                      <option  name="nationality" >Indonesia</option>
                                      <option  name="nationality" >Iran</option>
                                      <option  name="nationality" >Iraq</option>
                                      <option  name="nationality" >Ireland</option>
                                      <option  name="nationality" >Isle of Man</option>
                                      <option  name="nationality" >Israel</option>
                                      <option  name="nationality" >Italy</option>
                                      <option  name="nationality" >Jamaica</option>
                                      <option  name="nationality" >Japan</option>
                                      <option  name="nationality" >Jersey</option>
                                      <option  name="nationality" >Jordan</option>
                                      <option  name="nationality" >Kazakhsta</option>
                                      <option  name="nationality" >Kenya</option>
                                      <option  name="nationality" >Kiribati</option>
                                      <option  name="nationality" >North Korea</option>
                                      <option  name="nationality" >South Korea</option>
                                      <option  name="nationality" >Kosovo</option>
                                      <option  name="nationality" >Kuwait</option>
                                      <option  name="nationality" >Kyrgyzstan</option>
                                      <option  name="nationality" >Laos</option>
                                      <option  name="nationality" >Latvia</option>
                                      <option  name="nationality" >Lebanon</option>
                                      <option  name="nationality" >Lesotho</option>
                                      <option  name="nationality" >Liberia</option>
                                      <option  name="nationality" >Libya</option>
                                      <option  name="nationality" >Liechtenstein</option>
                                      <option  name="nationality" >Lithuania</option>
                                      <option  name="nationality" >Luxembourg</option>
                                      <option  name="nationality" >Macao</option>
                                      <option  name="nationality" >North Macedonia</option>
                                      <option  name="nationality" >Madagascar</option>
                                      <option  name="nationality" >Malawi</option>
                                      <option  name="nationality" >Malaysia</option>
                                      <option  name="nationality" >Maldives</option>
                                      <option  name="nationality" >Mali</option>
                                      <option  name="nationality" >Malta</option>
                                      <option  name="nationality" >Marshall Islands</option>
                                      <option  name="nationality" >Martinique</option>
                                      <option  name="nationality" >Mauritania</option>
                                      <option  name="nationality" >Mauritius</option>
                                      <option  name="nationality" >Mayotte</option>
                                      <option  name="nationality" >Mexico</option>
                                      <option  name="nationality" >Micronesia</option>
                                      <option  name="nationality" >Moldova</option>
                                      <option  name="nationality" >Monaco</option>
                                      <option  name="nationality" >Mongolia</option>
                                      <option  name="nationality" >Montenegro</option>
                                      <option  name="nationality" >Montserrat</option>
                                      <option  name="nationality" >Morocco</option>
                                      <option  name="nationality" >Mozambique</option>
                                      <option  name="nationality" >Myanmar (Burma)</option>
                                      <option  name="nationality" >Namibia</option>
                                      <option  name="nationality" >Nauru</option>
                                      <option  name="nationality" >Nepal</option>
                                      <option  name="nationality" >Netherlands</option>
                                      <option  name="nationality" >Curaçao</option>
                                      <option  name="nationality" >New Caledonia</option>
                                      <option  name="nationality" >New Zealand</option>
                                      <option  name="nationality" >Nicaragua</option>
                                      <option  name="nationality" >Niger</option>
                                      <option  name="nationality" >Nigeria</option>
                                      <option  name="nationality" >Niue</option>
                                      <option  name="nationality" >Norfolk Island</option>
                                      <option  name="nationality" >Northern Mariana Islands</option>
                                      <option  name="nationality" >Norway</option>
                                      <option  name="nationality" >Oman</option>
                                      <option  name="nationality" >Pakistan</option>
                                      <option  name="nationality" >Palau</option>
                                      <option  name="nationality" >Palestine</option>
                                      <option  name="nationality" >Panama</option>
                                      <option  name="nationality" >Papua New Guinea</option>
                                      <option  name="nationality" >Paraguay</option>
                                      <option  name="nationality" >Peru</option>
                                      <option  name="nationality" >Philippines</option>
                                      <option  name="nationality" >Pitcairn Islands</option>
                                      <option  name="nationality" >Poland</option>
                                      <option  name="nationality" >Portugal</option>
                                      <option  name="nationality" >Puerto Rico</option>
                                      <option  name="nationality" >Qatar</option>
                                      <option  name="nationality" >Réunion</option>
                                      <option  name="nationality" >Romania</option>
                                      <option  name="nationality" >Russia</option>
                                      <option  name="nationality" >Rwanda</option>
                                      <option  name="nationality" >St. Barthélemy</option>
                                      <option  name="nationality" >St. Helena</option>
                                      <option  name="nationality" >St. Kitts & Nevis</option>
                                      <option  name="nationality" >St. Lucia</option>
                                      <option  name="nationality" >St. Martin</option>
                                      <option  name="nationality" >St. Pierre & Miquelon</option>
                                      <option  name="nationality" >St. Vincent & Grenadines</option>
                                      <option  name="nationality" >Samoa</option>
                                      <option  name="nationality" >San Marino</option>
                                      <option  name="nationality" >São Tomé & Príncipe</option>
                                      <option  name="nationality" >Saudi Arabia</option>
                                      <option  name="nationality" >Senegal</option>
                                      <option  name="nationality" >Serbia</option>
                                      <option  name="nationality" >Serbia</option>
                                      <option  name="nationality" >Seychelles</option>
                                      <option  name="nationality" >Sierra Leone</option>
                                      <option  name="nationality" >Singapore</option>
                                      <option  name="nationality" >Sint Maarte</option>
                                      <option  name="nationality" >Slovakia</option>
                                      <option  name="nationality" >Slovenia</option>
                                      <option  name="nationality" >Solomon Islands</option>
                                      <option  name="nationality" >Somalia</option>
                                      <option  name="nationality" >South Africa</option>
                                      <option  name="nationality" >South Georgia & South Sandwich Islands</option>
                                      <option  name="nationality" >South Sudan</option>
                                      <option  name="nationality" >Spain</option>
                                      <option  name="nationality" >Sri Lanka</option>
                                      <option  name="nationality" >Sudan</option>
                                      <option  name="nationality" >Suriname</option>
                                      <option  name="nationality" >Svalbard & Jan Mayen</option>
                                      <option  name="nationality" >Eswatini</option>
                                      <option  name="nationality" >Sweden</option>
                                      <option  name="nationality" >Switzerland</option>
                                      <option  name="nationality" >Syria</option>
                                      <option  name="nationality" >Taiwan</option>
                                      <option  name="nationality" >Tajikistan</option>
                                      <option  name="nationality" >Tanzania</option>
                                      <option  name="nationality" >Thailand</option>
                                      <option  name="nationality" >Timor-Leste</option>
                                      <option  name="nationality" >Togo</option>
                                      <option  name="nationality" >Tokelau</option>
                                      <option  name="nationality" >Tonga</option>
                                      <option  name="nationality" >Trinidad & Tobago</option>
                                      <option  name="nationality" >Tunisia</option>
                                      <option  name="nationality" >Turkey</option>
                                      <option  name="nationality" >Turkmenistan</option>
                                      <option  name="nationality" >Turks & Caicos Islands</option>
                                      <option  name="nationality" >Tuvalu</option>
                                      <option  name="nationality" >Uganda</option>
                                      <option  name="nationality" >Ukraine</option>
                                      <option  name="nationality" >United Arab Emirates</option>
                                      <option  name="nationality" >United Kingdom</option>
                                      <option  name="nationality" >United State</option>
                                      <option  name="nationality" >U.S. Outlying Island</option>
                                      <option  name="nationality" >Uruguay</option>
                                      <option  name="nationality" >Uzbekistan</option>
                                      <option  name="nationality" >Vanuatu</option>
                                      <option  name="nationality" >Venezuela</option>
                                      <option  name="nationality" >Vietnam</option>
                                      <option  name="nationality" >British Virgin Islands</option>
                                      <option  name="nationality" >U.S. Virgin Islands</option>
                                      <option  name="nationality" >Wallis & Futuna</option>
                                      <option  name="nationality" >Western Sahara</option>
                                      <option  name="nationality" >Yemen</option>
                                      <option  name="nationality" >Zambia</option>
                                  <option  name="nationality" >Zimbabwe</option>
                                  
                              </select>
                              @error('nationality')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              </div>
                              <div class="col-lg-6">
                              <label for="phone">Country of residence</label>

                                <select name="country"  value="" autocomplete="country" autofocus class="form-control @error('country') is-invalid @enderror" id="country" >
                                    <option selected disabled>Select Country</option>
                                        <option name="country">Afghanistan</option>
                                        <option name="country">Åland Islands</option>
                                        <option  name="country" >Albania</option>
                                        <option  name="country" >Algeria</option>
                                        <option  name="country" >American Samoa</option>
                                        <option  name="country" >Andorra</option>
                                        <option  name="country" >Angola</option>
                                        <option  name="country" >Anguilla</option>
                                        <option  name="country" >Antarctica</option>
                                        <option  name="country" >Antigua & Barbuda</option>
                                        <option  name="country" >Argentina</option>
                                        <option  name="country" >Armenia</option>
                                        <option  name="country" >Aruba</option>
                                        <option  name="country" >Australia</option>
                                        <option  name="country" >Austria</option>
                                        <option  name="country" >Azerbaijan</option>
                                        <option  name="country" >Bahamas</option>
                                        <option  name="country" >Bahrain</option>
                                        <option  name="country" >Bangladesh</option>
                                        <option  name="country" >Barbados</option>
                                        <option  name="country" >Belarus</option>
                                        <option  name="country" >Belgium</option>
                                        <option  name="country" >Belize</option>
                                        <option  name="country" >Benin</option>
                                        <option  name="country" >Bermuda</option>
                                        <option  name="country" >Bhutan</option>
                                        <option  name="country" >Bolivia</option>
                                        <option  name="country" >Caribbean Netherlands</option>
                                        <option  name="country" >Bosnia & Herzegovina</option>
                                        <option  name="country" >Botswana</option>
                                        <option  name="country" >Bouvet Island</option>
                                        <option  name="country" >Brazil</option>
                                        <option  name="country" >British Indian Ocean Territory</option>
                                        <option  name="country" >Brunei</option>
                                        <option  name="country" >Bulgaria</option>
                                        <option  name="country" >Burkina Faso</option>
                                        <option  name="country" >Burundi</option>
                                        <option  name="country" >Cambodia</option>
                                        <option  name="country" >Cameroon</option>
                                        <option  name="country" >Canad</option>
                                        <option  name="country" >Cape Verde</option>
                                        <option  name="country" >Cayman Islands</option>
                                        <option  name="country" >Central African Republic</option>
                                        <option  name="country" >Chad</option>
                                        <option  name="country" >Chile</option>
                                        <option  name="country" >China</option>
                                        <option  name="country" >Christmas Island</option>
                                        <option  name="country" >Cocos (Keeling) Islands</option>
                                        <option  name="country" >Colombia</option>
                                        <option  name="country" >Comoros</option>
                                        <option  name="country" >Congo - Brazzaville</option>
                                        <option  name="country" >Congo - Kinshasa</option>
                                        <option  name="country" >Cook Islands</option>
                                        <option  name="country" >Costa Rica</option>
                                        <option  name="country" >Côte d’Ivoire</option>
                                        <option  name="country" >Croatia</option>
                                        <option  name="country" >Cuba</option>
                                        <option  name="country" >Curaçao</option>
                                        <option  name="country" >Cyprus</option>
                                        <option  name="country" >Czechia</option>
                                        <option  name="country" >Denmark</option>
                                        <option  name="country" >Djibouti</option>
                                        <option  name="country" >Dominica</option>
                                        <option  name="country" >Dominican Republic</option>
                                        <option  name="country" >Ecuador</option>
                                        <option  name="country" >Egypt</option>
                                        <option  name="country" >El Salvador</option>
                                        <option  name="country" >Equatorial Guinea</option>
                                        <option  name="country" >Eritrea</option>
                                        <option  name="country" >Estonia</option>
                                        <option  name="country" >Ethiopia</option>
                                        <option  name="country" >Falkland Islands (Islas Malvinas)</option>
                                        <option  name="country" >Faroe Islands</option>
                                        <option  name="country" >Fiji</option>
                                        <option  name="country" >Finland</option>
                                        <option  name="country" >France</option>
                                        <option  name="country" >French Guiana</option>
                                        <option  name="country" >French Polynesia</option>
                                        <option  name="country" >French Southern Territories</option>
                                        <option  name="country" >Gabon</option>
                                        <option  name="country" >Gambia</option>
                                        <option  name="country" >Georgia</option>
                                        <option  name="country" >Germany</option>
                                        <option  name="country" >Ghana</option>
                                        <option  name="country" >Gibraltar</option>
                                        <option  name="country" >Greece</option>
                                        <option  name="country" >Greenland</option>
                                        <option  name="country" >Grenada</option>
                                        <option  name="country" >Guadeloupe</option>
                                        <option  name="country" >Guam</option>
                                        <option  name="country" >Guatemala</option>
                                        <option  name="country" >Guernsey</option>
                                        <option  name="country" >Guinea</option>
                                        <option  name="country" >Guinea-Bissau</option>
                                        <option  name="country" >Guyana</option>
                                        <option  name="country" >Haiti</option>
                                        <option  name="country" >Heard & McDonald Island</option>
                                        <option  name="country" >Vatican City</option>
                                        <option  name="country" >Honduras</option>
                                        <option  name="country" >Hong Kong</option>
                                        <option  name="country" >Hungary</option>
                                        <option  name="country" >Iceland</option>
                                        <option  name="country" >India</option>
                                        <option  name="country" >Indonesia</option>
                                        <option  name="country" >Iran</option>
                                        <option  name="country" >Iraq</option>
                                        <option  name="country" >Ireland</option>
                                        <option  name="country" >Isle of Man</option>
                                        <option  name="country" >Israel</option>
                                        <option  name="country" >Italy</option>
                                        <option  name="country" >Jamaica</option>
                                        <option  name="country" >Japan</option>
                                        <option  name="country" >Jersey</option>
                                        <option  name="country" >Jordan</option>
                                        <option  name="country" >Kazakhsta</option>
                                        <option  name="country" >Kenya</option>
                                        <option  name="country" >Kiribati</option>
                                        <option  name="country" >North Korea</option>
                                        <option  name="country" >South Korea</option>
                                        <option  name="country" >Kosovo</option>
                                        <option  name="country" >Kuwait</option>
                                        <option  name="country" >Kyrgyzstan</option>
                                        <option  name="country" >Laos</option>
                                        <option  name="country" >Latvia</option>
                                        <option  name="country" >Lebanon</option>
                                        <option  name="country" >Lesotho</option>
                                        <option  name="country" >Liberia</option>
                                        <option  name="country" >Libya</option>
                                        <option  name="country" >Liechtenstein</option>
                                        <option  name="country" >Lithuania</option>
                                        <option  name="country" >Luxembourg</option>
                                        <option  name="country" >Macao</option>
                                        <option  name="country" >North Macedonia</option>
                                        <option  name="country" >Madagascar</option>
                                        <option  name="country" >Malawi</option>
                                        <option  name="country" >Malaysia</option>
                                        <option  name="country" >Maldives</option>
                                        <option  name="country" >Mali</option>
                                        <option  name="country" >Malta</option>
                                        <option  name="country" >Marshall Islands</option>
                                        <option  name="country" >Martinique</option>
                                        <option  name="country" >Mauritania</option>
                                        <option  name="country" >Mauritius</option>
                                        <option  name="country" >Mayotte</option>
                                        <option  name="country" >Mexico</option>
                                        <option  name="country" >Micronesia</option>
                                        <option  name="country" >Moldova</option>
                                        <option  name="country" >Monaco</option>
                                        <option  name="country" >Mongolia</option>
                                        <option  name="country" >Montenegro</option>
                                        <option  name="country" >Montserrat</option>
                                        <option  name="country" >Morocco</option>
                                        <option  name="country" >Mozambique</option>
                                        <option  name="country" >Myanmar (Burma)</option>
                                        <option  name="country" >Namibia</option>
                                        <option  name="country" >Nauru</option>
                                        <option  name="country" >Nepal</option>
                                        <option  name="country" >Netherlands</option>
                                        <option  name="country" >Curaçao</option>
                                        <option  name="country" >New Caledonia</option>
                                        <option  name="country" >New Zealand</option>
                                        <option  name="country" >Nicaragua</option>
                                        <option  name="country" >Niger</option>
                                        <option  name="country" >Nigeria</option>
                                        <option  name="country" >Niue</option>
                                        <option  name="country" >Norfolk Island</option>
                                        <option  name="country" >Northern Mariana Islands</option>
                                        <option  name="country" >Norway</option>
                                        <option  name="country" >Oman</option>
                                        <option  name="country" >Pakistan</option>
                                        <option  name="country" >Palau</option>
                                        <option  name="country" >Palestine</option>
                                        <option  name="country" >Panama</option>
                                        <option  name="country" >Papua New Guinea</option>
                                        <option  name="country" >Paraguay</option>
                                        <option  name="country" >Peru</option>
                                        <option  name="country" >Philippines</option>
                                        <option  name="country" >Pitcairn Islands</option>
                                        <option  name="country" >Poland</option>
                                        <option  name="country" >Portugal</option>
                                        <option  name="country" >Puerto Rico</option>
                                        <option  name="country" >Qatar</option>
                                        <option  name="country" >Réunion</option>
                                        <option  name="country" >Romania</option>
                                        <option  name="country" >Russia</option>
                                        <option  name="country" >Rwanda</option>
                                        <option  name="country" >St. Barthélemy</option>
                                        <option  name="country" >St. Helena</option>
                                        <option  name="country" >St. Kitts & Nevis</option>
                                        <option  name="country" >St. Lucia</option>
                                        <option  name="country" >St. Martin</option>
                                        <option  name="country" >St. Pierre & Miquelon</option>
                                        <option  name="country" >St. Vincent & Grenadines</option>
                                        <option  name="country" >Samoa</option>
                                        <option  name="country" >San Marino</option>
                                        <option  name="country" >São Tomé & Príncipe</option>
                                        <option  name="country" >Saudi Arabia</option>
                                        <option  name="country" >Senegal</option>
                                        <option  name="country" >Serbia</option>
                                        <option  name="country" >Serbia</option>
                                        <option  name="country" >Seychelles</option>
                                        <option  name="country" >Sierra Leone</option>
                                        <option  name="country" >Singapore</option>
                                        <option  name="country" >Sint Maarte</option>
                                        <option  name="country" >Slovakia</option>
                                        <option  name="country" >Slovenia</option>
                                        <option  name="country" >Solomon Islands</option>
                                        <option  name="country" >Somalia</option>
                                        <option  name="country" >South Africa</option>
                                        <option  name="country" >South Georgia & South Sandwich Islands</option>
                                        <option  name="country" >South Sudan</option>
                                        <option  name="country" >Spain</option>
                                        <option  name="country" >Sri Lanka</option>
                                        <option  name="country" >Sudan</option>
                                        <option  name="country" >Suriname</option>
                                        <option  name="country" >Svalbard & Jan Mayen</option>
                                        <option  name="country" >Eswatini</option>
                                        <option  name="country" >Sweden</option>
                                        <option  name="country" >Switzerland</option>
                                        <option  name="country" >Syria</option>
                                        <option  name="country" >Taiwan</option>
                                        <option  name="country" >Tajikistan</option>
                                        <option  name="country" >Tanzania</option>
                                        <option  name="country" >Thailand</option>
                                        <option  name="country" >Timor-Leste</option>
                                        <option  name="country" >Togo</option>
                                        <option  name="country" >Tokelau</option>
                                        <option  name="country" >Tonga</option>
                                        <option  name="country" >Trinidad & Tobago</option>
                                        <option  name="country" >Tunisia</option>
                                        <option  name="country" >Turkey</option>
                                        <option  name="country" >Turkmenistan</option>
                                        <option  name="country" >Turks & Caicos Islands</option>
                                        <option  name="country" >Tuvalu</option>
                                        <option  name="country" >Uganda</option>
                                        <option  name="country" >Ukraine</option>
                                        <option  name="country" >United Arab Emirates</option>
                                        <option  name="country" >United Kingdom</option>
                                        <option  name="country" >United State</option>
                                        <option  name="country" >U.S. Outlying Island</option>
                                        <option  name="country" >Uruguay</option>
                                        <option  name="country" >Uzbekistan</option>
                                        <option  name="country" >Vanuatu</option>
                                        <option  name="country" >Venezuela</option>
                                        <option  name="country" >Vietnam</option>
                                        <option  name="country" >British Virgin Islands</option>
                                        <option  name="country" >U.S. Virgin Islands</option>
                                        <option  name="country" >Wallis & Futuna</option>
                                        <option  name="country" >Western Sahara</option>
                                        <option  name="country" >Yemen</option>
                                        <option  name="country" >Zambia</option>
                                    <option  name="country" >Zimbabwe</option>
                                </select>
                              @error('country')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                              </div>
                            </div>
                                          
            
                            <div class="d-flex justify-content-end pt-3">
                                <a href="{{URL('/signup')}}" type="button" class="btn btn-secondary btn-lg">Reset all</a>
                                <button type="submit" class="btn btn-primary btn-lg ms-2" style="background-color: #22b3c1">Submit form</button>
                            </div>
            
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
