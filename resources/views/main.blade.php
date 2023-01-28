<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Zeus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpeg') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"
        integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"
        integrity="sha512-+/4Q+xH9jXbMNJzNt2eMrYv/Zs2rzr4Bu2thfvzlshZBvH1g+VGP55W8b6xfku0c0KknE7qlbBPhDPrHFbgK4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- C3 Chart css -->
    <link href="{{ asset('assets/libs/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <!-- App css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bootstrap-stylesheet" />
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- C3 Chart css -->
    <link href="assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    .form1 {
        width: 100%;
        left: 0;
        background: url('../assets/images/fati.png');
    }

    label {
        font-weight: 600;
    }

    */ #map {
        height: 100%;
    }
</style>

<body>
    <div id="wrapper">
        @include('sweetalert::alert')
        @include('sections.topbar')
        @include('sections.sidebar')
        @yield('content')

        <div class="links-mobile-main">
            <ul class="side-mobile-links">
                <li>
                    <a href="/">
                        <svg width="20" height="20" viewBox="0 0 24 27" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M14.2386 3.46404C12.9876 2.26362 11.0124 2.26362 9.76139 3.46404L3.11313 9.84343C2.95024 9.99973 2.84067 10.2033 2.79995 10.4254C2.00366 14.7678 1.94488 19.2134 2.62609 23.5754L2.78778 24.6108H7.06499V15.685C7.06499 15.0898 7.54752 14.6073 8.14275 14.6073H15.8572C16.4525 14.6073 16.935 15.0898 16.935 15.685V24.6108H21.2122L21.3739 23.5754C22.0551 19.2134 21.9963 14.7678 21.2 10.4254C21.1593 10.2033 21.0498 9.99973 20.8869 9.84343L14.2386 3.46404ZM8.26898 1.90873C10.354 -0.0919731 13.646 -0.0919731 15.731 1.90873L22.3793 8.28812C22.8687 8.75773 23.1979 9.36945 23.3202 10.0366C24.1602 14.6173 24.2222 19.3067 23.5036 23.908L23.2439 25.5713C23.1364 26.2592 22.544 26.7663 21.8478 26.7663H15.8572C15.262 26.7663 14.7795 26.2838 14.7795 25.6885V16.7628H9.22051V25.6885C9.22051 26.2838 8.73798 26.7663 8.14275 26.7663H2.15223C1.45602 26.7663 0.86356 26.2592 0.756136 25.5713L0.496378 23.908C-0.222198 19.3067 -0.160195 14.6173 0.679783 10.0366C0.80212 9.36945 1.13132 8.75773 1.62072 8.28812L8.26898 1.90873Z"
                                fill="#FF6600" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="/user-management">
                        <svg width="20" height="20" viewBox="0 0 28 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.94727 6.0074C4.94727 2.68961 7.63688 0 10.9547 0C14.2725 0 16.9621 2.68961 16.9621 6.0074C16.9621 9.3252 14.2725 12.0148 10.9547 12.0148C7.63688 12.0148 4.94727 9.3252 4.94727 6.0074ZM10.9547 2.12026C8.80786 2.12026 7.06753 3.86059 7.06753 6.0074C7.06753 8.15421 8.80786 9.89454 10.9547 9.89454C13.1015 9.89454 14.8418 8.15421 14.8418 6.0074C14.8418 3.86059 13.1015 2.12026 10.9547 2.12026Z"
                                fill="#FF6600" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M0 19.4357C0 16.5082 2.37318 14.1351 5.30065 14.1351H5.78247C6.04325 14.1351 6.30239 14.1763 6.55029 14.2572L7.7737 14.6567C9.84065 15.3316 12.0687 15.3316 14.1356 14.6567L15.3591 14.2572C15.607 14.1763 15.8661 14.1351 16.1269 14.1351H16.6087C19.5362 14.1351 21.9093 16.5082 21.9093 19.4357V21.1154C21.9093 22.1801 21.1377 23.0879 20.087 23.2594C14.0388 24.2469 7.87054 24.2469 1.82239 23.2594C0.77161 23.0879 0 22.18 0 21.1154V19.4357ZM5.30065 16.2553C3.54417 16.2553 2.12026 17.6792 2.12026 19.4357V21.1154C2.12026 21.1409 2.13879 21.1627 2.16404 21.1669C7.98592 22.1174 13.9234 22.1174 19.7453 21.1669C19.7706 21.1627 19.7891 21.1409 19.7891 21.1154V19.4357C19.7891 17.6792 18.3652 16.2553 16.6087 16.2553H16.1269C16.0896 16.2553 16.0526 16.2612 16.0172 16.2728L14.7938 16.6723C12.2992 17.4868 9.61016 17.4868 7.11557 16.6723L5.89216 16.2728C5.85674 16.2612 5.81972 16.2553 5.78247 16.2553H5.30065Z"
                                fill="#FF6600" />
                            <path
                                d="M22.9695 4.24052C23.555 4.24052 24.0296 4.71515 24.0296 5.30065V7.77428H26.5032C27.0887 7.77428 27.5634 8.24892 27.5634 8.83441C27.5634 9.41991 27.0887 9.89454 26.5032 9.89454H24.0296V12.3682C24.0296 12.9537 23.555 13.4283 22.9695 13.4283C22.384 13.4283 21.9093 12.9537 21.9093 12.3682V9.89454H19.4357C18.8502 9.89454 18.3756 9.41991 18.3756 8.83441C18.3756 8.24892 18.8502 7.77428 19.4357 7.77428H21.9093V5.30065C21.9093 4.71515 22.384 4.24052 22.9695 4.24052Z"
                                fill="#FF6600" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/vehicle-management">
                        <svg width="20" height="20" viewBox="0 0 30 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 10H29" stroke="#FF6600" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M27 17V21C27 21.2652 26.8946 21.5196 26.7071 21.7071C26.5196 21.8946 26.2652 22 26 22H23C22.7348 22 22.4804 21.8946 22.2929 21.7071C22.1054 21.5196 22 21.2652 22 21V17"
                                stroke="#FF6600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M8 17V21C8 21.2652 7.89464 21.5196 7.70711 21.7071C7.51957 21.8946 7.26522 22 7 22H4C3.73478 22 3.48043 21.8946 3.29289 21.7071C3.10536 21.5196 3 21.2652 3 21V17"
                                stroke="#FF6600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M27 10L23.2639 1.59386C23.1854 1.4171 23.0572 1.26691 22.895 1.16151C22.7328 1.0561 22.5436 1 22.3501 1H7.64987C7.45644 1 7.26716 1.0561 7.10496 1.16151C6.94277 1.26691 6.81463 1.4171 6.73606 1.59386L3 10V17H27V10Z"
                                stroke="#FF6600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/finance-office">
                        <svg width="20" height="20" viewBox="0 0 27 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.0984 11.2718C17.0984 10.2213 17.95 9.36975 19.0005 9.36975C20.0509 9.36975 20.9025 10.2213 20.9025 11.2718C20.9025 12.3223 20.0509 13.1738 19.0005 13.1738C17.95 13.1738 17.0984 12.3223 17.0984 11.2718Z"
                                fill="#FF5500" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.3642 4.51828C22.5301 2.55832 20.6872 1.14938 18.4941 0.918601L17.6675 0.831619C13.4927 0.392305 9.28193 0.421275 5.1136 0.917989L4.56589 0.983257C2.4498 1.23542 0.773139 2.88869 0.491285 5.00103C-0.0640708 9.16311 -0.0640709 13.3805 0.491285 17.5426C0.773139 19.6549 2.4498 21.3082 4.56589 21.5604L5.1136 21.6256C9.28194 22.1224 13.4927 22.1513 17.6675 21.712L18.4941 21.625C20.6872 21.3943 22.5301 19.9853 23.3642 18.0253C24.682 17.633 25.6878 16.4905 25.8529 15.0789C26.1487 12.5495 26.1487 9.99416 25.8529 7.46471C25.6878 6.0531 24.682 4.91064 23.3642 4.51828ZM17.4685 2.72322C13.4347 2.29875 9.36617 2.32674 5.33866 2.80668L4.79095 2.87194C3.5371 3.02136 2.54363 4.00097 2.37663 5.25259C1.84355 9.24771 1.84355 13.2959 2.37663 17.291C2.54363 18.5427 3.5371 19.5223 4.79095 19.6717L5.33867 19.737C9.36618 20.2169 13.4347 20.2449 17.4685 19.8204L18.295 19.7334C19.3736 19.6199 20.3279 19.0883 20.9892 18.2992C19.0768 18.4107 17.1389 18.3609 15.2493 18.1497C13.6397 17.9698 12.338 16.7023 12.1481 15.0789C11.8522 12.5495 11.8522 9.99416 12.1481 7.46471C12.338 5.84129 13.6397 4.57384 15.2493 4.39395C17.1389 4.18276 19.0768 4.13292 20.9891 4.24444C20.3279 3.45532 19.3736 2.9237 18.295 2.81021L17.4685 2.72322ZM21.8883 6.21832C21.889 6.22318 21.8898 6.22805 21.8906 6.23292L21.8982 6.28223L22.1501 6.24311C22.2804 6.25601 22.4105 6.26972 22.5404 6.28423C23.2853 6.36748 23.8784 6.95603 23.9637 7.68566C24.2424 10.0683 24.2424 12.4753 23.9637 14.858C23.8784 15.5876 23.2853 16.1761 22.5404 16.2594C22.4105 16.2739 22.2804 16.2876 22.1501 16.3005L21.8982 16.2614L21.8906 16.3107C21.8898 16.3156 21.889 16.3204 21.8883 16.3253C19.7597 16.5179 17.5767 16.4959 15.4606 16.2594C14.7157 16.1761 14.1226 15.5876 14.0373 14.858C13.7586 12.4753 13.7586 10.0683 14.0373 7.68566C14.1226 6.95603 14.7157 6.36748 15.4606 6.28423C17.5767 6.04772 19.7597 6.02575 21.8883 6.21832Z"
                                fill="#FF5500" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/task-management">
                        <svg width="20" height="20" viewBox="0 0 26 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.42071 16.1814C6.41037 16.6113 6.69401 16.9931 7.10863 17.1073C7.52325 17.2216 7.9624 17.0389 8.1737 16.6643L9.30107 14.6658C10.6381 12.2957 13.2996 10.9972 15.9906 11.4022L16.1771 11.4303C16.2107 12.2772 16.2583 13.1237 16.3199 13.9695L16.4047 15.1323C16.4736 16.0779 17.528 16.6065 18.3269 16.096C20.9479 14.4213 23.2263 12.2633 25.0409 9.73727L25.6108 8.94395C25.8455 8.61726 25.8455 8.17722 25.6108 7.85053L25.0409 7.05721C23.2263 4.53113 20.9479 2.37323 18.3269 0.698523C17.528 0.188021 16.4736 0.716624 16.4047 1.66223L16.3199 2.82501C16.2702 3.50687 16.2297 4.18922 16.1982 4.87189L14.926 4.87189C10.3472 4.87189 6.60478 8.5254 6.49472 13.1029L6.42071 16.1814ZM16.2695 9.54888C13.2467 9.09393 10.2528 10.3109 8.39823 12.6579C8.7251 9.33043 11.5297 6.74606 14.926 6.74606L17.0985 6.74606C17.6035 6.74606 18.0177 6.34579 18.035 5.84101C18.0678 4.88044 18.1192 3.92035 18.1891 2.96126L18.1959 2.86823C20.2493 4.31967 22.0489 6.10436 23.5188 8.15063L23.6959 8.39724L23.5188 8.64385C22.0489 10.6901 20.2493 12.4748 18.1959 13.9262L18.1891 13.8332C18.1105 12.7538 18.0552 11.6732 18.0235 10.592C18.0102 10.1389 17.6745 9.76034 17.2263 9.69288L16.2695 9.54888Z"
                                fill="#FF6600" />
                            <path
                                d="M21.9027 19.1308C22.0501 17.871 22.1541 16.6074 22.2148 15.3422C22.2213 15.2052 22.2834 15.0769 22.3862 14.9862C22.8402 14.5854 23.2801 14.1689 23.7051 13.7376C23.865 13.5753 24.1443 13.6888 24.1394 13.9165C24.1004 15.7306 23.9753 17.5433 23.7642 19.3485C23.4686 21.8756 21.4391 23.856 18.9252 24.1369C14.5939 24.621 10.1167 24.621 5.78541 24.1369C3.27145 23.856 1.24194 21.8756 0.946379 19.3485C0.428437 14.9201 0.428437 10.4465 0.946379 6.01805C1.24194 3.49101 3.27145 1.51063 5.78541 1.22966C8.64785 0.909738 11.574 0.801245 14.4797 0.90418C14.7243 0.912846 14.8927 1.15234 14.8622 1.39522C14.8559 1.44581 14.8508 1.49697 14.847 1.54868L14.783 2.42806C14.7682 2.62996 14.5959 2.78357 14.3936 2.77648C11.586 2.67797 8.75835 2.78322 5.99358 3.09223C4.33168 3.27797 3.00041 4.5894 2.80786 6.23577C2.30683 10.5195 2.30683 14.8471 2.80786 19.1308C3.00041 20.7772 4.33168 22.0886 5.99358 22.2744C10.1865 22.743 14.5241 22.743 18.717 22.2744C20.3789 22.0886 21.7102 20.7772 21.9027 19.1308Z"
                                fill="#FF6600" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/report-module">
                        <svg width="20" height="20" viewBox="0 0 24 31" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.8065 16.6452C17.8065 16.0038 17.2865 15.4839 16.6452 15.4839H7.35484C6.71348 15.4839 6.19355 16.0038 6.19355 16.6452C6.19355 17.2865 6.71348 17.8065 7.35484 17.8065H16.6452C17.2865 17.8065 17.8065 17.2865 17.8065 16.6452Z"
                                fill="#FF6600" />
                            <path
                                d="M17.8065 22.8387C17.8065 22.1973 17.2865 21.6774 16.6452 21.6774H7.35484C6.71348 21.6774 6.19355 22.1973 6.19355 22.8387C6.19355 23.4801 6.71348 24 7.35484 24H16.6452C17.2865 24 17.8065 23.4801 17.8065 22.8387Z"
                                fill="#FF6600" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.25806 0C1.9064 0 0 1.9064 0 4.25806V25.9355C0 28.2871 1.9064 30.1935 4.25806 30.1935H19.7419C22.0936 30.1935 24 28.2871 24 25.9355V8.85315C24 8.26357 23.8077 7.69007 23.4523 7.21966L18.8106 1.07619C18.2984 0.398397 17.4981 0 16.6486 0H4.25806ZM2.32258 4.25806C2.32258 3.18913 3.18913 2.32258 4.25806 2.32258H15.4839V9.13091C15.4839 9.77227 16.0038 10.2922 16.6452 10.2922H21.6774V25.9355C21.6774 27.0044 20.8109 27.871 19.7419 27.871H4.25806C3.18913 27.871 2.32258 27.0044 2.32258 25.9355V4.25806Z"
                                fill="#FF6600" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/activity-log">
                        <svg width="20" height="20" viewBox="0 0 27 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.28724 7.80905C6.22813 7.80905 5.36955 8.66763 5.36955 9.72674C5.36955 10.7859 6.22813 11.6444 7.28724 11.6444C8.34636 11.6444 9.20494 10.7859 9.20494 9.72674C9.20494 8.66763 8.34636 7.80905 7.28724 7.80905Z"
                                fill="#FF6600" />
                            <path
                                d="M13.4239 7.80905C12.3648 7.80905 11.5062 8.66763 11.5062 9.72674C11.5062 10.7859 12.3648 11.6444 13.4239 11.6444C14.483 11.6444 15.3416 10.7859 15.3416 9.72674C15.3416 8.66763 14.483 7.80905 13.4239 7.80905Z"
                                fill="#FF6600" />
                            <path
                                d="M17.6428 9.72674C17.6428 8.66763 18.5014 7.80905 19.5605 7.80905C20.6196 7.80905 21.4782 8.66763 21.4782 9.72674C21.4782 10.7859 20.6196 11.6444 19.5605 11.6444C18.5014 11.6444 17.6428 10.7859 17.6428 9.72674Z"
                                fill="#FF6600" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M19.715 0.280623C15.5817 -0.0718639 11.4268 -0.0923201 7.29022 0.219452L6.99377 0.241795C3.04899 0.539111 0 3.82655 0 7.78252V20.8494C0 21.2542 0.212735 21.6292 0.560195 21.837C0.907655 22.0447 1.33871 22.0545 1.6953 21.8629L7.69507 18.6386C7.97415 18.4886 8.28604 18.4101 8.60287 18.4101H22.3741C24.1109 18.4101 25.5993 17.1683 25.9106 15.4597C26.5416 11.9967 26.5914 8.45287 26.0581 4.97354L25.901 3.94823C25.6148 2.08154 24.0877 0.653528 22.2061 0.493061L19.715 0.280623ZM7.46317 2.51418C11.4771 2.21165 15.5088 2.2315 19.5195 2.57353L22.0105 2.78597C22.8334 2.85614 23.5012 3.48061 23.6263 4.29689L23.7835 5.32221C24.2781 8.54898 24.2318 11.8356 23.6467 15.0472C23.5346 15.662 22.9991 16.1088 22.3741 16.1088H8.60287C7.90585 16.1088 7.21968 16.2815 6.6057 16.6115L2.30123 18.9248V7.78252C2.30123 5.03039 4.42238 2.74336 7.16673 2.53652L7.46317 2.51418Z"
                                fill="#FF6600" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/admin">
                        <svg width="20" height="20" viewBox="0 0 24 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.1775 0.123552C11.7134 -0.0411838 12.2866 -0.0411842 12.8225 0.123552L17.0215 1.4141C19.212 2.08737 21.2924 3.07723 23.1966 4.3523C24.6777 5.34402 23.9757 7.65427 22.1932 7.65427H1.80678C0.0243205 7.65427 -0.677718 5.34403 0.803365 4.3523C2.70758 3.07723 4.78796 2.08737 6.97852 1.4141L11.1775 0.123552ZM12.2028 2.13996C12.0707 2.09935 11.9294 2.09934 11.7972 2.13996L7.59827 3.43051C5.93766 3.9409 4.34662 4.65115 2.85982 5.54477H21.1402C19.6534 4.65115 18.0623 3.9409 16.4017 3.43051L12.2028 2.13996Z"
                                fill="#FF6600" />
                            <path
                                d="M1.10093 26.2882C1.10093 25.7057 1.57316 25.2334 2.15568 25.2334H21.8443C22.4269 25.2334 22.8991 25.7057 22.8991 26.2882C22.8991 26.8707 22.4269 27.3429 21.8443 27.3429H2.15568C1.57316 27.3429 1.10093 26.8707 1.10093 26.2882Z"
                                fill="#FF6600" />
                            <path
                                d="M3.91359 20.6628C3.91359 21.2454 4.38582 21.7176 4.96834 21.7176C5.55087 21.7176 6.02309 21.2454 6.02309 20.6628L6.02309 12.2249C6.02309 11.6423 5.55087 11.1701 4.96834 11.1701C4.38582 11.1701 3.91359 11.6423 3.91359 12.2249L3.91359 20.6628Z"
                                fill="#FF6600" />
                            <path
                                d="M12 21.7176C11.4175 21.7176 10.9453 21.2454 10.9453 20.6628L10.9453 12.2249C10.9453 11.6423 11.4175 11.1701 12 11.1701C12.5825 11.1701 13.0548 11.6423 13.0548 12.2249V20.6628C13.0548 21.2454 12.5825 21.7176 12 21.7176Z"
                                fill="#FF6600" />
                            <path
                                d="M17.9769 20.6628C17.9769 21.2454 18.4491 21.7176 19.0317 21.7176C19.6142 21.7176 20.0864 21.2454 20.0864 20.6628V12.2249C20.0864 11.6423 19.6142 11.1701 19.0317 11.1701C18.4491 11.1701 17.9769 11.6423 17.9769 12.2249V20.6628Z"
                                fill="#FF6600" />
                        </svg>

                    </a>
                </li>
                <li>
                    <a href="/control-panel">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.95873 2.11013C6.28905 1.92352 4.56068 1.92352 2.89101 2.11013C2.4853 2.15547 2.16534 2.47673 2.11971 2.8669C1.92032 4.57167 1.92032 6.29387 2.11971 7.99865C2.16534 8.38882 2.4853 8.71007 2.89101 8.75542C4.56068 8.94203 6.28905 8.94203 7.95873 8.75542C8.36444 8.71007 8.68439 8.38882 8.73003 7.99865C8.92941 6.29387 8.92941 4.57167 8.73003 2.8669C8.68439 2.47673 8.36444 2.15547 7.95873 2.11013ZM2.67217 0.152149C4.48729 -0.0507164 6.36245 -0.0507164 8.17756 0.152149C9.47898 0.297601 10.5329 1.32207 10.6869 2.63803C10.904 4.49486 10.904 6.37068 10.6869 8.22752C10.5329 9.54347 9.47898 10.5679 8.17756 10.7134C6.36245 10.9163 4.48729 10.9163 2.67217 10.7134C1.37076 10.5679 0.316793 9.54347 0.16288 8.22752C-0.0542934 6.37068 -0.0542934 4.49486 0.16288 2.63803C0.316793 1.32207 1.37076 0.297601 2.67217 0.152149Z"
                                fill="#FF6600" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.95873 15.2446C6.28905 15.058 4.56068 15.058 2.89101 15.2446C2.4853 15.2899 2.16534 15.6112 2.11971 16.0014C1.92032 17.7061 1.92032 19.4283 2.11971 21.1331C2.16534 21.5233 2.4853 21.8445 2.89101 21.8899C4.56068 22.0765 6.28905 22.0765 7.95873 21.8899C8.36444 21.8445 8.68439 21.5233 8.73003 21.1331C8.92941 19.4283 8.92941 17.7061 8.73003 16.0014C8.68439 15.6112 8.36444 15.2899 7.95873 15.2446ZM2.67217 13.2866C4.48729 13.0837 6.36245 13.0837 8.17756 13.2866C9.47898 13.4321 10.5329 14.4565 10.6869 15.7725C10.904 17.6293 10.904 19.5051 10.6869 21.362C10.5329 22.6779 9.47898 23.7024 8.17756 23.8479C6.36245 24.0507 4.48729 24.0507 2.67217 23.8479C1.37076 23.7024 0.316793 22.6779 0.16288 21.362C-0.0542934 19.5051 -0.0542934 17.6293 0.16288 15.7725C0.316793 14.4565 1.37076 13.4321 2.67217 13.2866Z"
                                fill="#FF6600" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.0932 2.11013C19.4235 1.92352 17.6951 1.92352 16.0255 2.11013C15.6198 2.15547 15.2998 2.47673 15.2542 2.8669C15.0548 4.57167 15.0548 6.29387 15.2542 7.99865C15.2998 8.38882 15.6198 8.71007 16.0255 8.75542C17.6951 8.94203 19.4235 8.94203 21.0932 8.75542C21.4989 8.71007 21.8188 8.38882 21.8645 7.99865C22.0639 6.29387 22.0639 4.57167 21.8645 2.8669C21.8188 2.47673 21.4989 2.15547 21.0932 2.11013ZM15.8066 0.152149C17.6217 -0.0507164 19.4969 -0.0507164 21.312 0.152149C22.6134 0.297601 23.6674 1.32207 23.8213 2.63803C24.0385 4.49486 24.0385 6.37068 23.8213 8.22752C23.6674 9.54347 22.6134 10.5679 21.312 10.7134C19.4969 10.9163 17.6217 10.9163 15.8066 10.7134C14.5052 10.5679 13.4512 9.54347 13.2973 8.22752C13.0802 6.37068 13.0802 4.49486 13.2973 2.63803C13.4512 1.32207 14.5052 0.297601 15.8066 0.152149Z"
                                fill="#FF6600" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.0932 15.2446C19.4235 15.058 17.6951 15.058 16.0255 15.2446C15.6198 15.2899 15.2998 15.6112 15.2542 16.0014C15.0548 17.7061 15.0548 19.4283 15.2542 21.1331C15.2998 21.5233 15.6198 21.8445 16.0255 21.8899C17.6951 22.0765 19.4235 22.0765 21.0932 21.8899C21.4989 21.8445 21.8188 21.5233 21.8645 21.1331C22.0639 19.4283 22.0639 17.7061 21.8645 16.0014C21.8188 15.6112 21.4989 15.2899 21.0932 15.2446ZM15.8066 13.2866C17.6217 13.0837 19.4969 13.0837 21.312 13.2866C22.6134 13.4321 23.6674 14.4565 23.8213 15.7725C24.0385 17.6293 24.0385 19.5051 23.8213 21.362C23.6674 22.6779 22.6134 23.7024 21.312 23.8479C19.4969 24.0507 17.6217 24.0507 15.8066 23.8479C14.5052 23.7024 13.4512 22.6779 13.2973 21.362C13.0802 19.5051 13.0802 17.6293 13.2973 15.7725C13.4512 14.4565 14.5052 13.4321 15.8066 13.2866Z"
                                fill="#FF6600" />
                        </svg>

                    </a>
                </li>
            </ul>
            <div class="links-mobile">
                <i class='bx bx-plus'></i>
            </div>
        </div>
    </div>
