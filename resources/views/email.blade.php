<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <style>
        /* Global Styles */
        body, html {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6e6e6;
            color: #333;
        }

        table {
            width: 100%;
            max-width: 700px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #ddd;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
            transform: perspective(1000px) rotateY(5deg);
        }

        td {
            padding: 30px;
        }

        /* Header */
        .email-header {
            background: linear-gradient(to right, #8e44ad, #3498db);
            color: white;
            text-align: center;
            padding: 30px 0;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-header h1 {
            margin: 0;
            font-size: 32px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

        .email-header img {
            max-width: 120px;
            margin-top: 15px;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        /* Body Content */
        .email-body {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            text-align: left;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: inset 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .email-body p {
            margin: 0 0 20px;
        }

        .email-body a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            background: linear-gradient(to right, #3498db, #8e44ad);
            padding: 15px 30px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .email-body a:hover {
            background: linear-gradient(to right, #8e44ad, #3498db);
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        /* Divider */
        .email-divider {
            margin: 30px 0;
            border-top: 2px solid #f4f4f4;
        }

        /* Footer */
        .email-footer {
            background-color: #f7f7f7;
            font-size: 12px;
            color: #777;
            text-align: center;
            padding: 25px;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            box-shadow: 0px -4px 8px rgba(0, 0, 0, 0.1);
        }

        .email-footer p {
            margin: 0;
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .email-body {
                font-size: 14px;
            }

            .email-header h1 {
                font-size: 26px;
            }

            .email-body a {
                padding: 12px 25px;
            }

            .email-footer {
                font-size: 11px;
            }
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td class="email-header">
                <h1>{{ $subject }}</h1>
            </td>
        </tr>
        <tr>
            <td class="email-body">
                <p>Hello </p>
                <p>{!! $body !!}</p>
                <p>Click the button below to reset your password:</p>

            </td>
        </tr>
        <tr>
            <td class="email-divider"></td>
        </tr>
        <tr>
            <td class="email-footer">
                <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
                <p>If you didn't request this, please ignore this email.</p>
            </td>
        </tr>
    </table>
</body>
</html>
