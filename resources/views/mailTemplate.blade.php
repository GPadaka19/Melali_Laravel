<!-- <!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Akun</title>
</head>
<body>
    <p>Halo <b>{{$details['username']}}</b>!</p>
    <p>Berikut ini adalah Data Anda:</p>
    <table>
      <tr>
        <td>Username</td>
        <td>:</td>
        <td>{{$details['username']}}</td>
      </tr>
      <tr>
        <td>Role</td>
        <td>:</td>
        <td>{{$details['role']}}</td>
      </tr>
      <tr>
        <td>Website</td>
        <td>:</td>
        <td>{{$details['website']}}</td>
      </tr>
      <tr>
        <td>Tanggal Register</td>
        <td>:</td>
        <td>{{$details['datetime']}}</td>
      </tr>
    </table>

    <center>
      <h3>Copy link di bawah ini ke browser Anda untuk Verifikasi Akun:</h3>
      <b style="color:blue">{{$details['url']}}</b>
    </center>

  <p>Terima kasih telah melakukan registrasi.</p>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi Akun</title>
    <style>
      /* Inline CSS */
      body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
      }
      .container {
          max-width: 600px;
          margin: 0 auto;
          padding: 20px;
          background-color: #ffffff;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      .header {
          text-align: center;
          padding: 20px 0;
      }
      .header img {
          max-width: 100px;
      }
      .content {
          padding: 20px;
          text-align: center;
      }
      .content h1 {
          font-size: 24px;
          color: #333333;
          margin-bottom: 10px;
      }
      .content p {
          font-size: 16px;
          color: #666666;
      }
      .button {
          display: inline-block;
          margin-top: 20px;
          padding: 10px 20px;
          background-color: #f66f4d;
          color: #ffffff;
          text-decoration: none;
          border-radius: 5px;
          font-size: 16px;
          font-weight: bold;
      }
      .button:hover {
          background-color: #e65b38;
      }
      .footer {
          text-align: center;
          padding: 20px;
          font-size: 12px;
          color: #999999;
      }
      .data-table {
          width: 100%;
          margin-top: 20px;
          border-collapse: collapse;
      }
      .data-table td {
          padding: 5px;
      }
    </style>
  </head>
  <body>
    <table class="container" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
      <tr>
        <td class="header" style="text-align: center; padding: 20px;">
          <img src="YOUR_LOGO_URL" alt="Company Logo" style="max-width: 100px;" />
        </td>
      </tr>
      <tr>
        <td class="content" style="padding: 20px; text-align: center;">
          <h1 style="font-size: 24px; color: #333333; margin-bottom: 10px;">Verifikasi Email Anda</h1>
          <p>Halo <b>{{$details['username']}}</b>!</p>
          <p style="font-size: 16px; color: #FF8234;">Berikut ini adalah Data Anda:</p>
          <table class="data-table" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
            <tr>
              <td>Username</td>
              <td>:</td>
              <td>{{$details['username']}}</td>
            </tr>
            <tr>
              <td>Role</td>
              <td>:</td>
              <td>{{$details['role']}}</td>
            </tr>
            <tr>
              <td>Website</td>
              <td>:</td>
              <td>{{$details['website']}}</td>
            </tr>
            <tr>
              <td>Tanggal Register</td>
              <td>:</td>
              <td>{{$details['datetime']}}</td>
            </tr>
          </table>
          <h3 style="margin-top: 20px; font-size: 18px; font-weight: bold;">Klik tombol di bawah ini untuk Verifikasi Akun:</h3>
          <a href="{{$details['url']}}" class="button" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #f66f4d; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px; font-weight: bold;">Verifikasi Akun</a>
          <a href="https://www.wikipedia.org/" class="button" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #f66f4d; color: #ffffff; text-decoration: none; border-radius: 5px; font-size: 16px; font-weight: bold;">Verifikasi Akun</a>
          <p style="font-size: 16px; color: #666666; margin-top: 20px;">Atau salin link di bawah ini dan tempelkan di browser Anda:</p>
          <b style="color: blue; display: block; margin-top: 10px;">{{$details['url']}}</b>
          <p style="font-size: 16px; color: #666666; margin-top: 20px;">Terima kasih telah melakukan registrasi.</p>
        </td>
      </tr>
      <tr>
        <td class="footer" style="text-align: center; padding: 20px; font-size: 12px; color: #999999;">
          <p>&copy; 2024 Your Company. All rights reserved.</p>
        </td>
      </tr>
    </table>
  </body>
</html>





<!-- {{$details['url']}} -->