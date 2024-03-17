<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
</head>

<body class="bg-gray-100">
    <table class="mx-auto w-full max-w-2xl border-collapse bg-white px-6 py-8">
        <tr>
            <td class="mt-8">
                <h2 class="text-gray-700">Konfirmasi Bukti Pembayaran</h2>
                <p class="mt-2 leading-loose text-gray-600">
                    Selamat! Bukti pembayaran anda telah disetujui oleh admin. Sekarang anda dapat mengakses tes sertifikasi dengan klik tombol dibawah ini.
                </p>
                <a href="{{ url('/certifications/' . $transaction->certif_id) }}"
                    style="display: inline-block; padding: 6px 12px; margin-top: 10px; font-size: 0.875rem; font-weight: 500; line-height: 1.25; text-align: center; text-decoration: none; vertical-align: middle; cursor: pointer; background-color: #4f46e5; color: #fff; border-radius: 0.375rem; transition: background-color 0.3s ease-in-out;"
                    class="hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Akses Tes Sertifikasi
                </a>
                <p class="mt-8 text-gray-600">
                    Terima kasih, <br>
                    Team Belajaritma
                </p>
            </td>
        </tr>

    </table>
</body>

</html>
