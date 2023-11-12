@extends('layouts.admin')

@section('css')
    <style>


        #codilo_watermark {
            text-decoration: none;
            position: fixed;
            bottom: 25px;
            left: 25px;
            background: linear-gradient(-120deg, #a70707, #be0c0c, #d62121, #c72c2c);
            background-size: 300% 100%;
            -moz-transition: all 0.1s ease-in-out;
            -o-transition: all 0.1s ease-in-out;
            -webkit-transition: all 0.1s ease-in-out;
            transition: all 0.1s ease-in-out;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            max-width: 500px;
            padding: 12px 50px;
            box-shadow: 1px 7px 14px -5px rgba(0, 0, 0, 0.2);
            z-index: 10000;
            transition: all 0.5s linear;
            font-weight: bold;
        }

        #codilo_watermark:hover {
            background-position: 100% 0;
        }

        /*tyle.css*/
        * {
            cursor: pointer;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /*body {*/
        /*display: flex;*/
        /*justify-content: center;*/
        /*align-items: center;*/
        /*min-height: 100vh;*/
        /*background: #36454F;*/
        /*}*/

        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 100px 50px;
            padding: 100px 50px;
        }

        .container .card {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 25%;
            max-width: 50%;
            height: 250px;
            background: white;
            border-radius: 20px;
            transition: 0.5s;
            box-shadow: 0 35px 80px rgba(0, 0, 0, 0.15);
        }

        .container .card:hover {
            height: 20rem;
        }

        .container .card .img-box {
            position: absolute;
            top: 20px;
            left: 1rem;
            width: 80%;
            height: 100px;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.5s;
        }

        .container .card:hover .img-box {
            top: 0;
            scale: 0.75;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
        }

        .container .card .img-box img {
            position: absolute;
            top: 0;
            left: 3.5rem;
            width: 45%;
            height: 100%;
            object-fit: cover;
        }



        .container .card .content {
            position: absolute;
            top: 80%;
            width: 100%;
            height: 35px;
            padding: 0 30px;
            text-align: center;
            overflow: hidden;
            transition: 0.5s;
        }

        .container .card:hover .content {
            top: 130px;
            height: 250px;
        }

        .container .card .content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--clr);
        }

        .container .card .content p {
            color: #333;
            font-size: 14px;
        }

        .container .card .content a {
            border-radius: 10px;
            position: relative;
            top: 15px;
            margin-bottom: 1rem;
            display: inline-block;
            padding: 12px 25px;
            text-decoration: none;
            background: var(--clr);
            color: white;
            font-weight: 500;
        }

        .container .card .content a:hover {
            opacity: 0.8;
        }

        @media (max-width: 480px) {
            .container .card {
                width: 20%;
                border-radius: 15px;
            }

            .container .card .img-box {
                width: 185px;
                border-radius: 10px;
            }

            .container .card .content p {
                font-size: 0.8rem;
            }

            .container .card .content a {
                font-size: 0.9rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card" style="--clr: #009688">
            <div class="img-box">
                <span style="    left: 9px;    padding: 3px 6px; background: #009688FF; color: ivory; border-radius: 100px;   position: absolute;    top: 0px;">{{$books}}</span>
                <img width="64" height="64"
                     src="https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/external-book-back-to-school-itim2101-lineal-color-itim2101.png"
                     alt="external-book-back-to-school-itim2101-lineal-color-itim2101"/>
            </div>
            <div class="content">
                <h2>Books</h2>
                <a href="{{route('book.index')}}">Books List</a>
                <a href="{{route('book.create')}}">Add Book</a>

            </div>
        </div>
        <div class="card" style="--clr: #FF3E7F">
            <div class="img-box">
                <span style="    left: 9px;    padding: 3px 6px; background: #FF3E7FFF; color: ivory; border-radius: 100px;   position: absolute;    top: 0px;">{{$users}}</span>
                <img width="64" height="64" src="https://img.icons8.com/arcade/64/group-background-selected.png"
                     alt="group-background-selected"/>
            </div>
            <div class="content">
                <h2>Members</h2>
                <a href="{{route('user.index')}}">Members List</a>
                <a href="{{route('user.create')}}">Add Member</a>

            </div>
        </div>
        <div class="card" style="--clr: #03A9F4">
            <div class="img-box">
                <span style="    left: 9px;    padding: 3px 6px; background:#03A9F4FF; color: ivory; border-radius: 100px;   position: absolute;    top: 0px;">{{$borrows}}</span>
                <img width="64" height="64" src="https://img.icons8.com/dusk/64/book.png" alt="book"/>
            </div>
            <div class="content">
                <h2>Borrows</h2>
                <a href="{{route('borrowList')}}">Borrowed Books</a>
                <a href="{{route('borrow')}}">Borrowing</a>


            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection

