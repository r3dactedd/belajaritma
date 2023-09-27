<style>
    .cert {
        border: 15px solid #0072c6;
        border-right: 15px solid #0894fb;
        border-left: 15px solid #0894fb;
        width: 700px;
        font-family: arial;
        color: #383737;
    }

    .crt_title {
        margin-top: 60px;

        font-size: 40px;
        letter-spacing: 1px;
        color: #0060a9;
    }

    .crt_logo img {
        width: 130px;
        height: auto;
        margin: auto;
        padding: 30px;
    }

    .colorGreen {
        color: #27ae60;
    }

    .crt_user {
        display: inline-block;
        width: 80%;
        padding: 5px 25px;
        margin-bottom: 0px;
        padding-bottom: 0px;

        font-size: 40px;
        border-bottom: 1px dashed #cecece;
    }

    .afterName {
        font-weight: 100;
        color: #383737;
    }

    .colorGrey {
        color: grey;
    }

    .certSign {
        width: 200px;
    }

    .marginBottom {
        margin-bottom: 80px;
    }

    @media (max-width: 700px) {
        .cert {
            width: 100%;
        }
    }
</style>
<table class="cert">

    <tr>
        <td align="center">
            <h1 class="crt_title">Certificate Of Completion
                <h2>Sertifikat ini Diberikan Kepada</h2>
                <h1 class="colorGreen crt_user">Insert Name Here</h1>
                <h3 class="afterName">Dalam Menyelesaikan Kursus</h3>
                <h2 class="afterName">Insert Course Name Here</h2>
                <h3>Pada Tanggal {{ date('Y-m-d') }}</h3>
        </td>
    </tr>
    <tr>
        <td align="center">
            <img src="https://www.davidbenrimon.com/files-wide/uploads/logo-placeholder@2x.png" alt="logo">
            <h3 class="marginBottom">BelajaRitma</h3>
        </td>
    </tr>
</table>
<script>
    // Capture the certificate content and convert it to an image
    document.addEventListener("DOMContentLoaded", function() {
        const elementToCapture = document.querySelector(".cert");

        html2canvas(elementToCapture).then(function(canvas) {
            // Create an image from the canvas
            const image = new Image();
            image.src = canvas.toDataURL("image/jpeg");

            // Create a download link for the image
            const a = document.createElement("a");
            a.href = image.src;
            a.download = "certificate.jpg";

            // Simulate a click on the download link to trigger the download
            a.click();
        });
    });
</script>
