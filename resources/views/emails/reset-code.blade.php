<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Code</title>
</head>
<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f1f5f9; padding:32px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:520px; background-color:#ffffff; border-radius:18px; overflow:hidden; box-shadow:0 8px 30px rgba(15,23,42,.08);">
                    <!-- Header -->
                    <tr>
                        <td style="background:linear-gradient(135deg,#4f46e5,#7c3aed); padding:28px 32px; text-align:center;">
                            <span style="color:#ffffff; font-size:20px; font-weight:700; letter-spacing:.3px;">🔒 Auth Studio</span>
                        </td>
                    </tr>
                    <!-- Body -->
                    <tr>
                        <td style="padding:36px 32px 8px;">
                            <h1 style="margin:0 0 12px; font-size:22px; color:#0f172a;">Password reset code</h1>
                            <p style="margin:0 0 24px; font-size:15px; line-height:1.6; color:#475569;">
                                Aap ne apna password reset karne ki request ki hai. Neeche diya gaya 6-digit code
                                reset page par enter karein. Ye code <strong>10 minute</strong> mein expire ho jayega.
                            </p>

                            <!-- Code box -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="background-color:#eef2ff; border:1px solid #e0e7ff; border-radius:14px; padding:22px;">
                                        <div style="font-size:13px; color:#6366f1; letter-spacing:.12em; text-transform:uppercase; margin-bottom:8px;">Verification Code</div>
                                        <div style="font-size:38px; font-weight:800; letter-spacing:10px; color:#4338ca;">{{ $code }}</div>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:24px 0 0; font-size:13px; line-height:1.6; color:#94a3b8;">
                                Agar ye request aap ne nahi ki, to is email ko ignore kar dein &mdash; aapka account محفوظ rahega.
                            </p>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="padding:24px 32px 32px; border-top:1px solid #f1f5f9; margin-top:16px;">
                            <p style="margin:0; font-size:12px; color:#cbd5e1; text-align:center;">
                                &copy; {{ date('Y') }} Auth Studio &middot; Secure Authentication System
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
