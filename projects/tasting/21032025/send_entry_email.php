<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$userEmail = $_POST['email-1'];	
$productText = 'text-13';
$product_typeText = 'radio-1';

$price =  $_POST['text-15'];
$priceWithVat =  $_POST['text-17'];


$dynamicIds = $_POST['group-1-copies'];

function generateProductRow($productName, $productType) {
  return '<tr>
      <td style="padding: 10px 5px; font-size: 14px; color: #555;">'.$productName.'</td>
      <td align="right" style="padding: 10px 5px; font-size: 14px; color: #555;">'.$productType.'</td>
  </tr>';
}

$userBody = '<table width="100%" align="center" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>
            <table
              bgcolor="#ffffff"
              align="center"
              width="600"
              style="
                background-color: #ffffff;
                max-width: 600px;
                width: 600px;
                font-family: Arial, sans-serif;
                margin: 0 auto;
                padding: 0;
                -webkit-border-horizontal-spacing: 0px;
                -webkit-border-vertical-spacing: 0px;
                table-layout: fixed;
              "
              cellspacing="0"
              cellpadding="0"
            >
              <tbody>
                <!-- Header start here -->
                <tr>
                  <td
                    align="center"
                    style="
                      text-align: center;
                      border-bottom: 10px solid white;
                      background: #ffffff;
                      border-top: 10px solid white;
                      padding: 10px 0;
                      vertical-align: middle;
                    "
                    valign="middle"
                  >
                    <a
                      href="https://naturemadeawards.com"
                      target="_blank"
                      style="display: inline-block"
                    >
                      <img
                        src="https://naturemadeawards.com/wp-content/uploads/2025/03/site-logo.png"
                        alt="Logo"
                        style="width: 100px"
                        width="100"
                      />
                    </a>
                  </td>
                </tr>
                <!-- table start here -->
                <tr>
                  <td>
                    <table
                      bgcolor="#ffffff"
                      align="center"
                      width="599"
                      style="
                        background-color: #ffffff;
                        max-width: 599px;
                        width: 599px;
                        font-family: Arial, sans-serif;
                        margin: 0 auto;
                        padding: 0;
                        -webkit-border-horizontal-spacing: 0px;
                        -webkit-border-vertical-spacing: 0px;
                        border-collapse: collapse;
                      "
                      cellspacing="0"
                      cellpadding="0"
                    >
                      <tbody>
                        <tr>
                          <td
                            style="
                              border: 0px solid #bfc8d0;
                              padding: 20px;
                              color: #333333;
                              width: 45%;
                              vertical-align: top;
                              background-color: #e7e6d8;
                            "
                            width="45%"
                            valign="top"
                          >
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Hello,
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Thank you for entering The NatureMade Food & Drink
                              Awards.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 20px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Please find your receipt attached.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 600;
                                color: #333333;
                              "
                            >
                              How to prepare your samples
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 20px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Please provide your samples in the
                              <a
                                href="https://naturemadeawards.com/how-much-to-submit/"
                                style="
                                  margin: 0;
                                  font-size: 15px;
                                  font-weight: 400;
                                  color: #333333;
                                "
                                target="_blank"
                                >volumes requested</a
                              >
                              in their standard retail packaging. Please ensure
                              that all products are packed securely to ensure no
                              damage in transit.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 600;
                                color: #333333;
                              "
                            >
                              Non perishable and perishable product/s delivery
                              address and delivery windows
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Non-perishable and perishable products must be
                              delivered to the below address:
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Mosimann’s Party Service
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              C/O The NatureMade Food & Drink Awards
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              2 Morie St
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Wandsworth
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              London
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              SW18 1SL
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Non-perishable products may be received between 01
                              08 2025 – 01 10 2025.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 20px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Perishable products may be received between 02 10
                              2025 – 03 10 2025.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 600;
                                color: #333333;
                              "
                            >
                              Ultra perishable product/s delivery address and
                              delivery windows
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Ultra perishable products must be delivered to the
                              below address:
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Mosimann’s Club
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              C/O The NatureMade Food & Drink Awards
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              11B W Halkin St
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 5px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              London SW1X 8JL
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Ultra perishable products may be received on 04 10
                              2025.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 20px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Thank you again for entering the awards - we look
                              forward to your participation.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Best regards,
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Pip Martin
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              The Tasting Quarter Ltd - The award-winning
                              specialist events company
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Our Charity Commitment: For our financial year
                              beginning 1st April 2024, 10% of our annual
                              profits are being donated to ClientEarth
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Insured, Rated, Licensed: Public Liability
                              Insurance Coverage (£5 million), 5 Star Food
                              Hygiene Rating, Personal Alcohol License Holders
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              In-Person, Virtual, Hybrid: National and
                              International events for groups of all sizes.
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              <a
                                href="tel: +44 (0)1953 606040"
                                style="
                                  font-size: 15px;
                                  font-weight: 400;
                                  color: #333333;
                                "
                                target="_blank"
                                >T: +44 (0)1953 606040</a
                              >
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              <a
                                href="tel: +44 (0)7957 460270"
                                style="
                                  font-size: 15px;
                                  font-weight: 400;
                                  color: #333333;
                                "
                                target="_blank"
                                >M: +44 (0)7957 460270</a
                              >
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              <a
                                href="mailto: pip.martin@thetastingquarter.com"
                                style="
                                  font-size: 15px;
                                  font-weight: 400;
                                  color: #333333;
                                "
                                target="_blank"
                                >E: pip.martin@thetastingquarter.com</a
                              >
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 10px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              <a
                                href="http://www.thetastingquarter.com"
                                style="
                                  font-size: 15px;
                                  font-weight: 400;
                                  color: #333333;
                                "
                                target="_blank"
                                >https://www.thetastingquarter.com</a
                              >
                            </p>
                            <p
                              style="
                                margin: 0;
                                margin-bottom: 0px;
                                font-size: 15px;
                                font-weight: 400;
                                color: #333333;
                              "
                            >
                              Co Number 4524673. VAT Registration Number
                              802436264
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <!-- Footer start here -->
                <tr>
                  <td
                    align="center"
                    style="
                      text-align: center;
                      background-color: #00582b;
                      padding: 0;
                      border-top: 20px solid #ffffff;
                      vertical-align: middle;
                    "
                    bgcolor="#333f48"
                    valign="middle"
                  >
                    <p
                      style="
                        text-align: center;
                        font-size: 13px;
                        padding: 0px 15px;
                        color: #fff;
                        margin: 20px 0;
                        font-weight: 600;
                      "
                    >
                      The NatureMade Food & Drink Awards @ 2025
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>';
	
    $pdfDoc = '<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td align="center">
            <table width="540" border="0" cellspacing="0" cellpadding="0" style="background: #e7e6d8; border-radius: 5px; padding: 10px; border: 1px solid #ddd; font-family: Arial, sans-serif;">
                <tr>
                    <td style="padding: 10px;">
                        <p style="margin: 0; font-size: 16px; font-weight: bold; color: #333;">Product Details:</p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                            <tr>
                                <th align="left" style="border-bottom: 2px solid #00582b; padding: 10px 5px; font-size: 14px; color: #333;">Product Name</th>
                                <th align="right" style="border-bottom: 2px solid #00582b; padding: 10px 5px; font-size: 14px; color: #333;">Perishability Type</th>
                            </tr>';

                         
                           // Check if dynamicIds exist and are an array
                           if (isset($dynamicIds) && is_array($dynamicIds)) {
                            for($i=0; $i <= count($dynamicIds); $i++){
                              if(empty($dynamicIds[$i])){
                                $productName = $_POST[$productText];
                                $productType = $_POST[$product_typeText];
                                $pdfDoc .= generateProductRow($productName, $productType);
                              }else{
                                $productName = $_POST[$productText."-".$dynamicIds[$i]];
                                $productType = $_POST[$product_typeText."-".$dynamicIds[$i]];
                                $pdfDoc .= generateProductRow($productName, $productType);
                              }
                            }
                          }else{
                            $productName = $_POST['text-13'] ?? '';
                            $productType = $_POST['radio-1'] ?? '';
                            $pdfDoc .= generateProductRow($productName, $productType);
                          }