</body>

</html>


<script src="{{ asset('assets/js/zeus.js') }}"></script>
<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>

<!--C3 Chart-->
<script src="{{ asset('assets/libs/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/libs/c3/c3.min.js') }}"></script>

<script src="{{ asset('assets/libs/echarts/echarts.min.js') }}"></script>

<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Buttons examples -->
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.colVis.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#tableWorkshop').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            // paging: false,
            // ordering: false,
            // info: false,
        });
    });
</script>


<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
<!--C3 Chart-->
<script src="{{ asset('assets/libs/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/libs/c3/c3.min.js') }}"></script>

<!-- Init js -->
<script src="assets/js/pages/c3.init.js"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/chartjs.init.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>
<script>
    let linksMobile = document.querySelector('.links-mobile');
    let linksItemMobile = document.querySelector('.side-mobile-links');
    linksMobile.addEventListener('click', () => {
        linksItemMobile.classList.toggle('reveal-side-mobile');
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.users').select2({
            placeholder: 'Select an option'
        });
        $('.body').select2({
            placeholder: 'Select an option'
        });
        $('.vehicleOwner').select2({
            placeholder: 'Select an option'
        });
        $('.brands').select2({
            placeholder: 'Select an option'
        });
        $('.year').select2({
            placeholder: 'Select an option'
        });
        $('.transmission').select2({
            placeholder: 'Select an option'
        });
        $('.package').select2({
            placeholder: 'Select an option'
        });
        $('.fleet').select2({
            placeholder: 'Select an option'
        });
        $('.serviceCenter').select2({
            placeholder: 'Select an option'
        });
        $('.colors').select2({
            placeholder: 'Select an option'
        });

    });
    

    $('.mymodalselect').select2({
        dropdownParent: $('#assign')
    });

