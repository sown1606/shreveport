<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Welcome to Digital Dog Direct Rewards Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            max-width: 100%;
            height: auto;
        }
        .content {
            text-align: left;
            padding: 20px;
            font-size: 16px;
            color: #333;
        }
        .highlight {
            color: #d9534f;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #777;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            background-color: #5c8d33;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #4a7028;
        }
    </style>
</head>
<body>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center">
            <div class="container">
                <!-- Header Image -->
                <div class="header">
                    <a href="https://digitaldogdirect.com/">
                        <img src="https://static.wixstatic.com/media/778619_862962e7e6124f7492be86d1d978c9e1~mv2.png/v1/fill/w_175,h_50,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/DigitalDogDirect_Logo_NoDogPNG.png" alt="Welcome Image" />
                    </a>
                </div>

                <!-- Welcome Message -->
                <div class="content">
                    <h2>Welcome, {{ $user->Fullname }}!</h2>
                    <p>Thank you for joining the <strong>Digital Dog Direct Rewards Portal</strong>. Below are your membership details:</p>

                    <ul>
                        <li><strong>Account ID:</strong> <span class="highlight">{{ $user->Player_ID }}</span></li>
                        <li><strong>Tier Level:</strong> <span class="highlight">{{ $user->Tier ?? 'N/A' }}</span></li>
                        <li><strong>Reward Points:</strong> <span class="highlight">{{ number_format($user->Points) }}</span></li>
                    </ul>

                    <p>You can log in to view your full membership benefits, check your latest rewards, and manage your account.</p>

                    <a href="{{ url('admin/login') }}" class="button">Access Your Rewards</a>
                </div>

                <!-- Footer -->
                <div class="footer">
                    <p>&copy; {{ date('Y') }} Digital Dog Direct. All rights reserved.</p>
                    <p><a href="https://digitaldogdirect.com/contact">Contact Support</a> | <a href="https://digitaldogdirect.com/terms">Terms & Conditions</a></p>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