$pdfDoc .= '</table>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border-collapse: collapse;">
                           <tr>
                                <td align="left" style="border-top: 1px solid #ddd; padding: 10px 5px; font-size: 14px; font-weight: bold;">Total (Excl. VAT)</td>
                                <td align="right" style="border-top: 1px solid #ddd; padding: 10px 5px; font-size: 14px; font-weight: bold;">£'.$price.'</td>
                            </tr>
                            <tr>
                                <td align="left" style="border-top: 1px solid #ddd; padding: 10px 5px; font-size: 14px; font-weight: bold;">Total (Incl. VAT)</td>
                                <td align="right" style="border-top: 1px solid #ddd; padding: 10px 5px; font-size: 14px; font-weight: bold;">£'.$priceWithVat.'</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="padding: 10px;">
                        <p style="margin: 0; font-size: 16px; font-weight: bold; color: #333;">Payment Status:</p>
                        <p style="margin: 0; margin-top: 10px; font-size: 14px; color: #555;">Paid</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>';

// Step 1: Generate PDF
$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);
$html = $pdfDoc;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$pdfContent = $dompdf->output();
$pdfFilePath = 'Receipt.pdf';
file_put_contents($pdfFilePath, $pdfContent);

$mail = new PHPMailer(true);
try {
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();         
    $mail->Host       = 'smtp.sendgrid.net'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'apikey';
    $mail->Password   = '';
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    //Recipients
    $mail->setFrom('', 'NFDA');
    $mail->addAddress($userEmail, 'NFDA');  
    // Attach PDF
    $mail->addAttachment($pdfFilePath);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thank you for entering The NatureMade Food & Drink Awards.';
    $mail->Body    = $userBody;
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}