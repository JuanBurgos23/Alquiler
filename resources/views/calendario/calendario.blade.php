<!-- resources/views/your-view.blade.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        body {
            position: relative;
            display: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: url('{{asset('cuartos/lgo/logo (2).png')}}') no-repeat center / cover;

            &::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                background: inherit;
                filter: blur(10px);
            }
        }

        .calendar {
            position: relative;
            width: 300px;
            background-color: #fff;
            box-sizing: border-box;
            box-shadow: 0 5px 50px rgba(#000, 0.5);
            border-radius: 8px;
            overflow: hidden;
        }

        .calendar__picture {
            position: relative;
            height: 200px;
            padding: 20px;
            color: #fff;
            background: #262626 url('{{asset('cuartos/lgo/logo (2).png')}}') no-repeat center / cover;
            text-shadow: 0 2px 2px rgba(#000, 0.2);
            box-sizing: border-box;

            &::before {
                content: "";
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                position: absolute;
                background: linear-gradient(to top, rgba(#000, 0.25), rgba(#000, 0.1));
            }

            h2 {
                margin: 0;
            }

            h3 {
                margin: 0;
                font-weight: 500;
            }
        }

        .calendar__date {
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(25px, 1fr));
            grid-gap: 10px;
            box-sizing: border-box;
        }

        .calendar__day {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 25px;
            font-weight: 600;
            color: #262626;

            &:nth-child(7) {
                color: #ff685d;
            }
        }

        .calendar__number {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 25px;
            color: #262626;

            &:nth-child(7n) {
                color: #ff685d;
                font-weight: 700;
            }

            &--current,
            &:hover {
                background-color: #009688;
                color: #fff !important;
                font-weight: 700;
                cursor: pointer;
            }
        }
    </style>
</head>
<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
            <!-- Navbar content -->
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="col-12">
                <div class="calendar">
                    <div class="calendar__picture">
                        <h2>18, Sunday</h2>
                        <h3>November</h3>
                    </div>
                    <div class="calendar__date">
                        <div class="calendar__day">M</div>
                        <div class="calendar__day">T</div>
                        <div class="calendar__day">W</div>
                        <div class="calendar__day">T</div>
                        <div class="calendar__day">F</div>
                        <div class="calendar__day">S</div>
                        <div class="calendar__day">S</div>
                        <div class="calendar__number"></div>
                        <div class="calendar__number"></div>
                        <div class="calendar__number"></div>
                        <div class="calendar__number">1</div>
                        <div class="calendar__number">2</div>
                        <div class="calendar__number">3</div>
                        <div class="calendar__number">4</div>
                        <div class="calendar__number">5</div>
                        <div class="calendar__number">6</div>
                        <div class="calendar__number">7</div>
                        <div class="calendar__number">8</div>
                        <div class="calendar__number">9</div>
                        <div class="calendar__number">10</div>
                        <div class="calendar__number">11</div>
                        <div class="calendar__number">12</div>
                        <div class="calendar__number">13</div>
                        <div class="calendar__number">14</div>
                        <div class="calendar__number">15</div>
                        <div class="calendar__number">16</div>
                        <div class="calendar__number">17</div>
                        <div class="calendar__number calendar__number--current">18</div>
                        <div class="calendar__number">19</div>
                        <div class="calendar__number">20</div>
                        <div class="calendar__number">21</div>
                        <div class="calendar__number">22</div>
                        <div class="calendar__number">23</div>
                        <div class="calendar__number">24</div>
                        <div class="calendar__number">25</div>
                        <div class="calendar__number">26</div>
                        <div class="calendar__number">27</div>
                        <div class="calendar__number">28</div>
                        <div class="calendar__number">29</div>
                        <div class="calendar__number">30</div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</x-layout>