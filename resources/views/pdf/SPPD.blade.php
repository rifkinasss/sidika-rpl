<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h3 class="text-center"><u>SURAT TUGAS</u></h3>

    <div class="container">
        <table class="table table-borderless">
            <tbody>
                <br>
                <tr>
                    <td>Saya yang bertanda tangan dibawah ini:</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td>Plt. Kepala Dinas Pendidikan DKI Jakarta</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td> : </td>
                    <td>123456789012345678</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td> : </td>
                    <td>Pembina Utama Muda</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td> : </td>
                    <td>Kepala Dinas Pendidikan DKI Jakarta</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td> : </td>
                    <td>Dinas Pendidikan DKI Jakarta</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td> : </td>
                    <td>021-12345678</td>
                </tr>
                <br>
                <tr>
                    <td>Memberikan tugas kepada : </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td>{{ Auth::user()->nama }}</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td> : </td>
                    <td>{{ Auth::user()->nip }}</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td> : </td>
                    {{-- <td>{{ Auth::user()->pangkat }}</td> --}}
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir</td>
                    <td> : </td>
                    {{-- <td>{{ $user->tempat_lahir }}, {{ $user->tanggal_lahir }}</td> --}}
                    <td>Jakarta, 01 Januari 1966</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    {{-- <td>{{ $user->alamat }}</td> --}}
                    <td>Jalan Sumbu Kebangsaan Timur No.01</td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td> : </td>
                    {{-- <td>{{ $user->no_telp }}</td> --}}
                    <td>085878780103</td>
                </tr>
                <br>
                <tr>
                    <td colspan="3">Untuk membantu melaksanakan tugas Dinas Pendidikan DKI Jakarta dalam rangka,
                        melaksanakan perjalanan
                        dinas dari tanggal {{ \Carbon\Carbon::parse($perjadin->tgl_berangkat)->format('d-M-y') }} sampai
                        dengan
                        tanggal {{ \Carbon\Carbon::parse($perjadin->tgl_kembali)->format('d-M-y') }}
                    </td>
                </tr>
                <br>
                <tr>
                    <td colspan="3">Demikian surat tugas ini diberikan untuk dapat dilaksanakan dengan penuh tanggung
                        jawab dan setelah
                        selesai mengikuti kegiatan di mohon untuk menyampaikan laporan secara online melalui website.
                    </td>
                </tr>
                <br>
                <br>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Dikeluarkan di : DKI Jakarta</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Pada Tanggal : {{ \Carbon\Carbon::now()->format('d-M-y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
