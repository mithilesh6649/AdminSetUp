<!doctype html>
<html lang="en">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <meta content="width=device-width" name="viewport" />
  <meta content="IE=edge" http-equiv="X-UA-Compatible" />
  <title>Email Template</title>
  <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css" />
  <style type="text/css">
    body {
      margin: 0;
      padding: 0;
    }

    table,
    td,
    tr {
      vertical-align: top;
      border-collapse: collapse;
    }

    * {
      line-height: inherit;
    }

    a[x-apple-data-detectors=true] {
      color: inherit !important;
      text-decoration: none !important;
    }
  </style>
  <style id="media-query" type="text/css">
    @media (max-width: 620px) {

      .block-grid,
      .col {
        min-width: 320px !important;
        max-width: 100% !important;
        display: block !important;
      }

      .block-grid {
        width: 100% !important;
      }

      .col {
        width: 100% !important;
      }

      .col_cont {
        margin: 0 auto;
      }

      img.fullwidth,
      img.fullwidthOnMobile {
        max-width: 100% !important;
      }

      .no-stack .col {
        min-width: 0 !important;
        display: table-cell !important;
      }

      .no-stack.two-up .col {
        width: 50% !important;
      }

      .no-stack .col.num2 {
        width: 16.6% !important;
      }

      .no-stack .col.num3 {
        width: 25% !important;
      }

      .no-stack .col.num4 {
        width: 33% !important;
      }

      .no-stack .col.num5 {
        width: 41.6% !important;
      }

      .no-stack .col.num6 {
        width: 50% !important;
      }

      .no-stack .col.num7 {
        width: 58.3% !important;
      }

      .no-stack .col.num8 {
        width: 66.6% !important;
      }

      .no-stack .col.num9 {
        width: 75% !important;
      }

      .no-stack .col.num10 {
        width: 83.3% !important;
      }

      .video-block {
        max-width: none !important;
      }

      .mobile_hide {
        min-height: 0px;
        max-height: 0px;
        max-width: 0px;
        display: none;
        overflow: hidden;
        font-size: 0px;
      }

      .desktop_hide {
        display: block !important;
        max-height: none !important;
      }
    }
  </style>
  <style id="icon-media-query" type="text/css">
    @media (max-width: 620px) {
      .icons-inner {
        text-align: left;
      }

      .icons-inner td {
        margin: 0 auto;
      }
    }
  </style>
</head>

<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #ffffff;">

  <h2>Dear, {{$mail_data["user_name"]}}</h2>

  <p>We are delighted to inform you that your support regarding query has been successfully resolved</p>

  <p>{{$mail_data["reply_message"]}}</p>

</body>

</html>