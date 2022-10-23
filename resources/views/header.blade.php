<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<header id="header" class="fixed-top">
    <div class="container d-flex justify-content-evenly align-items-center">

        <!-- Navigation Bar Icon -->
        <h1 class="logo mr-auto">
            <a href="">
                CSPC - Merchandise
            </a>
        </h1>

        <!-- Navigation Bar Menu -->
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <li><a href="#" class="shop-now-btn scrollto">Shop Now</a></li>
    </div>

</header>


<style>
    #header {
        font-family: "Open sans", sans-serif;
        background-color: black;
        padding: 15px;
    }

    #header .logo {
        font-size: 28px;
        margin: 0;
        padding: 0;
        line-height: 1;
        font-weight: 700;
        text-transform: uppercase;
        color: white;
    }

    .nav-menu ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .nav-menu>ul {
        display: flex;
    }

    .nav-menu>ul>li {
        position: relative;
        white-space: nowrap;
        padding: 10px 0 10px 22px;
    }

    .nav-menu a {
        display: block;
        position: relative;
        color: rgba(255, 255, 255, 0.7);
        transition: 0.3s;
        font-size: 14px;
        font-weight: 500;
        font-family: "Roboto", sans-serif;
        padding: 0 4px;
        text-transform: uppercase;
    }

    a {
        color: white;
        text-decoration: none;
    }

    a:hover {
        color: rgb(100, 50, 255);
    }

    h1 {
        font-family: "Roboto", sans-serif;
    }

    .nav-menu>ul>li a::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -6px;
        left: 0;
        background-color: rgb(100, 50, 255);
        visibility: hidden;
        width: 0px;
        transition: all 0.3s ease-in-out
    }

    .nav-menu a:hover::before,
    .nav-menu li:hover>a::before,
    .nav-menu .active>a::before {
        visibility: visible;
        width: 100%;
    }

    .nav-menu a:hover,
    .nav-menu .active>a,
    .nav-menu li:hover>a {
        color: white;
    }

    .shop-now-btn {
        margin-left: 25px;
        color: white;
        border-radius: 4px;
        padding: 4px;
        padding: 6px 25px 8px 25px;
        white-space: nowrap;
        transition: 0.3s;
        font-size: 13px;
        display: inline-block;
        text-transform: uppercase;
        font-weight: 400;
        font-family: "Poppins", sans-serif;
        border: 2px solid rgb(100, 50, 255);
    }

    .shop-now-btn:hover {
        background: rgb(100, 50, 255);
        color: white;
    }
</style>