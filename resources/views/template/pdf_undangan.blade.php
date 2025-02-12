<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Rapat</title>

    <style>
        @page {
            size: A4;
        }

        .container {
            margin: 10px auto;
            width: 100%;
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 200px;
            float: left;
        }

        .header h3,
        .header p {
            margin: 2px;
            word-wrap: break-word;
        }

        .divider {
            border: 1px solid #000;
            margin: 20px 0;
            width: 100%;
        }

        .isi-body {
            margin: 10px;
        }

        .isi-header {
            text-align: center;
        }

        .underline-text {
            text-decoration: underline;
        }

        /* .p-isi-body {
            word-wrap: break-word;
            white-space: pre-wrap;
            line-height: 1.6;
            margin-bottom: 10px;
        } */

        .footer {
            margin: 15px;
            margin-top: 33%;
            float: right;
            text-align: center;
        }

        .footer p {
            margin: 2px;
            max-width: 250px;
            word-wrap: break-word;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('image/pt.png') }}" alt="Logo-PT">
            <h3>PEMERINTAH KABUPATEN </h3>
            <h3>{{$undangan ? strtoupper($undangan->nama) : ''}}</h3>
            <p>{{$undangan ? $undangan->alamat : ''}}</p>
            <p>Telepon : {{$undangan ? $undangan->telepon : ''}} | E-mail : {{$undangan ? $undangan->email : ''}}</p>
        </div>
        <hr class="divider">
        <!-- Tambahkan konten notulen rapat Anda di sini -->

        <div class="isi-body">
            <!-- <h3 class="isi-header underline-text">NOTA DINAS</h3> -->
            <!-- Isi dari Undangan -->
            <p class="p-isi-body">{!! $undangan ? $undangan->isi : '' !!}</p>
        </div>

        <!-- Tanda Tangan  -->
        <div class="footer">
            <table style="width: 250px; text-align: center;">
                <tr>
                    <td>Kepala Bidang</td>
                </tr>
                <tr>
                    <td>{{$undangan ? strtoupper($undangan->nama) : ''}}</td>
                </tr>
                <tr>
                    <td style="height: 80px;"></td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid black; height: 20px;">&nbsp;</td>
                </tr>
                <tr>
                    <td><strong>{{$undangan ? $undangan->name : ''}}</strong></td>
                </tr>
                <tr>
                    <td>NIP: {{$undangan ? $undangan->nip : ''}}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>