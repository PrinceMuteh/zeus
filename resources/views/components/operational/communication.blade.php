<div class="communication-sec">
    <style>
        @media screen and (max-width: 700px) {
            .vehicle-top-list {
                display: none;
                padding: 0
            }

            .top-row {
                position: relative;
            }

            .mobile-link-vehicle li {
                list-style: none;
                box-shadow: 0 0 5px #ccc;
                padding: 10px;
                margin-bottom: 10px;
                z-index: 100;
            }

            .mobile-link-vehicle {
                position: absolute;
                right: 5px;
                top: 55px;
            }
        }

        .message-links {
            display: flex;
            padding: 0;
            margin-left: 5px;
            margin-top: 10px;
            justify-content: space-between;
        }

        .message-links li {
            /* margin-right: 10px; */
            list-style: none;
        }

        .users-cat {
            cursor: pointer;
        }

        .active-message-link {
            color: #131313;
            font-weight: bold;
            font-size: 12px;
        }

        .message-search-input {
            width: 100%;
            height: 40px;
            background: #FAFAFA;
            border: 1px solid #CCCCCC;
            border-radius: 6px;
            padding: 0 10px;
        }

        .searchMsg {
            position: relative;
        }

        .search-message-icon {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .message-day {
            color: #6B7280;
            color: #6B7280;
            padding: 15px 0;
        }

        .main-user {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            width: 100%;
            height: auto;
            margin-bottom: 25px;
            position: relative;
        }

        .active-main-user {
            background: rgba(26, 24, 117, 0.05);

        }

        .divider-msg {
            position: absolute;
            display: block;
            content: "";
            bottom: 0;
            height: 1px;
            background: #CCCCCC;
            width: 100%;
            left: 0;
            transform: translateY(13px);
        }

        .user-message-image {
            height: 50px;
            width: 50px;
            border-radius: 100%;
        }

        .user-message-info {
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.01em;
            color: #131313;
            display: block;
        }

        .user-message-mail {
            font-size: 12px;
            color: #8F8F8F;
            display: block;
        }

        .message-title-100 {
            font-weight: 600;
            font-size: 14px;
            color: #131313;
            margin-top: 7px;
            display: block;
        }

        .message-text {
            font-weight: 400;
            font-size: 12px;
            color: #8F8F8F;
            display: block;
        }

        .time-message {
            font-size: 12px;
            color: #8F8F8F;
            display: block;
        }

        .message-count {
            width: 17px;
            height: 17px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #FF7D8F;
            border-radius: 100%;
            margin-top: 30px;
            color: #fff;
            font-size: 12px;
        }

        .user-message-image img {
            width: 100%;
            height: 100%;
            border-radius: 100%;

        }

        .message-date-sent {
            text-align: center;
            text-transform: capitalize;
            font-size: 12px;
            color: #1A1875;
            font-weight: bold;
        }

        .message-box-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            margin-bottom: 15px;
        }

        .message-box-right {
            display: flex;
            flex-direction: column;
            align-items: end;
            justify-content: flex-end;
            width: 100%;
            margin-bottom: 15px;
        }

        .message-left-100 {
            background: rgba(26, 24, 117, 0.05);
            border-radius: 2px 12px 12px 12px;
            padding: 10px;
            width: 80%;
        }

        .message-right-100 {
            background: rgba(121, 210, 222, 0.1);
            border-radius: 2px 12px 12px 12px;
            padding: 10px;
            width: 80%;
        }

        .message-region {
            width: 100%;
            max-height: 370px;
            overflow-y: scroll;
            padding: 30px 0;
        }

        .name-date-msg {
            font-weight: bold;
            text-transform: capitalize;
            margin: 7px 0;
            font-size: 12px;
        }

        .sendMsg {
            width: 100%;
            height: 40px;
            border: 1px solid #1A1875;
            border-radius: 20px;
            padding: 0 20px;
        }

        .input-send {
            position: relative;
        }

        .sendIcon {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 30px !important;
            color: #FF7D8F;
        }



        .main-operations {
            height: auto;
        }

        @media screen and (min-width: 1000px) {
            .main-operations {
                max-height: 87vh;
            }
        }


        .main-main-user {
            max-height: 50vh;
            overflow-y: scroll;
        }
    </style>


    <div class="row justify-content-center g-0 border-top-line">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="operation-data-section">
                <ul class="message-links">
                    <li class="active-message-link">NOTIFICATIONS</li>
                    <div class="dropdown dropstart">
                        <i class='bx bx-dots-vertical-rounded user-cat' data-bs-toggle="dropdown"
                            aria-expanded="false"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Driver</a></li>
                            <li><a class="dropdown-item" href="#">Investor</a></li>
                            <li><a class="dropdown-item" href="#">Sponsor</a></li>
                        </ul>
                    </div>
                </ul>
                <div class="searchMsg">
                    <input type="text" class="message-search-input">
                    <svg class="search-message-icon" width="19" height="19" viewBox="0 0 19 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.85039 9.00039C1.85039 5.05155 5.05155 1.85039 9.00039 1.85039C12.9492 1.85039 16.1504 5.05155 16.1504 9.00039C16.1504 12.9492 12.9492 16.1504 9.00039 16.1504C5.05155 16.1504 1.85039 12.9492 1.85039 9.00039ZM9.00039 0.150391C4.11267 0.150391 0.150391 4.11267 0.150391 9.00039C0.150391 13.8881 4.11267 17.8504 9.00039 17.8504C11.1382 17.8504 13.0989 17.0924 14.6285 15.8306L17.3994 18.6014C17.7313 18.9334 18.2695 18.9334 18.6014 18.6014C18.9334 18.2695 18.9334 17.7313 18.6014 17.3994L15.8306 14.6285C17.0924 13.0989 17.8504 11.1382 17.8504 9.00039C17.8504 4.11267 13.8881 0.150391 9.00039 0.150391Z"
                            fill="#1F2937" />
                    </svg>
                </div>
                <div class="message-day">Today</div>
             {{--   <div class="main-main-user">
                    <div class="main-user active-main-user">
                        <div class="row">
                            <div class="col-3">
                                <div class="user-message-image">
                                    <img src="{{ asset('assets/images/message-user-avatar.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <span class="user-message-info">John Doe / FCT Abuja</span>
                                <span class="user-message-mail">user@gmail.com</span>
                                <span class="message-title-100">Message Title</span>
                                <span class="message-text">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam,
                                    accusamus.
                                </span>
                            </div>
                            <div class="col-2">
                                <span class="time-message">
                                    now
                                </span>
                                <span class="message-count">2</span>
                            </div>
                        </div>
                        <div class="divider-msg"></div>
                    </div>
                    <div class="main-user">
                        <div class="row">
                            <div class="col-3">
                                <div class="user-message-image">
                                    <img src="{{ asset('assets/images/message-user-avatar.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <span class="user-message-info">John Doe / FCT Abuja</span>
                                <span class="user-message-mail">user@gmail.com</span>
                                <span class="message-title-100">Message Title</span>
                                <span class="message-text">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam,
                                    accusamus.
                                </span>
                            </div>
                            <div class="col-2">
                                <span class="time-message">
                                    now
                                </span>
                                <span class="message-count">2</span>
                            </div>
                        </div>
                        <div class="divider-msg"></div>
                    </div>
                    <div class="main-user">
                        <div class="row">
                            <div class="col-3">
                                <div class="user-message-image">
                                    <img src="{{ asset('assets/images/message-user-avatar.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-7">
                                <span class="user-message-info">John Doe / FCT Abuja</span>
                                <span class="user-message-mail">user@gmail.com</span>
                                <span class="message-title-100">Message Title</span>
                                <span class="message-text">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam,
                                    accusamus.
                                </span>
                            </div>
                            <div class="col-2">
                                <span class="time-message">
                                    now
                                </span>
                                <span class="message-count">2</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-8">
            <div class="operation-data-section">
                {{--
                <div class="row">
                    <div class="col-md-12 col-lg-6 mb-3">
                        <div class="row p-3">
                            <div class="col-3">
                                <div class="user-message-image">
                                    <img src="{{ asset('assets/images/message-user-avatar.png') }}"
                                        style="width: 70px; height: 70px;" alt="">
                                </div>
                            </div>
                            <div class="col-7 offset-1">
                                <span class="user-message-info">John Doe / FCT Abuja</span>
                                <span class="user-message-mail">user@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 p-3">
                        <div class="searchMsg">
                            <input type="text" class="message-search-input">
                            <svg class="search-message-icon" width="19" height="19" viewBox="0 0 19 19"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.85039 9.00039C1.85039 5.05155 5.05155 1.85039 9.00039 1.85039C12.9492 1.85039 16.1504 5.05155 16.1504 9.00039C16.1504 12.9492 12.9492 16.1504 9.00039 16.1504C5.05155 16.1504 1.85039 12.9492 1.85039 9.00039ZM9.00039 0.150391C4.11267 0.150391 0.150391 4.11267 0.150391 9.00039C0.150391 13.8881 4.11267 17.8504 9.00039 17.8504C11.1382 17.8504 13.0989 17.0924 14.6285 15.8306L17.3994 18.6014C17.7313 18.9334 18.2695 18.9334 18.6014 18.6014C18.9334 18.2695 18.9334 17.7313 18.6014 17.3994L15.8306 14.6285C17.0924 13.0989 17.8504 11.1382 17.8504 9.00039C17.8504 4.11267 13.8881 0.150391 9.00039 0.150391Z"
                                    fill="#1F2937" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="message-region">
                    <div class="message-date-sent">Today Sept 23</div>
                    <div class="message-box-left">
                        <span class="name-date-msg">deen 12:30 PM</span>
                        <div class="message-left-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad eos
                            minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                        </div>
                    </div>
                    <div class="message-box-right">
                        <span class="name-date-msg">deen 12:30 PM</span>
                        <div class="message-right-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad eos
                            minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                        </div>
                    </div>

                    <div class="message-date-sent">Today Sept 23</div>
                    <div class="message-box-left">
                        <span class="name-date-msg">deen 12:30 PM</span>
                        <div class="message-left-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad eos
                            minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                        </div>
                    </div>
                    <div class="message-box-left">
                        <span class="name-date-msg">deen 12:30 PM</span>
                        <div class="message-left-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad eos
                            minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                        </div>
                    </div>
                    <div class="message-box-right">
                        <span class="name-date-msg">deen 12:30 PM</span>
                        <div class="message-right-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus ad eos
                            minima ipsa ullam explicabo, cum eaque mollitia. Officia.
                        </div>
                    </div>
                </div>
                <div class="input-send">
                    <input type="text" class="sendMsg">
                    <i class='bx bxs-right-arrow-circle sendIcon'></i>
                </div>
                --}}
                
            </div>

        </div>

    </div>
</div>