</script>
<script>
    $('#requestPayment').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var reference = button.data('reference') // Extract info from data-* attributes
        var payee = button.data('payee') // Extract info from data-* attributes
        var amount = button.data('amount') // Extract info from data-* attributes
        var package_name = button.data('package_name') // Extract info from data-* attributes
        var fleet = button.data('fleet') // Extract info from data-* attributes
        var workshop = button.data('workshop') // Extract info from data-* attributes
        var datez = button.data('datez') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        // console.log(reference)
        var modal = $(this)
        // modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.referencez').text(reference)
        modal.find('.payeez').text(payee)
        modal.find('.amount').text(amount)
        modal.find('.package_name').text(package_name)
        modal.find('.fleetz').text(fleet)
        modal.find('.datez').text(datez)
        modal.find('.workshop').text(workshop)
    })
</script>



@if (isset($single) && $single == 'all')
    <script>
        var app = <?php echo json_encode($cars3); ?>;
        const beaches = [
            @for ($i = 0; $i < count($cars3); $i++)
                [{!! "'Plate " . $cars[$i]->vehno . "'" !!}, {{ $cars[$i]->latitude }}, {{ $cars[$i]->longitude }}, <?php echo $i; ?>],
            @endfor
        ];

        // console.log(beaches);


        // The following example creates complex markers to indicate beaches near
        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
        // to the base of the flagpole.
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                zoomControl: true,
                center: {
                    lat: 9.0579,
                    lng: 7.4951
                },
            });

            setMarkers(map);
        }


        // console.log(app[0][1]);


        function setMarkers(map) {
            // Adds markers to the map.
            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.
            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            const image = "assets/images/mapIcon.png"

            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            const shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: "poly",
            };

            for (let i = 0; i < beaches.length; i++) {
                const beach = beaches[i];

                new google.maps.Marker({
                    position: {
                        lat: beach[1],
                        lng: beach[2]
                    },
                    map,
                    icon: image,
                    shape: shape,
                    title: beach[0],
                    zIndex: beach[3],
                });
            }
        }

        window.initMap = initMap;
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhGe6x_ij_ivUkQTmsXGIZVHegzig1JBk&callback=initMap&v=weekly"
        defer></script>
