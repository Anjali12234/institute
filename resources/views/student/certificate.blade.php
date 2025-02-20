@extends('frontend.layouts.master')

@section('content')
<x-breadcumb image="{{ asset('assets/frontend/img/breadcumb/breadcumb-bg.jpg') }}" heading="Certificate" />
<style>
    #printable-area {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
    }

    .certificate {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        border: 5px solid #007bff;
        border-radius: 10px;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .certificate .ribbon {
        position: absolute;
        top: 18px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
    }

    .certificate .ribbon img {
        width: 100px;
        height: auto;
    }

    .certificate .header {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 78px;
    }

    .certificate h1 {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .certificate h2 {
        font-size: 2.5rem;
        font-family: 'Brush Script MT', cursive;
        margin: 20px 0;
    }

    .certificate p {
        text-align: center;
        line-height: 1.6;
        margin: 10px 0;
    }

    .certificate .footer {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        padding: 0 50px;
    }

    .certificate .footer span {
        font-weight: bold;
    }
</style>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="contact-box">
                    <h3 class="contact-box__title h4">Fill the form</h3>
                    <p class="contact-box__text">We’re Ready To Help You</p>

                    @if ($errors->any())
                        <div class="alert alert-danger text-red-500">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="contact-box__form" action="{{ route('certificateGenerate') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="registration_no" id="registration_no"
                                    placeholder="Registration No">
                                <i class="fal fa-location"></i>
                            </div>
                            <div class="col-12">
                                <button class="vs-btn" type="submit">Submit Message<i
                                        class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                    {{-- <form class="contact-box__form" action="{{ route('certificateGenerate') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="registration_no" id="registration_no"
                                    placeholder="Registration No">
                                <i class="fal fa-location"></i>
                            </div>
                            <div class="col-12">
                                <button class="vs-btn" type="submit">Submit Message<i
                                        class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form> --}}



                </div>

            </div>
        </div>
    </div>
</section>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                @isset($student)
                    {{-- <div class="" id="printable-area"> --}}
                        <div class="" id="printData">
                            <div class="certificate">
                                <!-- Ribbon -->
                                <div class="ribbon">
                                    <img src="{{ asset('assets/frontend/img/static-image/logo.jpg') }}" alt="Ribbon">
                                </div>

                                <!-- Header -->
                                <div class="header">
                                    <h1>THIS CERTIFICATE IS PROUDLY PRESENTED TO</h1>
                                    <h2>{{ $student->name }}</h2>
                                </div>

                                <!-- Content -->
                                <p>
                                    In recognition of outstanding achievement and exemplary dedication, this certificate is
                                    awarded to
                                    <strong>{{ $student->name }}</strong> for successfully completing the program/course
                                    titled
                                    "<strong>
                                        @foreach ($courses as $course)
                                            {{ $course }},
                                        @endforeach
                                    </strong>" on <strong>{{ $student->updated_at->format('Y-m-d') }}</strong>.
                                    Your commitment to excellence and hard work is truly commendable.
                                </p>


                                <!-- Footer -->
                                <div class="footer">
                                    <div>

                                        <div style="border-bottom:gray dotted">
                                            <span class=" p-2">DATE</span>
                                            <div class=" p-2">{{ $student->updated_at->format('Y-m-d') }} </div>
                                        </div>
                                    </div>
                                    <div style="border-bottom:gray dotted">
                                        <span class=" px-2">SIGNATURE</span>
                                        <div class=" px-2"><img style="height: 50px; width: 100px;"
                                                src="{{ asset('assets/frontend/img/static-image/Untitled.png') }}" alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{-- <h4>Student Details</h4>
                            <p><strong>Registration No:</strong> {{ $student->registration_no }}</p>
                            <p><strong>Name:</strong> {{ $student->name }}</p>
                            <p><strong>Email:</strong> {{ $student->email }}</p> --}}
                        </div>
                        {{-- <button class="vs-btn" onclick="printStudentDetails()">Print</button> --}}
                        <button class="vs-btn" id="print-button">Print</button>
                @endisset
                </div>
            </div>
        </div>
</section>
{{--
<script>
    function printStudentDetails() {
        const printContents = document.getElementById('printable-area').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        setTimeout(() => {
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        }, 100);
    }
</script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const printButton = document.getElementById("print-button");

        const printPage = () => {
            const printableArea = document.getElementById("printData").innerHTML;

            // Open a new window for printing
            const printWindow = window.open("", "_blank");
            printWindow.document.open();
            printWindow.document.write(`
                    <html>
                        <head>
                            <title>Print Certificate</title>
                            <style>
                                body { font-family: 'Arial', sans-serif; background-color: #f9f9f9; }
                                .certificate {
                                    max-width: 800px;
                                    margin: 50px auto;
                                    padding: 20px;
                                    border: 5px solid #007bff;
                                    border-radius: 10px;
                                    background: #ffffff;
                                    position: relative;
                                    overflow: hidden;
                                }
                                       .certificate .ribbon {
            position: absolute;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }
                                .certificate .ribbon img {
                                    width: 100px;
                                    height: auto;
                                }
                                .certificate h1, .certificate h2, .certificate p {
                                    text-align: center;
                                    margin: 10px 0;
                                }
                                    .certificate .header {
        text-align: center;
        margin-bottom: 20px;
        margin-top: 78px;
    }
                                .certificate .footer {
                                    display: flex;
                                    justify-content: space-between;
                                    margin-top: 40px;
                                    padding: 0 50px;
                                }
                            </style>
                        </head>
                        <body onload="window.print(); window.close();">
                            ${printableArea}
                        </body>
                    </html>
                `);
            printWindow.document.close();
        };

        printButton.addEventListener("click", printPage);
    });
</script>

@endsection