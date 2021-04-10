<!DOCTYPE html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     <title>Welcome to {{config('app.name')}}</title>
     <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
</head>
<body>
<table style="width:700px;height: 100%;background-color: #F5F6F8;margin:0 auto;padding:20px;">
     <tr>
          <td align="center" valign="top">
               <table border="0" cellpadding="20" style="width:100%;padding-bottom: 0px;background-color: #fff;">
                    <tr>
                         <td align="center" valign="top" style="">
                              <table border="0" cellpadding="20" cellspacing="0"  style="width:100%;padding-bottom:0px;">
                                   <tr>
                                        <td style="padding: 0 0 10px 0;text-align: right;border-bottom: 1px solid #cecece;color:#7F8FA4;font-size: 11px;font-family: 'Lato', sans-serif;font-weight: 400;text-align: center;">
                                             Title
                                        </td>
                                   </tr>
                              </table>
                         </td>
                    </tr>
                    <tr>
                         <td align="center" valign="top" style="">
                              <table border="0" cellpadding="20" cellspacing="0"  style="width:100%;padding-bottom:0px;">
                                   <tr>
                                        <td style="padding: 0 0 20px 0;text-align:center;color:#334150;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">{{ $template['head_text'] }}</td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 0 0 20px 0;font-family: 'Lato', sans-serif;font-size: 20px;text-align:center;color:#334150;font-weight: 800;">{{ $code }}</td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 0 0 20px 0;text-align:center;color:#334150;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">{{ $template['foot_text'] }}</td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 20px 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;"></td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 0 0 20px 0;font-family: 'Lato', sans-serif;font-size: 20px;text-align:center;color:#334150;font-weight: 800;">Need Help?
                                        </td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 20px 0 5px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">Please send any feedback or bug reports <br/>
                                             to <a href="mailto:hello@mail.com" style="color:#249AF3;">hello@mail.com</a>
                                        </td>
                                   </tr>

                              </table>
                         </td>
                    </tr>
                    <tr>
                         <td style="padding: 0 0 20px 0;text-align:center;color:#7F8FA4;font-family: 'Lato', sans-serif;font-size: 16px;font-weight:400;">
                              ⓒ {{config('app.name')}}
                         </td>
                    </tr>
               </table>
          </td>
     </tr>
</table>
</body>
</html>
