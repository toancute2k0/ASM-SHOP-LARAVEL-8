<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bootstrap Site</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
            integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
            crossorigin="anonymous"
        />
        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        <style>
            @import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap");

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Poppins", sans-serif;
            }

            section {
                position: relative;
                min-height: 100vh;
                /* background-color: #f8dd30; */
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            section .container {
                position: relative;
                width: 900px;
                height: 700px;
                background: #fff;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            section .container .user {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                display: flex;
            }

            section .container .user .imgBx {
                position: relative;
                width: 50%;
                height: 100%;
                background: #ff0;
                transition: 0.5s;
            }

            section .container .user .imgBx img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            section .container .user .formBx {
                position: relative;
                width: 50%;
                height: 100%;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 40px;
                transition: 0.5s;
            }

            section .container .user .formBx form h2 {
                font-size: 18px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 2px;
                text-align: center;
                width: 100%;
                margin-bottom: 10px;
                color: #555;
            }

            section .container .user .formBx form .input-css {
                position: relative;
                width: 100%;
                padding: 10px;
                background: #f5f5f5;
                color: #333;
                border: none;
                outline: none;
                box-shadow: none;
                margin: 8px 0;
                font-size: 14px;
                letter-spacing: 1px;
                font-weight: 300;
            }

            section .container .user .formBx form input[type="submit"] {
                max-width: 100px;
                background: #677eff;
                color: #fff;
                cursor: pointer;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 1px;
                transition: 0.5s;
            }

            section .container .user .formBx form .signup {
                position: relative;
                margin-top: 20px;
                font-size: 12px;
                letter-spacing: 1px;
                color: #555;
                text-transform: uppercase;
                font-weight: 300;
            }

            section .container .user .formBx form .signup a {
                font-weight: 600;
                text-decoration: none;
                color: #677eff;
            }
            .form-text {
                color: red !important;
            }

            @media (max-width: 991px) {
                section .container {
                    max-width: 400px;
                }

                section .container .imgBx {
                    display: none;
                }

                section .container .user .formBx {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <body>
            <section>
                <div class="container">
                    <div class="user signupBx">
                        <div class="formBx">
                            <form action="{{url('/register')}}" method="post" role="form"> @csrf
                                <h2>Đăng kí tài khoản</h2>
                                <input
                                    class="input-css"
                                    type="text"
                                    name="name"
                                    placeholder="Họ và Tên"
                                />
                                @error('name')
                                    <small id="fileHelpId" class="form-text text-muted ml-2">{{$message}}</small>
                                @enderror
                                <input
                                    class="input-css"
                                    type="email"
                                    name="email"
                                    placeholder="Email"
                                />
                                @error('email')
                                    <small id="fileHelpId" class="form-text text-muted ml-2">{{$message}}</small>
                                @enderror
                                <input
                                    class="input-css"
                                    type="password"
                                    name="password"
                                    placeholder="Mật Khẩu"
                                />
                                @error('password')
                                    <small id="fileHelpId" class="form-text text-muted ml-2">{{$message}}</small>
                                @enderror
                                <input
                                    class="input-css"
                                    type="password"
                                    name="confirm_password"
                                    placeholder="Xác nhận mật khẩu"
                                />
                                @error('confirm_password')
                                    <small id="fileHelpId" class="form-text text-muted ml-2">{{$message}}</small>
                                @enderror
                                <input
                                    class="input-css"
                                    type="text"
                                    name="address"
                                    placeholder="Địa chỉ"
                                />
                                @error('address')
                                    <small id="fileHelpId" class="form-text text-muted ml-2">{{$message}}</small>
                                @enderror
                                <input
                                    class="input-css"
                                    type="number"
                                    name="phone"
                                    placeholder="Số điện thoại"
                                />
                                @error('phone')
                                    <small id="fileHelpId" class="form-text text-muted ml-2">{{$message}}</small>
                                @enderror
                                <br />
                                <input
                                    class="input-css"
                                    type="submit"
                                    name=""
                                    value="Đăng Kí"
                                />
                                <p class="signup">
                                    Nếu bạn đã có tài khoản ?
                                    <a href="{{url('/login')}}"
                                        >Đăng nhập</a
                                    >
                                </p>
                            </form>
                        </div>
                        <div class="imgBx">
                            <img
                                src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </section>
        </body>
    </body>
</html>
<script>
    var sucs = '{{Session::get('success')}}';
    var exist = '{{Session::has('success')}}';
    var ero = '{{Session::get('error')}}';
    var exist_erro = '{{Session::has('error')}}';
    if(exist){
        alertify.set('notifier','position', 'top-right');
        alertify.success(sucs);
    }
    if(exist_erro){
        alertify.set('notifier','position', 'top-right');
        alertify.success(ero);
    }
</script>