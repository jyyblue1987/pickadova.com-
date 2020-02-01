@extends('layouts.app')

@section('content')

    <div class="main profile_m">
        <div>
            <div class="boy_test">
                <h4>Boys Testimonial</h4>
                <p><img src="images/plus.png"><a href="#">Add New</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Search Now</a></p>
            </div>
            <button class="pause_btn">PAUSE AD</button>
            <div class="credit">
                <h4>Account Credit</h4>
                <p><img src="images/plus.png"><a href="#">Add Credit</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>$100.00</span></p>
            </div>
        </div>
        <div class="navbar_btm midnav shadow">
            <ul>
                <li>PREVIEW</li>
                <li class="midnav_active">EDIT</li>
                <li>PAYMENT</li>
            </ul>
        </div>
        <div id="edit">
            <div class="shadow live_bar">
                YOUR PROFILE IS LIVE
                <div>
                    <img src="images/up_arrow.png">
                    <p class="live_barP">$0.00</p>
                    <p class="live_barP1">BUMP UP</p>
                </div>
            </div>
            <p class="profile_expire">
            Your Profile will Expire in 7days, Please Login to Repost.
            </p>
            <div class="pre_profile shadow pre_profile_edit">
                <div class="float">
                    <div class="pumpup wow fadeInRight" data-wow-delay="0.2s">
                        <p id="pump_p">Profile Pump Up Auto Cycle</p>
                        <select>
                            <option>Min</option>
                            <option>Max</option>
                        </select>
                        <input class="pump_input" type="text" name="">
                        <div id="verify_box">
                            <button class="btn red_btn">Request Verification</button>
                            <div id="verify_boxdiv">
                                <p>Profile highlight</p>
                                <div>$10.00/week</div>
                                <div id="verify_boxdivdiv">
                                    <input class="form-check-input pump_check" type="checkbox" name="remember">
                                    <span>Auto Cycle</span><br />
                                    <span id="verify_boxspan">every week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hours hours_edit wow fadeInLeft" data-wow-delay="0.2s">
                        <img id="hours_edit_img" src="images/pre_profile.png">
                        <img id="hours_edit_img1" src="images/double_ribbon2.png">
                        <button class="btn red_btn">Change Profile Picture</button>
                        <h3 class="housh3">WORK HOURS</h3>
                        <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div>
                        <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div>
                        <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div>
                        <div>
                            <p>MON____AM<select><option></option></select></p>
                            <span>TO____PM<select><option></option></select></span>
                        </div>
                    </div>
                    <div class="wow fadeInRight" data-wow-delay="0.2s">
                        <button class="btn red_btn">Change Name</button>
                        <button class="btn red_btn">Change Password</button>
                        <button class="btn red_btn">Change Email</button>
                        <button class="btn red_btn red_btn_location"><img src="images/location_white.png"> Change Location</button>
                    </div>
                    <div class="wow fadeInRight user_profile_container" data-wow-delay="0.6s">
                        <div class="info dissama">
                            <div><p>Dissama</p>   <input type="" name=""></div>
                            <div><p>Age</p>   <input type="" name=""></div>
                            <div><p>Height</p>   <input type="" name=""></div>
                            <div><p>Dissama</p>   <select></select></div>
                            <div><p>Age</p>   <select></select></div>
                            <div><p>Height</p>   <input type="" name=""></div>
                        </div>
                        <div class="other_contact">
                            <p>OTHER CONTACTS</p>
                            <span><img src="images/phone1.png"> 04115-545-545</span>
                            <span class="other_phonenum"><img src="images/message1.png"> 04115-545-545</span>
                            <button class="btn red_btn save_btn">Save</button>
                        </div>                    
                    </div>
                    <div>
                        <div class="pink_bar1">Service selection</div>
                        <div class="form-group form-check service_check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <span> Service1</span>
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <span> Service1</span>
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <span> Service1</span>
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <span> Service1</span>
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <span> Service1</span>
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <span> Service1</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="pink_bar1">About me</div>
                        <div id="widget">
                            <img src="images/format.png">
                        </div>
                        <button class="btn red_btn save_btn save_btn1">Add Video</button>
                        <button class="btn red_btn save_btn save_btn2">Save</button>
                    </div>
                    <div>
                        <div class="pink_bar1">Photo Gallery</div>
                        <div class="upload_btn"><button class="btn red_btn save_btn">Upload</button></div>
                        <div class="upload_photo">
                            <div class="upload_photo_div">
                                <img class="shadow" src="images/pre_profile_c.png">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div>
                            <div class="upload_photo_div">
                                <img class="shadow" src="images/pre_profile_c.png">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                                <img class="upload_ribbon" src="images/lock1.png">
                            </div>
                            <div class="upload_photo_div">
                                <img class="shadow" src="images/pre_profile_c.png">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div>
                            <div class="upload_photo_div">
                                <img class="shadow" src="images/pre_profile_c.png">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div>
                            <div class="upload_photo_div">
                                <img class="shadow" src="images/pre_profile_c.png">
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <span> LOCK</span>
                                    </label>
                                    <a href="#">DELET</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat_body">
                    <div class="pink_bar">Comments</div>
                    <div class="pink_bar pink_bar_btm">
                        <div>Comments (10)</div>
                        <span>Complaints (0)</span>
                    </div>
                    <div class="chat_window">
                        <p>
                            <img class="contact_img" src="images/person1.png">
                            <span class="contact_messagebox">Anonomus User1
                                <br>
                                <span class="chatting_time">10-05-19 05:30PM</span>
                                <br>
                                <span class="chatting_text">This is My Comment for this profile This is for long Comments.</span>
                                <img class="chat_smile" src="images/love.png">
                                <img class="chat_smile" src="images/love.png">
                                <img class="chat_smile" src="images/love.png">
                                <span class="chatting_reply">Replies(0)</span>
                            </span>
                            <br>
                        </p>

                        <p>
                            <img class="contact_img" src="images/person2.png">
                            <span class="contact_messagebox">Anonomus User1
                                <br>
                                <span class="chatting_time">10-05-19 05:30PM</span>
                                <br>
                                <span class="chatting_text">This is My Comment for this Profile.</span>
                                <img class="chat_smile" src="images/tongue.png">
                                <span class="chatting_reply">Replies(1)</span>
                            </span>
                            <br>
                        </p>

                        <p class="chat_window_p3">
                            <img class="contact_img" src="images/person3.png">
                            <span class="contact_messagebox">Anonomus User1
                                <br>
                                <span class="chatting_time">10-05-19 05:30PM</span>
                                <br>
                                <span class="chatting_text">This is My Comment for this Profile.</span>
                            </span>
                        </p>

                        <div>
                            <img class="contact_img" src="images/person4.png">
                            <span class="nick_name">Nick Name</span>                            
                            <input type="text">
                            <br>
                            <textarea></textarea>
                            <img class="smile_content" src="images/imerticon.png">
                        </div>
                    </div>
                    <button class="chat_body_btn">Submit</button>
                </div>
            </div>
        </div>
    </div>


@endsection
<!-- <style type="text/css">
    a
    {
        color: white!important;
    }
</style> -->