@endif

@if (isset($single) && $single == 'single')
    <script>
        var app = <?php echo json_encode($cars3); ?>;
        var lng = {{ $data['vehicleLocation']->Longitude }};
        var lat = {{ $data['vehicleLocation']->Latitude }};

        console.log(lat);
        // The following example creates complex markers to indicate beaches near
        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
        // to the base of the flagpole.
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                zoomControl: true,
                center: {
                    lat: lat,
                    lng: lng
                },
            });

            setMarkers(map);
        }



        // console.log(app[0][1]);
        const beaches = [
            [{!! "'Plate " . $cars[0]->vehno . "'" !!}, lat, lng, 4],



        ];

        function setMarkers(map) {
            // Adds markers to the map.
            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.
            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            const image = "https://zeus.motorafrica.co/assets/images/mapIcon.png"

            // Shapes define the clickable region of the icon. The type defines an HTML
            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
            // The final coordinate closes the poly by connecting to the first coordinate.
            const shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: "poly",
            };

            for (let i = 0; i < beaches.length; i++) {
                const beach = beaches[i];

                new google.maps.Marker({
                    position: {
                        lat: beach[1],
                        lng: beach[2]
                    },
                    map,
                    icon: image,
                    shape: shape,
                    title: beach[0],
                    zIndex: beach[3],
                });
            }
        }

        window.initMap = initMap;
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhGe6x_ij_ivUkQTmsXGIZVHegzig1JBk&callback=initMap&v=weekly" defer></script>
@endif
