<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
</head>

<body>
    <h3 class="text-center">{{ $title }}</h3>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>Nomor Surat</td>
                <td> : </td>
                <td>{{ $perjadin->nomor_surat }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
